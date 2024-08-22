<template>
  <v-container class="max-w-md mx-auto">
    <v-card class="pa-6 rounded-lg shadow-lg">
      <v-card-title class="text-h5 font-weight-bold mb-6">
        会社情報登録
      </v-card-title>

      <v-form @submit.prevent="submit">
        <v-text-field
          v-model="form.company_name"
          :error-messages="errors.company_name"
          label="会社名"
          required
          outlined
          dense
          class="mb-4"
        ></v-text-field>

        <v-text-field
          v-model="form.department_name"
          :error-messages="errors.department_name"
          label="部署名"
          required
          outlined
          dense
          class="mb-6"
        ></v-text-field>

        <v-btn
          type="submit"
          color="primary"
          :loading="form.processing"
          :disabled="form.processing"
          block
          x-large
          class="mt-4"
        >
          送信
        </v-btn>
      </v-form>
    </v-card>
  </v-container>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  token: {
    type: String,
    required: true
  },
})

const form = useForm({
  company_name: '',
  department_name: '',
  token: props.token,
})

const errors = computed(() => form.errors)

function submit() {
  form.post(route('member.company.store'), {
    preserveState: true,
    preserveScroll: true,
  })
}
</script>