<template>
  <div>
    <table>
      <thead>
        <tr>
          <th>名前</th>
          <th>会社名</th>
          <th>部署名</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="member in members" :key="member.id">
          <td>{{ member.name }}</td>
          <td>{{ member.companyName }}</td>
          <td>{{ member.departmentName }}</td>
          <td>
            <Link
              :href="route('admin.home.bigfive', { member: member.id })"
              class="btn btn-primary"
            >
              <i class="fas fa-eye"></i> 詳細
            </Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
  components: {
    Link
  },
  props: {
    members: {
      type: Array,
      default: () => []
    }
  }
}
</script>