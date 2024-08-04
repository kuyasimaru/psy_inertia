<template>
    <div>
      <h1>テスト結果</h1>
      <p v-if="message" :class="status">{{ message }}</p>
      
      <div v-if="bigfive">
        <BigFiveChart :bigfive="bigfive" />
        <p>それぞれの平均値： 開放性 約3.5点 協調性 約3.2点 外向性 約3.1点 誠実性 約2.9点 神経症傾向 約3.5点</p>
      </div>
      <div v-else>
        <p>テスト結果が見つかりません。</p>
        <inertia-link :href="route('member.tests.create')">テストを受ける</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  export default {
  components: {
    BigFiveChart
  },
  props: {
    bigfive: Object,
    message: String,
    status: String
  }
}
import BigFiveChart from '@/Components/BigFiveChart.vue';
  </script>