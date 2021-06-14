<template>
    <div class="w-3/4 card mr-4 border-2 border-black rounded-lg relative">
        <div class="bg-blue-primary h-1/2 rounded-t-lg">
            <h3 class="pl-4 pt-4 text-white text-2xl">{{ name }}</h3>
        </div>
        <div
            class="
                flex flex-col
                justify-between
                h-1/2
                divide-y divide-gray-500 divide-solid
                px-4
            "
        >
            <p class="py-4">
                Écoutez votre musique uniquement en mode aléatoire, avec des
                pubs.
            </p>
            <p class="text-sm py-4">
                <span class="text-base font-medium">0.00€</span>/mois
            </p>
        </div>
        <button
            class="
                bg-blue-primary
                px-4
                py-2
                rounded-lg
                absolute
                left-1/2
                top-full
                text-white
            "
            v-if="subscribable"
        >
            Modifier
        </button>
    </div>
</template>

<script>
export default {
    name: "SubscribeCard",
    props: ["name", "subscribable"],
};
</script>

<style lang="scss" scoped>
.card {
    height: 250px;
}
button {
    transform: translate(-50%, -50%);
}
</style>
