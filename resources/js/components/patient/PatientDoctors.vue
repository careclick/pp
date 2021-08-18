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
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-4 sm:px-0">
      <patient-doctor-card v-for="doctor in filteredDoctors"
      :name="doctor.name"
      :username="doctor.username"
      :active="doctor.active"
      :image="doctor.picture"
      :status="doctor.status"
      :id="doctor.id"
      :key="doctor.id"/>
    </div>
    <nodata :title="'No Doctor Yet.'" :content="'You can add a doctor using the top right button.'" v-if="loading == false && items.length == ''"/>
    <load v-if="loading" class="w-32 pt-16 pb-20 mx-auto"/>
    <nodata :title="'No result found.'" :content="'Try another search query with a doctor name' " v-if="loading == false && filteredDoctors.length == ''"/>
    <paginator :dataSet="dataSet" @changedUrl="getDoctors"/>
  </div>
</template>

<script>
import PatientDoctorCard from './extras/PatientDoctorCard'
import axios from 'axios'
import Nodata from '../../components/extras/NoData'

  export default {
    components:{
      PatientDoctorCard,
      Nodata,

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
        return `/api/all-doctors?page=${page}`
      },
      refresh({data}){
        this.loading = false
        this.dataSet = data
        this.items = data.data
      },
    },
    created(){

    },
    mounted(){
      this.getDoctors()
    }
  }
</script>

<style lang="scss" scoped>

</style>