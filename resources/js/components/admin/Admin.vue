<template>
   <div>
     <div>
       <div class="px-4 sm:px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
         <div>
           <div class="bg-white shadow px-4 py-2 border-l-4 rounded h-24 border-indigo-500">
             <div class="flex justify-between mt-2">
               <div>
                <p class="text-sm text-gray-500">Total Subscribers</p>
                <p class="text-gray-800 text-xl font-bold mt-1">{{ subscribers }}</p>
               </div>
               <div>
                <svg class="w-16 text-gray-200 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 4.35418C12.7329 3.52375 13.8053 3 15 3C17.2091 3 19 4.79086 19 7C19 9.20914 17.2091 11 15 11C13.8053 11 12.7329 10.4762 12 9.64582M15 21H3V20C3 16.6863 5.68629 14 9 14C12.3137 14 15 16.6863 15 20V21ZM15 21H21V20C21 16.6863 18.3137 14 15 14C13.9071 14 12.8825 14.2922 12 14.8027M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
             </div>
           </div>
         </div>
         <div>
           <div class="bg-white shadow px-4 py-2 border-l-4 rounded h-24 border-indigo-500">
             <div class="flex justify-between mt-2">
               <div>
                <p class="text-sm text-gray-500">Total Consultations</p>
                <p class="text-gray-800 text-xl font-bold mt-1">{{ consultations }}</p>
               </div>
               <div>
                <svg class="w-16 text-gray-200 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 7H21M21 7V15M21 7L13 15L9 11L3 17" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
             </div>
           </div>
         </div>
         <div>
           <div class="bg-white shadow px-4 py-2 border-l-4 rounded h-24 border-indigo-500">
             <div class="flex justify-between mt-2">
               <div>
                <p class="text-sm text-gray-500">Total Earnings</p>
                <p class="text-gray-800 text-xl font-bold mt-1">&#x20A6;{{ transactions.toLocaleString() }}</p>
               </div>
               <div>
                <svg class="w-16 text-gray-200 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17 9V7C17 5.89543 16.1046 5 15 5H5C3.89543 5 3 5.89543 3 7V13C3 14.1046 3.89543 15 5 15H7M9 19H19C20.1046 19 21 18.1046 21 17V11C21 9.89543 20.1046 9 19 9H9C7.89543 9 7 9.89543 7 11V17C7 18.1046 7.89543 19 9 19ZM16 14C16 15.1046 15.1046 16 14 16C12.8954 16 12 15.1046 12 14C12 12.8954 12.8954 12 14 12C15.1046 12 16 12.8954 16 14Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
             </div>
           </div>
         </div>
         <div>
           <div class="bg-white shadow px-4 py-2 border-l-4 rounded h-24 border-indigo-500">
             <div class="flex justify-between mt-2">
               <div>
                <p class="text-sm text-gray-500">Upcoming Appointments</p>
                <p class="text-gray-800 text-xl font-bold mt-1">N7,000</p>
               </div>
               <div>
                <svg class="w-16 text-gray-200 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 7V3M16 7V3M7 11H17M5 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V19C3 20.1046 3.89543 21 5 21Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
             </div>
           </div>
         </div>
         
        </div>
      </div>
    <div class="flex flex-wrap justify-between mt-6 px-4 sm:px-0 ">
      <div class="w-full shadow hover:shadow-lg overflow-hidden">
        <div class="flex flex-col">
          <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block bg-white min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
              <div class="px-6 py-4 text-lg bg-gray-50 mb-4">
                <p class="font-semibold text-gray-600 text-center capitalize">Annual Revenue</p>
              </div>
              <div class="px-6 mb-5">
                <graph :labels="['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec']" :values="[12, 200, 13, 5, 2, 3,24,12,32,11,21,8]"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="w-1/3 shadow bg-white rounded overflow-hidden">
        <div class="px-6 py-4 text-lg bg-gray-50 mb-4">
          <p class="font-semibold text-gray-600 text-center capitalize">Gender Analysis</p>
        </div>
        <div class="p-2">
          <gender/>
        </div>
      </div>   -->
    </div> 
    <div class="mt-10">
      
    </div>
   </div>       
</template>

<script>
  import PatientModal from '../extras/modals/PatientModal'
  import graph from '../extras/Graph'
  import gender from '../extras/Gender'
    export default {

      props:['subscribers','transactions','consultations'],
      components:{
        PatientModal,
        graph,
        gender
      },

    }
</script>
