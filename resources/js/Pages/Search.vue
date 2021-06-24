<template>
    <div class="px-48">
        <app-layout />
        <div class="search relative mt-12">
            <input
                type="text"
                name="search-input"
                id="search-input"
                class="
                    rounded-full
                    w-96
                    text-md
                    focus:w-full
                    focus:outline-none
                    focus:ring-0
                    border-0
                "
                placeholder="Rechercher un article, une chanson, un artiste..."
                autocomplete="off"
                v-model="search"
                @keyup.enter="searchResult"
            />
            <img
                class="search-icon absolute"
                src="img/search.svg"
                alt="search"
            />
            <img
                v-if="search.length > 0"
                src="img/close.svg"
                alt="close"
                class="
                    absolute
                    w-4
                    h-4
                    right-4
                    top-1/2
                    transform
                    -translate-y-1/2
                    cursor-pointer
                "
                @click="search = ''"
            />
        </div>
        <transition name="fade">
            <div v-if="!searching">
                <news />
                <div class="py-24">
                    <h2 class="text-xl text-white font-bold mb-16">
                        Parcourir
                    </h2>
                    <div
                        class="
                            flex flex-row
                            justify-between
                            items-center
                            overflow-x-scroll
                        "
                    >
                        <div class="w-48 m-auto mr-4">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Rock
                            </div>
                        </div>
                        <div class="w-48 m-auto mr-4">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Pop
                            </div>
                        </div>
                        <div class="w-48 m-auto mr-4">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Country
                            </div>
                        </div>
                        <div class="w-48 m-auto mr-4">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Country
                            </div>
                        </div>
                        <div class="w-48 m-auto mr-4">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Country
                            </div>
                        </div>
                        <div class="w-48 m-auto mr-4">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Country
                            </div>
                        </div>
                        <div class="w-48 m-auto">
                            <div
                                class="
                                    music-card
                                    rounded-xl
                                    w-48
                                    h-48
                                    bg-red-400
                                    flex flex-row
                                    justify-center
                                    items-center
                                "
                            >
                                Country
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <transition name="fade">
            <div v-if="results.length > 0" class="mt-24">
                <div v-for="result in results" :key="result">
                    <news-card
                        :title="result.title"
                        :body="result.body"
                        author="Enzo"
                        :datetime="result.published_at"
                        :img="result.url_image"
                    />
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import News from "../Components/NewsSlider.vue";
import NewsCard from "../Components/NewsCard.vue";
import AppLayout from "../Layouts/AppLayout.vue";
import axios from "axios";

export default {
    components: { AppLayout, News, NewsCard },
    data() {
        return {
            search: "",
            results: [],
            searching: false,
        };
    },
    methods: {
        searchResult() {
            this.searching = true;
            axios
                .post("/search", { search: this.search })
                .then((response) => {
                    this.results = response.data;
                    console.log(this.results);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
input[type="text"] {
    padding-left: 50px;
    &::placeholder {
        font-size: 14px;
        color: darkgrey;
    }
}
.search-icon {
    width: 20px;
    height: 20px;
    left: 15px;
    bottom: 10px;
}
#search-input {
    width: 24rem;
    transition: ease-in-out width 0.75s;
    &:focus {
        width: 100%;
        transition: ease-in-out width 0.5s;
    }
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
