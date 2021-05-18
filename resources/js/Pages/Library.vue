<template>
    <div class="px-48 text-white">
        <app-layout/>
        <h2 class="text-xl text-white font-bold mt-16 mb-8">Bibliothèque</h2>
        <div class="grid grid-cols-4 grid-flow-row gap-y-8">
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
        </div>
        <h2 class="text-xl text-white font-bold mt-16 mb-8">Bibliothèque</h2>
        <div class="grid grid-cols-4 grid-flow-row gap-y-8 mb-16">
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
            <playlist-card/>
        </div>
    </div>
</template>

<script>
import PlaylistCard from '../Components/PlaylistCard.vue'
import AppLayout from '../Layouts/AppLayout.vue'
    export default {
        components: {AppLayout, PlaylistCard},
    }
</script>

<style lang="scss" scoped>

</style>