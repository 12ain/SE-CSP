<template>
  <div class="Login">
    <Form ref="formInline" :model="formInline">
      <FormItem prop="user">
        <Input type="text" v-model="formInline.user" placeholder="管理员用户名">
          <Icon type="ios-person-outline" slot="prepend"></Icon>
        </Input>
      </FormItem>
      <FormItem prop="password">
        <Input type="password" v-model="formInline.password" placeholder="管理员密码">
          <Icon type="ios-lock-outline" slot="prepend"></Icon>
        </Input>
      </FormItem>
      <FormItem>
        <Button type="primary" @click="handleSubmit('formInline')">登陆</Button>
      </FormItem>
    </Form>
  </div>
</template>
<script>
import { mapState, mapMutations } from "vuex";
export default {
  name: "Login",
  data() {
    return {
      formInline: {
        user: "",
        password: ""
      }
    };
  },
  computed: {
    ...mapState(["auth"])
  },
  methods: {
    ...mapMutations(["changeAuth"]),
    handleSubmit(name) {
      this.$refs[name].validate(valid => {
        if (valid) {
          this.changeAuth();
          this.$Message.success("登陆成功");
          setTimeout(() => {
            this.$router.push({ path: "/admin" });
          }, 1000);
        } else {
          this.$Message.error("登陆失败");
        }
      });
    }
  }
};
</script>

<style scoped>
.Login {
  margin: 10px;
}
.Login * {
  margin-bottom: 5px;
}
</style>
