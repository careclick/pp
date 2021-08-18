<template>
  <div>
    <div class="bg-white rounded-lg relative  overflow-hidden">
      <div class="flex justify-center px-4 py-6 items-center flex-col">
        <div class="inline-block m-0 relative">
          <img v-if="image" :src="`images/${image}`" class="w-20 mx-auto rounded-full shadow-lg" alt="">
          <icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/>
          <span v-if="status == true" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
          <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span>
        </div>
        <div class="text-center mt-4">
          <p class="text-lg font-bold text-gray-600">Dr. {{ name }}</p>
          <star-rating/>
          <p class="text-sm text-gray-500">{{ username }}</p>
          <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-green-100 text-green-800">
            Standard
          </span>
        </div>
    </div>
    <div class="flex">
        <button class="flex-1 py-1 bg-green-500 text-white font-semibold w-full">
          Book
        </button>
        <button class="flex-1 py-1 bg-blue-500 text-white font-semibold w-full">
          Message
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import StarRating from '../../extras/StarRating'
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
      }
    },
    components:{StarRating},
    data(){
      return{
        open:false
      }
    },
    methods:{
      away(){
        this.open = false
      },
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