<template>
  <div class="FileSubmit">
    <Upload
      class="uploadFiled"
      multiple
      ref="upload"
      type="drag"
      action="http://localhost/ex/upload.php"
      :max-size="204800"
      :on-exceeded-size="handleMaxSize"
      :format="['doc', 'docx', 'pdf', 'rar', '7z', 'zip', 'png']"
      :on-format-error="handleFormatError"
      :before-upload="handleUpload"
      :on-success="uploadSuccess"
      :on-error="uploadError"
    >
      <div style="padding: 20px 0">
        <Icon type="ios-cloud-upload" size="100" style="color: #004465"></Icon>
        <p>点 击 或 拖 拽 文 件 进 行 上 传</p>
      </div>
    </Upload>
    <div v-if="file.length !== 0">
        <div
          class="uploadList"
          v-for="(item,index) in file"
          :key="item"
        >上传文件: {{ file[index].name }}</div>
    </div>
    
    <!-- <div class="information">
      <Input
        prefix="ios-finger-print"
        size="large"
        placeholder="请输入学号"
        style="width: auto"
        v-model="userID"
      />
      <br>
      <Input
        prefix="ios-contact"
        size="large"
        placeholder="请输入姓名"
        style="width: auto"
        v-model="username"
      />
    </div>-->
    <div class="submit">
      <Button
        type="success"
        size="large"
        @click="upload"
        :loading="loadingStatus"
      >{{ loadingStatus ? '上传中' : '提交' }}</Button>
      <Button type="error" size="large" @click="reset">重置</Button>
    </div>
  </div>
</template>

<script>
export default {
  name: "FileSubmit",
  data() {
    return {
      userID: "201602505111",
      username: "王小明",
      file: [], // 总文件List
      uploadFile: [], // 需要上传的文件List
      loadingStatus: false,
      regUserID: /^201602505\d{3}$/,
      regFileName: /^201602505\d{3}_[\u4e00-\u9fa5]{2,3}.(zip|rar|7z|doc|docx)$/,
      formData: new FormData()
    };
  },
  methods: {
    handleUpload(file) {
      this.file.push(file);
      this.uploadFile.push(file);
      // 阻止默认事件
      return false;
    },
    handleFormatError(file) {
      this.file = [];
      this.uploadFile = [];
      this.$Message.success("不支持文件上传格式");
    },
    handleMaxSize(file) {
      this.file = [];
      this.uploadFile = [];
      this.$Message.success("文件大小超出限制范围");
    },
    delectFile(keyID) {
      // 未使用方法
      // 删除总展示文件里的当前文件
      this.file = this.file.filter(item => {
        return item.name != name;
      });
      // 删除需要上传文件数据里的当前文件
      this.uploadFile = this.uploadFile.filter(item => {
        return item.KeyID != keyID;
      });
    },
    upload() {
      // if (!this.userID || !this.username) {
      //   this.$Message.warning("学号或用户名为空");
      //   return false;
      // } else if (!this.regUserID.test(this.userID)) {
      //   this.$Message.warning("请输入完整学号");
      //   return false;
      // }
      this.file = [];
      if (this.uploadFile.length > 1) {
        this.$Message.error({
          content: "多文件上传功能未开通",
          duration: 1
        });
        this.reset();
        return;
      }
      for (let i = 0; i < 1; i++) {
        // let exName = this.uploadFile[i].name.split(".");
        // let newName =
        //   this.userID + "" + this.username + "." + exName[exName.length - 1];
        // this.formData.append("file", this.uploadFile[i]);
        // this.formData.append("newName", newName);
        // this.formData.forEach(v => console.log(v));

        // if (!this.regFileName.test(this.uploadFile[i].name)) {
        //   this.$Message.error({
        //     content: "文件由完整学号+姓名+后缀名组成，如201602505000张三.rar",
        //     duration: 3
        //   });
        // } else {
          this.$refs.upload.post(this.uploadFile[i]);
        // }
      }
    },
    reset() {
      this.userID = "";
      this.username = "";
      this.file = [];
      this.uploadFile = [];
    },
    uploadSuccess(res, file, fileList) {
      //上传成功后删除待上传文件
      setTimeout(() => {
        this.reset();
        this.loadingStatus = false;
        this.$Message.success("上传成功");
      }, 1500);
    },
    uploadError(err, file, fileList) {
      setTimeout(() => {
        this.reset();
        this.loadingStatus = false;
        this.$Message.warning("上传失败");
      }, 1500);
    },
    sendMsg() {
      // 带参上传，搁置
      this.axios
        .post("/fileSystem.php", {
          userID: this.formData,
          username: this.username
        })
        .then(Response => {
          console.log(Response)
          if (Response.data == 200) {
            this.$Message.success("上传成功");
          } else {
            this.$Message.error("上传失败");
          }
        })
        .catch(error => {
          this.$Message.error("未知错误");
        });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.information * {
  margin: 20px 0 0;
}
.submit * {
  width: 20%;
  margin: 35px 10px 0;
}
.uploadFiled {
  margin: 10px auto 0;
  width: 50%;
}
.uploadList {
  margin-top: 10px;
  font-size: 20px;
}
p {
  font-size: 25px;
  font: #004465;
}
</style>
