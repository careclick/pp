<template>
  <div>
    <modal name="changedoctorpassword" :scrollable="true" :adaptive="true" height="auto" :width="400">
      <div>
        <div class="font-semibold text-gray-700 py-4 text-center header border-gray-200 border-b">
          Change Password
        </div>
        <div class="bg-gray-100 py-1 text-center text-xs">
          Dr. {{ doctor_name }}
        </div>  
        <div>
          <div class="py-8 px-4 sm:mx-auto sm:w-full sm:max-w-md">
            <div>
              <form>
                <div>
                  <label for="email" class="flex justify-between items-center block text-sm font-medium leading-5 text-gray-700">
                    <p>New Password</p>
                    <p @click="togglePassword" class="text-sm cursor-pointer">Show</p>
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input v-model="form.password" id="email" :type="passwordType"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                </div>

                <div class="mt-6">
                  <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                    Confirm New Password
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input v-model="form.confirm_password" id="password" :type="passwordType"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                </div>

                <div class="mt-6">
                  <span class="block w-full rounded-md shadow-sm">
                    <button @click.prevent="changePassword" type="submit" class="h-10 w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                      <loading v-if="loading" fill="fff" width="50"/>
                      <span v-if="!loading">Change Password</span>
                    </button>
                  </span>
                  <span class="mt-4 block w-full rounded-md shadow-sm">
                    <button @click.prevent="hideModal" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out">
                      Cancel
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </modal>
    <vue-snotify/>  
  </div>
</template>

<script>
  export default {
    props:['doctor_id','doctor_name'],
     data(){
       return{
         loading:false,
         passwordType : 'password',
         form:{
           password:'',
           confirm_password:''
         }

       }
     },
     methods:{
       togglePassword(){
         this.passwordType == 'password' ? this.passwordType = "text" : this.passwordType = "password"
       },
       changePassword(){
         if(this.form.password == '' || this.form.confirm_password == ''){
           this.$snotify.error('Please fill the form correctly', 'Error')
         }else if(this.form.password !== this.form.confirm_password){
           this.$snotify.error('Password do not match', 'Error')
         }else{
          this.loading = true
         axios.post('/changepassword', {
           'id':this.doctor_id,
           'password':this.form.password
         }).then(resp=>{
           if(resp.status == 200 ){
             this.$snotify.success('Doctor password have been updated', 'Success')
             this.loading = false
             this.hideModal()
             this.form.password=this.form.confirm_password = ''
           }
         })
         }
       },
       hideModal(){
         this.$modal.hide('changedoctorpassword')
       }
     },
     computed:{
       getFirstName(){
         return this.patient_name.split(' ')[0]
       }
     }
  }
</script>

<style lang="scss" scoped>

</style>