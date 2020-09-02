<template>

  <div class="image-uploader">

    <div class="preview text-center">
      <img :src="this.data.image" alt="" height="290" width="290">
      <span class="text-danger h5"  v-if="this.data.image" @click="resetFile()">削除</span>
    </div>

    <div class="input-button text-center">
      <label for="file" class="btn-floating btn-lg lighten-1 mt-0 ">
        <div class="btn blue-gradient btn-sm">
          <span><i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>画像を選択してください</span>
          
        </div>
      </label>
     
    </div>
     <input type="file" id="file" name="image" value="" class="" @change="setImage"/>
  </div>

</template>

<script>
export default {
  data() {
    return {
      data: {
        text: '',
        image: '',
        name: '',
      }
    };
  },
  methods: {
    setImage(e) {
      const file = (e.target.files || e.dataTransfer.file)[0]
      if (file.type.startsWith("image/")) {
        this.data.image = window.URL.createObjectURL(file);
        this.data.name = file.name;
        this.data.type = file.type;
      }
    },

    resetFile(e) {
      const input = this.$refs.file;
      this.data.type = 'text';
      this.data.type = 'file';
      this.data.image = '';
      
    }

  }
};
</script>

<style scoped>
  .preview {
    border: dashed 1px; 
    position: relative;
    margin: 0 auto;
    height: 320px;
    width: 300px;
  }

  
</style>