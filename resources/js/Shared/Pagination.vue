<template>
    <div class="mt-6 -mb-1 flex flex-wrap">
        <template v-for="(link, key) in links">
            <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm font-semibold border-2 border-white rounded text-gray-800" :class="{ 'ml-auto': link.label === 'Next' }">{{ link.label }}</div>
            <inertia-link v-else :key="key" replace class="mr-1 mb-1 px-4 py-3 text-sm font-semibold border-2 border-white rounded hover:bg-white hover:text-gray-800 focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active, 'ml-auto bg-blue-500 text-white': link.label === 'Next', 'bg-blue-500 text-white': link.label === 'Previous' }" :href="link.url">{{ link.label }}</inertia-link>
        </template>
    </div>
</template>

<script>
import { InertiaLink } from 'inertia-vue'

export default {
  components: {
    InertiaLink,
  },
  props: {
    links: Array,
  },
}
</script>
