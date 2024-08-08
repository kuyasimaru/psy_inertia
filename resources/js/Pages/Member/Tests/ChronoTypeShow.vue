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
            あなたの結果は {{ displayResult }} です。
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
      <v-img
      v-if="status === 'success'"
      :src="resultImage"
      max-width="300"
      class="mx-auto mt-5"
      contain
    ></v-img>
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
        if (sum >= 19 && sum <= 32) {
          return 'ライオン（朝）型';
        } else if (sum >= 33 && sum <= 47) {
          return 'クマ（昼）型';
        } else if (sum >= 48 && sum <= 61) {
          return 'オオカミ（夜）型';
        } else {
          return '診断結果が範囲外です。';
        }
      },
    resultImage(){
        const sum = this.result.result;
        if (sum >= 19 && sum <= 32) {
        return '/images/—Pngtree—cute little lion illustration vector_5290865.png';
      } else if (sum >= 33 && sum <= 47) {
        return '/images/6729326.jpg';
      } else if (sum >= 48 && sum <= 61) {
        return '/images/wild-wolf-in-nature.jpg';
      }
    },
    },
};
  </script>
