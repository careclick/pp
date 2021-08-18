<template>
   <div>
     <div>
       <div class="px-4 sm:px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
         <div>
           <div class="bg-white shadow px-4 py-2 border-l-4 rounded h-24 border-indigo-500">
             <div class="flex justify-between mt-2">
               <div>
                <p class="text-sm text-gray-500">Consultations</p>
                <p class="text-gray-800 text-xl font-bold mt-1">dkd</p>
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
                <p class="text-sm text-gray-500">Appointments</p>
                <p class="text-gray-800 text-xl font-bold mt-1">kkvfk</p>
               </div>
               <div>
                <svg class="w-16 text-gray-200 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 7V3M16 7V3M7 11H17M5 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V19C3 20.1046 3.89543 21 5 21Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
             </div>
           </div>
         </div>
         <div>
           <div class="bg-white shadow px-4 py-2 border-l-4 rounded h-24 border-indigo-500">
             <div class="flex justify-between mt-2">
               <div>
                <p class="text-sm text-gray-500">Transactions</p>
                <p class="text-gray-800 text-xl font-bold mt-1">{{ user.transactions ? user.transactions.length : 0 }}</p>
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
                <p class="text-sm text-gray-500">Medical Records</p>
                <p class="text-gray-800 text-xl font-bold mt-1">jkdkjd</p>
               </div>
               <div>
                <svg class="w-16 text-gray-200 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V9C21 7.89543 20.1046 7 19 7H13L11 5H5C3.89543 5 3 5.89543 3 7Z" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
             </div>
           </div>
         </div>
      
        </div>
      </div>
    <div class="mt-10">
      <div class="flex flex-wrap justify-between">
        <div class="px-4 sm:px-0 w-full md:w-3/4 overflow-hidden">
        <swiper ref="mySwiper" :options="swiperOptions">
          <swiper-slide  v-for="(update,index) in news" :key="index">
            <div class="bg-center flex overflow-hidden items-end h-80 rounded shadow" :style="{ backgroundImage: `url(${update.urlToImage ? update.urlToImage : 'https://www.srpriscanwokorie.com/wp-content/uploads/2020/03/Do-not-misuse-your-health.jpg'})` }" style="no-repeat; background-size: cover;">
                <div class="bg-indigo-500 w-full h-30 px-4 py-2 text-white">
                  <p class="text-base md:text-xl font-semibold">{{ update.title }}</p>
                  <p class="text-sm">{{ update.description }}</p>
                  <div class="mt-1 flex items-center">
                    <p class="text-sm opacity-75 mr-1">Published at - {{ update.publishedAt | date }} </p> |
                    <a :href="update.url" target="_blank" class="ml-1 text-gray-200 text-sm"> Read More &rarr;</a>
                  </div>
                </div>
              </div>
          </swiper-slide>
        </swiper>
        </div>
        <div class="w-full md:w-4/3">
          <span class="inline-flex rounded-md shadow-sm w-full">
            <button type="button" class="inline-flex w-full flex justify-center items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              Book an Appointment
            </button>
          </span>
          <span class="inline-flex rounded-md shadow-sm w-full mt-4">
            <button type="button" class="inline-flex w-full items-center flex justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              See a Doctor
            </button>
          </span>
          <div class="w-full shadow rounded text-center font-bold text-white text-xl py-3 bg-indigo-500 mt-4">
            <p class="time">{{ time }}</p>
          </div>  
          <div class="mt-4">
            <calendar title-position="left" :attributes="attr"  is-expanded/>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-10">
      <div class="px-4 sm:px-0 mb-5 border-b">
        <p class="text-lg font-semibold text-gray-600 pb-1">TOP RATED</p>
      </div>
      <div class="px-4 sm:px-0 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-semibold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-lg px-4 py-6 relative">
          <div class="flex justify-center items-center flex-col">
            <div class="inline-block m-0 relative">
              <img src="https://via.placeholder.com/200" class="w-20 mx-auto rounded-full shadow-lg" alt="">
              <!-- <Icon name="user" v-else class="h-20 w-20 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/> -->
              <span class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-green-400"></span>
              <!-- <span v-if="status == false || status == null" class="absolute top-0 right-0 block h-5 w-5 rounded-full text-white shadow-solid bg-gray-300"></span> -->
            </div>
            <div class="text-center mt-4">
              <p class="text-base font-bold text-gray-600">Dr. Oke Michael</p>
              <p class="text-xs text-gray-500">Family Practice</p>
              <star-rating class="py-1"/>
              <button class="inline-flex items-center px-3 py-0.5 rounded-full text-xs mt-2 font-medium leading-5 bg-indigo-500 hover:bg-indigo-700 shadow text-white">
                Book now
              </button>
            </div>
          </div>
        </div>
    </div>
    
   </div>  
   <div class="mt-10">
      <div class="mb-5 border-b px-4 sm:px-0">
        <p class="text-lg font-semibold text-gray-600 pb-1">UPCOMING APPOINTMENTS</p>
      </div>
      <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
          <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
              <!-- <thead>
                <tr>
                  <th class="px-6 py-3 border-b border-gray-200 bg-white text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-white text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Title
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-white text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-white text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Role
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200 bg-white"></th>
                </tr>
              </thead> -->
              <tbody class="bg-white">
                <no-data title="No upcoming appointment." content="You can book an appointment with the doctor."/>
                <!-- <tr>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane</div>
                        <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900">Director</div>
                    <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                    Owner
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1532910404247-7ee9488d7292?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane</div>
                        <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900">Director</div>
                    <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                    Owner
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1505503693641-1926193e8d57?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane</div>
                        <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900">Director</div>
                    <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Inactive
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                    Owner
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">Bernard Lane</div>
                        <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900">Director</div>
                    <div class="text-sm leading-5 text-gray-500">Human Resources</div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Inactive
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                    Owner
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  </td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>     
    </div>     
   </div>       
