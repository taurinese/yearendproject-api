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
            <img
                src="https://picsum.photos/640/400/?random"
                alt=""
                class="rounded-full w-12 h-12"
            />
        </div>
    </div>
</template>

<script>
export default {
    setup() {
        return {};
    },
};
</script>

<style lang="scss" scoped></style>
