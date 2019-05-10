<template>
  <div class="FileSubmit">
    <Upload
      class="uploadFiled"
      multiple
      ref="upload"
      type="drag"
      action="http://b.rebright.top/fileSystem.php"
      :max-size="204800"
      :on-exceeded-size="handleMaxSize"
      :format="['doc', 'docx', 'pdf', 'rar', '7z', 'zip']"
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
    <div
      class="uploadList"
      v-if="file.length !== 0"
      v-for="(item,index) in file"
    >上传文件: {{ file[index].name }}</div>
    <div class="information">
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
    </div>
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
      userID: "",
      username: "",
      file: [], // 总文件List
      uploadFile: [], // 需要上传的文件List
      loadingStatus: false
    };
  },
  methods: {
    handleUpload(file) {
      // 随机生成 keyid 值，方便后面删除操作
      let keyID = Math.random()
        .toString()
        .substr(2);
      file["keyID"] = keyID;
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
      this.file = [];
      for (let i = 0; i < this.uploadFile.length; i++) {
        let exName = this.uploadFile[i].name.split(".");
        let newName =
          this.userID + "" + this.username + "." + exName[exName.length - 1];
        this.$refs.upload.post(this.uploadFile[i]);
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
  width: 15%;
  margin: 20px 10px 0;
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
