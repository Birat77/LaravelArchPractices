<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Component</div>

                    <div class="card-body">
                        <div class="form">
                            <form action="#" class="form" @submit.prevent="handleForm" v-if="!usersList.length">
                                <div class="form-group">
                                    <label for="email">Email</label><br>
                                    <input type="text" name="email" v-model="formData.email" >
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label><br>
                                    <input type="text" name="password" v-model="formData.password" >
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                        </form>
                        </div>
                        <div class="list" v-if="usersList.length">
                            <h2>Users List</h2>
                            <ul v-for="user in usersList">
                                <li>{{user.email}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    axios.default.withCredentials = true;
    axios.defaults.baseURL = "http://localhost:8000/";

    export default {
    name: 'UserComponent',
        data(){
        return{
            usersList: {},
            formData: {
                email : '',
                password :'',
                }
            }
        },
        methods: {
            handleForm: function(){
                //const res = await axios.get('/api/auth/login',this.formData);
                    axios.post('/api/auth/login',this.formData).then(response=>{
                    var authToken = response.data.access_token;
                    this.getUsers(authToken);
                    });
            },
            getUsers: function(token) {
            console.log(token);
                axios.get('/api/users',{
                         headers: {
                        Authorization: 'Bearer '+token,
                        }
                    }).then(response=>{
                    this.usersList = response.data.users;
                }).catch(error => console.log('error fetching data:'+ error));
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
