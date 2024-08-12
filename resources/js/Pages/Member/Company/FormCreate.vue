<template>
  <form @submit.prevent="submit">
    <v-text-field
      v-model="form.company_name"
      :error-messages="errors.company_name"
      label="会社名"
      required
    ></v-text-field>

    <v-text-field
      v-model="form.department_name"
      :error-messages="errors.department_name"
      label="部署名"
      required
    ></v-text-field>

    <v-btn
      type="submit"
      :loading="form.processing"
      :disabled="form.processing"
    >
      送信
    </v-btn>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  token: String,
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