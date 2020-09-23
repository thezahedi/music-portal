<template>
    <div class="container mt-5">
        <div class="row">
            <!-- MENU -->
            <div class="col-sm-3">
                <div class="list-group">
                    <router-link to="/" class="list-group-item list-group-item-action">Home</router-link>
                    <router-link class="list-group-item list-group-item-action"
                                 v-for="artist in artists"
                                 :to="'/artists/' + artist.id"
                                 :key="artist.id">
                        {{ artist.name }}
                    </router-link>
                </div>
            </div>
            <!-- BODY CONTENT -->
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            artists: [],
        }
    },

    created() {
        axios.get('/api/artists')
            .then((response) => {
                this.artists = response.data;
            })
    }
}
</script>
