<template>
  <div>
    <form>
      <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6 pb-16 pt-10 max-w-2xl mx-auto">
        <div class="sm:col-span-3">
          <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
            Doctor name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <select id="last_name" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
              <option>Select a doctor</option>
              <option>One</option>
              <option>Two</option>
              <option>Three</option>
            </select> 
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
            Patient name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <select class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
              <option>Select a patient</option>
              <option>One</option>
              <option>Two</option>
              <option>Three</option>
            </select> 
          </div>
        </div>
        <div>
          <span class="inline-flex rounded-md shadow-sm">
            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              <svg class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" clip-rule="evenodd"/>
              </svg>
              Generate
            </button>
          </span>
      </div>
      </div>   
    </form> 
    <div>
      <report title="Generate report from the clinic." content="You can generate report for each doctor and patient."/>
    </div>
  </div>
</template>

<script>
import Report from '../extras/svg/report'
  export default {
    components:{
      Report
    }
  }
</script>

<style lang="scss" scoped>

</style>