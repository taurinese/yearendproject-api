<template>
    <div class="w-3/4 card mr-4 border-2 border-black rounded-lg relative">
        <div class="bg-blue-primary h-1/2 rounded-t-lg">
            <h3 class="pl-4 pt-4 text-white text-2xl">{{ name }}</h3>
        </div>
        <div
            class="
                flex flex-col
                justify-between
                h-1/2
                divide-y divide-gray-500 divide-solid
                px-4
            "
        >
            <p class="py-4">
                {{ content }}
            </p>
            <p class="text-sm py-4">
                <span class="text-base font-medium">{{ price / 100 }}€</span
                ><span v-if="name == 'annuel'">/an</span
                ><span v-else>/mois</span>
            </p>
        </div>
        <button
            class="
                bg-blue-primary
                px-4
                py-2
                rounded-lg
                absolute
                left-1/2
                top-full
                text-white
            "
            @click="displayStripeModal"
            v-if="subscribable"
        >
            Modifier
        </button>
        <div
            v-if="show"
            class="
                payment-modal
                fixed
                top-1/2
                left-1/2
                w-2/5
                h-2/5
                border-2 border-blue-primary
                rounded-lg
            "
        >
            <stripe-modal
                @close="show = false"
                :card="card"
                :stripe="stripe"
                :secret="secret"
                :token="token"
                :id="id"
            />
        </div>
    </div>
</template>

<script>
import StripeModal from "../Components/StripeModal.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";
export default {
    name: "SubscribeCard",
    components: {
        StripeModal,
    },
    props: ["name", "subscribable", "content", "price", "id"],
    data() {
        return {
            show: false,
            token: process.env.VUE_APP_AUTH_TOKEN,
            secret: null,
            stripe: null,
            payment_method: null,
            card: null,
        };
    },
    methods: {
        displayStripeModal() {
            this.show = true;
            this.$nextTick(function () {
                // console.log(this.stripeKey);
                this.stripe = window.Stripe(this.stripeKey);
                const elements = this.stripe.elements();
                this.card = elements.create("card");
                this.card.mount("#card-element");
                axios
                    .post("/stripe/intent")
                    .then((response) => {
                        console.log(response.data);
                        this.secret = response.data.client_secret;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            });
        },
    },
    mounted() {},
    setup() {
        const stripeKey = computed(() => usePage().props.value.stripe_key);
        return { stripeKey };
    },
};
</script>

<style lang="scss" scoped>
.card {
    height: 250px;
}
button {
    transform: translate(-50%, -50%);
}
.payment-modal {
    transform: translate(-50%, -50%);
    z-index: 2000;
    background-color: white;
}
</style>
