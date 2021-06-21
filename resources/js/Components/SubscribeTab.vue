<template>
    <div>
        <h3 class="text-xl font-medium mb-6">Abonnement en cours</h3>
        <subscribe-card :subscribable="false" name="Abonnement gratuit" />
        <h3 class="text-xl font-medium my-6">Abonnement disponibles</h3>
        <subscribe-card
            v-for="plan in plans"
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
            console.log(this.plans);
        });
    },
};
</script>

<style scoped></style>
