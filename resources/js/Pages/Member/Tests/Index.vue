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
        <div class="d-flex flex-row gap-4">
        <v-card class="w-64 h-80"
            color="indigo"
            subtitle="科学的根拠に基づいた心理診断です"
            variant="tonal"
            >
            <template v-slot:title>
                 <span class="font-weight-black">ビックファイブテスト</span>
             </template>
             
             <v-card-actions class="flex-column">
              <!-- <Link  :href="route('#')"> -->
                 <v-btn size="large" color="primary" variant="outlined" class="w-full">ビックファイヴとは？</v-btn>
              <!-- </Link> -->
              <Link  :href="route('member.tests.create')">
                 <v-btn size="large" color="primary" variant="outlined" class="w-full">  診断する  </v-btn>
              </Link>
              <Link  :href="route('member.tests.show')">
                 <v-btn size="large" color="primary" variant="outlined" class="w-full">診断結果を表示</v-btn>
              </Link>
            </v-card-actions>
            
        </v-card>
        <v-card class="w-64 h-80"
            color="indigo"
            subtitle="生活リズムが見つかる心理診断です"
            variant="tonal"
            >
            <template v-slot:title>
                 <span class="font-weight-black">クロノタイプテスト</span>
             </template>
             <v-card-actions class="flex-column">
              <!-- <Link  :href="route('#')"> -->
                 <v-btn size="large" color="primary" variant="outlined" class="w-full">クロノタイプとは？</v-btn>
              <!-- </Link> -->
              <!-- <Link  :href="route('')"> -->
                 <v-btn size="large" color="primary" variant="outlined" class="w-full">  診断する  </v-btn>
              <!-- </Link> -->
              <!-- <Link  :href="route('')"> -->
                 <v-btn size="large" color="primary" variant="outlined" class="w-full">診断結果を表示</v-btn>
              <!-- </Link> -->
            </v-card-actions>
            
        </v-card>
      </div>
      </v-main>
    </v-app>
  </template>
  
 