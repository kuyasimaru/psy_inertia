<template>
    <div>
      <h1>診断結果</h1>
      <p>{{ message }}</p>
      <p v-if="status === 'success'">{{ displayResult }}</p>
      <p v-else>{{ status }}</p>
    </div>
  </template>
<script>
export default{
    props : {
        result: Object,
        message: String,
        status: String
    },
    computed: {
        displayResult(){
            const sum = this.result.result;
            if(sum >=19 && sum<=32){
                return 'ライオン（朝）型';
            } else if (sum >= 33 && sum <= 47) {
                return 'クマ（昼）型';
            } else if (sum >= 48 && sum <= 61) {
                return 'オオカミ（夜）型';
            } else {
                return '診断結果が範囲外です。';
            }
        }
    }
}
</script>