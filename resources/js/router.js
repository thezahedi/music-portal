import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./components/Home";
import ViewRouter from "./components/ViewRouter";

import ArtistIndex from "./components/artists/Index";
import ArtistShow from "./components/artists/Show";
import AlbumShow from "./components/albums/Show";
import SongShow from "./components/songs/Show";
import SingleShow from "./components/singles/Show";
import NotFound from "./components/NotFound";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            component: Home,
        },

        {
            path: "/artists",
            component: ViewRouter,
            redirect: '/artists/index',
            children: [
                {
                    path: '/artists/index',
                    component: ArtistIndex,
                },

                {
                    path: "/artists/:artist_id",
                    component: ViewRouter,
                    redirect: '/artists/:artist_id/show',
                    children: [
                        {
                            path: '/artists/:artist_id/show',
                            component: ArtistShow,
                        },

                        {
                            path: "/artists/:artist_id/singles/:single_id",
                            component: ViewRouter,
                            redirect: "/artists/:artist_id/singles/:single_id/show",
                            children: [
                                {
                                    path: "/artists/:artist_id/singles/:single_id/show",
                                    component: SingleShow,
                                },
                            ],
                        },

                        {
                            path: "/artists/:artist_id/albums/:album_id",
                            component: ViewRouter,
                            redirect: "/artists/:artist_id/albums/:album_id/show",
                            children: [
                                {
                                    path: "/artists/:artist_id/albums/:album_id/show",
                                    component: AlbumShow,
                                },
                                {
                                    path: "/artists/:artist_id/albums/:album_id/songs/:song_id",
                                    component: ViewRouter,
                                    redirect: "/artists/:artist_id/albums/:album_id/songs/:song_id/show",
                                    children: [
                                        {
                                            path: "/artists/:artist_id/albums/:album_id/songs/:song_id/show",
                                            component: SongShow,
                                        },
                                    ]
                                },
                            ]
                        },
                    ]
                },
            ]
        },

        {
            path: "*",
            component: NotFound,
        }
    ]
});
