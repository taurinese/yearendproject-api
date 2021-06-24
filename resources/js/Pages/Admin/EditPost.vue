<template>
    <admin-layout>
        <div class="w-full my-6 pb-6 bg-white shadow">
            <div
                class="
                    mb-4
                    p-4
                    flex flex-wrap
                    items-start
                    justify-between
                    w-full
                "
            >
                <div class="w-2/5">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="username"
                    >
                        Titre
                    </label>
                    <input
                        class="
                            shadow
                            appearance-none
                            border
                            rounded
                            w-full
                            py-2
                            px-3
                            text-gray-700
                            leading-tight
                            focus:outline-none
                            focus:shadow-outline
                        "
                        name="title"
                        v-model="form.title"
                        type="text"
                        required
                        autofocus
                        placeholder="Titre"
                    />
                </div>
                <div class="w-2/5">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="username"
                    >
                        Date de publication
                    </label>
                    <input
                        class="
                            shadow
                            appearance-none
                            border
                            rounded
                            w-full
                            py-2
                            px-3
                            text-gray-700
                            leading-tight
                            focus:outline-none
                            focus:shadow-outline
                        "
                        name="published_at"
                        v-model="form.published_at"
                        type="date"
                        :min="minDate"
                        required
                    />
                </div>
                <div class="w-full my-4">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="username"
                    >
                        Body
                    </label>
                    <!-- <input
                        class="
                            shadow
                            appearance-none
                            border
                            rounded
                            w-full
                            py-2
                            px-3
                            text-gray-700
                            leading-tight
                            focus:outline-none
                            focus:shadow-outline
                        "
                        name="body"
                        v-model="form.body"
                        type="text"
                        required
                        placeholder="Body"
                    /> -->
                    <QuillEditor
                        theme="snow"
                        v-model:content="form.body"
                        contentType="html"
                    />
                </div>
                <div class="w-2/5">
                    <label
                        class="
                            w-full
                            flex flex-col
                            items-center
                            px-4
                            py-6
                            bg-white
                            text-blue
                            rounded-lg
                            shadow-lg
                            tracking-wide
                            uppercase
                            border border-blue
                            cursor-pointer
                        "
                    >
                        <svg
                            class="w-8 h-8"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            v-if="!form.url_image"
                        >
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                            />
                        </svg>
                        <img
                            v-else
                            class="w-8 h-8"
                            src="/img/checked.svg"
                            alt="file uploaded"
                        />
                        <span
                            class="mt-2 text-base leading-normal"
                            v-if="!form.url_image"
                            >Select a file</span
                        >
                        <span class="mt-2 text-base leading-normal" v-else
                            >File uploaded</span
                        >
                        <input
                            type="file"
                            class="hidden"
                            @input="form.url_image = $event.target.files[0]"
                        />
                    </label>
                </div>
                <div class="w-2/5">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="active"
                    >
                        Publié
                    </label>
                    <input
                        class="
                            shadow
                            appearance-none
                            border
                            rounded
                            text-gray-700
                            leading-tight
                            focus:outline-none
                            focus:shadow-outline
                        "
                        name="active"
                        v-model="form.active"
                        type="checkbox"
                    />
                </div>
            </div>
            <button
                class="
                    big-btn
                    block
                    pr-6
                    pl-12
                    py-2
                    ml-6
                    text-xs
                    font-medium
                    leading-6
                    text-center text-white
                    uppercase
                    transition
                    bg-blue-700
                    rounded
                    shadow
                    ripple
                    hover:shadow-lg
                    hover:bg-blue-800
                    hover:scale-105
                    transform
                    focus:outline-none
                    relative
                "
                @click="updatePost"
                :disabled="form.processing"
            >
                <img
                    src="/img/plus.svg"
                    alt="add"
                    id="add-icon"
                    class="
                        w-6
                        absolute
                        top-1/2
                        left-3
                        transform
                        -translate-y-1/2
                        filter
                        invert
                    "
                />
                <span>Modifier</span>
            </button>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
// Quill Editor
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
/* ----- */

export default {
    components: {
        AdminLayout,
        QuillEditor,
    },
    setup() {
        return {};
    },
    props: ["post"],
    data() {
        return {
            minDate: new Date(this.post.published_at)
                .toISOString()
                .split("T")[0],
            form: this.$inertia.form({
                title: "",
                body: "",
                url_image: "",
                published_at: "",
                active: true,
            }),
        };
    },
    mounted() {
        this.form.title = this.post.title;
        this.form.body = this.post.body;
        this.form.url_image = this.post.url_image;
        this.form.published_at = this.post.published_at;
        this.form.active = this.post.active;
    },
    methods: {
        updatePost() {
            const form = useForm({
                id: this.post.id,
                title: this.form.title,
                body: this.form.body,
                url_image: this.form.url_image,
                published_at: this.form.published_at,
                active: this.form.active,
            });
            console.log(this.form);
            form.post("/admin/posts/update");
        },
    },
};
</script>

<style lang="scss" scoped></style>
