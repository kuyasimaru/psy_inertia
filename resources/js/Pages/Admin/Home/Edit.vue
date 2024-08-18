<template>
  <v-app>
    <v-main>
      <v-container>
        <h1>メンバー編集</h1>
        <form @submit.prevent="submit">
          <v-text-field
            v-model="form.name"
            label="名前"
            :error-messages="errors.name"
          ></v-text-field>
          <v-text-field
            v-model="form.companyName"
            label="会社名"
            :error-messages="errors.companyName"
          ></v-text-field>
          <v-text-field
            v-model="form.departmentName"
            label="部署名"
            :error-messages="errors.departmentName"
          ></v-text-field>
          <v-btn type="submit" color="primary">更新</v-btn>
        </form>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
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
