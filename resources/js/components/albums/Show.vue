<template>
    <div>
        <h2>Album</h2>
        <p><strong>Title: </strong>{{ album.title }}</p>

        <p><strong>Description: </strong>{{ album.description }}</p>

        <div class="card mb-2">
            <div class="card-header">Songs</div>
            <div class="card-body">
                <ul class="list-unstyled" v-if="songs.length > 0">
                    <li v-for="song in songs">
                        <router-link :to="'/artists/' + artist_id + '/albums/' + album.id + '/songs/' + song.id">
                            {{ song.title }}
                        </router-link>
                    </li>
                </ul>
                <div v-else><strong>Nothing</strong></div>
            </div>
        </div>
    </div>
</template>

<script>
import Router from "../../router";

export default {
    data() {
        return {
            album: [],
            songs: [],
        }
    },

    created() {
        axios.get('/api/artists/' + this.artist_id + '/albums/' + this.album_id)
            .then((response) => {
                this.album = response.data;
                this.songs = response.data.songs;
            });
    },

    computed: {
        artist_id() {
            return (Router.currentRoute.params || {}).artist_id;
        },

        album_id() {
            return (Router.currentRoute.params || {}).album_id;
        },
    },
};
</script>
