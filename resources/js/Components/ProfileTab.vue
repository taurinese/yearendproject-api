<template>
    <div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-1/5 text-left" for="first_name"
                >Prénom</label
            >
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="first_name"
                id="first_name"
                type="text"
                :value="user.name"
            />
            <button
                class="
                    bg-blue-primary
                    text-white
                    rounded-xl
                    focus:outline-none
                    focus:ring-0
                    border-0
                    px-4
                "
            >
                Modifier
            </button>
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-1/5 text-left" for="last_name">Nom</label>
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="last_name"
                id="last_name"
                type="text"
                :value="user.name"
            />
            <button
                class="
                    bg-blue-primary
                    text-white
                    rounded-xl
                    focus:outline-none
                    focus:ring-0
                    border-0
                    px-4
                "
            >
                Modifier
            </button>
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-1/5 text-left" for="email"
                >Adresse mail</label
            >
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="email"
                id="email"
                type="email"
                :value="user.email"
            />
            <button
                class="
                    bg-blue-primary
                    text-white
                    rounded-xl
                    focus:outline-none
                    focus:ring-0
                    border-0
                    px-4
                "
            >
                Modifier
            </button>
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-1/5 text-left" for="username"
                >Nom d'utilisateur</label
            >
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                name="username"
                id="username"
                type="text"
                :value="user.username"
            />
            <button
                class="
                    bg-blue-primary
                    text-white
                    rounded-xl
                    focus:outline-none
                    focus:ring-0
                    border-0
                    px-4
                "
            >
                Modifier
            </button>
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-1/5 text-left" for="avatar">Avatar</label>
            <input
                class="
                    w-2/3
                    border-0 border-b-2
                    focus:outline-none
                    focus:ring-0
                    p-0
                "
                @input="avatar = $event.target.files[0]"
                @change="onFileChange"
                name="avatar"
                id="avatar"
                type="file"
            />
            <button
                @click.prevent="uploadImg"
                class="
                    bg-blue-primary
                    text-white
                    rounded-xl
                    focus:outline-none
                    focus:ring-0
                    border-0
                    px-4
                "
            >
                Ajouter
            </button>
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-1/5 text-left" for="first_name"
                >Aperçu</label
            >
            <div class="w-2/3">
                <img
                    v-if="url"
                    :src="url"
                    :alt="avatar.name"
                    width="200"
                    height="200"
                    class="rounded-lg"
                />
                <p v-else>Aucune image sélectionnée...</p>
            </div>
            <button
                @click.prevent="uploadImg"
                class="
                    bg-blue-primary
                    text-white
                    rounded-xl
                    focus:outline-none
                    focus:ring-0
                    border-0
                    px-4
                    invisible
                "
            >
                Ajouter
            </button>
        </div>
        <div class="p-4">
            <h3 class="text-xl mb-4">Se déconnecter de tous les appareils</h3>
            <p>
                Cette opération vous déconnecte de Spotify sur tous les services
                sur lesquels vous êtes connecté.
            </p>
            <p class="mb-4 text-sm font-bold">
                Remarque : un certain délai peut s'écouler avant que la
                déconnexion soit prise en compte sur le lecteur web.
            </p>
            <button
                class="
                    border
                    rounded-full
                    border-gray-500
                    p-2
                    text-gray-500
                    hover:text-gray-800
                    cursor-not-allowed
                "
            >
                Se déconnecter de tous les appareils
            </button>
        </div>
    </div>
</template>

<script>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return { user };
    },
    data() {
        return {
            avatar: null,
            url: null,
        };
    },
    methods: {
        uploadImg() {
            console.log(this.avatar);
            const form = useForm({
                avatar: this.avatar,
            });
            form.post("/upload/avatar");
        },
        onFileChange() {
            console.log("change");
            this.url = URL.createObjectURL(this.avatar);
        },
    },
};
</script>

<style lang="scss" scoped>
#avatar {
    &::-webkit-file-upload-button {
        visibility: hidden;
    }
}
</style>
