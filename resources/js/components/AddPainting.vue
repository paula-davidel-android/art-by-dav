<template>
    <div>
        <h4 class="text-center">Add Painting</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addPainting">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="painting.title">
                    </div><br>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="painting.description">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Add Painting</button>
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
    methods: {
        addPainting() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/paintings/add', this.painting)
                    .then(response => {
                        this.$router.push({name: 'paintings'})
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
