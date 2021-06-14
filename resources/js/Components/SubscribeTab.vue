<template>
    <div>
        <h3 class="text-xl font-medium mb-6">Abonnement en cours</h3>
        <subscribe-card :subscribable="false" name="Abonnement gratuit" />
        <h3 class="text-xl font-medium my-6">Abonnement disponibles</h3>
        <subscribe-card
            class="mb-6"
            :subscribable="true"
            name="Abonnement mensuel"
        />
        <subscribe-card :subscribable="true" name="Abonnement annuel" />
    </div>
</template>

<script>
import SubscribeCard from "../Components/SubscribeCard.vue";
export default {
    name: "SubscribeTab",
    components: {
        SubscribeCard,
    },
};
</script>

<style scoped></style>
