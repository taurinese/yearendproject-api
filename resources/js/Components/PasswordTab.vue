<template>
    <div>
        <div v-if="errors.length > 0" class="w-full p-4">
            <div v-for="element in errors" :key="element">
                <div
                    class="
                        bg-red-100
                        border border-red-400
                        text-red-700
                        px-4
                        py-3
                        rounded
                        relative
                        mb-3
                    "
                    role="alert"
                    v-for="error in element"
                    :key="error"
                >
                    <strong class="font-bold">Erreur! </strong>
                    <span class="block sm:inline">{{ error[0] }}</span>
                </div>
            </div>
        </div>
        <div
            class="
                bg-green-100
                border border-green-400
                text-green-700
                px-4
                py-3
                rounded
                relative
                mb-3
            "
            role="alert"
            v-if="success"
        >
            <strong class="font-bold">Success! </strong>
            <span class="block sm:inline">{{ success }}</span>
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-2/5 text-left" for="current_password"
                >Mot de passe actuel</label
            >
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="current_password"
                id="current_password"
                type="password"
                v-model="form.currentPassword"
            />
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-2/5 text-left" for="new_password"
                >Nouveau mot de passe</label
            >
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="new_password"
                id="new_password"
                type="password"
                v-model="form.newPassword"
            />
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-2/5 text-left" for="confirm_password"
                >Répéter le nouveau mot de passe</label
            >
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="confirm_password"
                id="confirm_password"
                type="password"
                v-model="form.confirmPassword"
            />
        </div>
        <button
            class="
                bg-blue-primary
                text-white
                rounded-xl
                focus:outline-none
                focus:ring-0
                border-0
                px-4
                ml-4
            "
            @click.prevent="updatePassword"
        >
            Modifier le mot de passe
        </button>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "PasswordTab",
    data() {
        return {
            form: {
                currentPassword: "",
                newPassword: "",
                confirmPassword: "",
            },
            errors: [],
            success: "",
        };
    },
    methods: {
        updatePassword() {
            axios
                .post("/upload/password", this.form)
                .then((response) => {
                    console.log(response);
                    this.errors = [];
                    this.success = response.data.messages;
                    this.resetForm;
                })
                .catch((error) => {
                    console.log(error.response.data.errors);
                    this.errors = [];
                    this.errors.push(error.response.data.errors);
                    this.resetForm;
                });
        },
        resetForm() {
            this.form.currentPassword = "";
            this.form.newPassword = "";
            this.form.confirmPassword = "";
        },
    },
};
</script>

<style scoped></style>
