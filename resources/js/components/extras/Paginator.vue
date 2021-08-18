<template>
    <div class="py-3 flex items-center justify-between" :class="page == 1 ? '' : 'px-4 sm:px-0'" v-if="shouldPaginate">
      <div class="flex-1 flex justify-between sm:justify-end">
        <a @click.prevent="page--" v-show="prevUrl" rel="prev" href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
         &larr; Previous
        </a>
        <a @click.prevent="page++" v-show="nextUrl" rel="next" href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
          Next &rarr;
        </a>
      </div>
    </div>
</template>

<script>
export default{
  props:['dataSet'],
  data(){
    return{
      page:1,
      prevUrl:false,
      nextUrl:false,
    }
  },
  computed:{
    shouldPaginate(){
       return !!this.prevUrl || !!this.nextUrl
    }
  },
  watch:{
    dataSet(){
      this.page = this.dataSet.current_page
      this.prevUrl = this.dataSet.prev_page_url
      this.nextUrl = this.dataSet.next_page_url
    },
    page(){
      this.broadcast()
    }
  },
  methods:{
    broadcast(){
      this.$emit('changedUrl', this.page)
    },
    
  },

}
</script>