<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1 justify-center">
            <template v-for="(link, key) in links">
                <div
                    v-if="link.url === null"
                    :key="key"
                    class="
                        mr-1
                        mb-1
                        px-4
                        py-3
                        text-sm
                        leading-4
                        text-gray-400
                        border
                        rounded
                        bg-white
                    "
                    v-html="link.label"
                />
                <inertia-link
                    v-else
                    :key="key"
                    class="
                        mr-1
                        mb-1
                        px-4
                        py-3
                        text-sm
                        leading-4
                        border
                        rounded
                        bg-white
                        hover:bg-blue-300
                        focus:border-indigo-500 focus:text-indigo-500
                    "
                    :class="{ 'bg-blue-300': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        links: Array,
    },
};
</script>
