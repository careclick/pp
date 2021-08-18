import Vue from 'vue'
import Vuelidate from 'vuelidate'
import VModal from 'vue-js-modal'
import moment from 'moment'
import Snotify, { SnotifyPosition } from 'vue-snotify'
import 'vue-snotify/styles/material.css';
import VueGlide from 'vue-glide-js'
import 'vue-glide-js/dist/vue-glide.css'
import { Swiper as SwiperClass, Pagination, Mousewheel, Autoplay } from 'swiper/js/swiper.esm'
import getAwesomeSwiper from 'vue-awesome-swiper/dist/exporter'
// import style
import 'swiper/css/swiper.css'
import Calendar from 'v-calendar/lib/components/calendar.umd'

Vue.component('calendar', Calendar)


// Swiper modules
SwiperClass.use([Pagination, Mousewheel, Autoplay])
// Global use
Vue.use(getAwesomeSwiper(SwiperClass))

const options = {
  toast: {
    position: SnotifyPosition.rightBottom,
    timeout: 4000,
    showProgressBar: false,
  }
}

Vue.use(Snotify, options)


//Packages
Vue.use(Vuelidate)
Vue.use(VModal)
Vue.use(VueGlide)


require('./bootstrap');
window.Vue = require('vue');


let token = localStorage.getItem('token')

if(token){
	axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
}

window.fire = new Vue();

Vue.filter('date', function(created){
	return moment(created).format('MMMM Do YYYY');
})



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('login', require('./components/Login.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('navb', require('./components/extras/Navb.vue').default);
Vue.component('tab', require('./components/extras/Tab.vue').default);
Vue.component('tabs', require('./components/extras/Tabs.vue').default);
Vue.component('paginator', require('./components/extras/Paginator.vue').default);
Vue.component('load', require('./components/extras/Load.vue').default);
Vue.component('loading', require('./components/extras/Loading.vue').default);
Vue.component('icon', require('./components/extras/Icon.vue').default);
Vue.component('notify', require('./components/extras/svg/Notify.vue').default);

//Admin
Vue.component('admin', require('./components/admin/Admin.vue').default);
Vue.component('userprofile', require('./components/Admin/Profile.vue').default);
Vue.component('patients', require('./components/Admin/Patients.vue').default);
Vue.component('patient', require('./components/Admin/Patient.vue').default);
Vue.component('doctors', require('./components/Admin/Doctors.vue').default);
Vue.component('doctor', require('./components/Admin/Doctor.vue').default);
Vue.component('schedules', require('./components/Admin/Schedules.vue').default);
Vue.component('reports', require('./components/Admin/Reports.vue').default);
Vue.component('search', require('./components/Admin/Search.vue').default);
Vue.component('message', require('./components/Admin/Message.vue').default);


//Patient
Vue.component('patient-index', require('./components/patient/PatientIndex.vue').default);
Vue.component('patient-nav', require('./components/patient/PatientNav.vue').default);
Vue.component('patient-appointment', require('./components/patient/PatientAppointment.vue').default);
Vue.component('patient-transactions', require('./components/patient/PatientTransactions.vue').default);
Vue.component('patient-doctors', require('./components/patient/PatientDoctors.vue').default);


//Doctor
Vue.component('doctor-index', require('./components/doctor/DoctorIndex.vue').default);
Vue.component('doctor-nav', require('./components/doctor/DoctorNav.vue').default);





const app = new Vue({
    el: '#app',
    data(){
      return{
				show: false,
				togglenav:false,
				user:[]
			}
    },
		methods:{
			getUser(){
        axios.get('/api/auth/getuser')
        .then(resp=>{
          this.user = resp.data
        })
      }	
		},
		created(){
			fire.$on('ProfileUpdated', ()=>{
				this.getUser()
			})
		},
		mounted(){
			// if(token){
			// 	this.getUser()
			// }
		}
});
