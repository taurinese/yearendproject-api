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
            <input
                type="text"
                name="coupon"
                id="coupon"
                v-model="coupon"
                placeholder="Code promo"
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
            <p>Prix de l'abonnement</p>
            <p>{{ price / 100 }}€</p>
            <p>Date de l'abonnement</p>
            <p>{{ result[0].created_at.split("T")[0] }}</p>
            <p>4 derniers chiffres de la CB</p>
            <p>**** **** **** {{ result.user.card_last_four }}</p>
            <p>Date du renouvellement</p>
            <p>
                {{ getDate }}
            </p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";
export default {
    name: "StripeCheckout",
    data() {
        return {
            name: "",
            coupon: "",
            payment_method: "",
            payment_processing: false,
            requiresAction: false,
            paymentProcessed: false,
            messageProcessed: "",
            result: null,
        };
    },
    props: ["card", "stripe", "secret", "token", "id", "price"],
    computed: {
        getClassName() {
            let className = "bg-blue-primary px-4 py-2 rounded-lg text-white";
            if (this.payment_processing) {
                className =
                    "bg-gray-500 px-4 py-2 rounded-lg text-dark cursor-not-allowed";
            }
            return className;
        },
        getDate() {
            let plan = this.result[0].name;
            let currentDate = moment(this.result[0].created_at);
            let futureMonth;
            if (plan == "mensuel") {
                futureMonth = moment(currentDate).add(1, "M");
                let futureMonthEnd = moment(futureMonth).endOf("month");

                if (
                    currentDate.date() != futureMonth.date() &&
                    futureMonth.isSame(futureMonthEnd.format("YYYY-MM-DD"))
                ) {
                    futureMonth = futureMonth.add(1, "d");
                }
            } else if (plan == "annuel") {
                futureMonth = moment(currentDate).add(1, "Y");
            }
            // let date = moment(futureMonth).split("T")[0];
            return futureMonth;
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
                        this.result = response.data;
                        console.log(response.data);
                        if (
                            response.data.status &&
                            response.data.status == "requires_action"
                        ) {
                            // Confirmation
                            this.requiresAction = true;
                        } else {
                            this.paymentProcessed = true;
                            this.messageProcessed =
                                "Merci de votre abonnement ! 🤑";
                            console.log("emit 2");
                            this.resetForm();
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
