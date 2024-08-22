<template>
    <v-container class="fill-height" fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="6" lg="4">
          <v-card elevation="8" >
            <v-img
              src="/images/head-3001159_1920.jpg"
              height="200"
              class="align-end"
              gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            >
              <v-card-title class="text-white">
                心理診断アプリケーション
              </v-card-title>
            </v-img>
            
            <v-card-text>
              <p class="text-h6 mt-4">
                自分の性格を知るための心理診断アプリケーションです。
              </p>
              <v-list>
                <v-list-item v-for="(benefit, index) in benefits" :key="index">
                  <v-list-item-icon>
                    <v-icon :color="benefit.color">{{ benefit.icon }}</v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title>{{ benefit.text }}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </v-card-text>
  
            <v-card-actions>
              <v-spacer></v-spacer>
              <Link
                :href="route('member.register')"
                class="text-decoration-none"
              >
                <v-btn
                  color="primary"
                  x-large
                  elevation="2"
                  :loading="isLoading"
                  @click="isLoading = true"
                >
                  会員登録へ進む
                  <v-icon right>mdi-arrow-right</v-icon>
                </v-btn>
              </Link>
              <v-spacer></v-spacer>
            </v-card-actions>
  
            <v-card-text class="text-center">
              <p>
                すでにアカウントをお持ちですか？
                <Link
                  :href="route('member.login')"
                  class="text-decoration-none font-weight-bold"
                >
                  ログイン
                </Link>
              </p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script>
  import { defineComponent, ref } from 'vue'
  import { Link } from '@inertiajs/vue3'
  
  export default defineComponent({
    components: {
      Link
    },
    setup() {
      const isLoading = ref(false)
      const benefits = [
      { text: '管理者として登録で社員の性格管理も行えます。', icon: 'mdi-lock-open-variant', color: 'indigo' },
        { text: 'ビックファイヴ・HSP・クロノタイプの診断が行えます。'},
      ]
  
      return {
        isLoading,
        benefits
      }
    }
  })
  </script>
  
