<template>
  <v-container class="max-w-4xl mx-auto px-4">
    <v-card class="pa-6 rounded-lg shadow-lg">
      <v-card-title class="text-h4 font-weight-bold mb-6">テスト結果</v-card-title>
      
      <v-alert
        v-if="message"
        :type="status === 'success' ? 'success' : 'error'"
        :text="message"
        class="mb-6"
        outlined
      ></v-alert>
      
      <template v-if="bigfive">
        <BigFiveChart :bigfive="bigfive" class="mb-6" />
        
        <v-card outlined class="pa-4 mb-6">
          <v-card-title class="text-h6 font-weight-medium">平均値比較</v-card-title>
          <v-card-text>
            <ul class="list-disc list-inside">
              <li>開放性: 約3.5点</li>
              <li>協調性: 約3.2点</li>
              <li>外向性: 約3.1点</li>
              <li>誠実性: 約2.9点</li>
              <li>神経症傾向: 約3.5点</li>
            </ul>
          </v-card-text>
        </v-card>
        
      </template>
      
      <v-card v-else outlined class="pa-6 text-center">
        <v-icon large color="warning" class="mb-4">mdi-alert-circle</v-icon>
        <p class="text-h6 mb-4">テスト結果が見つかりません。</p>
        <v-btn
          color="primary"
          :href="route('member.tests.create')"
          class="mr-4"
        >
          テストを受ける
        </v-btn>
      </v-card>

      <v-btn
        color="secondary"
        :href="route('member.index')"
        class="mt-4"
        text
      >
        <v-icon left>mdi-arrow-left</v-icon>
        戻る
      </v-btn>
    </v-card>
  </v-container>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/vue3';
import BigFiveChart from '@/Components/BigFiveChart.vue';

export default defineComponent({
  name: 'TestResults',
  components: {
    BigFiveChart,
    Link
  },
  props: {
    bigfive: Object,
    message: String,
    status: String
  }
});
</script>