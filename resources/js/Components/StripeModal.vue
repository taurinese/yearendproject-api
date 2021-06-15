<template>
    <div class="flex justify-center items-center h-full w-full">
        <form class="w-2/3">
            <div>
                <p class="stripeError" v-if="stripeError">
                    {{ stripeError }}
                </p>
            </div>
            <div class="card-input">
                <label for="Card Number" class="text-sm text-gray-800">
                    Card Number
                </label>
                <div>
                    <div
                        id="card-number"
                        :class="{ 'uk-form-danger': cardNumberError }"
                        class="border-b border-blue-primary text-white"
                    ></div>
                    <div
                        class="
                            help-block
                            text-red-700
                            bg-red-100
                            px-6
                            py-2
                            border-0
                            rounded
                            mt-2
                            border-red-500 border
                        "
                        v-if="cardNumberError"
                    >
                        {{ cardNumberError }}
                    </div>
                </div>
            </div>
            <div>
                <div class="card-input">
                    <label for="Card CVC" class="text-sm text-gray-800">
                        Card CVC
                    </label>
                    <div>
                        <div
                            id="card-cvc"
                            :class="{ 'uk-form-danger': cardCvcError }"
                            class="border-b border-blue-primary"
                        ></div>
                        <div
                            class="
                                help-block
                                text-red-700
                                bg-red-100
                                px-6
                                py-2
                                border-0
                                rounded
                                mb-2
                                mt-2
                                border-red-500 border
                            "
                            v-if="cardCvcError"
                        >
                            {{ cardCvcError }}
                        </div>
                    </div>
                </div>
                <div class="card-input">
                    <label for="Expiry Month" class="text-sm text-gray-800">
                        Expiry
                    </label>
                    <div>
                        <div
                            id="card-expiry"
                            :class="{ 'uk-form-danger': cardExpiryError }"
                            class="border-b border-blue-primary"
                        ></div>
                        <div
                            class="
                                help-block
                                text-red-700
                                bg-red-100
                                px-6
                                py-2
                                border-0
                                rounded
                                mb-2
                                mt-2
                                border-red-500 border
                            "
                            v-if="cardExpiryError"
                        >
                            {{ cardExpiryError }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <button
                    class="bg-blue-primary px-4 py-2 mt-4 rounded-lg text-white"
                    @click.prevent="reset()"
                >
                    Reset
                </button>
                <button
                    class="bg-blue-primary px-4 py-2 mt-4 rounded-lg text-white"
                    @click.prevent="submitFormToCreateToken()"
                >
                    <span v-if="loading">processing...</span>
                    <span v-if="!loading">Pay</span>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            card: {
                cvc: "",
                number: "",
                expiry: "",
            },
            //elements
            cardNumber: "",
            cardExpiry: "",
            cardCvc: "",
            stripe: null,
            // errors
            stripeError: "",
            cardCvcError: "",
            cardExpiryError: "",
            cardNumberError: "",
            loading: false,
        };
    },
    methods: {
        createToken() {
            this.loading = true;
            this.stripe.createToken(this.cardNumber).then((result) => {
                this.loading = false;
                if (result.error) {
                    this.stripeError = result.error.message;
                } else {
                    const token = result.token.id;
                    //send the token to your server
                    //clear the inputs
                }
            });
        },
        setUpStripe() {
            if (window.Stripe === undefined) {
                alert("Stripe V3 library not loaded!");
            } else {
                const stripe = window.Stripe("public_key");
                this.stripe = stripe;
                const elements = stripe.elements();
                this.cardCvc = elements.create("cardCvc");
                this.cardExpiry = elements.create("cardExpiry");
                this.cardNumber = elements.create("cardNumber");
                this.cardCvc.mount("#card-cvc");
                this.cardExpiry.mount("#card-expiry");
                this.cardNumber.mount("#card-number");
                //this.listenForErrors();
            }
        },
        /* listenForErrors: function () {
            const vm = this;
            this.cardNumber.addEventListener("change", function (event) {
                vm.toggleError(event);
                vm.cardNumberError = "";
                vm.card.number = event.complete ? true : false;
            });
            this.cardExpiry.addEventListener("change", function (event) {
                vm.toggleError(event);
                vm.cardExpiryError = "";
                vm.card.expiry = event.complete ? true : false;
            });
            this.cardCvc.addEventListener("change", function (event) {
                vm.toggleError(event);
                vm.cardCvcError = "";
                vm.card.cvc = event.complete ? true : false;
            });
        }, */
        toggleError: function (event) {
            if (event.error) {
                this.stripeError = event.error.message;
            } else {
                this.stripeError = "";
            }
        },
        submitFormToCreateToken() {
            this.clearCardErrors();
            let valid = true;
            if (!this.card.number) {
                valid = false;
                this.cardNumberError = "Card Number is Required";
            }
            if (!this.card.cvc) {
                valid = false;
                this.cardCvcError = "CVC is Required";
            }
            if (!this.card.expiry) {
                valid = false;
                this.cardExpiryError = "Month is Required";
            }
            if (this.stripeError) {
                valid = false;
            }
            if (valid) {
                this.createToken();
            }
        },
        reset() {
            this.clearElementInputs();
            this.clearCardErrors();
        },
        clearElementInputs() {
            this.cardCvc.clear();
            this.cardExpiry.clear();
            this.cardNumber.clear();
        },
        clearCardErrors() {
            this.stripeError = "";
            this.cardCvcError = "";
            this.cardExpiryError = "";
            this.cardNumberError = "";
        },
    },
    mounted() {
        this.setUpStripe();
    },
};
</script>
<style lang="scss" scoped>
.card-input {
    // display: flex;
}
.InputContainer .InputElement {
    &::placeholder {
        color: white !important;
    }
}
</style>
