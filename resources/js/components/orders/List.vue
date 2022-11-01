<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Lista</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in orders" :key="order.id">
                                <td scope="row">{{ order.id }} </td>
                                <td>{{ order.customer_name }} </td>
                                <td>{{ order.customer_email }} </td>
                                <td>{{ order.customer_mobile }} </td>
                                <td>{{ order.created_at }} </td>    
                                <td v-if="order.status === 'APPROVED'" class="alert-success">{{ order.status }}</td>
                                <td v-else-if="order.status === 'PENDING'" class="alert-warning">{{ order.status }}</td>
                                <td v-else="order.status === 'PENDING'" class="alert-danger">{{ order.status }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                orders: []
            }    
        },
        created(){
            axios.get('/order/list')
                //.then(response=> console.log(response.data))<---ESTO ES PARA VER OR CONSOLA DE DESARROLLADOR EL RECORD
                .then(response=> this.orders = response.data)
                .catch()
        }
    }
</script>
