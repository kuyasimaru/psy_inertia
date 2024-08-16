<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <!-- Navigation drawer content -->
    </v-navigation-drawer>

    <v-app-bar app elevate-on-scroll>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-app-bar-title>心理診断アプリ</v-app-bar-title>
    </v-app-bar>

    <v-main class="bg-grey-lighten-4">
      <v-data-table
        :headers="headers"
        :items="members"
        :sort-by="[{ key: 'name', order: 'asc' }]"
      >
        <template v-slot:top>
          <v-toolbar flat>
            <v-toolbar-title>Members List</v-toolbar-title>
          </v-toolbar>
        </template>
        <template v-slot:item.actions="{ item }">
          <v-icon
            class="me-2"
            size="small"
            @click="viewBigFive(item)"
          >
            mdi-chart-box
          </v-icon>
          <v-icon
            class="me-2"
            size="small"
            @click="editItem(item.raw)"
          >
            mdi-pencil
          </v-icon>
          <v-icon
            size="small"
            @click="deleteItem(item.raw)"
          >
            mdi-delete
          </v-icon>
        </template>
      </v-data-table>
    </v-main>
  </v-app>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
  components: {
    Link,
  },
  props: {
    members: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      drawer: null,
      headers: [
        { title: 'Name', key: 'name' },
        { title: 'Company', key: 'companyName' },
        { title: 'Department', key: 'departmentName' },
        { title: 'Actions', key: 'actions', sortable: false },
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
      this.$inertia.visit(route('admin.members.edit', { id: item.id }));
    },
    deleteItem(item) {
      if (confirm('このメンバーを削除してもよろしいですか？')) {
        this.$inertia.delete(route('admin.members.destroy', { id: item.id }));
      }
    },
  }
}
</script>
