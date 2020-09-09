<template>

<div>

  <div class="form-group">
    <label for="password" class="font-weight-light">パスワード</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="半角英数字を8文字以上" required
    v-model="password" @blur="check">
    <small :class="{ 'text-danger' : errorMax, 'd-none' : hideMax }" >8文字以上入力必須です</small>
    <small :class="{ 'text-danger' : errorValid, 'd-none' : hideValid }" >半角英数字が有効です</small>
  </div>

</div>

</template>

<script>
export default {
    data: () => ({
       password: '',
       errorMax:     false,
       hideMax:      true ,
       errorValid:   false,
       hideValid:   true,
    }),

    methods: {
      check() {   
        if(this.password.length <= 8) {
          this.errorMax = true
          this.hideMax  = false
        } else {
          this.errorMax = false
          this.hideMax  = true
        }

        if(!this.validPassword(this.password)) {
          this.errorValid = true
          this.hideValid = false
        } else {
          this.errorValid = false
          this.hideValid = true
        }

      },

      validPassword: function (password) {
        const regexPass = /^[a-zA-Z0-9]+$/;
        return regexPass.test(password);
      }

    },




}
</script>

<style>

</style>