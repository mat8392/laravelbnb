<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div v-if="!loading">
                        <h2>{{ bookable.title }}</h2>
                        <hr />
                        <article>{{ bookable.description }}</article>
                    </div>
                    <div v-else>
                        Loading...
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <availablity></availablity>
        </div>
    </div>
</template>

<script>
    import Availablity from "./Availablity";
    export default {
        components: {
            Availablity
        },  
        data() {
            return {
                bookable: null,
                loading: false
            };
        },
        created() {
            this.loading = true;
            axios.get(`/api/bookables/${this.$route.params.id}`)
            .then(response => {
                this.loading = false;
                //remember resonse.data is from axious
                //remember response.data.data the data is from laravel json wraping
                this.bookable = response.data.data;
            }); //es6
        }
    }
</script>