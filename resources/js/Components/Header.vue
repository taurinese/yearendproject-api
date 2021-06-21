<template>
    <div class="h-20 bg-white border-indigo-700 border-b-4">
        <div class="h-full flex justify-between items-center w-4/5 mx-auto">
            <div class="relative text-gray-600 focus-within:text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <button
                        type="submit"
                        class="p-1 focus:outline-none focus:shadow-outline"
                    >
                        <svg
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            class="w-6 h-6"
                        >
                            <path
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            ></path>
                        </svg>
                    </button>
                </span>
                <input
                    type="search"
                    name="q"
                    class="
                        py-2
                        text-sm text-white
                        bg-white
                        rounded-md
                        pl-10
                        focus:outline-none
                        focus:text-gray-900
                    "
                    placeholder="Search..."
                    autocomplete="off"
                />
            </div>
            <!-- <button>
                <img
                    src="https://picsum.photos/640/400/?random"
                    alt=""
                    class="rounded-full w-12 h-12"
                />
            </button> -->
            <div class="relative w-24">
                <button
                    @click="showMenu = !showMenu"
                    type="button"
                    class="
                        inline-flex
                        justify-center
                        w-full
                        rounded-md
                        border border-gray-300
                        shadow-sm
                        px-4
                        py-2
                        bg-white
                        text-sm
                        font-medium
                        text-gray-700
                        hover:bg-gray-50
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-offset-gray-100
                        focus:ring-indigo-500
                    "
                    id="menu-button"
                    aria-expanded="true"
                    aria-haspopup="true"
                >
                    {{ user.name }}
                    <!-- Heroicon name: solid/chevron-down -->
                    <svg
                        class="-mr-1 ml-2 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>

                <div
                    class="
                        origin-top-right
                        absolute
                        right-0
                        mt-2
                        w-56
                        rounded-md
                        shadow-lg
                        bg-white
                        ring-1 ring-black ring-opacity-5
                        focus:outline-none
                    "
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="menu-button"
                    tabindex="-1"
                    v-if="showMenu"
                >
                    <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        <!-- <a
                            href="#"
                            class="text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-0"
                            >Account settings</a
                        >
                        <a
                            href="#"
                            class="text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-1"
                            >Support</a
                        >
                        <a
                            href="#"
                            class="text-gray-700 block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-2"
                            >License</a
                        > -->
                        <inertia-link
                            href="/logout"
                            method="post"
                            as="button"
                            type="button"
                            class="
                                text-gray-700
                                block
                                w-full
                                text-left
                                px-4
                                py-2
                                text-sm
                                hover:bg-gray-100
                            "
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-3"
                            @click="logout"
                        >
                            Logout
                        </inertia-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return { user };
    },
    data() {
        return {
            showMenu: false,
        };
    },
    methods: {
        logout() {},
    },
};
</script>

<style lang="scss" scoped></style>
