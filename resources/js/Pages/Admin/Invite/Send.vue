<template>
    <div>
      <h1>Member 招待</h1>
      <form @submit.prevent="sendInvite">
        <v-text-field
          v-model="form.email"
          label="MemberのEmail"
          required
          :error-messages="form.errors.email ? [form.errors.email] : []"
        ></v-text-field>
  
        <v-btn type="submit" color="primary">招待メールを送信</v-btn>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    email: '',
  });
  
  function sendInvite() {
    form.post(route('admin.invite.sendinvite'), {
      onSuccess: () => {
        form.reset();
      },
    });
  }
  </script>
  