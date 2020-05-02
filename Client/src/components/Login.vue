<template>
  <div class="Login">
    <Form ref="formInline" :model="formInline">
      <FormItem prop="user">
        <Input type="text" v-model="formInline.userName" placeholder="管理员用户名">
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
        userName: "",
        password: ""
      }
    };
  },
  computed: {
    ...mapState(["auth"])
  },
  methods: {
    ...mapMutations(["changeAuth"]),
    handleSubmit() {
      this.axios
        .post("/login_process.php", {
          userName: this.formInline.userName,
          password: this.formInline.password
        })
        .then(Response => {
          if (Response.data == 200) {
            this.changeAuth();
            this.$Message.success("登陆成功");
            setTimeout(() => {
              this.$router.push({ path: "/admin" });
            }, 500);
          } else {
            this.$Message.error("账号或密码错误");
          }
        })
        .catch(error => {
          this.$Message.error("未知错误");
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
