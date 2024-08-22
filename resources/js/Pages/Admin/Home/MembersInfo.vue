<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
    <v-list dense>
      <v-list-item-group>
        <!-- メールへのリンク -->
        <Link :href="route('admin.admin.sendmail')" class="v-list-item">
          <v-list-item prepend-icon="mdi-email">
            <v-list-item-content>
              <v-list-item-title>社員招待</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </Link>

        <!-- ログアウトへのリンク -->
        <Link :href="route('admin.logout')" method="post" as="button" class="v-list-item">
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

    <v-main class="bg-grey-lighten-4">
    <v-container>
      <v-data-table
        :headers="headers"
        :items="members"
        :sort-by="[{ key: 'name', order: 'asc' }]"
        class="elevation-1"
        item-key="id"
        dense
      >
        <!-- ツールバー（上部） -->
        <template v-slot:top>
          <v-toolbar flat class="mb-3">
            <v-toolbar-title>社員一覧</v-toolbar-title>
          </v-toolbar>
        </template>

        <!-- アクションボタン -->
        <template v-slot:item.actions="{ item }">
          <v-icon
            class="me-2"
            size="small"
            color="primary"
            @click="viewBigFive(item)"
            title="Big Fiveを表示"
          >
            mdi-chart-box
          </v-icon>
          <v-icon
            class="me-2"
            size="small"
            color="orange"
            @click="editItem(item)"
            title="編集"
          >
            mdi-pencil
          </v-icon>
          <v-icon
            size="small"
            color="red"
            @click="deleteItem(item)"
            title="削除"
          >
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-container>
  </v-main>
  </v-app>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';

const drawer = ref(false);

export default {
  components: {
    Link,
  },
  props: {
    members: {
      type: Array,
      default: () => []
    },
  },
  data() {
    return {
      drawer: null,
      headers: [
        { title: '名前', key: 'name' },
        { title: '会社名', key: 'companyName' },
        { title: '部署名', key: 'departmentName' },
        { title: '詳細・編集・削除', key: 'actions', sortable: false },
      ],
    }
  },
  methods: {
    viewBigFive(item) {
      if (!item || !item.id) {
        console.error("Item is undefined or does not have an id property:", item);
        return;
      }
      this.$inertia.visit(route('admin.home.bigfive', { member: item.id }));
    },
    editItem(item) {
      this.$inertia.visit(route('admin.home.edit', { id: item.id }));
    },
    deleteItem(item) {
      if (confirm('このメンバーを削除してもよろしいですか？')) {
        this.$inertia.delete(route('admin.home.delete', { id: item.id }));
      }
    },
  }
}
</script>
