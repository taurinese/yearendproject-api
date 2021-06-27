<template>
    <layout>
        <div class="container">
            <nav class="nav hidden lg:block">
                <ul>
                    <li>
                        <inertia-link href="/">
                            <img
                                class="nav-icons"
                                src="/img/spotifree.svg"
                                alt="spotifree"
                            />
                            <!-- <span class="nav-opened-text">Home</span> -->
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/search">
                            <img
                                class="nav-icons"
                                src="/img/search.svg"
                                alt="search"
                            />
                            <span class="nav-opened-text">Search</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/account">
                            <img
                                class="nav-icons"
                                src="/img/account.svg"
                                alt="account"
                            />
                            <span class="nav-opened-text">Account</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/news">
                            <img
                                class="nav-icons"
                                src="/img/promotion.svg"
                                alt="news"
                            />
                            <span class="nav-opened-text">Actualités</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/contact">
                            <img
                                class="nav-icons"
                                src="/img/letter.svg"
                                alt="contact"
                            />
                            <span class="nav-opened-text">Contact</span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/library">
                            <img
                                class="nav-icons"
                                src="/img/guitar.svg"
                                alt="library"
                            />
                            <span class="nav-opened-text">Bibliothèque</span>
                        </inertia-link>
                    </li>
                    <li v-if="admin">
                        <inertia-link href="/admin">
                            <img
                                class="nav-icons"
                                src="/img/admin.svg"
                                alt="admin"
                            />
                            <span class="nav-opened-text">Administration</span>
                        </inertia-link>
                    </li>
                    <li v-if="user">
                        <inertia-link href="/logout" method="post">
                            <img
                                class="nav-icons"
                                src="/img/logout.svg"
                                alt="logout"
                            />
                            <span class="nav-opened-text">Déconnexion</span>
                        </inertia-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="menu flex lg:hidden" :class="{ active: menuOpened }">
            <div @click="openMenu" class="burger"></div>
            <div class="menu-opened nav">
                <ul class="burger-list">
                    <li @click="goToUrl('/', 'get')" class="relative">
                        <img
                            class="nav-icons"
                            src="/img/spotifree.svg"
                            alt="spotifree"
                        />
                        <p class="nav-opened-text">Home</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>

                    <li @click="goToUrl('/search', 'get')" class="relative">
                        <img
                            class="nav-icons"
                            src="/img/search.svg"
                            alt="search"
                        />
                        <p class="nav-opened-text">Search</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>

                    <li @click="goToUrl('/account', 'get')" class="relative">
                        <img
                            class="nav-icons"
                            src="/img/account.svg"
                            alt="account"
                        />
                        <p class="nav-opened-text">Account</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>

                    <li @click="goToUrl('/news', 'get')" class="relative">
                        <img
                            class="nav-icons"
                            src="/img/promotion.svg"
                            alt="news"
                        />
                        <p class="nav-opened-text">Actualités</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>

                    <li @click="goToUrl('/contact', 'get')" class="relative">
                        <img
                            class="nav-icons"
                            src="/img/letter.svg"
                            alt="contact"
                        />
                        <p class="nav-opened-text">Contact</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>

                    <li @click="goToUrl('/library', 'get')" class="relative">
                        <img
                            class="nav-icons"
                            src="/img/guitar.svg"
                            alt="library"
                        />
                        <p class="nav-opened-text">Bibliothèque</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>
                    <li
                        v-if="admin"
                        @click="goToUrl('/admin', 'get')"
                        class="relative"
                    >
                        <img
                            class="nav-icons"
                            src="/img/admin.svg"
                            alt="admin"
                        />
                        <p class="nav-opened-text">Administration</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>
                    <li
                        v-if="user"
                        @click="goToUrl('/logout', 'post')"
                        class="relative"
                    >
                        <img
                            class="nav-icons"
                            src="/img/logout.svg"
                            alt="logout"
                        />
                        <p class="nav-opened-text">Déconnexion</p>
                        <img
                            src="/img/right-arrow.svg"
                            class="
                                w-4
                                h-4
                                absolute
                                top-1/2
                                transform
                                -translate-y-1/2
                                right-4
                                arrows
                            "
                            alt="right arrow"
                        />
                    </li>
                </ul>
            </div>
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
    data() {
        return {
            menuOpened: false,
        };
    },
    methods: {
        openMenu() {
            this.menuOpened = !this.menuOpened;
        },
        goToUrl(url, method) {
            this.$inertia.visit(url, {
                method: method,
                onStart: () => {
                    this.menuOpened = false;
                },
            });
        },
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

.arrows {
    filter: invert(1);
}
// Burger
.menu {
    position: absolute;
    top: 3%;
    left: 5%;
    height: 30px;
    width: 40px;
    // display: flex;
    align-items: center;
    /* cursor: pointer; */
}
.menu.active .burger {
    width: 0px;
    border: none;
    transition: width 0.5s, border 0.5s;
}
.menu.active .burger:before {
    width: 40px;
    transform: rotate(45deg);
    top: 0;
    left: 0;
    transition: width 0.5s, transform 0.5s;
}
.menu.active .burger:after {
    width: 40px;
    transform: rotate(-45deg);
    top: 0px;
    left: 0;
    transition: width 0.5s, transform 0.5s;
}
.menu .menu-opened {
    position: absolute;
    top: -3vh;
    left: -105vw;
    width: 100vw;
    height: 100vh;
    padding: 2vh;
    z-index: 10;
    background-color: #15202b;
    transform: translateX(0);
    transition: transform 0.5s ease-in-out;
    display: flex;
    flex-flow: row;
    align-items: center;
    justify-content: center;
}
.menu.active .menu-opened {
    transform: translateX(100vw);
    transition: transform 0.5s ease-in-out;
}
.burger {
    position: relative;
    content: "";
    width: 40px;
    height: 1px;
    border: 1px white solid;
    border-radius: 5px;
    background-color: white;
    transition: width 0.5s, border 0.5s;
    z-index: 15;
}
.burger:before {
    position: absolute;
    top: -10px;
    left: 0;
    content: "";
    width: 15px;
    border: 1px white solid;
    border-radius: 5px;
    background-color: white;
    transition: width 0.5s, transform 0.5s;
}
.burger:after {
    position: absolute;
    top: 10px;
    left: 0;
    content: "";
    width: 25px;
    background-color: white;
    border: 1px white solid;
    border-radius: 5px;
    transition: width 0.5s, transform 0.5s;
}

div.nav {
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
    .burger-list {
        transform: none;
        li {
            // display: flex;
            // justify-content: space-evenly;
            width: 100%;
            padding: 12px 10% 12px 10%;
            border-bottom: 1px solid white;
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
    .burger-list li p {
        opacity: 1;
        // width: 80%;
        // margin-right: 0;
        margin-left: 15%;
        text-align: left;
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

/* ----------------------- */
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
