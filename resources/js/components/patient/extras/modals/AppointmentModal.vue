<template>
  <div>
    <modal @before-open="passMesage" name="appointmentmodal" :scrollable="true" class="overflow-y-auto relative" :adaptive="true" height="561" :width="1050" :clickToClose="false">
      <form>
        <div class="border-b flex items-center justify-between px-4">
          <p class="py-4 text-lg text-gray-600">Book an appointment with Dr Oke Michael</p>
          <div>
            <button class="bg-red-500 rounded-full p-1" @click.prevent="closeModal">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 18L18 6M6 6L18 18" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>
        <div class="px-4 py-2 bg-gray-100">
          <div class="flex items-center">
            <div>
              <img src="https://via.placeholder.com/150" class="w-16 rounded-full" alt="">
            </div>
            <div class="ml-2">
              <p class="text-sm text-gray-600 font-medium">Oke Michael</p>
              <p class="text-xs text-gray-500">Family Pratise</p>
              <rating :avgrating="3" class="-ml-3"/>
            </div>
            <div class="ml-auto">
              Details of appointment
            </div>
          </div>
        </div>
        <!-- Step 1 -->
        <transition name="slide-fade">
          <div v-show="step === 1">
            <div class="flex flex-wrap px-4 py-6">
              <div class="w-full md:w-1/3">
                <div class="text-gray-700 font-semibold mb-4">1. Choose a date</div>
                <calendar title-position="left" is-expanded/>
              </div>
              <div class="w-full md:w-1/3 px-5">
                <div class="text-gray-700 font-semibold mb-4">2. Choose time</div>
                <div class="bg-gray-100 rounded px-3 py-1 ">
                  <p class="text-gray-700 font-medium text-sm">May 20, 2020</p>
                </div>
                <div class="mt-3 overflow-y-auto h-56">
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                  <button class="mb-2 border text-sm border-indigo-500 text-gray-700 rounded px-1">1:30</button>
                </div>
              </div>
              <div class="w-full md:w-1/3">
                <div class="sm:col-span-6">
                  <div class="text-gray-700 font-semibold mb-4">3. Choose a reason for visit</div>
                  <label for="street_address" class="block text-sm font-medium leading-5 text-gray-700">
                    Reason for visit
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <select id="street_address" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" >
                      <option>Hello</option>
                    </select> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>  

        <!-- Step 2 -->
        <transition name="slide-fade">
          <div v-show="step === 2">
          <div class="flex content-end flex-wrap">
              fjknfkjb
          </div>
          </div> 
        </transition>   
        <div class="bg-gray-100 py-3 px-4 flex justify-end absolute bottom-0" v-if="step === 1" style="width:100%">
          <span class="inline-flex rounded-md shadow-sm">
            <button @click.prevent="next" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              Next &rarr;
            </button>
          </span>
        </div>
        <div class="bg-gray-100 py-3 px-4 flex absolute bottom-0 justify-between" v-if="step === 2" style="width:100%">
          <span class="inline-flex rounded-md shadow-sm">
            <button @click.prevent="prev" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
               &larr; Previous
            </button>
          </span>
          <span class="inline-flex rounded-md shadow-sm">
            <button @click.prevent="next" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              Next &rarr;
            </button>
          </span>
        </div>
      </form>  
    </modal>  
  </div>
</template>

<script>
import Rating from '../../../extras/Rating'
  export default {
    data(){
      return{
        step:1,
      }
    },
    components:{Rating},
    methods:{
      passMesage(event){
        console.log(event.params)
      },
      prev() {
        this.step--;
      },
      next() {
        this.step++;
      },
      closeModal(){
        this.$modal.hide('appointmentmodal')
      }
    }

  }
</script>

<style lang="scss" scoped>
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .10s ease;
}
.slide-fade-leave-active {
  transition: all .10s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
.v--modal-overlay .v--modal-background-click{
  overflow: hidden!important;
  height: 561px!important;
}
</style>