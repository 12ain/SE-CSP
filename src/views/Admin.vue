<template>
  <div class="About">
    <h1>后台管理页面</h1>
    <DatePicker :value="endDate" confirm type="date" placeholder="选择截止日期" style="width: 200px"></DatePicker>
    <br>
    <TimePicker
      :value="endTime"
      confirm
      type="time"
      format="HH:mm"
      placeholder="选择截止时间"
      placement="top-end"
      style="width: 200px"
    ></TimePicker>
    <br>
    <Button type="success" size="large" @click="submit">提交</Button>
  </div>
</template>

<script>
export default {
  name: "About",
  data() {
    return {
      endDate: "",
      endTime: ""
    };
  },
  methods: {
    selectData() {
      if (this.endDate != "" && this.endTime != "") {
        axios
          .post("", {
            yearMonth: time
          })
          .then(res => {
            this.updateBill({
              billList: res.data.billList,
              totalIncome: res.data.totalIncome,
              totalPay: res.data.totalPay
            });
          })
          .catch();
      }
    }
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