</template>

<script>
 import StarRating from '../extras/StarRating'
 import NoData from '../extras/NoData'
  export default {
    components: { StarRating, NoData },
    
    data(){
      return{
        time: '',
        user:[],
        news:{ data: [] },
        swiperOptions: {
            autoplay: {
              delay: 10000,
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            thumbs: {
              swiper: {
                el: '.swiper-container-thumbs',
                slidesPerView: 5,
              }
            },
            speed: 500,
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            preloadImages: false,
            lazy: true

          },
          attr: [
          {
            key: 'today',
            highlight: true,
            dates: new Date()
          }
        ]
        }
      },
    computed: {
      swiper() {
        return this.$refs.mySwiper.$swiper
      }
    },
    methods:{
      getNews(){
        axios.get('http://newsapi.org/v2/top-headlines?category=health&country=ng', { 
          headers: {
            'Authorization': 'Bearer afae79dbba7f468d8877f209650d4408',
            } 
          })
        .then(({data})=>{
          this.news = data.articles
        })
      },
      updateTime(){
          var cd = new Date();
          this.time = this.zeroPadding(cd.getHours(), 2) + ':' + this.zeroPadding(cd.getMinutes(), 2) + ':' + this.zeroPadding(cd.getSeconds(), 2)
      },

      zeroPadding(num, digit) {
          var zero = '';
          for(var i = 0; i < digit; i++) {
              zero += '0';
          }
          return (zero + num).slice(-digit);
      }
    },
    created(){
      var week = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
      var timerID = setInterval(this.updateTime, 1000);
    },
    mounted(){
      this.getNews()
      this.user = window.user
      this.updateTime();
      console.log('Current Swiper instance object', this.swiper)
    }
  }
</script>
<style lang="scss" scoped>
.swiper-pagination-bullet-active{
  background:#fff;
}
.swiper-pagination .swiper-pagination-bullets{  
  margin-top:20px;
}
</style>