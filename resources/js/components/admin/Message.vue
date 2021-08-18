<template>
    <div>
      <div class="mt-4 md:mt-6 md:pb-12">
        <div class="mx-auto"> 
          <div class="">
            <div class="flex justify-between flex-wrap">
              <div class="w-full lg:w-6/4 bg-white shadow rounded flex flex-wrap">
                <div class="w-full md:w-1/3 border-r rounded-l bg-white">
                  <div>
                    <div class="flex items-center border-b">
                      <div class="py-4 px-3">
                        Messages
                      </div>
                      <div class="ml-auto p-3">
                        <i data-feather="edit" class="text-green-500 cursor-pointer w-5 h-5"></i>
                      </div>
                    </div>
                    <div class="border-b relative p-2">
                      <input v-model="doctor" type="text" placeholder="Search Doctor" class="text-sm w-full outline-none px-8 ">
                      <span class="absolute top-0 left-0 ml-2 mt-2">
                        <svg class="h-6 w-6 text-gray-400" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </span>
                      <span class="absolute top-0 right-0 ml-2 mt-4">
                        <loading v-if="loading" fill="5a67d8" width="60"/>
                      </span>
                    </div>
                  </div>
                  <p v-if="contacts.length == 0" class="text-center mt-4">No result found</p>
                  <ContactsList :contacts="contacts" @selected="startConversationWith"/>  
                </div>
                <div class="hidden md:block w-2/3" style="height:45rem;">
                  <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
                  <Chat v-if="show"/>
                </div>
              </div>  
              <div class="w-1/5 hidden lg:block">
                <div class="bg-white shadow rounded">
                  <div class="border-b border-gray-300">
                    <p class="px-4 py-4 text-gray-700 font-medium">Online Doctors</p>
                  </div>
                  <div class="flex items-center border-gray-300 border-b py-3 px-4">
                    <div>
                      <span class="inline-block relative">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full text-white shadow-solid bg-green-400"></span>
                      </span>
                    </div>
                    <div class="ml-3">
                      <p class="text-gray-700 text-sm">Oke Michael</p>
                      <p class="text-gray-400 text-xs">mykelcodex</p>
                    </div>
                  </div>
                  <div class="flex items-center border-gray-300 border-b py-3 px-4">
                    <div>
                      <span class="inline-block relative">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full text-white shadow-solid bg-green-400"></span>
                      </span>
                    </div>
                    <div class="ml-3">
                      <p class="text-gray-700 text-sm">Oke Michael</p>
                      <p class="text-gray-400 text-xs">mykelcodex</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>
</template>

<script>
import Chat from '../extras/svg/Chat'
import ContactsList from '../chat/ContactsList'
import Conversation from '../chat/Conversation'
export default {

components:{
  ContactsList,
  Conversation,
  Chat
},

data(){
  return{
    selectedContact:null,
    messages:[],
    contacts:[],
    user:[],
    show:true,
    loading:false,
    doctor:'',
    typing:''
  }
},
computed:{
  channel(){
    return Echo.private(`messages.${window.user.id}`)
  }
},
watch:{
      "doctor": {
				handler() {
					this.search();
				},
				deep: true
			},

    },
methods:{
  search: _.debounce(function() {
	this.loading = true;
		axios.get("/api/search", { params: { option: 'doctor', search: this.doctor } })
			.then(response => {
				if (response.status == 200) {
          this.contacts = response.data
          this.loading = false;
				} 
			})
  }, 500),
  getContacts(){
    axios.get('/api/contacts')
    .then(resp=>{
      this.contacts = resp.data
    })
  },
  startConversationWith(contact){
    this.updateUnreadCount(contact, true)
    axios.get('/api/conversation', {params:{id:contact.id}})
    .then(resp=>{
      this.messages = resp.data
      this.selectedContact = contact
    })
  },
  saveNewMessage(message){
    this.messages.push(message)
  },

  handleIncoming(message){
    if(this.selectedContact && message.from == this.selectedContact.id){
      this.saveNewMessage(message)
      return
    }
    this.updateUnreadCount(message.from_contact, false)
  },

  updateUnreadCount(contact, reset){
     this.contacts = this.contacts.map((single)=>{
       if(single.id !== contact.id ){
         return single;
       }
       if(reset)
          single.unread = 0
       else
        single.unread += 1
        return single;
     })
  },
isTyping(){
  this.channel
  .whisper('typing', {
      name: 'Foobar',
    });
},

},
created(){
  fire.$on('activateComposer',()=>{
    this.show = false
  })
  fire.$on('tapParticipant', ()=>{
    this.isTyping()
  })

  this.channel
    .listenForWhisper('typing', (e) => {
      console.log('Somebody is typing' + e)
    });


},
mounted(){
  this.channel
      .listen('NewMessage', (e)=>{
        this.handleIncoming(e.message)
      })
  this.getContacts()
  this.user = window.user
}

}
</script>

<style>

</style>
