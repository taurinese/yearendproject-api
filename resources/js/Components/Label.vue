<template>
    <label class="block font-medium text-sm text-gray-700 mr-8">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script>
    export default {
        props: ['value']
    }
</script>
