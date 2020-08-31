<template>

  <div class="file-upload-wrapper row"
      @dragenter="OnDragEnter"
      @dragleave="OnDragLeave"
      @dragover.prevent
  
      :class="{ dragging: isDragging }">

      <div v-show="!images.length">
        <div class="card card-body view fileupload has-preview col-12">
          <div class="card-text file-upload-message text-center">
            <label for="file" class="label">
              <i :class="fileIcon" class="icon"></i>
              <p class="mt-2">ファイルをドラッグまたはドロップ</p>
            </label>
            <input type="file" id="file" name="image" class="d-none" @change="onChangeInput" multiple>
          </div>
        </div>
      </div>

      <div class="images-preview　" v-show="images.length">
        <div class="img-wrapper" v-for="(image, index) in images" :key="index">
          <img src="image " alt="`Image Uploader ${index}`">
            <div class="details">
              <span class="name" v-text="files[index].name"></span>
              <span class="size" v-text="files[index].size"></span>
            </div>
        </div>

      </div>
  </div>

  

</template> 

<script>
export default {


  data: () => ({
    isDragging: false,
    dragCount: 0,
    files: [],
    images: []
  }),

  computed: {
      fileIcon() {
        return this.isDragging
        ? "fas fa-cloud-upload-alt blue-text"
        : "fas fa-cloud-upload-alt grey-text"
      }
  },

  methods: {

    OnDragEnter(e) {
      e.preventDefault();
      
      this.isDragging = true;
    },

    OnDragLeave(e) {
      e.preventDefault();

    
      if(this.dragCount <= 0) {
          this.isDragging = false;
      }
    },

    onChangeInput(e) {
      const files = e.target.files;

      Array.from(files).forEach(file => this.addImage(file));
      e.preventDefault();
    },

    OnDrop(e) {
      e.preventDefault();
      e.stopPropagation();

      this.isDragging = false;
      
      const files = e.dataTransfer.files;

      console.log(files);   
      Array.from(files).forEach(file => this.addImage(file));
    },

    addImage(file) {
      if(!file.type.match('image.*')) {
        console.log(`${file.name} is not an image`);
        return;
      }

      this.files.push(file);

      const img    = new Image(),
            reader = new FileReader();
      
      reader.onload = (e) => this.images.push(e.target.result);
      reader.readAsDataURL(file);

    }
  }

}
</script>





