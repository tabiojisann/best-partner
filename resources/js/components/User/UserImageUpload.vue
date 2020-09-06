<template>
  <div class="image-uploader">
    <div class="row">
      
      <div class="d-flex justify-content-center col-12">
        <div class="preview text-center" v-if="!this.user.image">
          <img :src="this.data.image" alt="" class="img mt-1">
          <span class="text-danger h5" v-if="this.data.image" @click="resetFile()">リセット</span>
        </div>
      </div>
      
    
      <div class="d-flex justify-content-around col-12" v-if="this.user.image">
        <div class="preview text-center" v-if="this.user.image">
          <img :src="this.user.image" alt="" class="img mt-1">
        </div>

        <i class="fas fa-arrow-alt-circle-right h2 px-2 arrow"></i>

        <div class="preview text-center">
          <img :src="this.data.image" alt="" class="img mt-1">
          <span class="text-danger h5" v-if="this.data.image" @click="resetFile()">リセット</span>
        </div>

      </div>
    
      <div class="input-button text-center col mt-3 ">
        <label for="file" class="btn-floating btn-lg lighten-1 mt-0 ">
          <div class="btn blue-gradient btn-sm">
            <span><i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>画像を選択してください</span>
          </div>
        </label>
      </div>

      <input  type="file" id="file" ref="file" name="image"  value="" class="d-none" @change="setImage"/>

    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object
    }
  },

  data() {
    return {
      data: {
        image: '',
        text: '',
        name: '',
      }
    }
  },

  methods: {
    setImage(e) {
      const file = (e.target.files || e.dataTransfer.file)[0]
      if (file.type.startsWith("image/")) {
        this.data.image = window.URL.createObjectURL(file);
        this.data.name  = file.name
        this.data.type  = file.type
      }
    },

    resetFile(e) {
      const input = this.$refs.file
      input.type  = 'text',
      input.type  = 'file',
      this.data.image = ''
    }
  }
}
</script>

<style scoped>

  @media (min-width:768px) {
    .preview { 
      border: dashed 5px rgb(211, 211, 211); 
      position: relative;
      margin: 0 auto;
      height: 200px;
      width: 200px;
    }

    .img {
      height: 180px;
      width: 180px;
    }

    .arrow {
      margin-top: 90px;
    }
  }

  @media (max-width:767px) {
    .preview { 
      border: dashed 5px rgb(211, 211, 211); 
      position: relative;
      margin: 0 auto;
      height: 120px;
      width: 120px;
    }

    .img {
      height: 100px;
      width: 100px;
    }

    .arrow {
    margin-top: 50px;
    }
  }

</style>
