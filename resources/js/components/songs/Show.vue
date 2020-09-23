<template>
    <div>
        <h2>Song</h2>
        <p><strong>Title: </strong>{{ song.title }}</p>

        <div class="card mb-2">
            <div class="card-header">Artists</div>
            <div class="card-body">
                <ul class="list-unstyled" v-if="artists.length > 0">
                    <li v-for="artist in artists">
                        <router-link :to="'/artists/' + artist.id">
                            {{ artist.name }} ({{artist.pivot.role.title}})
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
            song: [],
            artists: [],
        }
    },

    created() {
        axios.get('/api/artists/' + this.artist_id + '/albums/' + this.album_id + '/songs/' + this.song_id)
            .then((response) => {
                this.song = response.data;
                this.artists = response.data.artists;
            });
    },

    computed: {
        artist_id() {
            return (Router.currentRoute.params || {}).artist_id;
        },

        album_id() {
            return (Router.currentRoute.params || {}).album_id;
        },

        song_id() {
            return (Router.currentRoute.params || {}).song_id;
        },
    },
};
</script>
