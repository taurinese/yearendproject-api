<template>
    <div class="px-48 mt-12">
        <app-layout />
        <!-- <form class="text-white">
            <div class="mt-4 flex flex-col justify-between items-center">
                <div v-for="plan in plans" :key="plan">
                    <input
                        type="radio"
                        :name="'plan' + plan.id"
                        :id="'plan' + plan.id"
                        :value="plan.id"
                        v-model="radio"
                    />
                    <label :for="'plan' + plan.id"
                        >Abonnement {{ plan.name }}</label
                    >
                </div>
                <div>
                    <input type="radio" name="plan_2" id="plan_2" />
                    <label for="plan_2">Annuel</label>
                </div>
            </div>
            <div class="mt-4 flex flex-row justify-between items-center">
                <label for="name" value="Nom">Nom</label>
                <input
                    id="name"
                    type="text"
                    class="mt-1 block w-2/3 text-black"
                    required
                    autocomplete="new-password"
                    v-model="name"
                />
            </div>
        </form> -->
        <stripe-element-card
            ref="elementRef"
            :pk="pulishableKey"
            @token="tokenCreated"
        />
        <button
            @click="submit"
            id="checkout-button"
            class="
                bg-indigo-500
                px-5
                py-3
                text-sm
                shadow-sm
                font-medium
                tracking-wider
                border
                text-indigo-100
                rounded-full
                hover:shadow-lg
                hover:bg-indigo-600
            "
            type="submit"
        >
            Payer maintenant
        </button>
    </div>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import { StripeElementCard } from "@vue-stripe/vue-stripe";

export default {
    name: "Checkout",
    components: { AppLayout, StripeElementCard },
    props: ["plans"],
    data() {
        this.pulishableKey = process.env.VUE_APP_STRIPE_PUBLISHABLE_KEY;
        return {
            name: "",
            radio: "",
            stripeKey: "pk_test_xtkHRTTPVLpYc9by9Nv6yFZf004jrOpEwo",
            token: null,
        };
    },
    methods: {
        /* submit() {
            this.$inertia.post("/checkout", {
                name: this.name,
                radio: this.radio,
                // email: this.email,
                _token: this.$page.props.csrf_token,
            });  this.$refs.elementRef.submit();
        },*/
        tokenCreated(token) {
            console.log(token);
            // handle the token
            // send it to your server
        },
        submit() {
            // this will trigger the process
            this.$refs.elementRef.submit();
        },
    },
};
</script>

<style scoped></style>
