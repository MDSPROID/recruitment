<template>
    <div>
        <h2 class="text-center">Item List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="items in products" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.detail }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: item.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteItems(item.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/item/')
                .then(response => {
                    this.items = response.data;
                });
        },
        methods: {
            deleteItems(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/item/${id}`)
                    .then(response => {
                        let i = this.items.map(data => data.id).indexOf(id);
                        this.items.splice(i, 1)
                    });
            }
        }
    }
</script>