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
                        hover:shadow-lg
                        hover:bg-blue-800
                        hover:scale-105
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
                </button>
            </div>
            <table class="w-full shadow-lg rounded">
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
                            Avatar
                        </th>
                        <th class="text-sm text-white text-center">Name</th>
                        <th
                            class="
                                hidden
                                md:table-cell
                                text-sm text-white text-center
                            "
                        >
                            Username
                        </th>
                        <th
                            class="
                                hidden
                                md:table-cell
                                text-sm text-white text-center
                            "
                        >
                            Email
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
                        v-for="user in users"
                        :key="user"
                    >
                        <td class="px-3 py-4">
                            <img
                                class="w-12 h-12 rounded-full mx-auto"
                                :src="user.url_image"
                                alt=""
                            />
                        </td>
                        <td class="px-3 py-4 text-center">{{ user.name }}</td>
                        <td class="px-3 py-4 text-center">
                            {{ user.username }}
                        </td>
                        <td class="px-3 py-4 text-center">{{ user.email }}</td>
                        <td class="px-3 py-4">
                            <div class="flex item-center justify-center">
                                <div
                                    class="
                                        w-4
                                        mr-2
                                        transform
                                        hover:text-purple-500
                                        hover:scale-110
                                        cursor-pointer
                                    "
                                    @click="editUser(user.id)"
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
                                        hover:text-purple-500
                                        hover:scale-110
                                        cursor-pointer
                                    "
                                    @click="deleteUser(user.id)"
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
        </admin-layout>
    </div>
</template>

<script>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AdminLayout,
    },
    data() {
        return {};
    },
    setup() {
        return {};
    },
    props: ["users"],
    methods: {
        deleteUser(id) {
            const form = useForm({
                id: id,
            });
            form.delete("/admin/users/delete");
        },
        editUser(id) {
            const form = useForm({
                id: id,
            });
            form.post("/admin/users/edit");
        },
    },
};
</script>

<style lang="scss" scoped>
.big-btn {
    &:hover {
        #add-icon {
        }
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
