<template>
  <div>
    <modal name="authmodel" :scrollable="true" :adaptive="true" height="auto" :width="600" :clickToClose="false">
      <div class="p-4 mx-auto">
        <!-- <div>
          <icon name="key" class="h-24 w-24 mx-auto bg-white rounded-full shadow p-6"/>
        </div>
        <div class="mt-4">
          <p class="block text-text-xl font-medium
           leading-5 text-center text-gray-700 mb-2">Redirection to Bank Page</p>
        </div>
        <div class="mt-2">
          <p class="block text-sm leading-5 text-center text-gray-700 mb-2">Click the button below to complete your transaction</p>
        </div>  
        <div class="flex justify-center mt-3">
          <a class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out
          duration-150" target="_blank" :href="`${authUrl}`">Complete Transaction</a>
        </div> -->
        <iframe id="myIframe" @load="load" :src="`${authUrl}`" width="570" height="400" class="mb-4"></iframe>
        <div class="flex justify-center mt-3">
          <a class="inline-flex items-center px-3 py-2 border
           border-transparent text-sm leading-4 font-medium rounded-md 
           text-white bg-red-600 hover:bg-red-500 focus:outline-none 
           focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out
          duration-150" @click.prevent="closeModal">Close</a>
        </div>
      </div>
    </modal>
  </div>  
</template>
<script>
  export default{
    props:['authUrl'],
    methods:{
      closeModal(){
        this.$modal.hide('authmodel')
      },
      load(){
        console.log('hello')
      }
    },
  }
</script>