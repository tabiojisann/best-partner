<template>
  <div class="form-group" id="useruser">
      <label for="userName" class="font-weight-light" >ユーザー名(12文字以内)</label>
      <input type="text" id="name" name="name" v-model="name" class="form-control" required 
      @blur="textValue"/>
      <ul>
        <li :class="{ 'text-danger' : error,  'd-none' : empty }">入力必須です</li>
        <li :class="{ 'text-danger' : error2,  'd-none' : empty2 }">12文字以下で指定してください</li>
      </ul>
  </div>
</template>

<script>
export default {
    data: () => ({
      name:   '',
      empty:  true,
      error:  false,
      empty2: true,
      error2: false,
    }),

    methods: {
      textValue() {

        if(!this.name){
          this.empty = false
          this.error = true
        } else {
          this.empty = true
          this.error = false
        }

        if(this.name.length > 8) {
           this.empty2 = false
          this.error2 = true
        } else {
          this.empty2 = true
          this.error2 = false
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

