<template>
  <div>
    <div class="flex flex-wrap items-center justify-between">
      <div>
        <div class="mt-1 ml-4 mb-6 sm:ml-0 relative flex rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4ZM2 8C2 4.68629 4.68629 2 8 2C11.3137 2 14 4.68629 14 8C14 9.29583 13.5892 10.4957 12.8907 11.4765L17.7071 16.2929C18.0976 16.6834 18.0976 17.3166 17.7071 17.7071C17.3166 18.0976 16.6834 18.0976 16.2929 17.7071L11.4765 12.8907C10.4957 13.5892 9.29583 14 8 14C4.68629 14 2 11.3137 2 8Z" fill="currentColor"/>
            </svg>
          </div>
          <input v-model="searchDoctor" id="search" class="flex-grow form-input block w-full pl-10 sm:text-sm sm:leading-5" placeholder="Search Doctor" />
        </div>
      </div>
      <span class="overflow-hidden mb-6 rounded-md px-4 sm:px-0">
        <a href="/exportpatient" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
          <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#fff"/>
          </svg>
          Export
        </a>
        <button @click="showDoctor" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
          <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 7C11 6.44772 10.5523 6 10 6C9.44772 6 9 6.44772 9 7V9H7C6.44772 9 6 9.44771 6 10C6 10.5523 6.44772 11 7 11H9V13C9 13.5523 9.44772 14 10 14C10.5523 14 11 13.5523 11 13V11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H11V7Z" fill="#fff"/>
          </svg>
          Add Doctor
        </button>
      </span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-4 sm:px-0">
      <doctor-card v-for="doctor in filteredDoctors"
      :name="doctor.name"
      :username="doctor.username"
      :active="doctor.active"
      :image="doctor.picture"
      :status="doctor.status"
      :id="doctor.id"
      :rating="doctor.ratings"
      :key="doctor.id"/>
    </div>
    <nodata :title="'No Doctor Yet.'" :content="'You can add a doctor using the top right button.'" v-if="loading == false && items.length == ''"/>
    <Load v-if="loading" class="w-32 pt-16 pb-20 mx-auto"/>
    <nodata :title="'No result found.'" :content="'Try another search query with a doctor name' " v-if="loading == false && filteredDoctors.length == ''"/>
    <paginator :dataSet="dataSet" @changedUrl="getDoctors"/>
    <doctor-modal name="register-doctor" @registerdoctor="postDoctor"/>
    <change-doctor-password name="changedoctorpassword"
      :doctor_id="doctor_id"
      :doctor_name="doctor_name"
    />
  </div>
</template>

<script>
import DoctorCard from '../../components/extras/DoctorCard'
import axios from 'axios'
import Load from '../../components/extras/Load'
import Nodata from '../../components/extras/NoData'
import DoctorModal from '../extras/modals/DoctorModal'
import ChangeDoctorPassword from '../extras/modals/ChangeDoctorPassword'

  export default {
    components:{
      DoctorCard,
      Load,
      Nodata,
      DoctorModal,
      ChangeDoctorPassword
    },
    data(){
      return{
        open:false,
        items:[],
        dataSet:false,
        loading:true,
        searchDoctor:'',
        doctor_id:'',
        doctor_name:''
      }
    },
    computed:{
      filteredDoctors() {
        const search = this.searchDoctor.toLowerCase().trim();
        if (!search) return this.items;
        return this.items.filter(c => c.name.toLowerCase().indexOf(search) > -1);
     },
    },
    methods:{
      postDoctor(data){
        axios.post('/add-doctor', data)
        .then(resp=>{
          if(resp.status == 200){
            this.$snotify.success(resp.data, 'Success')
            fire.$emit('postDoctor')
            this.hideDoctor()
          }
        })
      },
      getDoctors(page){
        axios.get(this.url(page))
        .then(resp=>{
          this.refresh(resp)
        })
      },
      url(page){
        if(!page){
          let query = location.search.match(/page=(\d+)/)
          page = query ? query[1] : 1
        }
        return `/all-doctors?page=${page}`
      },
      refresh({data}){
        this.loading = false
        this.dataSet = data
        this.items = data.data
      },
      showPasswordModal(info){
        this.doctor_id = info.id
        this.doctor_name = info.name
        this.$modal.show('changedoctorpassword');
      },
      showDoctor(){
        this.$modal.show('register-doctor')
      },
      hideDoctor(){
        this.$modal.hide('register-doctor')
      }
    },
    created(){
      fire.$on('postDoctor', ()=>{
        this.getDoctors()
      })
      fire.$on('changedoctorpassword', (info)=>{
        this.showPasswordModal(info)
      })
      fire.$on('doctorDeleted', (info)=>{
        this.getDoctors()
      })
    },
    mounted(){
      this.getDoctors()
    }
  }
</script>

<style lang="scss" scoped>

</style>