<template>
  <div> 
    <modal name="register-patient" :clickToClose="false" :scrollable="true" :adaptive="true" height="auto" :width="700">
      <div class="">
        <div class="bg-white border-b border-gray-200 py-4 text-center">
          <p class="font-bold text-gray-600">ADD PATIENT</p>
        </div>  
        <div class="mt-5 md:mt-0 md:col-span-2 px-8 pt-6">
          <form>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
                <input v-model="$v.form.firstname.$model" id="first_name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.firstname.required && $v.form.firstname.$error"
								>The first name field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                <input v-model="$v.form.lastname.$model" id="last_name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.lastname.required && $v.form.lastname.$error"
								>The last name field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
								<label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
								<div class="mt-1 relative rounded-md shadow-sm">
								<input placeholder="Email address" :class="$v.form.email.$error || checkEmail == !false && form.email.length >= 4 && !checkingEmail ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.email.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
									<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
										<svg v-if="checkEmail == !false && !checkingEmail" class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
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
                <label for="phone" class="block text-sm font-medium leading-5 text-gray-700">Phone</label>
                <input v-model="$v.form.phone.$model" id="phone" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.phone.required && $v.form.phone.$error"
								>The phone field is required</p>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.phone.numeric && $v.form.phone.$error"
								>This phone field must be numeric.</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="gender" class="block text-sm font-medium leading-5 text-gray-700">Gender</label>
                <select v-model="$v.form.gender.$model" id="gender" class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  <option value="">Select your gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.gender.required && $v.form.gender.$error"
								>The gender field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-3">
								<label for="dob" class="block text-sm font-medium leading-5 text-gray-700">Date of Birth</label>
								<date-picker lang="en" type="date" format="DD-MM-YYYY" placeholder="Date of Birth" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5" :value="form.dob"
									v-model="$v.form.dob.$model" 
									></date-picker>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.dob.required && $v.form.dob.$error"
								>The date of birth field is required</p>
							</div>

              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country / Region</label>
                <select v-model="$v.form.country.$model" @change="getStates()" id="country" class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                 <option value="" selected>Select a country</option>
								<option v-for="country in orderedCountries" :key="country.id" :value="{ id: country.id, name: country.name }">{{ country.name }}</option>
                </select>
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.country.required && $v.form.country.$error"
								>The country field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="state" class="block text-sm font-medium leading-5 text-gray-700">State</label>
                <select v-model="$v.form.state.$model" id="state" class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  <option value="" selected>Select a state</option>
										<option 
										v-for="state in orderedStates"
                    :value="{ id: state.id, name: state.name }"
                    :key="state.id">
										{{ state.name }}
										</option>
									</select>	
									<p class="text-red-500 text-xs  mt-1"
										v-if="!$v.form.state.required && $v.form.state.$error"
									>The state field is required</p>
              </div>

              <div class="col-span-6">
                <label for="street_address" class="block text-sm font-medium leading-5 text-gray-700">Street address</label>
                <input v-model="$v.form.address.$model" id="street_address" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.address.required && $v.form.address.$error"
								>The address field is required</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-8" :class="show ? 'mb-2' : 'mb-8'">
							<div class="flex items-center">
                <div class="cursor-pointer upload-btn-wrapper shadow-sm inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded text-white bg-green-500 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                  <span class="inline-flex rounded-md shadow-sm">
                    <svg v-if="filename == null" class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 6.70711C5.90237 6.31658 5.90237 5.68342 6.29289 5.29289L9.29289 2.29289C9.48043 2.10536 9.73478 2 10 2C10.2652 2 10.5196 2.10536 10.7071 2.29289L13.7071 5.29289C14.0976 5.68342 14.0976 6.31658 13.7071 6.70711C13.3166 7.09763 12.6834 7.09763 12.2929 6.70711L11 5.41421L11 13C11 13.5523 10.5523 14 10 14C9.44771 14 9 13.5523 9 13L9 5.41421L7.70711 6.70711C7.31658 7.09763 6.68342 7.09763 6.29289 6.70711Z" fill="#fff"/>
                    </svg>
                    <load v-else class="w-4 mr-2 items-center text-white"/>
                    <input :disabled="filename !== null " @change="upload" type="file">
                      {{ filename ? filename : 'Upload Patient' }}
                  </span>
                </div>
                <div class="ml-2">
                  <button @click.prevent="show = !show" class="bg-green-500 rounded p-2">
                    <svg class="text-white stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13 16H12V12H11M12 8H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </button>
                </div>
							</div>
							<div class="flex items-center">
                <button @click.prevent="validateForm" :disabled="loading" class="h-10 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                  <svg v-if="!loading" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 7C11 6.44772 10.5523 6 10 6C9.44772 6 9 6.44772 9 7V9H7C6.44772 9 6 9.44771 6 10C6 10.5523 6.44772 11 7 11H9V13C9 13.5523 9.44772 14 10 14C10.5523 14 11 13.5523 11 13V11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H11V7Z" fill="#fff"/>
                  </svg>
                  <span v-if="!loading">Add</span>
                  <loading v-if="loading" fill="fff" width="50"/>
                </button>
                <button @click.prevent="hideModalRegister" class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                  <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM8.70711 7.29289C8.31658 6.90237 7.68342 6.90237 7.29289 7.29289C6.90237 7.68342 6.90237 8.31658 7.29289 8.70711L8.58579 10L7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071C7.68342 13.0976 8.31658 13.0976 8.70711 12.7071L10 11.4142L11.2929 12.7071C11.6834 13.0976 12.3166 13.0976 12.7071 12.7071C13.0976 12.3166 13.0976 11.6834 12.7071 11.2929L11.4142 10L12.7071 8.70711C13.0976 8.31658 13.0976 7.68342 12.7071 7.29289C12.3166 6.90237 11.6834 6.90237 11.2929 7.29289L10 8.58579L8.70711 7.29289Z" fill="#fff"/>
                  </svg>
                  <span>Cancel</span>
							  </button>
              </div> 
						</div>
            <div v-if="show" :class="!show ? '-mt-6' : 'mb-6'">
              <p class="text-sm"><span class="font-bold">NB:</span> Only .xlsx files are allowed, you cannot upload a duplicate record. </p>
            </div>
          </form>  
        </div>
      </div>
    </modal>
    <vue-snotify/>
  </div>
