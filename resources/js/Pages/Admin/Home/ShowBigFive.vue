<template>
  <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-center mb-6">{{ member.name }}の診断結果</h1>
    
    <!-- BigFive結果 -->
    <div v-if="bigFive">
      <h2 class="text-xl font-semibold mb-4">BigFive結果</h2>
      <table class="min-w-full bg-white mb-6">
        <thead>
          <tr>
            <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold">特性</th>
            <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold">スコア</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(result, index) in formattedBigFive" :key="index" class="border-b">
            <td class="py-2 px-4">{{ result.trait }}</td>
            <td class="py-2 px-4">
              <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                  <div
                    :class="progressBarColor(result.value)"
                    :style="{ width: result.value * 20 + '%' }"
                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center"
                  ></div>
                </div>
                <span class="text-sm ml-2">{{ result.value }}%</span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else class="text-center text-gray-600 mt-6">
      <p>BigFive結果が見つかりません。</p>
    </div>

    <!-- Chronotype結果 -->
    <div v-if="Chronotype" class="mt-8">
      <h2 class="text-xl font-semibold mb-4">クロノタイプ</h2>
      <p>{{ determineChronotype(Chronotype.result) }}</p>
    </div>
    <div v-else class="text-center text-gray-600 mt-6">
      <p>クロノタイプ結果が見つかりません。</p>
    </div>
  

    <!-- HSP結果 -->
    <div v-if="Style" class="mt-8">
        <h2 class="text-xl font-semibold mb-4">HSP</h2>
        <p>{{ determineStyle(Style.result) }}</p>
    </div>
    <div v-else class="text-center text-gray-600 mt-6">
      <p>HSPの結果が見つかりません。</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    member: Object,
    bigFive: Object,
    Chronotype: Object, 
    Style: Object,
  },
  computed: {
    formattedBigFive() {
      return [
        { trait: '開放性 (Openness)', value: this.bigFive.formatted_results.openness },
        { trait: '協調性 (Agreeableness)', value: this.bigFive.formatted_results.agreeableness },
        { trait: '外向性 (Extraversion)', value: this.bigFive.formatted_results.extraversion },
        { trait: '誠実性 (Conscientiousness)', value: this.bigFive.formatted_results.conscientiousness },
        { trait: '神経症傾向 (Neuroticism)', value: this.bigFive.formatted_results.neuroticism },
      ];
    },
  },
  methods: {
    progressBarColor(value) {
      if (value >= 4) return 'bg-green-500';
      if (value >= 3) return 'bg-blue-500';
      if (value >= 2) return 'bg-yellow-500';
      return 'bg-red-500';
    },
    determineChronotype(sum) {  // クロノタイプを判断するメソッド
      if (sum >= 19 && sum <= 32) {
        return 'ライオン（朝）型';
      } else if (sum >= 33 && sum <= 47) {
        return 'クマ（昼）型';
      } else if (sum >= 48 && sum <= 61) {
        return 'オオカミ（夜）型';
      } else {
        return '診断結果が範囲外です。';
      }
    },
    determineStyle(sum) {  // HSPを判断するメソッド
      if (sum >= 19 && sum <= 63) {
        return 'HSPレベルは低く、強い刺激にも影響を受けにくい傾向がある。';
      } else if (sum >= 64 && sum <= 116) {
        return 'HSPレベルは中くらいで、一般的な感性刺激に対して適度に反応する傾向がある。';
      } else if (sum >= 117 && sum <= 133) {
        return 'HSPレベルが高く、繊細な刺激にも敏感に反応しやすい傾向がある。';
      } else {
        return '診断結果が範囲外です。';
      }
    },
  },
}
</script>
