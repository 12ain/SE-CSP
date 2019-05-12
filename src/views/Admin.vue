<template>
  <div class="About">
    <h1>后台管理页面</h1>
    <DatePicker confirm  type="date" placeholder="选择截止日期" style="width: 200px"></DatePicker>
    <br>
    <TimePicker confirm  type="time" format="HH:mm" placeholder="选择截止时间" placement="top-end" style="width: 200px"></TimePicker>
    <br>
    <Button type="success" size="large">提交</Button>
  </div>
</template>

<script>
export default {
  name: "About",
  data() {
    return {};
  }
};
</script>

<style scoped>
.About {
  margin: 50px;
}
.About * {
  margin-bottom: 10px;
}
</style>

