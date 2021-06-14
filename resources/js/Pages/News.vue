<template>
    <div class="px-48 mt-12">
        <app-layout />
        <h2 class="text-xl text-white font-bold mb-16">Actualités</h2>
        <div class="pt-12 grid grid-cols-3 grid-flow-row gap-y-10">
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
            <inertia-link href="/new">
                <news-card class="col-span-1 row-span-1" />
            </inertia-link>
        </div>
    </div>
</template>

<script>
import NewsCard from "../Components/NewsCard.vue";
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    components: { AppLayout, NewsCard },
};
</script>

<style lang="scss" scoped></style>
