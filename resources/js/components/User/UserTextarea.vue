<template>

  <div>

    <div class= "row border-top" >

      <div class="col-6 col-md-6 my-5">
        <div class="form-group shadow-textarea">
          <textarea name="PR" v-model="PR" tabindex="30" cols="70" rows="30" placeholder="本文" class="form-control z-depth-2 editor"></textarea>
        </div>
      </div>

<!--     
      <div class="col-6 col-md-6 mt-5">
        <div class="form-group shadow-textarea">
          <textarea  name="" id="" cols="70" rows="30" placeholder="プレビュー" class="form-control z-depth-2 bg-white editor" disabled></textarea>
        </div>
      </div>  -->

    </div>

    <div class="d-flex justify-content-center border-top fixed-bottom  blue lighten-3">
      <input type="submit" class="btn btn-light-green px-5" value="更新">
    </div>


  </div>

</template>

<script>
export default {
  props: {
    user: {
      type: String,
    },

    markBody: {
      type: String,
    }
  },

  data() {
    return {
      PR: this.user,
      parseText: this.markBody,
      html: ''
 
      
    }
  },

  methods: {
    parsePR: function(html) {
      this.html = html
    }
  }


}

</script>

<style scoped>
  /* .editor {
    overflow: hidden scroll;
  } */

</style>