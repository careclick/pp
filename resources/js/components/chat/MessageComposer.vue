<template>
  <div>
    <div v-if="activate" class="h-32 overflow-hidden">
      <textarea v-model="message" @keydown="notifyPeer" @keydown.enter="send" placeholder="Write a message..." class="w-full h-full text-sm text-gray-700 outline-none focus:border-indigo-500 border-t p-2 resize-none"></textarea>
    </div>
  </div>
</template>

<script>
  export default {
    
    data(){
      return{
        message:'',
        activate:false
      }
    },

  methods:{
    notifyPeer(){
      fire.$emit('tapParticipant')
    },
    send(e){
      e.preventDefault()
      if(this.message == ''){
        return
      }
      this.$emit('send', this.message)
      this.message = ''
    }
  },
  created(){
    fire.$on('activateComposer', ()=>{
      setTimeout(()=>{
        this.activate = true
      },1000)
    })
  }

  }
</script>

<style lang="scss" scoped>

</style>