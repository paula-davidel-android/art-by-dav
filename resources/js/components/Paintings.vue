<template>
    <div class="container">
        <h4 class="text-center">All Paintings</h4><br/>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="painting in paintings" :key="painting.id">
                <td>{{ painting.id }}</td>
                <td>{{ painting.title }}</td>
                <td>{{ painting.description }}</td>
                <td>{{ painting.created_at }}</td>
                <td>{{ painting.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editpainting', params: { id: painting.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletePainting(painting.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/paintings/add')">Add Painting</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            paintings: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/paintings')
                .then(response => {
                    this.paintings = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deletePainting(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/paintings/delete/${id}`)
                    .then(response => {
                        let i = this.paintings.map(item => item.id).indexOf(id); // find index of your object
                        this.paintings.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
