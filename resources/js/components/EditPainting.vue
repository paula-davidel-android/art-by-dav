<template>
    <div>
        <h4 class="text-center">Edit Painting</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updatePainting">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="painting.title">
                    </div><br>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="painting.description">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Update Painting</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            painting: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/paintings/edit/${this.$route.params.id}`)
                .then(response => {
                    this.painting = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updatePainting() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/paintings/update/${this.$route.params.id}`, this.painting)
                    .then(response => {
                        this.$router.push({name: 'paintings'});
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
