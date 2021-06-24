<template>
    <div class="pt-24">
        <h2 class="text-xl text-white font-bold mb-16">Actualités</h2>
        <div class="flex flex-row justify-between overflow-x-scroll">
            <inertia-link
                v-for="post in news"
                :key="post"
                :href="'/news/' + post.id"
                ><news-card
                    :title="post.title"
                    :body="post.body"
                    :author="Enzo"
                    :datetime="post.published_at"
                    :img="post.url_image"
                    class="mr-4"
                ></news-card
            ></inertia-link>
        </div>
    </div>
</template>

<script>
import NewsCard from "./NewsCard.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
export default {
    components: { NewsCard },
    setup() {
        const news = computed(() => usePage().props.value.news);
        return { news };
    },
};
</script>

<style lang="scss" scoped></style>
