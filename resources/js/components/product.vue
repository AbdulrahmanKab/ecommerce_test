<template>
    <div class="col-sm-3 d-flex flex-column product-box mr-1">
        <img :src="'uploads/'+product.image" width="195px" height="228px" alt="">
        <h3 class="h4">{{product.name}}</h3>
        <span class="text-sm-left">{{product.smalldescription}}</span>
        <button class="btn btn-primary mt-2" @click="addTocart(product.id)">Add to cart</button>
    </div>
</template>

<script>
export default {
    name: "product",
    props:[
        'product'
    ],
    data:function (){
        return{}
    },
    methods:{
        addTocart(id){

            this.$http.post("/addtocart/"+id,{
            }).then(function (){
                //notify user new product has been added
                this.$emit('add-to-cart')
            }).catch(function (error){

            })
        }
    }

}
</script>

<style scoped>

</style>
