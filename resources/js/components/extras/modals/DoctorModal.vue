<template>
  <div> 
    <modal name="register-doctor" :clickToClose="false" :scrollable="true" :adaptive="true" height="auto" :width="700">
      <div class="">
        <div class="bg-white border-b border-gray-200 py-4 text-center">
          <p class="font-bold text-gray-600">ADD DOCTOR</p>
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
                <select v-model="$v.form.country.$model" @change="getStates()"  class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
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
              
            <div class="col-span-6">
              <p class="font-semibold text-gray-600">Doctor Credentials</p>
              <p class="border-b border-gray-300 text-sm text-gray-500 pb-2">Fill the fields below</p>
            </div>  

            <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Residency</label>
                <input v-model="$v.form.residency.$model" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.residency.required && $v.form.residency.$error"
								>The residency field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Fellowship</label>
                <input v-model="$v.form.fellowship.$model" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.fellowship.required && $v.form.fellowship.$error"
								>The fellowship field is required</p>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Degree</label>
                <input v-model="$v.form.degree.$model" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.degree.required && $v.form.degree.$error"
								>The degree field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Specialty</label>
                <select v-model="$v.form.specialty.$model" class="mt-1 form-select  block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  <option value="">Select a Speciality</option>
                  <option>Addiction Medicine</option>
                  <option>Adolescent medicine</option>
                  <option>Allergy and immunology</option>
                  <option>Anesthesiology</option>
                  <option>Anesthesiology - Pain management</option>
                  <option>Anesthesiology - Pediatric</option>
                  <option>Cardiology</option>
                  <option>Invasive Cardiology</option>
                  <option>Non-Invasive Cardiology</option>
                  <option>Interventional Cardiology</option>
                  <option>Non-interventional Cardiology</option>
                  <option>Electrophysiology Cardiology</option>
                  <option>Critical Care</option>
                  <option>Dermatology</option>
                  <option>Emergency Medicine</option>
                  <option>Endocrinology</option>
                  <option>Pediatric Endocrinology</option>
                  <option>Reproductive Endocrinology</option>
                  <option>Family Practice</option>
                  <option>Family Practice w/Obstetrics</option>
                  <option>Gastroenterology</option>
                  <option>Gastroenterology/Hepatology</option>
                  <option>Pediatric Gastroenterology</option>
                  <option>Geriatrics</option>
                  <option>Hematology</option>
                  <option>Hospice & palliative care</option>
                  <option>Hospitalist</option>
                  <option>Hyperbaric medicine</option>
                  <option>Infectious disease</option>
                  <option>Internal medicine</option>
                  <option>Medical genetics</option>
                  <option>Neonatology</option>
                  <option>Nephrology</option>
                  <option>Neurosurgery</option>
                  <option>Occupational medicine</option>
                  <option>Oncology</option>
                  <option>Gynecological Oncology</option>
                  <option>Ophthalmology</option>
                  <option>Orthopedics</option>
                  <option>Pediatric Orthopedics</option>
                  <option>Otolaryngology</option>
                  <option>Pathology</option>
                  <option>Pediatrics</option>
                  <option>Physical Medicine & Rehabilitation</option>
                  <option>Podiatry</option>
                  <option>Psychiatry - Mental Health</option>
                  <option>Psychiatry - Addiction Medicine</option>
                  <option>Psychiatry - Child and adolescent</option>
                  <option>Psychologist</option>
                  <option>Pulmonology</option>
                  <option>Cardiothoracic Surgery</option>
                  <option>Plastic Surgery</option>
                  <option>Urology</option>
                  <option>Hepatology</option>
                </select>
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.specialty.required && $v.form.specialty.$error"
								>The specialty field is required</p>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-5 text-gray-700">License Country</label>
                <select v-model="$v.form.license_country.$model" @change="getLicenseStates()"  class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                 <option value="" selected>Select a country</option>
								<option v-for="country in orderedCountries" :key="country.id" :value="{ id: country.id, name: country.name }">{{ country.name }}</option>
                </select>
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.license_country.required && $v.form.license_country.$error"
								>The license country field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="state" class="block text-sm font-medium leading-5 text-gray-700">License State</label>
                <select v-model="$v.form.license_state.$model" class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  <option value="" selected>Select a state</option>
										<option 
										v-for="state in orderedLicenseStates"
                    :value="{ id: state.id, name: state.name }"
                    :key="state.id">
										{{ state.name }}
										</option>
									</select>	
									<p class="text-red-500 text-xs  mt-1"
										v-if="!$v.form.license_state.required && $v.form.license_state.$error"
									>The license state field is required</p>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">License</label>
                <input v-model="$v.form.license.$model" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.license.required && $v.form.license.$error"
								>The license field is required</p>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Expiration Date</label>
                <input v-model="$v.form.expiration.$model" placeholder="YYYY/MM/DD" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.expiration.required && $v.form.expiration.$error"
								>The Expiration date field is required</p>
              </div>
            </div>


            <div class="flex items-center justify-end mt-8 mb-8">
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
          address:"",
          residency:"",
          fellowship:"",
          license_country:"",
          license_state:"",
          license:"",
          expiration:"",
          specialty:"",
          degree:"",
        },
        loading:false,
        countries: [],
        states: [],
        checkEmail:null,
        checkingEmail:false,
        filename:null,
        license_states:[]
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
        orderedLicenseStates: function() {
					return _.orderBy(this.license_states, "name", "asc");
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
					residency: { required },
					fellowship: { required },
					license_country: { required },
					license_state: { required },
					license: { required },
					expiration: { required },
					degree: { required },
					specialty: { required },
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
          this.$emit('registerdoctor', this.form)
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
      getLicenseStates: function() {

				axios
					.get("/api/getStates", {
						params: {
							country_id: this.form.license_country.id
						}
					})
					.then(
						function(response) {
							this.license_states = response.data;
						}.bind(this)
					);
      },
      reset(){
        Object.assign(this.$data, this.$options.data.call(this));
			},
      showModalOtp(){
        this.$modal.show('modal-otp');
      },
      hideModalRegister () {
        this.$modal.hide('register-doctor');
      }
    },
    created(){
      this.$on('postDoctor', ()=>{
        this.loading = false
        this.reset()
      }),
      this.$on('close-otp', ()=>{
        this.hideModalOtp()
      }),
      fire.$on('user-created', ()=>{
        this.showModalOtp()
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