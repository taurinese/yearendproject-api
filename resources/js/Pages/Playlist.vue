<template>
    <div class="px-48 text-white">
        <app-layout/>
        <div class="playlist-header mt-16 flex flex-col">
            <div class="flex flex-row justify-left">
                <img src="https://picsum.photos/640/400/?random" alt=""
                class="playlist-cover rounded-xl w-48 h-48 col-span-1 row-span-1">
                <div class="flex flex-col justify-center ml-4">
                    <span class="text-sm">Playlist</span>
                    <span class="my-2 text-3xl">Playlist exemple</span>
                    <div>
                        <img src="https://picsum.photos/640/400/?random" alt=""
                        class="rounded-full w-12 h-12 col-span-1 row-span-1 inline-block mr-4">
                        <span>par <a @click.prevent="" href="" class="hover:underline">utilisateur</a></span><span> - </span><span>34min</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center h-16">
                <a @click.prevent="" href="">
                    <img :src="heart_icon_hovered == true ? full_heart : empty_heart" alt=""
                    class="w-8 h-8 mr-8 playlist-icons"
                    @mouseover="heart_icon_hovered = true"
                    @mouseleave="heart_icon_hovered = null">
                </a>
                <a @click.prevent="" href="">
                    <img :src="share_icon_hovered == true ? full_share : empty_share " alt=""
                    class="w-8 h-8 playlist-icons"
                    @mouseover="share_icon_hovered = true"
                    @mouseleave="share_icon_hovered = null">
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 grid-flow-row">
            <div class="grid playlist-grid">
                <div class="col-span-1 text-gray-500">
                    N°
                </div>
                <div class="col-span-1 text-gray-500">
                    TITRE
                </div>
                <div class="col-span-1 text-gray-500">
                    ALBUM
                </div>
                <div class="col-span-1 text-gray-500">
                    TIME
                </div>
            </div>
            <div class="border-b-2 border-gray-500 col-span-1 row-span-1">

            </div>
            <div class="grid playlist-grid">
                <div class="col-span-1 row-span-1 flex items-center">
                    1
                </div>
                <div class="col-span-1 row-span-1 flex flex-row py-2">
                    <img src="img/discovery.jpg" alt=""
                    class="rounded-xl w-12 h-12">
                    <div class="flex flex-col ml-4">
                        <span class="font-semibold">Digital Love</span>
                        <span class="text-gray-500">Daft Punk</span>
                    </div>
                </div>
                <div class="col-span-1 row-span-1 font-semibold text-gray-500 flex items-center justify-between">
                    <span>Discovery</span>
                    <a @click.prevent="" href="">
                        <img src="img/heart.svg" alt=""
                        class="w-6 h-6 mr-4 playlist-icons">
                    </a>
                </div>
                <div class="col-span-1 row-span-1 font-semibold text-gray-500 flex items-center">
                    05:01
                </div>
            </div>
            <div class="grid playlist-grid">
                <div class="col-span-1 row-span-1 flex items-center">
                    2
                </div>
                <div class="col-span-1 row-span-1 flex flex-row py-2">
                    <img src="img/discovery.jpg" alt=""
                    class="rounded-xl w-12 h-12">
                    <div class="flex flex-col ml-4">
                        <span class="font-semibold">Digital Love</span>
                        <span class="text-gray-500">Daft Punk</span>
                    </div>
                </div>
                <div class="col-span-1 row-span-1 font-semibold text-gray-500 flex items-center justify-between">
                    <span>Discovery</span>
                    <a @click.prevent="" href="">
                        <img src="img/heart.svg" alt=""
                        class="w-6 h-6 mr-4 playlist-icons">
                    </a>
                </div>
                <div class="col-span-1 row-span-1 font-semibold text-gray-500 flex items-center">
                    05:01
                </div>
            </div>
            <div class="grid playlist-grid">
                <div class="col-span-1 row-span-1 flex items-center">
                    3
                </div>
                <div class="col-span-1 row-span-1 flex flex-row py-2">
                    <img src="img/discovery.jpg" alt=""
                    class="rounded-xl w-12 h-12">
                    <div class="flex flex-col ml-4">
                        <span class="font-semibold">Digital Love</span>
                        <span class="text-gray-500">Daft Punk</span>
                    </div>
                </div>
                <div class="col-span-1 row-span-1 font-semibold text-gray-500 flex items-center justify-between">
                    <span>Discovery</span>
                    <a @click.prevent="" href="">
                        <img src="img/heart.svg" alt=""
                        class="w-6 h-6 mr-4 playlist-icons">
                    </a>
                </div>
                <div class="col-span-1 row-span-1 font-semibold text-gray-500 flex items-center">
                    05:01
                </div>
            </div>
            

        </div>
    </div>
</template>

<script>
import AppLayout from '../Layouts/AppLayout.vue'
    export default {
        components: {AppLayout},
        data() {
            return {
                empty_heart: 'img/heart.svg',
                full_heart:'img/heart_full.svg',
                heart_icon_hovered: null,
                empty_share: 'img/share.svg',
                full_share:'img/share_full.svg',
                share_icon_hovered: null
            }
        },
    }
</script>

<style lang="scss" scoped>
    .playlist-icons{
        filter: invert(1) brightness(0.4);
        &:hover{
            filter:invert(1) brightness(0.7);
        }
    }
    .playlist-grid{
        grid-template-columns: 0.5fr 1.5fr 1.5fr 0.5fr;
    }
</style>