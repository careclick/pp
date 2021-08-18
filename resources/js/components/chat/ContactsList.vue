<template>
  <div>
    <div class="overflow-auto relative" id="style-3" style="height:41rem;">
      <div class="cursor-pointer hover:bg-gray-200 hover:border-l-2 bg-white hover:border-indigo-500 hover:border-b-0" v-for="(contact, index) in sortContacts" :key="contact.id" @click="selectedContact(index, contact)"
       :class="index == selected ? 'border-indigo-500 bg-gray-200 border-l-2' : 'border-1 border-b border-gray-200' ">
        <div class="flex relative">
          <div class="flex items-center p-3">
            <div>
              <img src="http://localhost:8000/images/15875123584a596f3764d041ea6aa83f4cdd1dbf01.png" class="w-12 rounded-full" :alt="contact.name">
            </div>
            <div class="ml-2">
              <p class="font-bold text-gray-700 text-sm">{{ contact.role == 'doctor' ? 'Dr.' : ''  }} {{ contact.name }}</p>
              <div class="flex items-center">
                <p class="text-xs text-gray-600">{{ contact.email }}</p>
                <span v-if="contact.unread" class="mr-2 absolute right-0 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800">
                  {{ contact.unread }}
                </span>
              </div>
            </div>
          </div>
          <div class="ml-auto text-xs absolute text-gray-500 top-0 right-0 p-3">
            Apr 6
          </div>
        </div>  
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props:{
      contacts:{
        type:Array,
        default:[]
      }
    },
    data(){
      return{
        selected:null
      }
    },
    methods:{
      selectedContact(index, contact){
        this.selected = index
        fire.$emit('activateComposer')
        this.$emit('selected', contact);
      }
    },
    computed:{
      sortContacts(){
        return _.sortBy(this.contacts, [(contact) => {
          return contact.unread;
        }]).reverse()
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>