<template>
  <div>
    <div class="overflow-auto px-3 bg-gray-100 py-4" ref="feed" id="style-3"  style="height:35rem;" v-if="contact">
      <div class="flex" v-for="message in messages"
      :class="`message${message.to == contact.id ? ' mt-5 float-left bg-indigo-500 text-white shadow sent rounded w-6/4' 
      : ' float-right received shadow bg-white w-6/4 rounded mt-5 ' }`"
      :key="message.id">
        <div class="rounded text-xs p-2">
          <div class="w-full">
            <p class="break-words">{{ message.text }}</p>
            <div class="flex mt-2 text-xxs">
              <span class="flex-1 ml-auto" 
              :class="`message${message.to == contact.id ? ' opacity-75' 
              : ' text-gray-700 opacity-75' }`"
              >{{ message.created_at | date }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    
    props:{
      contact:{
        type:Object,
      },
      messages:{
        type: Array,
        required: true
      }
    },

    methods:{
      scrollToBottom(){
        setTimeout(() => {
          this.$refs.feed.scrollTop =  this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
        }, 50)
      }
    },
    watch:{
      contact(contact){
        this.scrollToBottom()
      },
      messages(messages){
        this.scrollToBottom()
      }
    }


  }
</script>

<style lang="scss" scoped>
.text-xxs{
  font-size: 0.5rem;
}
</style>