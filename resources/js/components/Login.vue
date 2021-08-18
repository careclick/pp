<template>
  <div>
    <div class="min-h-screen flex flex-col justify-center pb-12 sm:px-6 lg:px-8">
      <div class="mt-3 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-16 w-auto mb-6" src="https://careclick.healthcare/wp-content/uploads/2019/12/cropped-CareClick-official-new-logo.png" alt="CareClick" />
          </div>
          <form>
            <div>
              <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
              <div class="mt-1 relative rounded-md shadow-sm">
                <input 
                v-model="$v.form.email.$model"
                :class="$v.form.email.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'"
                class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <svg v-if="$v.form.email.$error" class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <p class="text-red-500 text-xs  mt-1"
								v-if="!$v.form.email.required && $v.form.email.$error"
							>The email field is required</p>
              <p class="text-red-500 text-xs  mt-1"
								v-if="!$v.form.email.email && $v.form.email.$error"
							>This field must be an email</p>
            </div>
            <div class="mt-6">
              <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                Password
              </label>
              <div class="mt-1 relative rounded-md shadow-sm">
                <input 
                type="password"
                v-model="$v.form.password.$model"
                :class="$v.form.password.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'"
                class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                  <svg v-if="$v.form.password.$error" class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <p class="text-red-500 text-xs mt-1"
                v-if="!$v.form.password.required && $v.form.password.$error"
              >The password field is required
              </p>
            </div>

            <div class="mt-6 flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">
                  Remember me
                </label>
              </div>

              <div class="text-sm leading-5">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                  Forgot your password?
                </a>
              </div>
            </div>
            <div class="mt-6">
              <span class="block w-full rounded-md shadow-sm">
                <button :disabled="loading" @click.prevent="login" class="w-full h-10 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                  <span v-if="loading">
                    <loading fill="fff" width="120"/>
                  </span>  
                  <span v-if="!loading">
                    Sign in
                  </span>  
                </button>
              </span>
            </div>
            <div class="mt-6">
              <div class="relative">
                <div class="absolute inset-0 flex items-center">
                  <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm leading-5">
                  <span class="px-2 bg-white text-gray-500">
                    Don't have an account?
                  </span>
                </div>
              </div>
            </div> 
            <div class="mt-6">
              <a href="/register">
                <span class="block w-full rounded-md shadow-sm">
                  <span class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Sign up
                  </span>
                </span>
              </a>
            </div> 
          </form>
        </div>
        <div class="mt-3">
          <ul class="flex items-center justify-center text-gray-600 text-xs md:text-sm">
            <a href="#"><li class="hover:text-indigo-700">Terms and Conditions</li></a>
            <a href="#"><li class="ml-8 hover:text-indigo-700">Help</li></a>
            <a href="#"><li class="ml-8 hover:text-indigo-700">Privacy Policy</li></a>
          </ul>  
        </div>  
      </div>
      <vue-snotify></vue-snotify>
    </div>
  </div>
</template>

<script>
import { required,email } from "vuelidate/lib/validators";
import axios from 'axios'
import loading from '../components/extras/Loading'

var base_url = window.location.origin
var token = localStorage.getItem('token')
export default {
    components:{
      loading
    },
    data(){
      return{
        form:{
          email:'',
          password:''
        },
        loading:false
      }
    },
    validations: {
      form: {
        email: { required,email },
        password: { required }
      }
    },
    methods:{
      login(){
        this.$v.$touch();
        if (this.$v.$invalid) {
          this.$snotify.error("Please fill the form correctly", "Error");
          return
        }
        if(localStorage.getItem('token')){
          this.apiLogout()
        }
        this.apiLogin()
      },
      apiLogout(){
        this.loading = true
				axios.get('/api/auth/logout')
				.then(resp=>{
					if(resp.status == 200){
						localStorage.removeItem('token')
						this.apiLogin()
					}
				}).catch(err=>{
					console.log(err.response)
				})
			},
      apiLogin(){
        this.loading = true
        axios.post('/api/auth/login', this.form)
        .then(resp=>{
          if(resp.status == 200){
          localStorage.setItem('token', resp.data.token)
          this.webLogin()
          }
        }).catch(err=>{
          if(err.response.status == 401 || err.response.status == 422){
            this.$snotify.error("Invalid Credentials", "Error");
            this.loading = false
          }
          this.loading = false
        })
      }, 
      webLogin(){
        axios.post('/login', this.form)
        .then(resp=>{
          if(resp.status == 200){
            this.loading = false
            this.$snotify.success("Login successful", "Success");
            window.location.replace(base_url + resp.data)
          }
        }).catch(err=>{
          console.log(err.resp)
          this.loading = false
        })
      },
    },  
  }
</script>

<style lang="scss" scoped>

</style>