<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-cascade narrower mt-3">
                    <!-- <div class="card-header">Admin Dashboard</div> -->
                    <div class="view view-cascade gradient-card-header blue-gradient narrower py-3 mx-4 d-flex z-depth-3 justify-content-between align-items-center rounded"
                        style="margin-top:-25px;">
                        <a href="" class="white-text mx-3 text-center">Users Table</a>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success" @click="showUserModal()">Add new User</button>
                        <!-- <button class="btn btn-success" @click="discount = true">Add new User</button> -->
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in users" :key="user.id">
                                    <td>{{user.id}}</td>
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                    <td>
                                        <button @click="showContactModal(user.id)" class="btn btn-sm btn-primary">View User</button>
                                        <button @click="showUser(index)" class="btn btn-sm btn-info">Edit User</button>
                                        <button @click="deleteUser(index)" class="btn btn-sm btn-danger">Delete User</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="ifupdate == false" class="modal-title" id="exampleModalLabel">Create New User</h5>
                        <h5 v-if="ifupdate == true" class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input v-if="ifupdate == false" type="text" v-model="name" class="form-control" id="Name"
                                    aria-describedby="emailHelp" placeholder="Enter name">
                                <input v-if="ifupdate == true" type="text" v-model="user.name" class="form-control" id="Name"
                                    aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address </label>
                                <input v-if="ifupdate == false" type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                <input v-if="ifupdate == true" type="email" v-model="user.email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password </label>
                                <input v-if="ifupdate == false" type="password" v-model="password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                                <input v-if="ifupdate == true" type="password" v-model="user.password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="ifupdate == false" @click="submitNewUser()" type="button" class="btn btn-primary">Save changes</button>
                        <button v-if="ifupdate == true" @click="submitUpdateModal()" type="button" class="btn btn-primary">Update Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" v-model="user.name" class="form-control" id="Name"
                                    aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address </label>
                                <input type="email" v-model="user.email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password </label>
                                <input type="password" v-model="user.password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button v-if="ifupdate == false" @click="submitNewUser()" type="button" class="btn btn-primary">Save changes</button>
                        <button v-if="ifupdate == true"  type="button" class="btn btn-primary">Update Changes</button>
                    </div>
                </div>
            </div>
        </div> -->
        <mdb-container>
            <mdb-modal :show="cont_modal" @close="cont_modal = false" id="contactModal" removeBackdrop side position="bottom-right" danger>
            <mdb-modal-header>
                <p class="heading">User Contact Information
                </p>
            </mdb-modal-header>
            <mdb-modal-body>
               <ul>
                   <li v-for="contacts in contact" :key="contacts.user_id">
                       {{contacts.cont_num}}
                   </li>
               </ul>
               <br>
               <label for="text">Contact Number</label>
               <input type="text" class="form-control" v-model="cont_num">
            </mdb-modal-body>
            <mdb-modal-footer>
                <button @click="submitContact()" type="button" class="btn btn-primary">Submit Contact</button>
            </mdb-modal-footer>
            </mdb-modal>
        </mdb-container>
    </div>
</template>

<script>
    import {
        mdbContainer,
        mdbIcon,
        mdbBtn,
        mdbModal,
        mdbModalHeader,
        mdbModalBody,
        mdbModalFooter,
        mdbBadge
    } from 'mdbvue';
    export default {
        data: () => ({
            users: '',
            name: '',
            email: '',
            contact: [],
            cont_num: '',
            user_cont_id: '',
            password: '',
            cont_modal: false,
            user: [],
            ifupdate: false
        }),
        methods: {
            showContactModal(id){
                this.cont_modal = true
                this.user_cont_id = id
                axios.get('/contacts/'+id,{
                    cont_id:id
                }).then(response =>{
                    this.contact = response.data.contacts
                })
            },
            submitContact(){
                axios.post('/contacts',{
                    id: this.user_cont_id,
                    cont_num : this.cont_num
                }).then(response =>{
                    this.cont_modal = false
                     this.cont_num = ''
                    alert(JSON.stringify(response.data.message))
                })
            },
            showUser(index) {
                this.user = this.users[index]
                this.showUpdateModal()
            },
            deleteUser(index){
                axios.delete('/users/'+this.users[index].id,{
                    id: this.users[index].id
                }).then(response =>{
                    this.getusers()
                    alert(JSON.stringify(response.data.message))
                })
            },
            getusers() {
                axios.get('/users/').then(response => {
                    this.users = response.data.users
                }).catch()
            },
            showUserModal() {
                $('#createModal').modal('show');
                this.ifupdate = false
            },
            submitNewUser() {
                axios.post('/users', {
                    name: this.name,
                    email: this.email,
                    pasword: this.password
                }).then(respose => {
                    this.getusers()
                    this.clearmodal()
                    $('#createModal').modal('hide');
                })
            },
            showUpdateModal() {
                $('#createModal').modal('show');
                this.ifupdate = true
            },
            submitUpdateModal(){
                axios.patch('/users/'+this.user.id,{
                    id: this.user.id,
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password
                }).then(response => {
                    this.getusers()
                    alert(JSON.stringify(response.data.message))
                    $('#createModal').modal('hide')
                })
            },
            clearmodal() {
                this.name = '',
                this.email = '',
                this.password = ''
            }

        },
        created() {
            console.log('Component mounted.')
            this.getusers()
        },
        components: {
            mdbContainer,
            mdbIcon,
            mdbBtn,
            mdbModal,
            mdbModalHeader,
            mdbModalBody,
            mdbModalFooter,
            mdbBadge
        }
    }

</script>
