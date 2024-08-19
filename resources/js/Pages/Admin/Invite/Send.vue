<template>
  <v-container class="pa-5">
    <h1 class="text-h4 font-weight-bold mb-4">Member 招待</h1>
    <v-card class="pa-4">
      <form @submit.prevent="sendInvite">
        <v-row>
          <v-col cols="12" md="8">
            <v-text-field
              v-model="form.email"
              label="招待する社員のメールアドレス"
              required
              outlined
              :error-messages="form.errors.email ? [form.errors.email] : []"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row class="mt-4">
          <v-col cols="12" md="4">
            <v-btn type="submit" color="primary" block :loading="form.processing">
              招待メールを送信
            </v-btn>
          </v-col>
          <v-col cols="12" md="4">
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
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

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
