<template>
    <div class="pt-24">
        <h2 class="text-xl text-white font-bold mb-16">{{title}}</h2>
        <div class="flex flex-row justify-between items-center overflow-x-scroll min-w-full">
            <song-card class="mr-4" />
            <song-card class="mr-4" />
            <song-card class="mr-4" />
            <song-card class="mr-4" />
            <song-card class="mr-4" />
            <song-card class="mr-4" />
            <song-card />
        </div>
    </div>
</template>

<script>
import SongCard from './SongCard.vue'
export default {
  components: { SongCard },
    name: 'Songs',
    props: ['title']
}
</script>

<style lang="scss" scoped>

</style>