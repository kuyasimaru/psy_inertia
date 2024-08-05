<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
 validationRules: Object,
 validationMessages: Object,
});
  

  const questions = [
    {
      text: "次の日になにも予定がなくて何時に起きてもかまわないとしたら、あなたは何時に起きますか？",
      options: [
        { label: '6:30より前', value: '1' },
        { label: '6:30~8:45の間', value: '2' },
        { label: '8:45より後', value: '3' }
      ]
    },
    {
      text: "特定の時間に起きなければならないとしたら、あなたは目覚まし時計を使いますか？",
      options: [
        { label: '目覚まし時計は使わず、起きたいと思った時間に起きることができる', value: '1' },
        { label: '目覚まし時計は使うが、スヌーズ機能は必要ない', value: '2' },
        { label: '目覚まし時計を使うし、スヌーズ機能は必須。できればアラームを2〜3個はセットしたい', value: '3' }
      ]
    },
    {
      text: "週末は何時に起きますか？",
      options: [
        { label: '平日と同じ', value: '1' },
        { label: '平日より45〜89分ほど遅い', value: '2' },
        { label: '平日より90分以上遅い', value: '3' }
      ]
    },
    {
      text: "あなたにとって時差ボケはどのような感覚ですか？",
      options: [
        { label: 'いつまでたっても時差ボケが治らない', value: '1' },
        { label: '48時間もあれば改善する', value: '2' },
        { label: 'たいていすぐに改善する', value: '3' }
      ]
    },
    {
      text: "1日で一番好きな食事の時間は？",
      options: [
        { label: '朝食', value: '1' },
        { label: '昼食', value: '2' },
        { label: '夜食', value: '3' }
      ]
    },
    {
      text: "もし学生時代にもどってセンター試験を受けねばならないとしたら、テストの開始時間はいつがいいですか？",
      options: [
        { label: '朝頃', value: '1' },
        { label: '昼過ぎ', value: '2' },
        { label: '15～16時頃', value: '3' }
      ]
    },
    {
      text: "激しい運動をしなければならないとしたら、何時ごろを選びますか？",
      options: [
        { label: '8:00より前', value: '1' },
        { label: '8:00~16:00の間', value: '2' },
        { label: '16:00より後', value: '3' }
      ]
    },
    {
      text: "1日のうちもっとも集中できるのはいつですか？",
      options: [
        { label: '起きてから1〜2時間後', value: '1' },
        { label: '起きてから2〜4時間後', value: '2' },
        { label: '起きてから4〜6時間後', value: '3' }
      ]
    },
    {
      text: "1日の労働時間が5時間だけだとしたら、どの時間帯に働きたいですか？",
      options: [
        { label: '4:00〜9:00', value: '1' },
        { label: '9:00〜14:00', value: '2' },
        { label: '16:00〜21:00', value: '3' }
      ]
    },
    {
      text: "自分の思考タイプは、以下のどれに当てはまると思いますか？",
      options: [
        { label: '分析と論理的な思考がうまい    ', value: '1' },
        { label: '論理と直感をあわせ持つバランス型', value: '2' },
        { label: '直感と創造的な思考がうまい', value: '3' }
      ]
    },
    {
      text: "昼寝をしますか？するとどうなりますか？",
      options: [
        { label: 'まったくしない', value: '1' },
        { label: '仕事がないときにときどきする', value: '2' },
        { label: '昼寝をすると夜まで元気でいられる', value: '3' }
      ]
    },
    {
      text: "2時間の激しい肉体労働をしなければならないとしたら（重い家具の移動など）、もっとも効率的に動ける時間帯はいつだと思いますか？",
      options: [
        { label: '8:00〜10:00', value: '1' },
        { label: '11:00〜13:00', value: '2' },
        { label: '18:00〜20:00', value: '3' }
      ]
    },
    {
      text: "あなたの健康意識は、以下のどれに当てはまると思いますか？",
      options: [
        { label: 'いつも健康的な食事や運動を実践している', value: '1' },
        { label: 'ときどき健康的な食事や運動を実践している', value: '2' },
        { label: '健康的な食事や運動を実践するのは難しい', value: '3' }
      ]
    },
    {
      text: "リスクを取ることに対して、どれぐらい不安になりますか？",
      options: [
        { label: '不安はあまりない', value: '1' },
        { label: 'まぁまぁ不安がある', value: '2' },
        { label: 'かなりの不安がある', value: '3' }
      ]
    },
    {
      text: "あなたは以下のどのタイプですか？",
      options: [
        { label: '未来志向で、明確な目標と大きなプランを持っている', value: '1' },
        { label: '過去に学び、未来に希望を持ち、現在を生きる情熱を大事にしている', value: '2' },
        { label: 'つねに現在志向で、いまの幸福を大事にしている  ', value: '3' }
      ]
    },
    {
      text: "学生時代、あなたはどんなタイプでしたか？",
      options: [
        { label: '人気者', value: '1' },
        { label: '真面目', value: '2' },
        { label: '怠け者', value: '3' }
      ]
    },
    {
      text: "朝起きたらどのような感じですか？",
      options: [
        { label: '起きてすぐシャキシャキ行動できる', value: '1' },
        { label: 'ボーっとするが寝床から出られないほどではない', value: '2' },
        { label: '完全にフラフラで目を開くのも一苦労', value: '3' }
      ]
    },
    {
      text: "起きて30分後の食欲はどのような状態ですか？",
      options: [
        { label: 'かなりの空腹', value: '1' },
        { label: 'やや空腹', value: '2' },
        { label: '全くお腹が空かない', value: '3' }
      ]
    },
    {
      text: "夜眠れないことがどれぐらいありますか？",
      options: [
        { label: 'ほとんどない。海外旅行で時差ボケしたときぐらい', value: '1' },
        { label: 'あまりないが、ストレスが強いときには眠れなくなる', value: '2' },
        { label: '慢性的に不眠', value: '3' }
      ]
    },
    {
      text: "人生の満足度はどれぐらいですか？",
      options: [
        { label: '高い', value: '1' },
        { label: '普通に良い', value: '2' },
        { label: '低い', value: '3' }
      ]
    },
    
  ];
  
const isFormValid = ref(true);

const form = useForm({
  answersB: Object.fromEntries([...Array(20)].map((_, i) => [`answersB${i + 1}`, '']))
});

// const submitForm = () => {
//   form.post(route('member.tests.store'), {
//     preserveState: true,
//     preserveScroll: true,
//   });
// };


const submitForm = () => {
  console.log('送信するデータ:', form.answersB);
  form.post(route('member.tests.chronotypestore'), {
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
            v-model="form.answersB[`answersB${index + 1}`]"
            :rules="[(v) => !!v || props.validationMessages[`answersB${index + 1}.required`]]"
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