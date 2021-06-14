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
            <label class="text-xl w-1/5 text-left" for="first_name">Nom</label>
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
            <label class="text-xl w-1/5 text-left" for="first_name"
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
            <label class="text-xl w-1/5 text-left" for="first_name"
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
            <label class="text-xl w-1/5 text-left" for="first_name"
                >Avatar</label
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
                type="file"
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
                "
            >
                Se déconnecter de tous les appareils
            </button>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped></style>
