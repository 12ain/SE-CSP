<template>
  <div class="Main">
    <p>{{ msg }}</p>
    <Login class="login"></Login>
    <div v-if="isOpen">
      <DeadLine class="deadLine"></DeadLine>
      <FileSubmit></FileSubmit>
    </div>
    <Pause v-else></Pause>
  </div>
</template>

<script>
import Login from "./Login";
import FileSubmit from "./FileSubmit";
import DeadLine from "./DeadLine";
import Pause from "./Pause";
export default {
  name: "Main",
  props: {
    msg: String
  },
  data() {
    return {
      isOpen: true
    };
  },
  components: {
    Login,
    FileSubmit,
    DeadLine,
    Pause
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.Main p {
  font-size: 30px;
  font-weight: 600;
  margin: 0 auto;
}
.login {
  position: absolute;
  top: 0;
  right: 0;
}
</style>
