<template>
<div  class="container-fluid">
    <div class="row">
    <product v-for="product in products":key="product.id" @add-to-cart="addcart" :product="product"></product>

    </div>

</div>
</template>

<script>

import product from "./product";
export default {
    components:{product},

    data:function() {
        return{
        products:[],
            cart:0
        }
    },
    methods:{
      getData(){

          this.$http.get('/allproducts').then(response => {
              // console.log(response.data.data)
              this.products= response.data.data;
          }, response => {

          });
},
        addcart(){
          this.$emit('update-cart')
        }
    },

    created() {
        this.getData()
    }


}
</script>

<style scoped>

</style>
