<template>
  <div>
    <div class="bg-white rounded-lg px-4 py-6 relative">
      <div>
        <div class="more absolute right-0 top-0 pt-3 pr-3" v-on-clickaway="away">
          <button @click="open = !open" class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
            </svg>
          </button>
        </div>
        <transition  name="slide-fade">
          <div v-show="open" class="z-50 origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg">
            <div class="rounded-md bg-white shadow-xs">
              <div class="py-1">
                <a v-if="role == 'patient'" :href="`/patients/${id}`" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Account Details</a>
                <a v-if="role == 'doctor'" :href="`/doctors/${id}`" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Account Details</a>
                <a @click.prevent="changePassword" class="cursor-pointer block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Change Password</a>
                <button @click.prevent="deletePatient" type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-red-700 hover:bg-red-100 hover:text-red-900 focus:outline-none focus:bg-red-100 focus:text-red-900">
                 Delete User
                </button>
              </div>
            </div>
          </div>
        </transition>
      </div>
      <div class="flex justify-center items-center flex-col">
        <div class="inline-block m-0 relative">
          <img v-if="image" :src="`images/${image}`" class="w-20 mx-auto rounded-full shadow-lg" alt="">
          <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/>
          <span v-if="status == true" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
          <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span>
        </div>
        <div class="text-center mt-4">
          <p v-if="role == 'patient'" class="text-lg font-bold text-gray-600">{{ name }}</p>
          <p v-if="role == 'doctor'" class="text-lg font-bold text-gray-600">Dr {{ name }}</p>
          <p class="text-sm text-gray-500">{{ username }}</p>
          <span v-if="role == 'doctor'" class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-green-100 text-green-800">
            Standard
          </span>
          <div v-if="role == 'patient'">
            <span v-if="active == true" class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-green-100 text-green-800">
              Active
            </span>
            <span v-else class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-red-100 text-red-800">
              Inactive
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Icon from './Icon'
import { mixin as clickaway } from 'vue-clickaway';
import SearchChangePassword from '../extras/modals/SearchChangePassword'
  export default {
     mixins: [ clickaway ],
    props:{
      name:{
        type:String 
      },
      image:{
        type:String
      },
      username:{
        type:String
      },
      active:{
        type:String
      },
      id:{
        type:String
      },
      role:{
        type:String
      },
      status:{
        type:String
      }
    },
    components:{Icon,SearchChangePassword},
    data(){
      return{
        open:false,
        imgError : true
      }
    },
    computed:{
      checkImage(){
        console.log('file doesn\'t exist')
      }
    },
    methods:{
      away(){
        this.open = false
      },
      changePassword(){
        fire.$emit('searchchangepassword', {id:this.id,name:this.name, role:this.role })
      },
      deletePatient(){
         this.$snotify.warning('This user will be deleted', 'Warning', {
          timeout: 5000,
          showProgressBar: true,
          closeOnClick: false,
          pauseOnHover: true,
          buttons: [
            {text: 'Yes', action: (toast) => 
            
            {
              axios.post('/deletepatient',{id:this.id})
              .then(resp=>{
                fire.$emit('patientDeleted')
                this.$snotify.success(resp.data, "Success");
              }).catch(error=>{
                console.log(error)
              })
              this.$snotify.remove(toast.id);
            }, bold: false},
            {text: 'No', action: (toast) => {console.log('Clicked: No'); this.$snotify.remove(toast.id); }},
          ]
        });
      }
    }
  }
</script>

<style lang="scss" scoped>
  .slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .2s ease;
}
.slide-fade-enter { 
  transform: translateY(-50px);
  opacity: 0;
}
.slide-fade-leave-to {
 transform: translateY(-50px);
  opacity: 0; 
}
</style>