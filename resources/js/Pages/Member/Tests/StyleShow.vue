<template>
  <v-container>
    <v-card class="mx-auto mt-5" max-width="500">
      <v-card-title class="text-h4 font-weight-bold">
        診断結果
      </v-card-title>
      <v-card-text>
        <v-card
          color="green lighten-4"
          class="mt-4 text-center"
        >
          <v-card-title>{{ displayResult }}</v-card-title>
          <v-card-text>あなたの結果は {{ displayResult }} です。</v-card-text>
        </v-card>
      </v-card-text>
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
import { ref, computed, onMounted } from 'vue';

export default {
  props: {
    result: Object,
  },
  setup(props) {
    const result = ref(props.result);

    const displayResult = computed(() => {
      const sum = result.value?.result;
      if (sum >= 27 && sum <= 63) {
        return 'HSPレベルは低く、強い刺激にも影響を受けにくい傾向がある。';
      } else if (sum >= 64 && sum <= 116) {
        return 'HSPレベルは中くらいで、一般的な感性刺激に対して適度に反応する傾向がある。';
      } else if (sum >= 117 && sum <= 189) {
        return 'HSPレベルが高く、繊細な刺激にも敏感に反応しやすい傾向がある。';
      } else {
        return '診断結果が範囲外です。';
      }
    });

    onMounted(() => {
      console.log('Component mounted. Props:', props);
    });

    return {
      result,
      displayResult,
    };
  },
};
</script>
