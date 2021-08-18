<template>
  <div>
    <canvas id="doughnut-chart" width="800" height="450"></canvas>
  </div>
</template>

<script> 
  import Chart from 'chart.js'
  export default {
    props:['labels','values'],

    mounted(){
      var context = document.getElementById('doughnut-chart');
      var doughnut = new Chart(context, {
      type: 'doughnut',
      data: {
      labels: ["Male", "Female"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267]
        }
      ]
    },
  });
    
    }
    
  }
</script>

<style lang="scss" scoped>

</style>