<template>
    <div>
        <h2>Artists</h2>
        <ul class="list-unstyled" v-if="artists.length > 0">
            <li v-for="artist in artists"><router-link :to="'/artists/' + artist.id">{{artist.name}}</router-link></li>
        </ul>
        <div v-else>Nothing</div>
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
            });
    }
};
</script>
