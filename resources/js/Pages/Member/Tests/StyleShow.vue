<template>
    <v-container>
      <v-card class="mx-auto mt-5" max-width="500">
        <v-card-title class="text-h4 font-weight-bold">
          診断結果
        </v-card-title>
        <v-card-text>
          <p class="text-body-1">{{ message }}</p>
          <v-alert
            v-if="status === 'success'"
            color="success"
            icon="mdi-check-circle"
            :title="displayResult"
            class="mt-4"
          >
          </v-alert>
          <v-alert
            v-else
            :color="status === 'error' ? 'error' : 'info'"
            :icon="status === 'error' ? 'mdi-alert' : 'mdi-information'"
            :title="status"
            class="mt-4"
          >
            {{ status }}
          </v-alert>
        </v-card-text>
      </v-card>
    </v-container>
  </template>
  
  <script>
  export default {
    props: {
      result: Object,
      message: String,
      status: String,
    },
    computed: {
      displayResult() {
        const sum = this.result.result;
        if (sum >= 27 && sum <= 63) {
          return 'HSPレベルは低く、強い刺激にも影響を受けにくい傾向がある。';
        } else if (sum >= 64 && sum <= 116) {
          return 'HSPレベルは中くらいで、一般的な感性刺激に対して適度に反応する傾向がある。';
        } else if (sum >= 117 && sum <= 189) {
          return 'HSPレベルが高く、繊細な刺激にも敏感に反応しやすい傾向がある。';
        } else {
          return '診断結果が範囲外です。';
        }
      },
    },
};
  </script>
