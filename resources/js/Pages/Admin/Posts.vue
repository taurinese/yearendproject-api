<template>
    <div>
        <admin-layout>
            <div class="my-6 w-full flex">
                <button
                    class="
                        big-btn
                        block
                        pr-6
                        pl-12
                        py-2
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
                        hover:shadow-lg hover:bg-blue-800 hover:scale-105
                        transform
                        focus:outline-none
                        mr-6
                        relative
                    "
                    @click="showAddForm"
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
                    <span>Ajouter</span>
                </button>
                <inertia-link
                    as="button"
                    type="button"
                    href="/admin/posts"
                    class="
                        big-btn
                        block
                        pr-6
                        pl-12
                        py-2
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
                        hover:shadow-lg hover:bg-blue-800 hover:scale-105
                        transform
                        focus:outline-none
                        mr-6
                        relative
                    "
                >
                    <img
                        src="/img/refreshing.svg"
                        alt="refresh"
                        id="refresh-icon"
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
                    <span>Actualiser</span>
                </inertia-link>
            </div>
            <div v-if="showForm" class="w-full my-6 pb-6 bg-white shadow">
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
                                focus:outline-none focus:shadow-outline
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
                                focus:outline-none focus:shadow-outline
                            "
                            name="published_at"
                            v-model="form.published_at"
                            type="date"
                            :min="currentDate"
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
                                focus:outline-none focus:shadow-outline
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
                        hover:shadow-lg hover:bg-blue-800 hover:scale-105
                        transform
                        focus:outline-none
                        relative
                    "
                    @click="submitForm"
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
                    <span>Ajouter</span>
                </button>
            </div>
            <table v-else class="w-full shadow-lg rounded">
                <thead>
                    <tr
                        class="
                            text-left
                            bg-indigo-500
                            border-b border-grey
                            uppercase
                            rounded
                        "
                    >
                        <th
                            class="
                                w-30
                                px-2
                                py-6
                                text-sm text-white text-center
                            "
                        >
                            Titre
                        </th>
                        <th
                            class="
                                hidden
                                md:table-cell
                                text-sm text-white text-center
                            "
                        >
                            Body
                        </th>
                        <th
                            class="
                                hidden
                                md:table-cell
                                text-sm text-white text-center
                            "
                        >
                            Date de publication
                        </th>
                        <th
                            class="
                                hidden
                                md:table-cell
                                text-sm text-white text-center
                            "
                        >
                            Publié
                        </th>
                        <th
                            class="
                                hidden
                                md:table-cell
                                text-sm text-white text-center
                            "
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr
                        class="
                            accordion
                            border-b border-grey-light
                            hover:bg-gray-100
                        "
                        v-for="post in posts.data"
                        :key="post"
                    >
                        <td class="px-3 py-4 text-center">
                            {{ post.title }}
                        </td>
                        <td
                            v-if="post.body.length > 20"
                            class="px-3 py-4 text-center"
                        >
                            {{ post.body.substring(0, 20) + "..." }}
                        </td>
                        <td v-else class="px-3 py-4 text-center">
                            {{ post.body }}
                        </td>
                        <td class="px-3 py-4 text-center">
                            {{ post.published_at }}
                        </td>
                        <td class="px-3 py-4 text-center">
                            <span
                                v-if="post.active"
                                class="
                                    bg-green-200
                                    text-green-600
                                    py-1
                                    px-3
                                    rounded-full
                                    text-xs
                                "
                                >Oui</span
                            >
                            <span
                                v-else
                                class="
                                    bg-red-200
                                    text-red-600
                                    py-1
                                    px-3
                                    rounded-full
                                    text-xs
                                "
                                >Non</span
                            >
                        </td>
                        <td class="px-3 py-4">
                            <div class="flex item-center justify-center">
                                <div
                                    class="
                                        w-4
                                        mr-2
                                        transform
                                        hover:text-purple-500 hover:scale-110
                                        cursor-pointer
                                    "
                                    @click="editPost(post.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                        />
                                    </svg>
                                </div>
                                <div
                                    class="
                                        w-4
                                        mr-2
                                        transform
                                        hover:text-purple-500 hover:scale-110
                                        cursor-pointer
                                    "
                                    @click="deletePost(post.id)"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <pagination class="mt-4" :links="posts.links" />
        </admin-layout>
    </div>
</template>

<script>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import Pagination from "../../Components/Pagination.vue";

// Quill Editor
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
/* ----- */

export default {
    components: {
        AdminLayout,
        QuillEditor,
        Pagination,
    },
    data() {
        return {
            showForm: false,
            currentDate: new Date(Date.now()).toISOString().split("T")[0],
            form: this.$inertia.form({
                title: "",
                body: "",
                url_image: "",
                published_at: new Date(Date.now()).toISOString().split("T")[0],
                active: true,
            }),
        };
    },
    setup() {
        return {};
    },
    props: ["posts"],
    methods: {
        showAddForm() {
            this.showForm = !this.showForm;
        },
        submitForm() {
            this.form.post("/admin/posts/create", {
                onFinish: () => {
                    this.showForm = !this.showForm;
                    this.form = this.$inertia.form({
                        title: "",
                        body: "",
                        url_image: "",
                        published_at: new Date(Date.now())
                            .toISOString()
                            .split("T")[0],
                        active: true,
                    });
                },
            });
        },
        deletePost(id) {
            const form = useForm({
                id: id,
            });
            form.delete("/admin/posts/delete");
        },
        editPost(id) {
            const form = useForm({
                id: id,
            });
            form.post("/admin/posts/edit");
        },
    },
    computed: {},
    mounted() {
        console.log(this.currentDate);
    },
};
</script>

<style lang="scss" scoped>
.big-btn {
    &:hover {
        #refresh-icon {
            // transition: transform 1s;
            // transform-origin: center;
            // // transform: rotate(360deg) translate(0, -50%);
            // animation-name: spin;
            // animation-duration: 1000ms;
            // // animation-iteration-count: infinite;
            // animation-timing-function: linear;
        }
    }
}

@keyframes spin {
    from {
        transform: rotate(0deg) translate(0, -50%);
    }
    to {
        transform: rotate(360deg) translate(0, -50%);
    }
}
</style>
