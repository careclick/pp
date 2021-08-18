<template>
  <div>
    <div class="flex items-center border-b">
      <div class="p-3" v-if="contact">
        <img src="http://localhost:8000/images/15875123584a596f3764d041ea6aa83f4cdd1dbf01.png" class="w-8 rounded-full" alt="">
      </div>
      <div class="font-semibold text-gray-700">
        <p :class="contact ? '' : 'py-4 px-4'">{{ contact ? `Dr.${contact.name}` : 'Select a doctor' }}</p>
      </div>
    </div>
    <MessageFeed :contact="contact" :messages="messages"/>
    <MessageComposer @send="sendMessage"/>
  </div>  
</template>

<script>
import MessageFeed from '../chat/MessageFeed'
import MessageComposer from '../chat/MessageComposer'
  export default {
    props:{
      contact:{
        type:Object,
        default:null
      },
      messages:{
        type:Array,
        default:[]
      }
    },
    components:{
      MessageFeed,
      MessageComposer
    },
    methods:{
      sendMessage(text){
        if(!this.contact){
          return
        }
        axios.post('/api/conversation/send',{
          contact_id: this.contact.id,
          text: text,
        }).then(resp=>{
          this.$emit('new', resp.data)
        })
      }
    }


  }
</script>

<style lang="scss" scoped>

</style>