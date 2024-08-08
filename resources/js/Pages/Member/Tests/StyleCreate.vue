<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
 validationRules: Object,
 validationMessages: Object,
});
  

  const questions = [
    {
      text: "大きな音や雑然とした光景のような強い刺激がわずらわしいですか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "大きな音で不快になりますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "一度にたくさんの事が起こっていると不快になりますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "いろいろなことが自分の周りで起きていると、不快な気分が高まりますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "明るい光や強いにおい、ごつごつした布地、近くのサイレンの音などにゾッとしやすいですか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "忙しい日々が続くと、ベッドで静かにした部屋とソファクッションが得られ、刺激の少ない場所に逃げ込みたくなりますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "一度にたくさんのことを頼まれるとイライラしますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "短時間にしなければならないことが多いとオロオロしますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "他人の気分に左右されますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "ビクッとしやすいですか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "競争場面や見られていると，緊張や同様のあまり，いつもの力を発揮できなくなりますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "強い刺激に圧倒されやすいですか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "痛みに敏感になることがありますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "子供の頃，親や教師はあなたのことを「敏感だ」とか「内気だ」と見ていましたか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "生活に変化があると混乱しますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "微細で繊細な香り・味・音・芸術作品などを好みますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "自分に対して誠実ですか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "美術や音楽に深く感動しますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
    {
      text: "豊かな内面生活を送っていますか？",
      options: [
        { label: '非常に当てはまる', value: '7' },
        { label: 'かなり当てはまる', value: '6' },
        { label: 'やや当てはまる', value: '5' },
        { label: 'どちらともいえない', value: '4' },
        { label: 'あまり当てはまらない', value: '3' },
        { label: 'ほとんどあてはまらない', value: '2' },
        { label: 'まったくあてはまらない', value: '1' },
      ]
    },
  ];
  
const isFormValid = ref(true);

const form = useForm({
  answersC: Object.fromEntries([...Array(19)].map((_, i) => [`answersC${i + 1}`, '']))
});

// const submitForm = () => {
//   form.post(route('member.tests.store'), {
//     preserveState: true,
//     preserveScroll: true,
//   });
// };


const submitForm = () => {
  console.log('送信するデータ:', form.answersC);
  form.post(route('member.tests.stylestore'), {
    preserveState: true,
    preserveScroll: true,
    onSuccess: (page) => {
      console.log('フォーム送信成功', page);
    },
    onError: (errors) => {
      console.log('フォーム送信エラー', errors);
    },
  });
};
</script>
<template>
    <v-container>
      <v-form @submit.prevent="submitForm">
        <v-card v-for="(question, index) in questions" :key="index" class="mb-4">
          <v-card-title>Question {{ index + 1 }}: {{ question.text }}</v-card-title>
          <v-card-text>
            <v-radio-group 
            inline
            v-model="form.answersC[`answersC${index + 1}`]"
            :rules="[(v) => !!v || props.validationMessages[`answersC${index + 1}.required`]]"
            required
          >
            <v-radio v-for="option in question.options" :key="option.value" :label="option.label" :value="option.value"></v-radio>
          </v-radio-group>
          </v-card-text>
        </v-card>
        <v-btn type="submit" color="primary" :disabled="!isFormValid">送信</v-btn>
      </v-form>
    </v-container>
  </template>