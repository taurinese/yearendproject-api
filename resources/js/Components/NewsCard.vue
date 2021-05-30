<template>
    <div>
        <div>
            <div class="w-80 m-auto ">
                <div class=" grid grid-cols-3 grid-rows-7 grid-flow-row overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="col-span-3 row-span-4 p-1 m-1">
                        <a href="#">
                            <img
                            src="https://picsum.photos/640/400/?random"
                            alt="Placeholder"
                            class="rounded-lg object-cover h-48 w-full"
                            />
                        </a>
                    </div>

                    <div class="col-span-3 row-span-1">
                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                            <a class="no-underline hover:underline text-lg text-black font-bold" href="#">
                                {{title}}
                            </a>
                            </h1>
                        </header>
                    </div>
                    <div class="col-span-3 row-span-1">
                        <p class="text-base text-left pt-0 md:pt-0 p-2 md:p-4">
                            {{body}}
                        </p>
                    </div>
                    <div class="col-span-3 row-span-1">
                        <p class="px-2 md:px-4 text-sm italic text-right"> par {{author}} le {{datetime}}</p>
                    </div>
                    <div class="col-span-3 row-span-1">
                        <ul class="flex flex-row pl-2 text-gray-600 overflow-x-scroll hide-scroll-bar">
                            <li class="py-1" v-for="hashtag in hashtags" :key="hashtag">
                                <div class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800">
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
    name:'NewsCard',
    data() {
        return {
            hashtags:['test', 'whynot', 'incredible'],
            title: 'Titre test',
            body: 'Ceci est un body bla bla bla bla bla bla bla bla',
            author: 'Enzo',
            datetime: '01/01/0001'
        }
    },
}
</script>

<style lang="scss" scoped>
   .hover\:shadow-xl:hover {
        --tw-shadow: 0 20px 25px -5px rgba(255, 255, 255, 0.1), 0 10px 10px -5px rgba(255, 255, 255, 0.04);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
</style>