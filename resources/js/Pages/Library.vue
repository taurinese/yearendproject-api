<template>
    <div class="px-12 sm:px-12 lg:px-36 xl:px-48 text-white mb-12">
        <app-layout />
        <h2 class="text-xl text-white font-bold mt-16 mb-8">Playlists</h2>
        <div
            class="
                grid
                2xl:grid-cols-6
                xl:grid-cols-5
                lg:grid-cols-4
                md:grid-cols-4
                grid-cols-4 grid-flow-row
                gap-y-8
            "
        >
            <playlist-card />
            <playlist-card />
            <playlist-card />
            <playlist-card />
            <playlist-card />
            <playlist-card />
        </div>
        <h2 class="text-xl text-white font-bold mt-16 mb-8">Suggestions</h2>
        <div
            class="
                grid
                2xl:grid-cols-6
                xl:grid-cols-5
                lg:grid-cols-4
                md:grid-cols-4
                grid-cols-4 grid-flow-row
                gap-y-8
            "
        >
            <playlist-card />
            <playlist-card />
            <playlist-card />
            <playlist-card />
            <playlist-card />
            <playlist-card />
        </div>
        <music-player />
    </div>
</template>

<script>
import PlaylistCard from "../Components/PlaylistCard.vue";
import AppLayout from "../Layouts/AppLayout.vue";
import MusicPlayer from "../Components/MusicPlayer.vue";
export default {
    components: { AppLayout, PlaylistCard, MusicPlayer },
};
</script>

<style lang="scss" scoped></style>
