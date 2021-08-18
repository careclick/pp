<template>
  <div>
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
          <p class="mt-1 text-sm leading-5 text-gray-500">
            This information will be displayed publicly so be careful what you share.
          </p>
          <div v-if="form.plan" class="flex items-center mt-4">
            <p class="text-base">Plan:</p>
            <span class=" ml-1 inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium leading-4 bg-indigo-100 text-indigo-800">
              {{form.plan}}
          </span>
          </div>  
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form>
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3">
                <label for="username" class="block text-sm font-medium leading-5 text-gray-700">
                  Username
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input disabled v-model="form.username" id="username" class="bg-gray-100 form-input flex-1 block w-full rounded-none rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Username" />
                </div>
              </div>
            </div>

            <div class="mt-6">
              <label for="about" class="block text-sm leading-5 font-medium text-gray-700">
                About
              </label>
              <div class="rounded-md shadow-sm">
                <textarea v-model="form.about" id="about" rows="3" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="About"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">
                Brief description for your profile.
              </p>
            </div>

            <div class="mt-6">
              <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
                Photo
              </label>
              <div class="mt-2 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <img v-if="form.picture" :src="`images/${form.picture}`" class="w-16 rounded-full">
                  <Icon v-else name="user"/>
                </span>
                <div class="upload-btn-wrapper ml-5 rounded-md shadow-sm">
                  <button class="py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    {{ filename ? filename : 'Change' }}
                  </button>
                  <input @change="updatepic" type="file" name="myfile" />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
          <p class="mt-1 text-sm leading-5 text-gray-500">
            Use a permanent address where you can receive mail.
          </p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
                <input v-model="$v.form.firstname.$model" id="first_name" :class="$v.form.firstname.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 form-input block w-full py-2 px-3 border  rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
								v-if="!$v.form.firstname.required && $v.form.firstname.$error"
								>The first name field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                <input v-model="$v.form.lastname.$model" id="last_name" :class="$v.form.lastname.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.lastname.required && $v.form.lastname.$error"
								>The last name field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
								<label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
								<div class="mt-1 relative rounded-md shadow-sm">
								<input placeholder="Email address" :class="$v.form.email.$error || checkEmail == !false && form.email.length >= 4 && form.email !== this.user.email && !checkingEmail ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.email.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
									<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
										<svg v-if="checkEmail == !false && !checkingEmail && form.email !== this.user.email" class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
											<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
										</svg>
										<svg v-if="checkEmail == !true  && form.email.length >= 4 && !checkingEmail && $v.form.email.email" class="text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z"/></svg>
										<loading v-if="checkingEmail && form.email.length >= 4 " fill="5a67d8" width="60"/>
									</div>
								</div>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.email.required && $v.form.email.$error"
								>The email is required</p>
								<p class="text-red-500 text-xs  mt-1"
								v-if="!$v.form.email.email && $v.form.email.$error"
								>This field must an email.</p>
							</div>

              <div class="col-span-6 sm:col-span-3">
                <label for="email_address" class="block text-sm font-medium leading-5 text-gray-700">Phone</label>
                <input v-model="$v.form.phone.$model" :class="$v.form.phone.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.phone.required && $v.form.phone.$error"
								>The phone field is required</p>
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.phone.numeric && $v.form.phone.$error"
								>This phone field must be numeric.</p>
              </div>


              <div class="col-span-6">
                <label for="email_address" class="block text-sm font-medium leading-5 text-gray-700">Address</label>
                <input v-model="$v.form.address.$model" :class="$v.form.address.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.address.required && $v.form.address.$error"
								>The address field is required</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Billing Information</h3>
          <p class="mt-1 text-sm leading-5 text-gray-500">
            Here, you have information about your card details.
          </p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2 w-1/2">
          <div class="bg-indigo-500 hover:bg-indigo-600 shadow hover:shadow-lg rounded px-4 py-2">
            <div>
              <span class="text-white opacity-25">**** **** ****</span><span class="text-white"> 2312</span>
            </div>
            <div class="flex items-center justify-between">
              <div class="text-white">
                09/16
              </div>
              <div>
                <Icon name="visa" class="w-10"/>
              </div>
            </div>
          </div>
          <span class="rounded-md shadow-sm">
            <button type="button" class="mt-5 py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
              Change
            </button>
          </span>
        </div>
      </div>
    </div>

    <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-t-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
          <p class="mt-1 text-sm leading-5 text-gray-500">
            Decide which communications you'd like to receive and how.
          </p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="#" method="POST">
            <fieldset>
              <legend class="text-base leading-6 font-medium text-gray-900">By Email</legend>
              <div class="mt-4">
                <div class="flex items-start">
                  <div class="absolute flex items-center h-5">
                    <input id="comments" true-value="1" false-value="0" type="checkbox" v-model="form.consultation" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                  </div>
                  <div class="pl-7 text-sm leading-5">
                    <label for="comments" class="font-medium text-gray-700">Consultations</label>
                    <p class="text-gray-500">Get notified when a dcotor accept or reject your request and when he enters into the waiting room.</p>
                  </div>
                </div>
                <div class="mt-4">
                  <div class="flex items-start">
                    <div class="absolute flex items-center h-5">
                      <input id="message" true-value="1" false-value="0" v-model="form.message" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                    </div>
                    <div class="pl-7 text-sm leading-5">
                      <label for="candidates" class="font-medium text-gray-700">Messages</label>
                      <p class="text-gray-500">Get notified when you receive a chat message.</p>
                    </div>
                  </div>
                </div>
                <div class="mt-4">
                  <div class="flex items-start">
                    <div class="absolute flex items-center h-5">
                      <input id="offers" true-value="1" false-value="0" v-model="form.offer" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                    </div>
                    <div class="pl-7 text-sm leading-5">
                      <label for="offers" class="font-medium text-gray-700">Offers</label>
                      <p class="text-gray-500">Get notifications of CareClick offers.</p>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <fieldset class="mt-6">
              <legend class="text-base leading-6 font-medium text-gray-900">Push Notifications</legend>
              <p class="text-sm leading-5 text-gray-500">These are delivered via SMS to your mobile phone.</p>
              <div class="mt-4">
                <div class="flex items-center">
                  <input id="on" value="1" v-model="form.sms" :checked="form.sms == 1" name="form-input push_notifications" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                  <label for="push_everything" class="ml-3">
                    <span class="block text-sm leading-5 font-medium text-gray-700">On</span>
                  </label>
                </div>
                <div class="mt-4 flex items-center">
                  <input id="push_email" value="0" v-model="form.sms" :checked="form.sms == 0" name="form-input push_notifications" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                  <label for="push_email" class="ml-3">
                    <span class="block text-sm leading-5 font-medium text-gray-700">Off</span>
                  </label>
                </div> 
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="flex justify-end items-center rounded-b-lg px-4 py-3 bg-white shadow text-right sm:px-6">
		  <div>
		  	<button :disabled="loading" @click.prevent="validateForm" class="h-10 py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
		  		<span v-if="!loading">Update</span>
		  		<loading v-if="loading" fill="fff" width="50"/>
		  	</button>
		  </div>
	  </div>
    <vue-snotify/>
  </div>
