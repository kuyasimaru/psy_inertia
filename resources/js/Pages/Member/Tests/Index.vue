<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const drawer = ref(false)
const tests = [
  {
    title: 'ビックファイブテスト',
    subtitle: '科学的根拠に基づいた心理診断です',
    color: 'indigo',
    icon: 'mdi-brain',
    buttons: [
      { text: '診断する', route: 'member.tests.create' },
      { text: '診断結果を表示', route: 'member.tests.show' }
    ]
  },
  {
    title: 'HSPテスト',
    subtitle: '繊細さテスト',
    color: 'teal',
    icon: 'mdi-heart-pulse',
    buttons: [
      { text: '診断する', route: 'member.tests.stylecreate' },
      { text: '診断結果を表示', route: 'member.tests.styleshow' }
    ]
  },
  {
    title: 'クロノタイプテスト',
    subtitle: '生活リズムが見つかる心理診断です',
    color: 'deep-purple',
    icon: 'mdi-clock-time-four-outline',
    buttons: [
      { text: '診断する', route: 'member.tests.chronotypecreate' },
      { text: '診断結果を表示', route: 'member.tests.chronotypeshow' }
    ]
  }
]
</script>

<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list dense>
        <v-list-item-group>
          <Link :href="route('admin.register')" class="v-list-item">
            <v-list-item prepend-icon="mdi-account-plus">
              <v-list-item-content>
                <v-list-item-title>管理者登録</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </Link>

          <Link :href="route('admin.login')" class="v-list-item">
            <v-list-item prepend-icon="mdi-login">
              <v-list-item-content>
                <v-list-item-title>管理者としてログイン</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </Link>

          <Link :href="route('member.logout')" method="post" as="button" class="v-list-item">
            <v-list-item prepend-icon="mdi-logout">
              <v-list-item-content>
                <v-list-item-title>ログアウト</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </Link>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app elevate-on-scroll>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-app-bar-title>心理診断アプリ</v-app-bar-title>
    </v-app-bar>

    <v-main class="bg-grey-lighten-5">
      <v-container>
        <v-row>
          <v-col v-for="test in tests" :key="test.title" cols="12" md="4">
            <v-hover v-slot="{ isHovering, props }">
              <v-card
                v-bind="props"
                :elevation="isHovering ? 12 : 4"
                :class="{ 'on-hover': isHovering }"
                :color="test.color"
                class="transition-fast-in-fast-out"
              >
                <v-card-title class="d-flex align-center">
                  <v-icon :icon="test.icon" size="large" class="mr-3"></v-icon>
                  <span class="font-weight-bold">{{ test.title }}</span>
                </v-card-title>
                <v-card-subtitle>{{ test.subtitle }}</v-card-subtitle>
                <v-card-text>
                  <Link
                    v-for="button in test.buttons"
                    :key="button.text"
                    :href="route(button.route)"
                    class="mb-2 d-block"
                  >
                    <v-btn
                      block
                      variant="outlined"
                      color="white"
                      :class="{'elevation-2': isHovering }"
                    >
                      {{ button.text }}
                    </v-btn>
                  </Link>
                </v-card-text>
              </v-card>
            </v-hover>
          </v-col>
        </v-row>
      </v-container>
    </v-main>

    <v-footer app class="d-flex flex-column bg-grey-darken-3">
      <div class="px-4 py-2 text-center text-white w-100">
        {{ new Date().getFullYear() }} — <strong>心理診断アプリ</strong>
      </div>
    </v-footer>
  </v-app>
</template>

<style scoped>
.v-card {
  transition: all 0.3s ease-in-out;
}
.v-card.on-hover {
  transform: translateY(-8px);
  border-radius: 12px;
}
.v-btn {
  transition: all 0.2s ease-in-out;
}
</style>
