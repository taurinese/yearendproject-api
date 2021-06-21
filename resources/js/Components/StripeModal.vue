<template>
    <div
        class="flex flex-col justify-center items-center h-full w-full relative"
    >
        <img
            src="img/close.svg"
            @click="$emit('close')"
            class="absolute top-2 right-2 w-4 h-4 cursor-pointer"
        />
        <div
            v-if="!paymentProcessed"
            class="flex flex-col justify-center items-center h-full w-full"
        >
            <h2 class="text-2xl text-center">Paiement</h2>
            <input
                type="text"
                name="name"
                id="name"
                v-model="name"
                placeholder="Name"
            />
            <div id="card-element" class="w-full"></div>
            <button
                @click="submit"
                :class="getClassName"
                :disabled="payment_processing"
            >
                Payer
            </button>
        </div>
        <div
            v-else
            class="
                flex flex-col
                justify-center
                items-center
                h-full
                w-full
                relative
            "
        >
            {{ messageProcessed }}
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "StripeCheckout",
    data() {
        return {
            name: "",
            payment_method: "",
            payment_processing: false,
            requiresAction: false,
            paymentProcessed: false,
            messageProcessed: "",
        };
    },
    props: ["card", "stripe", "secret", "token", "id"],
    computed: {
        getClassName() {
            let className = "bg-blue-primary px-4 py-2 rounded-lg text-white";
            if (this.payment_processing) {
                className =
                    "bg-gray-500 px-4 py-2 rounded-lg text-dark cursor-not-allowed";
            }
            return className;
        },
    },
    methods: {
        resetForm() {
            this.name = "";
            this.payment_method = "";
            this.payment_processing = false;
        },
        async submit() {
            this.payment_processing = true;
            const { setupIntent, error } = await this.stripe.confirmCardSetup(
                this.secret,
                {
                    payment_method: {
                        card: this.card,
                        billing_details: { name: this.name },
                    },
                }
            );
            if (error) {
                console.log(error);
            } else {
                console.log(setupIntent);
                this.payment_method = setupIntent.payment_method;
                await axios
                    .post(
                        "/stripe/subscribe",
                        {
                            plan: this.id,
                            name: this.name,
                            payment_method: this.payment_method,
                            coupon: this.coupon,
                        },
                        {
                            headers: {
                                Authorization: `Bearer ${this.token}`,
                            },
                        }
                    )
                    .then((response) => {
                        console.log(response.data);
                        if (
                            response.data.status &&
                            response.data.status == "requires_action"
                        ) {
                            // Confirmation
                            this.requiresAction = true;
                            /* this.$emit("paymentMethod", this.payment_method);
                            this.$emit("requiresAction", true);
                            this.$emit("paymentIntent", response.data); */
                            console.log("emit 1");
                        } else {
                            this.paymentProcessed = true;
                            this.messageProcessed =
                                "Merci de votre abonnement ! 🤑";
                            console.log("emit 2");
                            this.resetForm();
                            /* this.$emit("paymentProcessed", true);
                            this.$emit(
                                "messageProcessed",
                                "Merci de votre abonnement ! 🤑"
                            ); */
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>

<style lang="scss" scoped></style>
