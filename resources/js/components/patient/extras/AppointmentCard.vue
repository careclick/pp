<template>
  <div>
    <div class="bg-white shadow rounded-lg relative overflow-hidden">
      <div class="flex justify-center px-4 py-6 items-center flex-col">
        <div class="inline-block m-0 relative">
          <img v-if="image" :src="`images/${image}`" class="w-20 mx-auto rounded-full shadow-lg" alt="">
          <icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/>
          <span v-if="status == true" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
          <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span>
        </div>
        <div class="text-center mt-4">
          <p class="text-lg font-bold text-gray-600">Dr. {{ name }}</p>
          <div class="py-1 font-semibold text-gray-600">
            3.5
          </div>
          <p class="text-sm text-gray-500">{{ username }}</p>
          <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-green-100 text-green-800">
            Standard
          </span>
        </div>
    </div>
    <div class="flex">
        <button class="flex-1 py-1 bg-green-500 text-white font-semibold w-full">
          Message 
        </button>
        <button @click.prevent="showAppointmentModal" class="flex-1 py-1 bg-blue-500 text-white font-semibold w-full">
          Select Time
        </button>
      </div>
    </div>
    <appointment-modal name="appointmentmodal"/>
  </div>
</template>

<script>
import AppointmentModal from '../extras/modals/AppointmentModal'
  export default {
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
      status:{
        type:String
      },
      start_date:{
        type:String
      },
      end_date:{
        type:String
      },
      slots:{
        type:Array
      }

    },
    components:{
      AppointmentModal
    },
    data(){
      return{
        open:false
      }
    },
    methods:{
      away(){
        this.open = false
      },
      showAppointmentModal(){
        this.$modal.show('appointmentmodal',
        {
         name: this.name,
         username:this.username,
         active: this.active,
         id:this.id,
         status:this.status,
         start_date:this.start_date,
         end_date:this.end_date,
         slots:this.slots
         })
      }
    },
    
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