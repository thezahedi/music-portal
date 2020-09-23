<template>
    <div>
        <h2>Artist</h2>
        <p><strong>Name: </strong>{{ artist.name }}</p>

        <p><strong>Biography: </strong>{{ artist.biography }}</p>

        <div class="card mb-2">
            <div class="card-header">Albums</div>
            <div class="card-body">
                <ul class="list-unstyled" v-if="albums.length > 0">
                    <li v-for="album in albums">
                        <router-link :to="'/artists/' + artist.id + '/albums/' + album.id">
                            {{ album.title }} ({{album.pivot.role.title}})
                        </router-link>
                    </li>
                </ul>
                <div v-else><strong>Nothing</strong></div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header">Singles</div>
            <div class="card-body">
                <ul class="list-unstyled" v-if="singles.length > 0">
                    <li v-for="single in singles">
                        <router-link :to="'/artists/' + artist.id + '/singles/' + single.id">
                            {{ single.title }} ({{single.pivot.role.title}})
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
            artist: [],
            albums: [],
            singles: [],
        }
    },

    created() {
        this.getDetail()
    },

    watch: {
        '$route.params.artist_id': {
            handler(newValue) {
                this.getDetail()
            }
        }
    },

    computed: {
        artist_id() {
            return this.$route.params.artist_id;
        }
    },

    methods: {
        getDetail() {
            axios.get('/api/artists/' + this.artist_id)
            .then((response) => {
                this.artist = response.data;
                this.albums = response.data.albums;
                this.singles = response.data.singles;
            });
        }
    }
};
</script>
