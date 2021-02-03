<template>
<div class="">
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">
            Ecommerce test
        </a>
        <div class="ml-auto mr-5">
            <div class="cart" @click="tocart">
                <span class="fas fa-shopping-cart text-white"></span>
                <span class="font-weight-bold text-white">{{cart}}</span>
            </div>

        </div>
    </nav>
    <component :is="component"  class="mt-5" @update-cart="updatecart"></component>
</div>
</template>

<script>
import allproducts from "./allproducts";
import cart from "./cart";
export default {
    components: {allproducts},
    name: "home",
    data:()=>{
        return{
        cart:0,
        component:"allproducts"
        }
    },
    methods:{
        tocart(){
            this.component= cart
        },
        updatecart(){
          this.$http.get('/countcart')
              .then(function (response){
                  this.cart=response.data.data
              })
              .catch(function (response){})
        }
    },
    created() {
        this.updatecart()
    }

}
</script>

<style scoped>
    .cart{
        cursor: pointer;
    }
</style>
