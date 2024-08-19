<template>
  <v-app>
    <v-main>
      <v-container class="pa-5">
        <h1 class="text-h4 font-weight-bold mb-4">社員情報更新</h1>
        <v-card class="pa-4">
          <form @submit.prevent="submit">
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="form.name"
                  label="名前"
                  :error-messages="errors.name"
                  outlined
                  dense
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="form.companyName"
                  label="会社名"
                  :error-messages="errors.companyName"
                  outlined
                  dense
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  v-model="form.departmentName"
                  label="部署名"
                  :error-messages="errors.departmentName"
                  outlined
                  dense
                  required
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row class="mt-4">
              <v-col cols="12" md="6">
                <v-btn
                  type="submit"
                  color="primary"
                  class="mr-4"
                  :loading="form.processing"
                  block
                >
                  更新
                </v-btn>
              </v-col>
              <v-col cols="12" md="6">
                <Link :href="route('admin.home.members-info')" as="button">
                  <v-btn color="secondary" block>
                    戻る
                  </v-btn>
                </Link>
              </v-col>
            </v-row>
          </form>
        </v-card>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Link,
  },
  props: {
    member: Object,
  },
  setup({ member }) {
    const form = useForm({
      name: member.name || '',
      companyName: member.companyName || '',
      departmentName: member.departmentName || '',
    });

    const submit = () => form.put(`/admin/home/${member.id}`);

    return {
      form,
      errors: form.errors,
      submit,
    };
  },
};
</script>
