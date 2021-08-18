<template>
  <div>
    <modal name="addschedule" :scrollable="true" :adaptive="true" height="auto" :width="500" :clickToClose="false">
      <div>
        <div class="font-semibold text-gray-700 py-4 text-center header border-gray-200 border-b">
          ADD SCHEDULE
        </div> 
        <div class="px-6 py-4">
          <form>
            <div class="grid grid-cols-6 gap-4">
              <div class="sm:col-span-3">
                <label for="dob" class="block text-sm font-medium leading-5 text-gray-700">Start Date</label>
								<date-picker :disabled-date="disableDate" lang="en" type="date" format="DD-MM-YYYY" placeholder="Start Date" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="$v.form.start_date.$model" 
									></date-picker>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.start_date.required && $v.form.start_date.$error"
								>The start date field is required</p>
              </div>

              <div class="sm:col-span-3">
                <label for="dob" class="block text-sm font-medium leading-5 text-gray-700">End Date</label>
								<date-picker :disabled-date="disableDate" lang="en" type="date" format="DD-MM-YYYY" placeholder="End Date" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="$v.form.end_date.$model" 
									></date-picker>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.end_date.required && $v.form.end_date.$error"
								>The end date field is required</p>
              </div>

              <div class="sm:col-span-6">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                  Schedule Days
                </label>
                <div class="mt-2 rounded-md shadow-sm">
                  <select @change="addTag" v-model="newTag" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option value="">Select schedule days</option>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option>
                  </select>  
                </div>
                <div class="mt-1">
                  <span class="tags-input-tag" v-for="tag in form.days" :key="tag.id">
                  <span class="text-gray-600 text-xs">{{ tag }}</span>
                    <button type="button" class="tags-input-remove" @click="removeTag(tag)">&times;</button>
                  </span>
                </div>    
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.days.required && $v.form.days.$error"
								>Enter a schedule day</p>
              </div>
              
              <div class="sm:col-span-3">
                <label for="dob" class="block text-sm font-medium leading-5 text-gray-700">Start Time</label>
								<date-picker lang="en" type="time" format="HH:mm" :minute-step="5" placeholder="Start Time" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="$v.form.start_time.$model" 
									></date-picker>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.start_time.required && $v.form.start_time.$error"
								>The start time field is required</p>
              </div>

              <div class="sm:col-span-3">
                <label for="dob" class="block text-sm font-medium leading-5 text-gray-700">End Time</label>
								<date-picker lang="en" type="time" format="HH:mm" :minute-step="5" placeholder="End Time" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
								 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
								  transition duration-150 ease-in-out sm:text-sm sm:leading-5"
									v-model="$v.form.end_time.$model" 
									></date-picker>
								<p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.end_time.required && $v.form.end_time.$error"
								>The end time field is required</p>
              </div>

              <div class="sm:col-span-6">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                  Duration
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <select v-model="$v.form.duration.$model" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option value="">Select a duration</option>
                    <option>5</option>
                    <option>15</option>
                    <option>30</option>
                    <option>45</option>
                    <option>60</option>
                  </select>  
                </div>
                <p class="text-red-500 text-xs  mt-1"
									v-if="!$v.form.duration.required && $v.form.duration.$error"
								>The duration field is required</p>
              </div>
            </div>
          </form>
              <div class="mt-6">
                <span class="block w-full rounded-md shadow-sm">
                  <button @click.prevent="validateForm" type="submit" class="h-10 w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    <loading v-if="loading" fill="fff" width="60"/>
                    <span v-if="!loading">Add Schedule</span>
                  </button>
                </span>
                <span class="mt-4 block w-full rounded-md shadow-sm">
                  <button @click.prevent="hideModal" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out">
                    Cancel
                  </button>
                </span>
              </div>
        </div>  
      </div> 
    </modal> 
    <vue-snotify/> 
  </div>  
</template>
<script>
import {required} from "vuelidate/lib/validators";
import moment from 'moment'

export default{
 props : ['doctor_id'],
  data(){
    return{
      loading:false,
      newTag: '',
      value:[],
      form:{
        user_id: this.doctor_id,
        start_date:'',
        end_date:'',
        days:[],
        start_time:'',
        end_time:'',
        duration:''
      }
    }
  },
  validations:{
    form:{
      start_date: { required },
      end_date: { required },
      days: { required },
      start_time: { required },
      end_time: { required },
      duration: { required }
    }
  },
  methods:{
    addTag() {
      if (this.newTag.trim().length === 0 || this.form.days.includes(this.newTag.trim())) {
        return
      }
      this.form.days.push(this.newTag)
      this.newTag = ''
    },
    removeTag(tag) {
      this.form.days.pop(tag)
    },
    validateForm(){
				this.$v.$touch();
        if (this.$v.$invalid) {
          this.$snotify.error('Please fill the form correctly','Error');
        } else {
          this.loading = true
          this.addNewSchedule()
        }
			},
    addNewSchedule(){
      axios.post('/api/post-schedule', {
        user_id: this.doctor_id,
        start_date:this.form.start_date,
        end_date:this.form.end_date,
        days:this.form.days,
        start_time:this.form.start_time,
        end_time:this.form.end_time,
        duration:this.form.duration
      })
      .then(resp=>{
        if(resp.status == 200){
          this.$snotify.success(resp.data, 'Success')
          this.loading = false
          this.reset()
          this.hideModal()
          fire.$emit('scheduleAdded')
        }
      }).catch(err=>{
        console.log(err.response)
        this.loading = false
      })
    },
    reset(){
        Object.assign(this.$data, this.$options.data.call(this));
			},  
    hideModal(){
      this.$modal.hide('addschedule')
    },
    disableDate(date) {  
    return date < new Date();  
    },
  },
}

</script>
<style lang="scss">
@import '~vue2-datepicker/scss/index.scss';
.tags-input-tag {
  display: inline-flex;
  line-height: 1;
  align-items: center;
  font-size: .875rem;
  background-color: #bcdefa;
  color: #1c3d5a;
  border-radius: .25rem;
  user-select: none;
  padding: .25rem;
  margin-right: .5rem;
  margin-bottom: .25rem;
}

.tags-input-tag:last-of-type {
  margin-right: 0;
}

.tags-input-remove {
  color: #2779bd;
  font-size: 1.125rem;
  line-height: 1;
}

.tags-input-remove:first-child {
  margin-right: .25rem;
}

.tags-input-remove:last-child {
  margin-left: .25rem;
}

.tags-input-remove:focus {
  outline: 0;
}

</style>