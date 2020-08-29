<template>

  <div class="file-upload-wrapper row"
      @dragenter="OnDragEnter"
      @dragleave="OnDragLeave"
      @dragover.prevent
      @drop="OnDrop"
      :class="{ dragging: isDragging }">
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

</template> 

<script>
export default {


  data: () => ({
    isDragging: false,
    dragCount: 0,
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
      
      this.dragCount++;
      this.isDragging = true;
    },

    OnDragLeave(e) {
      e.preventDefault();

      this.dragCount--;

      if(this.dragCount <= 0) {
          this.isDragging = false;
      }
    },

    onChangeInput(e) {
      e.preventDefault();

      this.isDragging = true
    },

    OnDrop(e) {
      console.log(e);
    }

  }

}
</script>





