<template>
    <div class="px-48 mt-12">
        <app-layout />
        <h2 class="text-xl text-white font-bold mb-16">Actualités</h2>
        <div class="pt-12 grid grid-cols-3 grid-flow-row gap-y-10">
            <inertia-link
                v-for="post in news.data"
                :key="post"
                :href="'/news/' + post.id"
            >
                <news-card
                    :title="post.title"
                    :body="post.body"
                    :author="Enzo"
                    :datetime="post.published_at"
                    :img="post.url_image"
                    class="col-span-1 row-span-1"
                />
            </inertia-link>
            <pagination :links="news.links" />
        </div>
    </div>
</template>

<script>
import NewsCard from "../Components/NewsCard.vue";
import AppLayout from "../Layouts/AppLayout.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import Pagination from "../Components/Pagination.vue";

export default {
    components: { AppLayout, NewsCard, Pagination },
    setup() {
        const news = computed(() => usePage().props.value.news);
        return { news };
    },
};
</script>

<style lang="scss" scoped></style>
