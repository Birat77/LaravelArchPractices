<template>
    <div class="w-50 p-3 center" >
<!-- Default form login -->
<form class="text-center border border-light p-5" action="#" @submit.prevent="handleForm" v-if="!usersList.length">

    <p class="h4 mb-4">Sign in</p>
    <!--recaptcha-->
    <input type="hidden" class="form-control mb-4" name="recaptcha" id="recaptcha">
    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail"  v-model="formData.email">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" v-model="formData.password">
    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="">Register</a>
    </p>

    <!-- Social login -->
    <p>or sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</form>
                        <div class="list" v-if="usersList.length">
                            <h2>Users List</h2>
                            <ul v-for="user in usersList">
                                <li>{{user.email}}</li>
                            </ul>
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
<style>
    /* hide google recaptcha button */
    .grecaptcha-badge { visibility: hidden; }
</style>
