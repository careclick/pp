<template>
  <div>
    <div class="flex flex-wrap items-center">
      <div>
        <div class="mt-1 ml-4 mb-6 sm:ml-0 relative flex rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4ZM2 8C2 4.68629 4.68629 2 8 2C11.3137 2 14 4.68629 14 8C14 9.29583 13.5892 10.4957 12.8907 11.4765L17.7071 16.2929C18.0976 16.6834 18.0976 17.3166 17.7071 17.7071C17.3166 18.0976 16.6834 18.0976 16.2929 17.7071L11.4765 12.8907C10.4957 13.5892 9.29583 14 8 14C4.68629 14 2 11.3137 2 8Z" fill="currentColor"/>
            </svg>
          </div>
          <select id="search" @change="getDoctor" v-model="form.doctor" class="flex-grow form-select block w-full pl-10 sm:text-sm sm:leading-5" placeholder="Select Doctor">
            <option value="">Select a doctor</option>
            <option v-for="doctor in doctors" :value="doctor.id" :key="doctor.id">Dr. {{ doctor.name }}</option>
          </select>
        </div>
      </div>
    </div>
    <div>
      <div  v-if="schedules !== null && !loading && form.doctor !== ''">
        <div class="flex justify-end">
          <span class="overflow-hidden mb-6 rounded-md px-4 sm:px-0">
            <button @click.prevent="openSchedule" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 7C11 6.44772 10.5523 6 10 6C9.44772 6 9 6.44772 9 7V9H7C6.44772 9 6 9.44771 6 10C6 10.5523 6.44772 11 7 11H9V13C9 13.5523 9.44772 14 10 14C10.5523 14 11 13.5523 11 13V11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H11V7Z" fill="#fff"/>
              </svg>
              Add Schedule
            </button>
          </span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          <div class="bg-white shadow-lg rounded-lg px-6 py-4" v-for="schedule in schedules" :key="schedule.id">
            <div>
              <p class="font-semibold text-gray-700">Dr. {{ schedule.user.name }}</p>
             </div> 
             <div class="mt-4">
               <p class="text-xs text-gray-700">Start Date / End Date</p>
               <p class="text-sm mt-1 text-gray-600 font-medium">{{ schedule.start_date | date }} – {{ schedule.end_date | date }}</p>
             </div> 
             <div class="mt-4">
               <p class="text-xs text-gray-700">Days</p>
               <ul class="flex flex-wrap items-center ">
                 <li class="mr-1" v-for="day in schedule.days" :key="day.id">
                   <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium leading-4 bg-indigo-100 text-indigo-800">
                     {{ day }}
                   </span>
                </li>
               </ul> 
             </div> 
             <div class="mt-4">
               <p class="text-xs text-gray-700">Time</p>
               <p class="text-sm mt-1 text-gray-600 font-medium">{{ schedule.start_time  }} - {{ schedule.end_time }}</p>
             </div>
             <div class="mt-4 flex items-center">
               <span @click.prevent="editSchedule(schedule.id)" class="inline-flex rounded-md shadow-sm mr-2">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                  <svg class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z" fill="#fff"/>
                    <path d="M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z" fill="#fff"/>
                  </svg>
                  Edit
                </button>
              </span>
              <span @click.prevent="deleteSchedule(schedule.id)" class="inline-flex rounded-md shadow-sm">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                  <svg class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#fff"/>
                  </svg>
                  Delete
                </button>
              </span>
             </div>     
          </div>
        </div>    
      </div>  
      <load v-if="loading" class="w-32 pt-16 pb-20 mx-auto"/>
      <nodata :title="'No doctor selected yet.'" :content="'Please select a doctor from the dropdown to add a schedule.'" v-if="!loading && this.schedule == null && form.doctor.length == 0"/>
      <nodata :title="'Doctor does not have any schedule yet.'" :content="'Please add a schedule  by using the Add Schedule button.'" v-if="!loading && this.schedules == '' && form.doctor.length > 0"/>
    </div>
    <add-schedule-modal name="addschedule" :doctor_id="form.doctor"/>  
    <edit-schedule-modal name="editschedule"/>  
  </div>  
</template>
<script>
import Nodata from '../../components/extras/NoData'
import AddScheduleModal from '../../components/extras/modals/AddScheduleModal'
import EditScheduleModal from '../../components/extras/modals/EditScheduleModal'

export default{
  components:{
    Nodata,
    AddScheduleModal,
    EditScheduleModal,
  },
  data(){
    return{
      doctors:[],
      schedules:null,
      schedule:null,
      loading:false,
      form:{
        doctor:''
      }
    }
  },
  computed:{
    mappedDays(){
      return schedules.days;
    }
  },
  methods:{
    openSchedule(){
      this.$modal.show('addschedule')
    },
      getDoctors(){
      axios.get('/getalldoctors')
      .then(resp=>{
        this.doctors = resp.data
      }).catch(err=>{
        console.log(err.response)
      })
    },
    getDoctor(){
      this.loading = true
      axios.get('/api/doctor-schedules',{params:{id:this.form.doctor}})
      .then(resp=>{
        this.schedules = resp.data
        this.loading = false
      }).catch(err=>{
        console.log(err.response)
        this.loading = false
      })
    },
    editSchedule(id){
      fire.$emit('editDoctorSchedule',id,this.form.doctor)
    },
    deleteSchedule(id){
         this.$snotify.warning('This schedule will be deleted', 'Warning', {
          timeout: 5000,
          showProgressBar: true,
          closeOnClick: false,
          pauseOnHover: true,
          buttons: [
            {text: 'Yes', action: (toast) => 
            
            {
              axios.post('/api/delete-schedule',{id:id})
              .then(resp=>{
                this.$snotify.success(resp.data, "Success");
                this.getDoctor()
              }).catch(error=>{
                console.log(error)
              })
              this.$snotify.remove(toast.id);
            }, bold: false},
            {text: 'No', action: (toast) => {console.log('Clicked: No'); this.$snotify.remove(toast.id); }},
          ]
        });
    },
  },
  created(){
    fire.$on('scheduleAdded', ()=>{
      this.getDoctor()
    })
    fire.$on('updatedSchedule', ()=>{
      this.getDoctor()
    })
  },
  mounted(){
    this.getDoctors()
  }

}

</script>
