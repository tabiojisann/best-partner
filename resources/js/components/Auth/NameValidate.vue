<template>
  <div>
    <div class="form-group">
      <label for="userName" class="font-weight-light" >ユーザー名</label>
      <input type="text" id="name" name="name" v-model="name" class="form-control" placeholder="12文字以内" required
      @blur="check" />
      <small :class="{ 'text-danger' : errorRequire,  'd-none' : hideRequire }">入力必須です</small>
      <small :class="{ 'text-danger' : errorMax,  'd-none' : hideMax }">12文字以下で指定してください</small>
    </div>
  </div>
</template>

<script>
export default {

    data: () => ({
      name: '',
      hideRequire:  true,
      hideMax: true,
      errorRequire:  false,
      errorMax: false,
    }),

  

    methods: {
      check() {

        if(!this.name){
          this.hideRequire = false
          this.errorRequire = true
        } else {
          this.hideRequire = true
          this.errorRequire = false
        }

        if(this.name.length > 12) {
          this.hideMax = false
          this.errorMax = true
        } else {
          this.hideMax = true
          this.errorMax = false
        }

      },

    }


}
</script>

<style scoped>
  li {
    list-style: none;
  }
</style>

