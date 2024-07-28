<template>
    <div>
      <h1>テスト結果</h1>
      <p v-if="message" :class="status">{{ message }}</p>
      
      <div v-if="bigfive">
        <h2>あなたの結果</h2>
        <ul>
          <li>開放性: {{ bigfive.openness }}</li>
          <li>協調性: {{ bigfive.agreeableness }}</li>
          <li>外向性: {{ bigfive.extraversion }}</li>
          <li>誠実性: {{ bigfive.conscientiousness }}</li>
          <li>神経症傾向: {{ bigfive.neuroticism }}</li>
        </ul>
      </div>
      <div v-else>
        <p>テスト結果が見つかりません。</p>
        <inertia-link :href="route('member.tests.create')">テストを受ける</inertia-link>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      bigfive: Object,
      message: String,
      status: String
    }
  }
  </script>