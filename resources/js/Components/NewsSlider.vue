<template>
    <div class="pt-24">
        <h2 class="text-xl text-white font-bold mb-16">Actualités</h2>
        <div class="flex flex-row justify-between overflow-x-scroll">
            <news-card class="mr-4"></news-card>
            <news-card class="mr-4"></news-card>
            <news-card class="mr-4"></news-card>
            <news-card></news-card>
        </div>
    </div>
</template>

<script>
import NewsCard from './NewsCard.vue';
    export default {
        components: { NewsCard },
    }
</script>

<style lang="scss" scoped>

</style>