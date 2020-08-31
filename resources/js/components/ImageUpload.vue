<template>

  <div class="image-uploader">
    <div class="input-button text-center">
      <label for="file" class="btn btn-blue-grey btn-sm">
        <p class="mt-3">写真を選択してください</p>
        <input type="file" id="file" ref="file" name="image" class="d-none" @change="setImage"/>
      </label>
    </div>

    <div class="preview text-center">
      <img :src="data.image" alt="" height="100" width="300">
    </div>
  </div>

</template>
<script>
export default {
  data() {
    return {
      data: {
        image: "",
        name: "",
      }
    };
  },
  methods: {
    setImage(e) {
      const files = this.$refs.file;
      const fileImg = files.files[0];
      if (fileImg.type.startsWith("image/")) {
        this.data.image = window.URL.createObjectURL(fileImg);
        this.data.name = fileImg.name;
        this.data.type = fileImg.type;
      }
    },

  }
};
</script>

<style scoped>
  .preview {
    border: dashed 1px; 
    position: relative;
    margin: 0 auto;
    height: 300px;
    width: 300px;
  }
  
</style>