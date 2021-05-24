<template>
    <breeze-validation-errors class="mb-4" />
    <app-layout />
    <form @submit.prevent="submit">
        <div class="flex flex-row justify-between items-center">
            <breeze-label for="name" value="Name" />
            <breeze-input
                id="name"
                type="text"
                class="mt-1 block w-2/3"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />
        </div>

        <div class="mt-4 flex flex-row justify-between items-center">
            <breeze-label for="username" value="Username" />
            <breeze-input
                id="username"
                type="text"
                class="mt-1 block w-2/3"
                v-model="form.username"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div class="mt-4 flex flex-row justify-between items-center">
            <breeze-label for="email" value="Email" />
            <breeze-input
                id="email"
                type="email"
                class="mt-1 block w-2/3"
                v-model="form.email"
                required
                autocomplete="username"
            />
        </div>

        <div class="mt-4 flex flex-row justify-between items-center">
            <breeze-label for="password" value="Password" />
            <breeze-input
                id="password"
                type="password"
                class="mt-1 block w-2/3"
                v-model="form.password"
                required
                autocomplete="new-password"
            />
        </div>

        <!-- <div class="mt-4">
            <breeze-label
                for="password_confirmation"
                value="Confirm Password"
            />
            <breeze-input
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
            />
        </div> -->

        <div class="flex items-center justify-end mt-4">
            <inertia-link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
            >
                Already registered?
            </inertia-link>

            <breeze-button
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Register
            </breeze-button>
        </div>
    </form>
    <div class="mt-6">
        <p class="text-center">ou inscrivez-vous à l'aide de votre compte</p>
        <div class="flex flex-row justify-evenly items-center h-24 mt-6">
            <a href="">
                <img src="img/facebook.svg" alt=""
                class="w-12 h-12">
            </a>
            <a href="">
                <img src="img/google.svg" alt=""
                class="w-12 h-12">
            </a>
            <a href="">
                <img src="img/twitter.svg" alt=""
                class="w-12 h-12">
            </a>
        </div>
    </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import BreezeGuestLayout from "@/Layouts/Guest";
import BreezeInput from "@/Components/Input";
import BreezeLabel from "@/Components/Label";
import BreezeValidationErrors from "@/Components/ValidationErrors";
import AppLayout from "../../Layouts/AppLayout.vue";

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        AppLayout,
    },
    props: {
        auth: Object,
        errors: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false,
                username: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>
