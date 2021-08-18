<template>
  <div>
    <div>
      <form>
        <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6 pb-2 pt-10 max-w-2xl mx-auto">
          <div class="sm:col-span-6">
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center">
                <select v-model="form.option" class="form-select h-full h-12 py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm sm:leading-5">
                  <option value="all" selected>All</option>
                  <option value="doctor">Doctor</option>
                  <option value="patient">Patient</option>
                </select>
              </div>
              <input v-model="form.search" class="form-input block w-full pl-24 h-12 sm:text-sm sm:leading-5" placeholder="Enter keyword" />
            </div>
          </div>
        </div>   
      </form> 
      <div v-if="!loading" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-4 sm:px-0 mt-10" :class="result.length > 0 ? 'pb-20' : ''">
      <search-card v-for="patient in result"
      :name="patient.name"
      :username="patient.username"
      :active="patient.active"
      :image="patient.picture"
      :id="patient.id"
      :role="patient.role"
      :status="patient.status"
      :key="patient.id"/>
    </div>
    <search-change-password name="searchchangepassword"
      :patient_id="patient_id"
      :patient_name="patient_name"
      :role="role"
      />
      <search-bar v-if="result.length == '' && form.search.length == 0 && !loading" title="Search for doctors and patients" content="Use the search input."/> 
      <no-data :title="'No result found.'" :content="'Try another keyword' " v-if="!loading && result.length == 0 && form.search.length > 0"/>
      <load v-if="loading" class="w-32 pt-16 pb-20 mx-auto"/>
    </div>
  </div>
</template>
<script>
import SearchBar from '../extras/Search'
import SearchCard from '../extras/SearchCard'
import NoData from '../extras/NoData'
import SearchChangePassword from '../extras/modals/SearchChangePassword'

import _ from "lodash"

  export default{

    components:{
      SearchBar,
      NoData,
      SearchCard,
      SearchChangePassword
    },

    data(){
      return{
        form:{
          option:'all',
          search:''
        },
        result:[],
        loading:false,
        patient_id:'',
        patient_name:'',
        role:''
      }
    },
    watch:{
      "form.search": {
				handler() {
					if(this.form.search.length > 0){
            this.search()
          }
          this.result = []
				},
				deep: true
			},

    },
    methods:{
      search: _.debounce(function() {
			this.loading = true;
				axios.get("/api/search", { params: { option: this.form.option, search:this.form.search } })
					.then(response => {
						if (response.status == 200) {
              this.result = response.data
              this.loading = false;
						} 
					})
					.catch(error => {});
      }, 500),
      showPasswordModal(info){
        this.patient_id = info.id
        this.patient_name = info.name
        this.role = info.role
        this.$modal.show('searchchangepassword');
      },
    },
    created(){
      fire.$on('searchchangepassword', (info)=>{
        this.showPasswordModal(info)
      })
      fire.$on('patientDeleted', ()=>{
        this.search()
      })
    }

  }
</script>