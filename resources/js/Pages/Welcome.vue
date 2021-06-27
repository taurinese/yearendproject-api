<template>
    <div>
        <layout />
        <div class="circles">
            <div class="circle" id="circle-one"></div>
            <div class="circle" id="circle-two"></div>
            <div class="circle" id="circle-three"></div>
        </div>
        <div v-if="!user" class="welcome">
            <div class="welcome-content">
                <h2>
                    Découvrez des milliers de musiques libres de droit. Aucune
                    carte de crédit nécessaire.
                </h2>
                <inertia-link
                    href="/register"
                    as="button"
                    type="button"
                    id="btn-welcome-signup"
                    >Inscrivez-vous</inertia-link
                >
            </div>
        </div>
        <div class="px-12 lg:px-48">
            <news />
            <songs title="Nouvelles sorties" />
            <songs class="pb-24" title="Populaires" />
        </div>
    </div>
</template>

<style lang="scss" scoped>
.circles {
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    overflow: hidden;
    position: fixed;
    z-index: -1;
    .circle {
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background-color: lightgrey;
        position: absolute;
        z-index: -1;
        &#circle-one {
            top: -10%;
            left: 30%;
        }
        &#circle-two {
            top: 60%;
            left: -10%;
        }
        &#circle-three {
            top: 30%;
            left: 80%;
        }
    }
}
div.welcome {
    width: calc(100vw - 80px);
    height: 100vh;
    margin-left: 80px;
    .welcome-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        h2 {
            color: white;
            font-weight: bold;
            font-size: 48px;
        }
        #btn-welcome-signup {
            border-radius: 30px;
            background-color: #25374a;
            padding: 10px;
            border: 2px white solid;
            color: white;
            margin-top: 36px;
            margin-left: 50%;
            transform: translate(-50%, 0);
            font-size: 24px;
            &:focus {
                outline: none;
            }
            &:hover {
                background-color: darken(#25374a, 5%);
            }
        }
    }
}

@media (min-width: 440px) {
    .circles {
        .circle {
            width: 300px;
            height: 300px;
        }
    }
    div.welcome {
        margin-left: 0;
        width: 100vw;
        .welcome-content {
            display: flex;
            flex-flow: column;
            justify-content: space-evenly;
            align-items: center;
            height: 100%;
            h2 {
                font-size: 24px;
            }
            #btn-welcome-signup {
                margin: 0 auto;
                transform: none;
            }
        }
    }
}
</style>

<script>
import News from "../Components/NewsSlider.vue";
import Songs from "../Components/Songs.vue";
import Layout from "../Layouts/AppLayout";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

export default {
    props: {
        /* auth: Object,
            canLogin: Boolean,
            canRegister: Boolean,
            errors: Object,
            laravelVersion: String,
            phpVersion: String, */
    },
    name: "Welcome",
    components: {
        Layout,
        News,
        Songs,
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return { user };
    },
};
</script>
