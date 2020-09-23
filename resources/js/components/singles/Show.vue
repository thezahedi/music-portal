<template>
    <div>
        <h2>Single</h2>
        <p><strong>Title: </strong>{{ single.title }}</p>

        <p><strong>Description: </strong>{{ single.description }}</p>

        <div class="card mb-2">
            <div class="card-header">Artists</div>
            <div class="card-body">
                <ul class="list-unstyled" v-if="artists.length > 0">
                    <li v-for="artist in artists">
                        <router-link :to="'/artists/' + artist.id">{{ artist.name }}
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
            single: [],
            artists: [],
        }
    },

    created() {
        axios.get('/api/singles/' + this.single_id)
            .then((response) => {
                this.single = response.data;
                this.artists = response.data.artists;
            });
    },

    computed: {
        single_id() {
            return (Router.currentRoute.params || {}).single_id;
        }
    },
};
</script>
