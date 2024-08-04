<template>
    <canvas ref="chartCanvas"></canvas>
  </template>
  
  <script>
  import { ref, onMounted, watch } from 'vue'
  import Chart from 'chart.js/auto'
  
  export default {
    props: {
      bigfive: {
        type: Object,
        required: true
      }
    },
    setup(props) {
      const chartCanvas = ref(null)
      let chart = null
  
      const createChart = () => {
        if (chartCanvas.value) {
          const ctx = chartCanvas.value.getContext('2d')
          chart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['開放性', '協調性', '外向性', '誠実性', '神経症傾向'],
              datasets: [{
                label: 'Big Five性格特性',
                data: [
                  props.bigfive.openness,
                  props.bigfive.agreeableness,
                  props.bigfive.extraversion,
                  props.bigfive.conscientiousness,
                  props.bigfive.neuroticism
                ],
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              indexAxis: 'y',
              responsive: true,
              scales: {
                x: {
                  beginAtZero: true,
                  max: 5
                }
              }
            }
          })
        }
      }
  
      onMounted(createChart)
  
      watch(() => props.bigfive, (newValue, oldValue) => {
        if (chart) {
          chart.data.datasets[0].data = [
            newValue.openness,
            newValue.agreeableness,
            newValue.extraversion,
            newValue.conscientiousness,
            newValue.neuroticism
          ]
          chart.update()
        } else {
          createChart()
        }
      }, { deep: true })
  
      return {
        chartCanvas
      }
    }
  }
  </script>