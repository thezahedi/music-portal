<template>
    <div>
        <h2>Album Songs</h2>
        <ul class="list-unstyled" v-if="albums.length > 0">
            <li v-for="album in albums"><router-link :to="'/albums/' + album.id">{{album.title}}</router-link> ({{album.songs_count}})</li>
        </ul>
        <div v-else>Nothing</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            albums: [],
        }
    },

    created() {
        axios.get('/api/albums')
            .then((response) => {
                this.albums = response.data;
            });
    }
};
</script>
