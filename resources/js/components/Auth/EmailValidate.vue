<template>
  <div>
    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="text" id="email" name="email" class="form-control" placeholder="@を含む有効なメールアドレス" required
      v-model="email" @blur="check">
      <small :class="{'text-danger' : errorRequire, 'd-none' : hideRequire }">入力必須です</small>
      <small :class="{'text-danger' : errorValid, 'd-none' : hideValid }">有効なメールアドレスを入力してください</small>
      <!-- <small></small> -->
    </div> 
  </div>
</template>

<script>
export default {
  data: () => ({
      email: '',
      errorRequire: false,
      hideRequire:  true,
      errorValid:   false,
      hideValid:    true,
  }),

  methods: {
    check() {
        if(!this.email) {
          this.errorRequire = true;
          this.hideRequire = false;
        } else {
          this.errorRequire = false;
          this.hideRequire = true;
        }
        
        if (!this.validEmail(this.email)) {
          this.errorValid = true;
          this.hideValid  = false;
        } else {
          this.errorValid = false;
          this.hideValid  = true;
        }
    },

    validEmail: function (email) {
      const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return regex.test(email);
    }
  }
  
}
</script>

<style>

</style>