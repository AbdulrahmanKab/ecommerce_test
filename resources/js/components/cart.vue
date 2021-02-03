<template>
<div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 row p-3  " style="border: 1px solid #383d41;border-radius: 6px">
                <div class="col-sm-12 mt-3  d-flex flex-row" v-for="(item,index) in cart":key="item.id">
                    <img :src="'uploads/'+item.image" width="64px" height="64px" alt="">
                    <span class="mt-3 ml-3">{{item.name}}</span>
                    <input type="number" @change="updateqauntity(item.id,item.quantity)" v-model="item.quantity"  class="form-control ml-5 mt-3" style="width: 10%;height: 50%" >
                    <button class="btn btn-danger ml-auto" @click="remove(item.id,index)"> <span class="fas fa-trash"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "cart",
    data:function (){
        return{
            cart:null,
            quantity:null,
        }
    },
    methods:{
        getData(){
            this.$http.get("/getCart")
                .then(function (response){
                    this.cart= response.data.data
                }).catch(function (){})
        }
        ,
        updateqauntity(id,qunt){
           this.$http.post('/updateCart',{
               id:id,
               qunt:qunt
           }).then(function (res){}).
           catch(function (){
           })


    },
        remove(id,index){
            this.$http.delete('/delete/'+id+'/cart').then(function (res){
                this.cart.splice(index,1)
            }).
            catch(function (){
            })
        }
    }
    ,created() {
     this.getData()
    }
}
</script>

<style scoped>

</style>
