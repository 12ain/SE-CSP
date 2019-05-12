<template>
  <div class="DeadLine">
    <p>{{nDay}}天{{nHour}}小时{{nMinute}}分钟{{nSecond}}秒</p>
  </div>
</template>
<script>
export default {
  name: "DeadLine",
  data() {
    return {
      time3: new Date(),
      runTimes: 0,
      nDay: 0,
      nHour: 0,
      nMinute: 0,
      nSecond: 0
    };
  },
  mounted() {
    // 第一秒问题
    this.getRunTime();
    this.timer = setInterval(() => {
      this.getRunTime();
    }, 1000);
  },
  methods: {
    getRunTime() {
      var duration = (this.time3 - this.runTimes) * 1000;
      this.nDay = Math.floor(duration / (1000 * 60 * 60) / 24);
      this.nHour = Math.floor(duration / (1000 * 60 * 60)) % 24;
      this.nMinute = Math.floor(duration / (1000 * 60)) % 60;
      this.nSecond = Math.floor(duration / 1000) % 60;
      if (
        this.nDay == 0 &&
        this.nHour == 0 &&
        this.nMinute == 0 &&
        this.nSecond == 0
      ) {
        console.log("end");
      } else {
        this.runTimes++;
      }
    }
  }
};
</script>

<style scoped>
.DeadLine {
  margin: 10px;
}
.DeadLine p {
  font-size: 15px;
  color: #004465;
}
</style>
