<template>
  <div class="Pause">
    <p>本次提交已截止</p><br>
    <p>请自行发送至老师的邮箱{{ email }}</p>
  </div>
</template>

<script>
export default {
  name: "Pause",
  data() {
    return {
      email: "624981568@qq.com"
    };
  }
};
</script>

<style scoped>
.Pause {
  margin: 30px 0;
}
.Pause p {
  font-size: 24px;
  color: #ff2929;
}
</style>
