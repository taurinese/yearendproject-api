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
                        for="name"
                    >
                        Nom
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
                        name="name"
                        v-model="form.name"
                        type="text"
                        required
                        autofocus
                        placeholder="Name"
                    />
                </div>
                <div class="w-2/5">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="username"
                    >
                        Username
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
                        name="username"
                        v-model="form.username"
                        type="text"
                        required
                    />
                </div>
                <div class="w-2/5 my-4">
                    <label
                        class="block text-gray-700 text-sm font-normal mb-2"
                        for="email"
                    >
                        Email
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
                        name="email"
                        v-model="form.email"
                        type="email"
                        required
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

export default {
    components: {
        AdminLayout,
    },
    setup() {
        return {};
    },
    props: ["user"],
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                username: "",
                email: "",
            }),
        };
    },
    mounted() {
        this.form.name = this.user.name;
        this.form.username = this.user.username;
        this.form.email = this.user.email;
    },
    methods: {
        updatePost() {
            const form = useForm({
                id: this.user.id,
                name: this.form.name,
                username: this.form.username,
                email: this.form.email,
            });
            console.log(this.form);
            form.post("/admin/users/update");
        },
    },
};
</script>

<style lang="scss" scoped></style>
