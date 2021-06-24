<template>
    <layout>
        <div class="container">
            <nav class="nav hidden lg:block">
                <ul>
                    <li>
                        <inertia-link href="/">
                            <img
                                class="nav-icons"
                                src="img/spotifree.svg"
                                alt="spotifree"
                            />
                            <!-- <span class="nav-opened-text">Home</span> -->
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/search">
                            <img
                                class="nav-icons"
                                src="img/search.svg"
                                alt="account"
                            />
                            <span class="nav-opened-text">Search</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/account">
                            <img
                                class="nav-icons"
                                src="img/account.svg"
                                alt="account"
                            />
                            <span class="nav-opened-text">Account</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/news">
                            <img
                                class="nav-icons"
                                src="img/promotion.svg"
                                alt="account"
                            />
                            <span class="nav-opened-text">Actualités</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/contact">
                            <img
                                class="nav-icons"
                                src="img/letter.svg"
                                alt="account"
                            />
                            <span class="nav-opened-text">Contact</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/library">
                            <img
                                class="nav-icons"
                                src="img/guitar.svg"
                                alt="account"
                            />
                            <span class="nav-opened-text">Bibliothèque</span>
                        </inertia-link>
                    </li>
                    <li v-if="admin">
                        <inertia-link href="/admin">
                            <img
                                class="nav-icons"
                                src="img/admin.svg"
                                alt="admin"
                            />
                            <span class="nav-opened-text">Administration</span>
                        </inertia-link>
                    </li>
                    <li v-if="user">
                        <inertia-link href="/logout" method="post">
                            <img
                                class="nav-icons"
                                src="img/logout.svg"
                                alt="logout"
                            />
                            <span class="nav-opened-text">Déconnexion</span>
                        </inertia-link>
                    </li>
                </ul>
            </nav>
        </div>
    </layout>
</template>

<script>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        const admin = computed(() => usePage().props.value.admin);
        return { user, admin };
    },
};
</script>

<style lang="scss">
body {
    background-color: #15202b;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif !important;
}

/* Hide scrollbar for Chrome, Safari and Opera */
*::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
* {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
}
div.container {
    max-width: 100vw;
}
nav.nav {
    position: fixed;
    left: 0;
    top: 0;
    background-color: black;
    height: 100%;
    color: white;
    width: 80px;
    transition: width 0.5s ease-in-out;
    z-index: 9999;

    ul {
        display: flex;
        flex-flow: column;
        justify-content: space-evenly;
        align-items: left;
        height: 60%;
        width: 100%;
        transform: translate(25%, 0);

        li {
            position: relative;

            &:first-child {
                transition: transform 0.5s ease;
            }
        }
    }

    .nav-icons {
        filter: brightness(0) invert(1);
        width: 40px;
        height: 40px;
        display: inline-block;
    }

    .nav-opened-text {
        display: block;
        opacity: 0;
        top: 50%;
        transform: translate(0%, -50%);
        position: absolute;
        margin-left: 60px;
    }

    &:hover {
        transition: width 0.5s ease-in-out;
        width: 300px;

        .nav-opened-text {
            display: block;
            /* animation: 1s fadeInOpacity; */
            transition: opacity 1s ease;
            opacity: 1;
        }

        ul li:first-child {
            /* align-self:center; */
            transform: translate(20%, 0%);
            transition: transform 0.5s ease;
        }
    }
}

@keyframes fadeInOpacity {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes fadeOutOpacity {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
</style>
