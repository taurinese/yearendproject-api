<template>
    <div class="px-48 text-white">
        <app-layout/>
        <h2 class="text-xl text-white font-bold my-16">Contact</h2>
        <div class="grid grid-cols-2 grid-flow-row gap-y-10">
            <div class="contact-image col-span-2 row-span-1">
                <img src="https://picsum.photos/640/400/?random" alt="contact"
                class="rounded-xl w-full h-96">
            </div>
            <div class="col-span-1 row-span-1 ">
                <h2>Paris</h2>
                <p>19 rue Yves Toudic, 75010, Paris</p>
                <p>contact@ecole-webstart.com</p>
                <p>01 42 41 97 76</p>
            </div>
            <div class="col-span-1 row-span-1">
                <div id="map"></div>
            </div>
        </div>
        <h2 class="col-span-2 row-span-1 text-xl text-white font-bold my-16">Formulaire de contact</h2>
        <form class="col-span-2 row-span-1" action="">
            <div class="flex flex-row justify-between mb-12">
                <input class="w-4/12 rounded-lg focus:outline-none focus:ring-0 border-0 text-black" type="text" name="name" id="name" placeholder="Nom complet">
                <input class="w-7/12 rounded-lg focus:outline-none focus:ring-0 border-0 text-black" type="email" name="email" id="email" placeholder="Adresse email">
            </div>
            <div class="w-full bg-white rounded-lg">
                <input class="w-full border-b-2 border-black rounded-t-lg focus:outline-none focus:ring-0 border-0 text-black" type="text" name="subject" id="subject" placeholder="Objet du message">
                <textarea class="w-full rounded-lg focus:outline-none focus:ring-0 border-0 text-gray-800" type="text" name="body" id="body">Corps du message</textarea>
            </div>
            <button class="bg-black text-white rounded-xl px-4 py-2 my-8" type="submit">Envoyer</button>
        </form>
    </div>
</template>

<script>
import AppLayout from '../Layouts/AppLayout.vue'
    export default {
        components: {
            AppLayout
        },
    }
    
</script>

<style lang="scss" scoped>
    /* input{
        border-radius:10px;
    } */
</style>