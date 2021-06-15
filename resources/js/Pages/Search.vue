<template>
    <div class="px-48">
        <app-layout />
        <div class="search relative">
            <input
                type="text"
                name="search-input"
                id="search-input"
                class="
                    rounded-full
                    mt-12
                    w-96
                    text-md
                    focus:w-full
                    focus:outline-none
                    focus:ring-0
                    border-0
                "
                placeholder="Rechercher un article, une chanson, un artiste..."
                autocomplete="off"
            />
            <img
                class="search-icon absolute"
                src="img/search.svg"
                alt="search"
            />
        </div>
        <news />
        <div class="py-24">
            <h2 class="text-xl text-white font-bold mb-16">Parcourir</h2>
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
</template>

<script>
import News from "../Components/NewsSlider.vue";
import AppLayout from "../Layouts/AppLayout.vue";

export default {
    components: { AppLayout, News },
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
</style>