</template>

<script>
  import loading from '../extras/Loading.vue'
  import axios from 'axios'
  import Icon from '../extras/Icon.vue'
  import {
  required,
  minLength,
  numeric,
  email,
} from "vuelidate/lib/validators";
  export default {
    components:{
      loading,
      Icon,
    },
    data(){
      return{
        loading:false,
        form:{
          username:'',
          about:'',
          firstname:'',
          lastname:'',
          email:'',
          phone:'',
          address:'',
          consultation:'',
          offer:'',
          message:'',
          plan:'',
          sms:'',
          picture:null 
        },
        loading:false,
        user:[],
        countries: [],
        states: [],
        checkEmail:null,
				checkingEmail:false,
        checkUsername:null,
				checkingUsername:false,
        userDetails:[],
        filename:null
      }
    },
    validations: {
				form: {
					username: {
						required,
						minLength: minLength(4)
					},
					email: {
						required,
						email
					},
					firstname: { required },
					lastname: { required },
					phone: { required, numeric },
					address: { required },
				},
      },
      watch: {
			"form.username": {
				handler() {
					if (this.form.username.length > 0) {
						this.fetchUsername();
					}
				},
				deep: true
			},
			"form.email": {
				handler() {
					if (this.form.email.length > 0) {
						this.fetchEmail();
					}
				},
				deep: true
			}
		},
    methods:{
      updatepic(e){
        if(e.target.files[0].type == 'image/jpeg' || e.target.files[0].type == 'image/jpg' || e.target.files[0].type == 'image/png'){
        this.filename = e.target.files[0].name
        this.form.picture = e.target.files[0]
        }else{
          this.$snotify.error('Please select a valid file', "Error");
          return
        }
      },
      validateForm(){
				this.$v.$touch();
        if (this.$v.$invalid) {
          this.$snotify.error('Please fill the form correctly', "Error");
        } else {
          this.update()
        }
      },
      
      update(){
        this.loading = true
        var fd = new FormData
        fd.append('username', this.form.username)
        fd.append('about', this.form.about)
        fd.append('firstname', this.form.firstname)
        fd.append('lastname', this.form.lastname)
        fd.append('email', this.form.email)
        fd.append('phone', this.form.phone)
        fd.append('phone', this.form.phone)
        fd.append('address', this.form.address)
        fd.append('consultation', this.form.consultation)
        fd.append('offer', this.form.offer)
        fd.append('message', this.form.message)
        fd.append('sms', this.form.sms)
        fd.append('picture', this.form.picture)
        axios.post('/api/updateuser', fd)
        .then(resp=>{
          if(resp.status == 200){
            fire.$emit('ProfileUpdated')
            this.filename = null
            this.$snotify.success('Profile updated successfully','Success')
            this.loading = false
          }
        }).catch(err=>{
          this.loading = false
          console.log(err.response)
        })
      },
        fetchUsername: _.debounce(function() {
					this.checkingUsername = true;
						axios
							.get("/api/username", { params: { username: this.form.username } })
							.then(response => {
								if (response.data == true) {
									this.checkUsername = true;
								} else {
									this.checkUsername = false;
								}
								this.checkingUsername = false;
							})
							.catch(error => {});
					}, 300),

			fetchEmail: _.debounce(function() {
				this.checkingEmail = true;
					axios.get("/api/email", { params: { email: this.form.email } })
						.then(response => {
							if (response.data == true) {
								this.checkEmail = true;
							} else {
								this.checkEmail = false;
							}
							this.checkingEmail = false;
						}).catch(error => {});
				}, 300),

      getUser(){
        axios.get('/api/auth/getuser')
        .then(resp=>{
          this.form.username = resp.data.username,
          this.form.plan = resp.data.plan,
          this.form.about = resp.data.about,
          this.form.firstname = resp.data.name.split(' ')[0],
          this.form.lastname = resp.data.name.split(' ')[1],
          this.form.email = resp.data.email,
          this.form.phone = resp.data.phone,
          this.form.picture = resp.data.picture,
          this.form.address = resp.data.address,
          this.form.consultation = resp.data.notifications.consultation,
          this.form.offer = resp.data.notifications.offer,
          this.form.message = resp.data.notifications.message,
          this.form.sms = resp.data.notifications.sms
        }).catch(err=>{
          console.log(err.response)
        })
      }
    },
    created(){
      fire.$on('ProfileUpdated', ()=>{
        this.getUser()
      })
    },
    mounted(){
      this.user = window.user
      this.getUser()
    }

  }
</script>

<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}


.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>