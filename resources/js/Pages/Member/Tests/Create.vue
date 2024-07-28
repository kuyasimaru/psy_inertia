<template>
    <v-container>
      <v-form @submit.prevent="submitForm">
        <v-card v-for="(question, index) in questions" :key="index" class="mb-4">
          <v-card-title>Question {{ index + 1 }}: {{ question.text }}</v-card-title>
          <v-card-text>
            <v-radio-group 
            inline
            v-model="form.answers[`answers${index + 1}`]"
            :rules="[(v) => !!v || props.validationMessages[`answers${index + 1}.required`]]"
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
  
<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
 validationRules: Object,
 validationMessages: Object,
});
  

  const questions = [
    {
      text: "芸術作品に接すると鳥肌が立ち興奮を覚えることがある。",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "美や芸術にはあまり関心がない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "考えることは面白い",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "イメージがあふれ出てくる",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "自分の感じたことを大切にする",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "変わった人だとよくいわれる",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "空想の世界をさまようことはほとんどない ",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "好奇心が強い ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "感情豊かな人間である ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "別世界に行ってみたい ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "誰に対しても優しく親切にふるまうようにしている ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "人には暖かく友好的に接している",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "人の気持ちを積極的に理解しようとは思わない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "あまり親切な人間ではない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "人情深いほうだと思う",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "人のよろこびを自分のことのように喜べる",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "どうしても好きになれない人がたくさんいる",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "出会った人はたいがい好きになる",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "気配りをするほうである",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "人を馬鹿にしているといわれることがある ",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "大勢でわいわい騒ぐのが好きである ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "地味で目立つことはない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "にぎやかな所が好きである",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "大勢の人の中にいるのが好きである",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "もの静かである ",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "人の上に立つことが多い",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "人に指示を与えるような立場に立つことが多い",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "じっとしているのが嫌いである ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "人から注目されるとうれしい (",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "スポーツ観戦で我を忘れて応援することがある",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "あまりきっちりした人間ではない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "仕事を投げやりにしてしまうことがある",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    }, 
    {
      text: "よく考えてから行動する ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "仕事は計画的にするようにしている ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "責任感が乏しいといわれることがある ",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "まじめな努力家である  ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "根気が続かないほうである ",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "几帳面である",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "しんどいことはやりたくない  ",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "欲望のままに行動してしまうようなことは，ほとんどない",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "憂鬱になりやすい",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "自分がみじめな人間に思える ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "ものごとがうまく行かないのではないかと，よく心配する ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "小さなことにはくよくよしない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    {
      text: "見捨てられた感じがする ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "自分には全然価値がないように思えることがある ",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "陽気になったり陰気になったり，気分が変りやすい",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "よく緊張する",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "明るいときと暗いときの気分の差が大きい (",
      options: [
        { label: '全く当てはまらない', value: '1' },
        { label: '当てはまらない', value: '2' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '4' },
        { label: 'すごく当てはまる', value: '5' }
      ]
    },
    {
      text: "緊張してふるえるようなことはない",
      options: [
        { label: '全く当てはまらない', value: '5' },
        { label: '当てはまらない', value: '4' },
        { label: 'どちらともいえない', value: '3' },
        { label: '当てはまる', value: '2' },
        { label: 'すごく当てはまる', value: '1' }
      ]
    },
    
  ];
  
const isFormValid = ref(true);

const form = useForm({
  answers: Object.fromEntries([...Array(50)].map((_, i) => [`answers${i + 1}`, '']))
});

// const submitForm = () => {
//   form.post(route('member.tests.store'), {
//     preserveState: true,
//     preserveScroll: true,
//   });
// };


const submitForm = () => {
  console.log('送信するデータ:', form.answers);
  form.post(route('member.tests.store'), {
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