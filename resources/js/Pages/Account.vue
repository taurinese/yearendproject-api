<template>
    <div class="px-48 mt-12">
        <h2 class="text-xl text-white font-bold my-16">Compte</h2>
        <div class="bg-white w-full h-full rounded flex">
            <nav>
                <div
                    class="
                        border-b-2 border-gray-500
                        text-xl
                        py-4
                        pr-4
                        ml-4
                        cursor-pointer
                    "
                    :class="{ 'text-blue-300': activeTab == 'profile' }"
                    @click="switchTab('profile')"
                >
                    Mon profil
                </div>
                <div
                    class="
                        border-b-2 border-gray-500
                        text-xl
                        py-4
                        pr-4
                        ml-4
                        cursor-pointer
                    "
                    :class="{ 'text-blue-300': activeTab == 'password' }"
                    @click="switchTab('password')"
                >
                    Mot de passe
                </div>
                <div
                    class="text-xl py-4 pr-4 ml-4 cursor-pointer"
                    :class="{ 'text-blue-300': activeTab == 'subscribe' }"
                    @click="switchTab('subscribe')"
                >
                    Abonnements
                </div>
            </nav>
            <div class="w-full py-8 pl-8">
                <!-- {{ activeTab }} -->
                <profile-tab v-if="activeTab == 'profile'" />
                <password-tab v-if="activeTab == 'password'" />
                <subscribe-tab v-if="activeTab == 'subscribe'" />
            </div>
        </div>
        <app-layout />
    </div>
</template>
<script>
import AppLayout from "../Layouts/AppLayout.vue";
import ProfileTab from "../Components/ProfileTab.vue";
import PasswordTab from "../Components/PasswordTab.vue";
import SubscribeTab from "../Components/SubscribeTab.vue";
export default {
    name: "Account",
    components: {
        AppLayout,
        ProfileTab,
        PasswordTab,
        SubscribeTab,
    },
    data() {
        return {
            activeTab: "profile",
        };
    },
    methods: {
        switchTab(tab) {
            this.activeTab = tab;
        },
    },
};
</script>
<style lang="scss" scoped>
nav {
    position: relative;
    &::after {
        content: "";
        width: 2px;
        height: 100%;
        position: absolute;
        left: 110%;
        top: 0%;
        background: linear-gradient(
            to bottom,
            transparent,
            lightgray,
            transparent
        );
        z-index: 999;
    }
}
</style>
