<template>
  <div>
    <ul class="flex flex-col md:flex-row mb-4 text-gray-600 border-b border-gray-200">
      <li v-for="tab in tabs" :key="tab.index" 
      class="px-4 py-2 bg-white" 
      :class="{ 'border border-b-0 rounded-t-lg' : tab == activeTab }"
      @click="activeTab = tab"
      :style="tab == activeTab ? 'margin-bottom: -1px' : '' "
      >
        <button 
        class="focus:outline-none"
        :class="{'active_button font-bold' : tab == activeTab }"
        v-text="tab.title" role="tab"></button>
      </li>
    </ul>


    <slot></slot>
  </div>
</template>

<script>
  export default {
    
    data(){
      return{
        tabs:[],
        activeTab:null
      }
    },
    mounted(){
      this.tabs = this.$children
      this.activeTab = this.tabs[0] 
    },
    watch:{
      activeTab(activeTab){
        this.tabs.map(tab=>(tab.show= tab == activeTab));
      }
    }

  }
</script>

<style lang="scss" scoped>

</style>