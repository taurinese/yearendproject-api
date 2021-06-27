<template>
    <div
        class="
            min-h-screen
            flex flex-col
            sm:justify-center
            items-center
            pt-6
            sm:pt-0
        "
    >
        <div>
            <inertia-link href="/">
                <breeze-application-logo
                    class="w-20 h-20 fill-current text-gray-500"
                />
            </inertia-link>
        </div>

        <div
            class="
                w-full
                sm:max-w-lg
                mt-6
                px-16
                py-8
                bg-white
                shadow-md
                overflow-hidden
                sm:rounded-lg
            "
        >
            <div
                class="
                    flex flex-row
                    justify-evenly
                    items-center
                    text-center
                    mb-6
                "
            >
                <inertia-link
                    href="/login"
                    @click="switchTab"
                    :class="[login ? 'bg-primary text-white' : '']"
                    class="
                        hover:bg-primary hover:text-white
                        p-4
                        rounded-l-lg
                        border-r border-black
                        w-1/2
                        cursor-pointer
                    "
                    >LOGIN</inertia-link
                >
                <inertia-link
                    href="/register"
                    @click="switchTab"
                    :class="[register ? 'bg-primary text-white' : '']"
                    class="
                        hover:bg-primary hover:text-white
                        p-4
                        rounded-r-lg
                        w-1/2
                        cursor-pointer
                    "
                    >REGISTER</inertia-link
                >
            </div>
            <slot />
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";

export default {
    components: {
        BreezeApplicationLogo,
    },
    data() {
        return {
            login: false,
            register: false,
        };
    },
    methods: {
        switchTab: function () {
            if (this.register) {
                this.login = true;
                this.register = false;
                console.log("login" + this.login);
            } else if (this.login) {
                this.login = false;
                this.register = true;
                console.log("register" + this.register);
            }
            console.log(this.$route);
        },
    },
    created() {
        let currentUrl = window.location.pathname.substring(
            window.location.pathname.lastIndexOf("/") + 1
        );
        if (currentUrl == "login") {
            this.login = true;
            this.register = false;
        } else {
            this.login - false;
            this.register = true;
        }
    },
};
</script>
<style lang="scss" scoped></style>
