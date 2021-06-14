<template>
    <div>
        <stripe-element-card
            v-if="isReady"
            ref="elementRef"
            :pk="pulishableKey"
            @token="tokenCreated"
            @element-ready="isReady = true"
        />
        <button @click="isReady = true">Generate token</button>
    </div>
</template>

<script>
import { StripeElementCard } from "@vue-stripe/vue-stripe";
export default {
    components: {
        StripeElementCard,
    },
    data() {
        this.pulishableKey = process.env.VUE_APP_STRIPE_PUBLISHABLE_KEY;
        return {
            token: null,
            isReady: false,
        };
    },
    methods: {
        submit() {
            // this will trigger the process
            this.$refs.elementRef.submit();
        },
        tokenCreated(token) {
            console.log(token);
            // handle the token
            // send it to your server
        },
    },
};
</script>
