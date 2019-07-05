<template>
    <div class="width-full">
        <h1 class="text-center">MY SHIPMENTS</h1>
        <div class="text-center">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Shipment ID</th>
                <th scope="col">Shipment Name</th>
                <th scope="col">Item Count</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(ship,index) in shipment">
                <th scope="row">{{(index) + 1}}</th>
                <td>{{ship.id}}</td>
                <td>{{ship.name}}</td>
                <td>{{ship.items.length}}</td>
            </tr>
            </tbody>
        </table>
        <button class="btn btn-success " @click="showField()">Add new shipment</button>
      </div>
        <div v-if="show===true" class="width-full text-center">
            <p class="text-center"><h2>Add New Shipment</h2></p>
            <input type="text" id="id" v-model="id" name="id" placeholder="id">
            <input type="text" v-model="name" name="name" placeholder="name">
            <button type="submit" @click="addShipment" class="btn btn-success">Create</button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                id: '',
                name: '',
                shipment: {},
                show: false
            }
        },
        mounted() {
            this.getShipments()
        },
        methods: {
            getShipments() {
                axios
                    .get('api/get_shipments')
                    .then(response =>(this.shipment = response.data.data.shipments));
            },
            addShipment() {
                axios.post('api/add_shipment', {
                    data: {
                        "id": this.id,
                        "name": this.name
                    }
                }).then(response => {
                    if (response.status == 200) {
                        this.getShipments()
                    } else {
                        console.log('test')
                    }
                })
            },
            showField(){
                this.show = !this.show
            }
        }
    }
</script>
<style>
.width-full{
    width: 100%;
}
</style>