<template>
    <app-layout/>
    <breeze-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div class="flex flex-row justify-between items-center">
            <breeze-label for="email" value="Adresse mail" />
            <breeze-input id="email" type="email" class="mt-1 block w-2/3" v-model="form.email" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4 flex flex-row justify-between items-center">
            <breeze-label for="password" value="Mot de passe" />
            <breeze-input id="password" type="password" class="mt-1 block w-2/3" v-model="form.password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <breeze-checkbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Forgot your password?
            </inertia-link>

            <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </breeze-button>
        </div>
    </form>
    <div class="mt-6">
        <p class="text-center">ou connectez-vous à l'aide de votre compte</p>
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
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from "@/Layouts/Guest"
    import BreezeInput from '@/Components/Input'
    import BreezeCheckbox from '@/Components/Checkbox'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'
    import AppLayout from '../../Layouts/AppLayout.vue'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeCheckbox,
            BreezeLabel,
            BreezeValidationErrors,
            AppLayout
        },

        props: {
            auth: Object,
            canResetPassword: Boolean,
            errors: Object,
            status: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
<style lang="scss" scoped>
    .bg-gray-100{
        background-color:transparent !important;
    }
</style>