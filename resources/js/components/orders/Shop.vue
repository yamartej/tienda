<template>
    <div class="container">
        <div class="row w-100 ">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://totalcleanpanama.com/wp-content/uploads/2021/01/ofc-lapiz-momgol.jpg" class="card-img-top" alt="...">
                    <hr>
                    <form v-on:submit.prevent="shop()">
                        <div class="card-body" v-for="product in products">
                            <p class="fs-1">{{product.price}}</p>
                            <input type="hidden" v-model="product.price" name="price"/>
                            <p class="fs-6">{{product.description}}</p>
                            <input type="hidden" v-model="product.description"/>
                            <input type="hidden" v-model="product.img"/>
                            <input type="submit" value="Send" class="btn btn-primary btn-submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                products: [{ price: '20', description: 'Lapiz Mongol # 2', img: 'https://totalcleanpanama.com/wp-content/uploads/2021/01/ofc-lapiz-momgol.jpg'}]
            }    
        },
        methods:{
            shop(){
                //ENVIAR A CREATE
                //alert("Shop");
            }
        }
        
    }
</script>