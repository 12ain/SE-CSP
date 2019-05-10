<template>
  <div class="Main">
    <p>{{ msg }}</p>
    <FileSubmit v-if="isOpen"></FileSubmit>
    <Pause v-else></Pause>
  </div>
</template>

<script>
import FileSubmit from "./FileSubmit";
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
    FileSubmit,
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
</style>
