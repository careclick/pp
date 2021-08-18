<template>
<div class="flex flex-wrap justify-between">
  <div class="md:w-2/6 lg:w-1/5 w-full mb-6 lg:mb-0 lg:block">
      <div class="bg-white rounded shadow">    
          <div class="py-6 px-4">
              <div class="flex justify-center">
                <div class="relative">
                  <span class="inline-block h-20 w-20 rounded-full overflow-hidden bg-gray-100">
                    <img v-if="user.picture" :src="`../images/${user.picture}`" class="shadow-lg rounded-full w-24 mx-auto" :alt="user.name">
                    <icon v-else name="user" class="w-20 mx-auto"/>
                  </span> 
                  <span v-if="user.status == true" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
                  <span v-if="user.status == false || user.status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span>
                </div>
              </div>
              <div class="text-center mt-4">
                  <p class="text-base text-gray-700 md:text-lg font-semibold">Dr. {{ user.name }}</p>
                  <p class="text-sm text-gray-500 mt-1">{{ user.email }}</p>
                  <p class="hover:underline text-xs mt-1 text-gray-500">@{{ user.username }}</p>
              </div>
              <div class="text-center mt-4 flex items-baseline md:items-center md:flex-col justify-center">
                  <div class="mt-2 ml-2 lg:ml-0">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                      <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z" fill="#fff"/>
                        <path d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z" fill="#fff"/>
                      </svg>
                      Message
                    </button>
                  </div>
              </div>
          </div>
          <div>
              <div class="text-center justify-center flex-col">
                  <div class="border-t border-b flex justify-center items-center">
                      <p class="px-3 py-1 flex-col">
                          <span class="font-bold text-sm">543</span> 
                          <span class="text-gray-500 text-xs">Consultations</span>
                      </p>
                      <p class="px-3 border-l py-1 flex-col">
                          <span class="font-bold text-sm">436</span> 
                          <span class="text-gray-500 text-xs">Records</span>
                      </p>
                  </div>
              </div>
          </div>   
      </div> 
      <div class="p-4 bg-white shadow mt-4 rounded" v-if="user.doctors">
          <div class="flex flex-col" v-if="user.country">
            <span class="text-xs font-medium">Country/State</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ user.country }}, {{ user.state }}
            </span>
          </div>
				  <div class="flex flex-col mt-2" v-if="user.dob">
            <span class="text-xs font-medium">Age</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ getAge }} yrs old
            </span>
          </div>
          <div class="flex flex-col mt-2" v-if="user.gender">
            <span class="text-xs font-medium">Gender</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ user.gender }}
            </span>
          </div>
          <div class="flex flex-col" v-if="user.phone">
            <span class="text-xs font-medium">Phone</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ user.phone }}
            </span>
          </div>
          <div class="flex flex-col mt-2" v-if="user.doctors && user.doctors.specialty">
            <span class="text-xs font-medium">Specialty</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ user.doctors.specialty }}
            </span>
          </div>
         <div class="flex flex-col mt-2" v-if="user.doctors && user.doctors.degree">
            <span class="text-xs font-medium">Degree</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ user.doctors.degree }}
            </span>
          </div>
          <div class="flex flex-col mt-2" v-if="user.doctors && user.doctors.medical_license">
            <span class="text-xs font-medium">Medical License</span>
            <span class="mt-1 object-contain py-1 flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              {{ user.doctors.medical_license }}
            </span>
          </div>
          <div class="flex flex-col mt-2">
            <span class="text-xs font-medium">Rating</span>
            <span class="mt-1 object-contain flex-none px-2 py-1 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
              <rating :avgrating="averagerating" class="-ml-3"/>
              <!-- <StarRating :user="user" :initial="initial" class="-ml-3"/> -->
            </span>
          </div>
      </div>
			<div class="p-4 bg-white shadow mt-4 break-words rounded" v-if="user.about">
				<div>
					<p class="font-bold">About Me</p>
				</div>
				<div class="flex">
          <span class="flex-1 mt-1 py-1 w-full object-contain flex-none px-2 text-xs text-xs leading-5 font-semibold rounded bg-indigo-100 text-indigo-800">
            {{ user.about }}
          </span>
        </div>
			</div>
  </div>
  <div class="w-full md:w-3/3 lg:w-2/2">
    <div class="bg-white shadow p-4 rounded">
      <tabs>
      <tab title="Consultations">
        <div class="rounded-md bg-blue-50 p-4">
          <div class="flex">
             <div class="flex-shrink-0">
               <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                 <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
               </svg>
             </div>
             <div class="ml-3 flex-1 md:flex md:justify-between">
               <p class="text-sm leading-5 text-blue-700">
                 Doctor does not have a consultation yet.
               </p>
             </div>
           </div>
        </div>
      </tab>
      <tab title="Doctor Records">
        record Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis saepe est amet. Consequatur eos iusto exercitationem aspernatur assumenda, aliquid sapiente quisquam cupiditate ea nobis veritatis alias, numquam odio impedit repellat.
      </tab>  
      <tab title="Schedules" class="py-5">
        <div class="rounded-md bg-blue-50 p-4" v-if="user.schedules.length == ''">
          <div class="flex">
             <div class="flex-shrink-0">
               <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                 <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
               </svg>
             </div>
             <div class="ml-3 flex-1 md:flex md:justify-between">
               <p class="text-sm leading-5 text-blue-700">
                 Doctor does not have a schedule yet.
               </p>
               <p class="mt-3 text-sm leading-5 md:mt-0 md:ml-6">
                 <a href="/schedules" class="whitespace-no-wrap font-medium text-blue-700 hover:text-blue-600 transition ease-in-out duration-150">
                   Add a schedule &rarr;
                 </a>
              </p>
             </div>
           </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          <div class="bg-white shadow-lg rounded-lg px-6 py-4 border border-gray-100" v-for="schedule in user.schedules" :key="schedule.id"> 
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
          </div>
        </div>  
      </tab>
      <tab title="Prescriptions" class="py-5">

      </tab>
    </tabs> 
    </div>
  </div>
</div>

</template>
<script>
import Rating from '../extras/Rating'
import StarRating from '../extras/StarRating'
  export default{

    props:['user','avgrating','initial','averagerating'],
    data(){
      return{
        products:this.user.ratings,
        myArray:[]
      }
    },
    components:{Rating,StarRating},
    methods:{
      getSchedules(){
        console.log("hello")
      },
    sum(input){
     if (toString.call(input) !== "[object Array]")
          return false;

      var total =  0;
      for(var i=0;i<input.length;i++)
        {                  
          if(isNaN(input[i])){
          continue;
           }
            total += Number(input[i]);
         }
       return total;
      }
    },
    computed:{
      getAge: function() {
        let currentDate = new Date();
        let birthDate = new Date(this.user.dob);
        let difference = currentDate - birthDate;
        let age = Math.floor(difference/31557600000);
        return age
      }
    },
    mounted(){
      let array = this.products.map(a =>  a.rating)  
    }

  }
</script>
<style>

</style>