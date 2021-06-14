<template>
    <div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-2/5 text-left" for="first_name"
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
                name="first_name"
                id="first_name"
                type="text"
            />
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-2/5 text-left" for="first_name"
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
                name="last_name"
                id="last_name"
                type="text"
            />
        </div>
        <div class="flex justify-evenly w-full p-4">
            <label class="text-xl w-2/5 text-left" for="first_name"
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
                name="email"
                id="email"
                type="email"
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
        >
            Modifier le mot de passe
        </button>
    </div>
</template>

<script>
export default {};
</script>

<style scoped></style>
