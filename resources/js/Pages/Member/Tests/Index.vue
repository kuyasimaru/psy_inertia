<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const drawer = ref(null)
</script>

<script>
export default {
  data: () => ({ drawer: null }),
}
</script>
<template>
    <v-app id="inspire">
      <v-navigation-drawer v-model="drawer">
        <!--  -->
      </v-navigation-drawer>
  
      <v-app-bar>
        <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
  
        <v-app-bar-title>Application</v-app-bar-title>
      </v-app-bar>
  
      <v-main>
        <v-card class="w-64 h-80"
            color="indigo"
            subtitle="科学的根拠に基づいた心理診断です"
            variant="tonal"
            >
            <template v-slot:title>
                 <span class="font-weight-black">ビックファイブテスト</span>
             </template>
             <v-card-actions>
                 <v-btn color="primary">診断する</v-btn>
                 <v-btn>診断結果を表示</v-btn>
            </v-card-actions>
            
        </v-card>
      </v-main>
    </v-app>
  </template>
  
 