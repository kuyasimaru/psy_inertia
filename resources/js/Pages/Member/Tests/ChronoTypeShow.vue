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
      <v-img
        :src="resultImage"
        max-width="300"
        class="mx-auto mt-5"
        contain
      ></v-img>
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
      if (sum >= 19 && sum <= 32) {
        return 'ライオン（朝）型';
      } else if (sum >= 33 && sum <= 47) {
        return 'クマ（昼）型';
      } else if (sum >= 48 && sum <= 61) {
        return 'オオカミ（夜）型';
      } else {
        return '診断結果が範囲外です。';
      }
    });

    const resultImage = computed(() => {
      const sum = result.value?.result;
      if (sum >= 19 && sum <= 32) {
        return '/images/—Pngtree—cute little lion illustration vector_5290865.png';
      } else if (sum >= 33 && sum <= 47) {
        return '/images/6729326.jpg';
      } else if (sum >= 48 && sum <= 61) {
        return '/images/wild-wolf-in-nature.jpg';
      }
    });

    onMounted(() => {
      console.log('Component mounted. Props:', props);
    });

    return {
      result,
      displayResult,
      resultImage,
    };
  },
};
</script>