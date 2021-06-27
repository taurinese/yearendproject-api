<template>
    <div class="px-48 mt-12">
        <app-layout />
        <h2 class="text-xl text-white font-bold">{{ post.title }}</h2>
        <div class="pt-12 flex flex-col justify-center">
            <div class="mt-12">
                <img
                    src="https://picsum.photos/640/400/?random"
                    alt="contact"
                    class="rounded-xl w-2/3 h-96 mx-auto"
                />
            </div>
            <div class="mt-12">
                <p class="text-white" v-html="post.body"></p>
                <p
                    class="
                        px-2
                        md:px-4
                        text-sm
                        italic
                        text-right text-white
                        mt-12
                    "
                >
                    par {{ post.user.name }} le {{ getDate }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    components: { AppLayout },
    prop: ["post"],
    computed: {
        getDate() {
            let date = new Date(this.post.created_at);
            date =
                (date.getMonth() > 8
                    ? date.getMonth() + 1
                    : "0" + (date.getMonth() + 1)) +
                "/" +
                (date.getDate() > 9 ? date.getDate() : "0" + date.getDate()) +
                "/" +
                date.getFullYear();
            return date;
        },
    },
};
</script>

<style lang="scss" scoped></style>
