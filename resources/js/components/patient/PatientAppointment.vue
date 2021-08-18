<template>
  <div>
    <div class=" px-4 md:px-0">
      <div class="bg-indigo-500 text-white px-4 py-2 shadow rounded-t text-xl font-semibold">
        <p>Book an appointment</p>
      </div>
      <form action="" class="px-4 py-6 bg-white rounded-b shadow">
        <div>
          <div class="grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-5">
            <div :class="anytime ? 'sm:col-span-1' : 'sm:col-span-2'">
              <label class="block text-sm font-medium leading-5 text-gray-700">
                When
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <select @change="chooseWhen" v-model="form.when" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                  <option value="anytime">Any Time</option>
                  <option value="choose-time">Choose Time</option>
                </select>
              </div>
            </div>

            <div class="sm:col-span-1" v-if="anytime">
              <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                Start Date
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <date-picker :disabled-date="disableDate" lang="en" type="date" format="DD-MM-YYYY" placeholder="End Date" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="form.start_date" 
									></date-picker>
              </div>
            </div>
            
            <div class="sm:col-span-1" v-if="anytime">
              <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                Start Time
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <date-picker lang="en" type="time" format="HH:mm" :minute-step="5" placeholder="End Time" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="form.start_time" 
									></date-picker>
              </div>
            </div>
            <div class="sm:col-span-1" v-if="anytime">
              <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                End Date
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <date-picker :disabled-date="disableDate" lang="en" type="date" format="DD-MM-YYYY" placeholder="End Date" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="form.end_date" 
									></date-picker>
              </div>
            </div>
            <div class="sm:col-span-1" v-if="anytime">
              <label class="block text-sm font-medium leading-5 text-gray-700">
                End Time
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <date-picker lang="en" type="time" format="HH:mm" :minute-step="5" placeholder="End Time" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="form.end_time" 
									></date-picker>
              </div>
            </div>
          </div>
        </div>
        <span class="inline-flex items-center rounded-md shadow-sm mt-6">
          <button :disabled="disableButton || loading" @click.prevent="getAppointments" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
            <svg class="h-4 w-4" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
            <span class="ml-1 ">Search</span>
          </button>
        </span>
      </form>
    </div>
    <div class="mt-10 mb-32">
      <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-3/4 px-4 md:px-0">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <appointment-card v-for="schedule in schedules"
          :name="schedule.user.name"
          :username="schedule.user.username"
          :active="schedule.user.active"
          :image="schedule.user.picture"
          :status="schedule.user.status"
          :id="schedule.user.id"
          :start_date="schedule.start_date"
          :end_date="schedule.end_date"
          :slots="schedule.slot"
          :key="schedule.user.id"/>
        </div>
        <div class="rounded-md bg-indigo-500 p-4" v-if="schedules.length == 0 && !loading">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
              </svg>
            </div>
            <div class="ml-3 flex-1 md:flex md:justify-between">
              <p class="text-sm leading-5 text-white">
                You can search based on your time or choose anytime.
              </p>
            </div>
          </div>
        </div>
        <load v-if="loading && schedules.length == 0" class="w-32 mx-auto mt-20"/>
        </div>
        <div class="w-full md:w-4/3 mt-10 md:mt-0 px-4 md:px-0">
          <calendar :attributes="attributes" title-position="left" is-expanded/>
        </div>
      </div>
    </div>  
    <appointment-modal name="appointmentmodal"/>
  </div>
</template>

<script>
 import AppointmentCard from './extras/AppointmentCard'
import AppointmentModal from './extras/modals/AppointmentModal'

  export default {

    data(){
      return{
        form:{
          start_date:null,
          start_time:null,
          end_date:null,
          end_time:null,
          when:'anytime'
        },
        loading:false,
        anytime: false,
        schedules:[],
        
        attributes: [
          {
            key: 'today',
            highlight: true,
            dates: new Date()
          }
        ]
      }
    },
    components:{AppointmentCard,AppointmentModal},
    computed:{
      disableButton(){
        return this.anytime ? this.anytime == true && this.form.start_date == null || this.form.start_time == null || this.form.end_date == null || this.form.end_time == null : false
      }
    },
    methods:{
      getAppointments(){
        this.loading = true
        axios.get('/api/all-schedules', {
          params:{
            start_date:this.form.start_date,
            end_date:this.form.end_date,
            start_time:this.form.start_time,
            end_time: this.form.end_time,
            when: this.form.when
        }}).then(({data})=>{
          this.schedules = data
          this.loading = false
        })
      },
      chooseWhen(){
        this.anytime = !this.anytime
      },
      disableDate(date) {  
        return date < new Date();  
      },
      check(){
        alert('Checking')
      }
    },
    mounted(){
      // this.$modal.show('appointmentmodal')
    }

  }
</script>

<style lang="scss" scoped>

</style>