<template>
    <div>
        <div v-if="current_subscription">
            <h3 class="text-xl font-medium mb-6">Abonnement en cours</h3>
            <subscribe-card
                :subscribable="false"
                :name="current_subscription.name"
                :content="current_subscription.content"
                :price="current_subscription.price"
                :id="current_subscription.id"
            />
        </div>
        <h3 class="text-xl font-medium my-6">Abonnement disponibles</h3>
        <subscribe-card
            v-for="plan in getPlans"
            :key="plan"
            class="mb-6"
            :subscribable="true"
            :name="plan.name"
            :content="plan.content"
            :price="plan.price"
            :id="plan.id"
        />
        <!-- <subscribe-card :subscribable="true" name="Abonnement annuel" /> -->
    </div>
</template>

<script>
import SubscribeCard from "../Components/SubscribeCard.vue";
import axios from "axios";
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

export default {
    name: "SubscribeTab",
    components: {
        SubscribeCard,
    },
    data() {
        return {
            plans: [],
        };
    },
    mounted() {
        axios.get("/stripe").then((response) => {
            this.plans = response.data;
            // console.log(this.plans);
        });
    },
    setup() {
        const current_subscription = computed(
            () => usePage().props.value.current_subscription
        );
        return { current_subscription };
    },
    computed: {
        getPlans() {
            return this.plans.filter(
                (el) => el.id != this.current_subscription.id
            );
        },
    },
};
</script>

<style scoped></style>