</template>

<script>
  import Icon from '../Icon'
  import loading from '../Loading'
  import _ from "lodash"
  import DatePicker from 'vue2-datepicker';
  import moment from 'moment'
  import {
  required,
  minLength,
  numeric,
  email,
  sameAs
} from "vuelidate/lib/validators";
  export default {    
    props:['message'],
    data(){
      return{
        form:{
          firstname:"",
          lastname:"",
          email:"",
          phone:"",
          gender:'',
          dob:'',
          country:"",
          state:"",
          address:""
        },
        show:false,
        loading:false,
        countries: [],
        states: [],
        checkEmail:null,
        checkingEmail:false,
        filename:null
      }
    },
    components:{
      Icon,
      loading,
      DatePicker
    },
    computed:{
      
      orderedCountries: function() {
					return _.orderBy(this.countries, "name", "asc");
				},
				orderedStates: function() {
					return _.orderBy(this.states, "name", "asc");
				},
    },

  validations: {
				form: {
					email: {
						required,
						email
					},
					firstname: { required },
					lastname: { required },
					dob: { required },
					gender: { required },
					phone: { required, numeric },
					country: { required },
					state: { required },
					address: { required },
				},
  },
  watch:{
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
      validateForm(){
				this.$v.$touch();
        if (this.$v.$invalid) {
          this.$snotify.error('Please fill the form correctly','Error');
        } else {
          this.loading = true
          this.$emit('register', this.form)
        }
			},
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
						})
						.catch(error => {});
        }, 300),
        getCountries() {
				axios.get("/api/getCountries").then(
						function(response) {
							this.countries = response.data;
						}.bind(this)
					);
				},

			getStates: function() {
				axios
					.get("/api/getStates", {
						params: {
							country_id: this.form.country.id
						}
					})
					.then(
						function(response) {
							this.states = response.data;
						}.bind(this)
					);
      },
      upload(e){
        if(e.target.files[0].type !== "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
          this.$snotify.error('Please upload a valid file','Error')
          return
        }
        this.filename = e.target.files[0].name
        let fileToUpload = e.target.files[0]
        let fd = new FormData
        fd.append('file', fileToUpload)
        axios.post('/import-patient', fd)
        .then(resp=>{
          if(resp.status == 200){
            this.$snotify.success(resp.data,'Success')
            fire.$emit('BulkPatient')
            this.filename = null
            this.hideModalRegister()
          }
        }).catch(err=>{
          this.$snotify.error('Ensure to upload the required format','Error')
          this.filename = null
        })
      },
      reset(){
        Object.assign(this.$data, this.$options.data.call(this));
			},
      showModalOtp(){
        this.$modal.show('modal-otp');
      },
      hideModalRegister () {
        this.$modal.hide('register-patient');
      }
    },
    created(){
      this.$on('close-otp', ()=>{
        this.hideModalOtp()
      }),
      fire.$on('user-created', ()=>{
        this.showModalOtp()
      })
      fire.$on('postPatient', ()=>{
        this.loading = false
        this.reset()
      })
    },
    mounted(){
      this.showModalOtp()
      this.getCountries()
    }

  }
</script>

<style lang="scss" scoped>
@import '~vue2-datepicker/scss/index.scss';

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