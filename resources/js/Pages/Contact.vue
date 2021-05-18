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
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2624.35245957368!2d2.3625182656748254!3d48.8705571292887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1swebstart%20paris!5e0!3m2!1sfr!2sfr!4v1621329510848!5m2!1sfr!2sfr" 
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
        <h2 class="col-span-2 row-span-1 text-xl text-white font-bold my-16">Formulaire de contact</h2>
        <form class="col-span-2 row-span-1" action="" @submit.prevent="sendMail">
            <div class="flex flex-row justify-between mb-12">
                <input class="w-4/12 rounded-lg focus:outline-none focus:ring-0 border-0 text-black" type="text" name="name" id="name" placeholder="Nom complet" v-model="form.name">
                <input class="w-7/12 rounded-lg focus:outline-none focus:ring-0 border-0 text-black" type="email" name="email" id="email" placeholder="Adresse email" v-model="form.email">
            </div>
            <div class="w-full bg-white rounded-lg">
                <input class="w-full border-b-2 border-black rounded-t-lg focus:outline-none focus:ring-0 border-0 text-black" type="text" name="subject" id="subject" placeholder="Objet du message" v-model="form.subject">
                <textarea class="w-full rounded-lg focus:outline-none focus:ring-0 border-0 text-black" type="text" name="body" id="body" placeholder="Corps du message"  v-model="form.body"></textarea>
            </div>
            <button class="bg-black text-white rounded-xl px-4 py-2 my-8 focus:outline-none focus:ring-0 border-0" type="submit">Envoyer</button>
        </form>
    </div>
</template>

<script>
import AppLayout from '../Layouts/AppLayout.vue'
    export default {
        components: {
            AppLayout
        },
        data() {
            return {
                form: {
                    email: '',
                    name:'',
                    subject:'',
                    body:''
                }
            }
        },
        methods: {
            sendMail(){
                console.log(this.form);
            }
        },
    }
    
</script>

<style lang="scss" scoped>
    /* input{
        border-radius:10px;
    } */
    #email, #name{
        background-size: 30px;
        background-repeat: no-repeat;
        background-position: 10px;
        padding-left: 50px;
    }
    #email {
        background-image: url("../../../public/img/letter.svg");
    }
    #name {
        background-image: url("../../../public/img/user.svg");
    }
</style>