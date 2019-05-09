<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <Upload
        multiple
        type="drag"
        action="http://l.rebright.top/fileSystem.php">
        <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="100" style="color: #3399ff"></Icon>
            <p>Click or drag files here to upload</p>
        </div>
    </Upload>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
p {
  font-size: 36px
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
