<template>
  <div role="tabpanel" v-show="show">
    <slot/>
  </div>
</template>

<script>
  export default {
    props:['title'],

    data(){
      return{
        show:false
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>