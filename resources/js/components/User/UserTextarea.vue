<template>

  <div>

    <div class= "row border-top" >

      <div class="col-6 col-md-6 my-5">
        <div class="form-group shadow-textarea">
          <textarea name="PR" v-model="PR" tabindex="30" cols="70" rows="50" placeholder="本文" class="form-control z-depth-2 editor"></textarea>
        </div>
      </div>

      <div class="col-6 col-md-6 mt-5">
        <div class="form-group shadow-textarea">
          <textarea :value="PR" name="" id="" cols="70" rows="50" placeholder="プレビュー" class="form-control z-depth-2 bg-white" disabled></textarea>
        </div>
      </div> 

    </div>

    <div class="d-flex justify-content-center border-top fixed-bottom  bg-light">
      <input type="submit" class="btn btn-light-green px-5" value="更新">
    </div>

  </div>

</template>

<script>
export default {
  props: {
    user: {
      type: String,
    }
  },

  data() {
    return {
      PR: this.user
    }
  },

}

</script>

<style scoped>


</style>