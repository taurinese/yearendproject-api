<template>
    <div>
        <div>
            <div class="w-80 m-auto">
                <div
                    class="
                        grid grid-cols-3 grid-rows-7 grid-flow-row
                        overflow-hidden
                        rounded-lg
                        shadow-md
                        bg-white
                        hover:shadow-xl
                        transition-shadow
                        duration-300
                        ease-in-out
                    "
                >
                    <div class="col-span-3 row-span-4 p-1 m-1">
                        <img
                            :src="img"
                            alt="Placeholder"
                            class="
                                rounded-lg
                                object-contain
                                h-48
                                max-w-full
                                mx-auto
                            "
                        />
                    </div>

                    <div class="col-span-3 row-span-1">
                        <header
                            class="
                                flex
                                items-center
                                justify-between
                                leading-tight
                                p-2
                                md:p-4
                            "
                        >
                            <h1 class="text-lg">
                                <div
                                    class="
                                        no-underline
                                        hover:underline
                                        text-lg text-black
                                        font-bold
                                    "
                                    href="#"
                                >
                                    {{ title }}
                                </div>
                            </h1>
                        </header>
                    </div>
                    <div class="col-span-3 row-span-1">
                        <p
                            class="text-base text-left pt-0 md:pt-0 p-2 md:p-4"
                            v-html="body"
                            v-if="body.length <= 20"
                        ></p>
                        <p
                            class="text-base text-left pt-0 md:pt-0 p-2 md:p-4"
                            v-html="body.substring(0, 20) + '..'"
                            v-else
                        ></p>
                    </div>
                    <div class="col-span-3 row-span-1">
                        <p class="px-2 md:px-4 text-sm italic text-right">
                            par {{ author }} le {{ datetime }}
                        </p>
                    </div>
                    <div class="col-span-3 row-span-1">
                        <ul
                            class="
                                flex flex-row
                                pl-2
                                text-gray-600
                                overflow-x-scroll
                                hide-scroll-bar
                            "
                        >
                            <li
                                class="py-1"
                                v-for="hashtag in hashtags"
                                :key="hashtag"
                            >
                                <div
                                    class="
                                        transition
                                        duration-300
                                        ease-in-out
                                        rounded-2xl
                                        mr-1
                                        px-2
                                        py-1
                                        hover:bg-blue-200
                                        text-gray-500
                                        hover:text-gray-800
                                    "
                                >
                                    <a class="" href="#">#{{ hashtag }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NewsCard",
    data() {
        return {
            hashtags: ["test", "whynot", "incredible"],
        };
    },
    props: ["title", "body", "author", "datetime", "img"],
};
</script>

<style lang="scss" scoped>
.hover\:shadow-xl:hover {
    --tw-shadow: 0 20px 25px -5px rgba(255, 255, 255, 0.1),
        0 10px 10px -5px rgba(255, 255, 255, 0.04);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
        var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
</style>
