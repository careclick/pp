<template>
  <div>
    <canvas id="graph" width="400" height="150"></canvas>
  </div>
</template>

<script> 
  import Chart from 'chart.js'
  export default {
    props:['labels','values'],

    mounted(){
      var context = document.getElementById('graph');
      var graph = new Chart(context, {
      type: 'line',
      data: {
          labels: this.labels,
          datasets: [{
              label: '# of Votes',
              data: this.values,
              backgroundColor: [
                  'rgba(102, 126, 234, 0.11)',
              ],
              borderColor: [
                  '#5a67d8',
              ],
              fill: false,
          },
          {
              label: 'Other points',
              data: [21,22,50,10,12,8,11,21,32,12,30,11],
              backgroundColor: [
                  'rgba(252, 29, 133, 0.12)',
                  'rgba(52, 262, 235, 01.2)',
                  'rgba(225,2206, 36, 01.2)',
                  'rgba(72, 292, 132, 01.2)',
                  'rgba(152, 202, 235, 01.2)',
                  'rgba(252, 259, 63, 0.12)'
              ],
              borderColor: [
                  'orange'
              ],
              fill: false,
          }
          ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      },
  });
    
    }
    
  }
</script>

<style lang="scss" scoped>

</style>