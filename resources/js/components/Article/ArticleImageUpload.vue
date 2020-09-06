<template>

  <div class="image-uploader">
    
    <div class="preview text-center" v-if="!this.article.image">
      <img :src="this.data.image" alt="" height="300" width="300" class="mt-2">
      <span class="text-danger h5"  v-if="this.data.image" @click="resetFile()">削除</span>
    </div>

    <div class="input-button text-center">
      <label for="file" class="btn-floating btn-lg lighten-1 mt-0 ">
        <div class="btn blue-gradient btn-sm">
          <span><i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>画像を選択してください</span>
        </div>
      </label>
    </div>

    <input  type="file" id="file" ref="file" name="image"  value="" class="d-none" @change="setImage"/>

  </div>

</template>

<script>
export default {
  props: {
   article: {
     type: Object
   },
  },

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
      input.type = 'text';
      input.type = 'file';
      this.data.image = '';
    },

    dropFile(e) {
       this.$refs.image.remove();
    },

    check(e) {
      console.log(articleJson);
    }

  }
};
</script>

<style scoped>
  .preview {
    border: dashed 5px rgb(211, 211, 211); 
    position: relative;
    margin: 0 auto;
    height: 350px;
    width: 330px;
  }
</style>