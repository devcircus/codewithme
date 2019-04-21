<template>
    <div class="mt-6 -mb-1 flex flex-wrap">
        <template v-for="(link, key) in links">
            <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm border rounded text-gray" :class="{ 'ml-auto bg-blue-500 text-white': link.label === 'Next', 'bg-blue-500 text-white': link.label === 'Previous' }">{{ link.label }}</div>
            <inertia-link v-else :key="key" replace class="mr-1 mb-1 px-4 py-3 text-sm border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active, 'ml-auto bg-blue-500 text-white': link.label === 'Next', 'bg-blue-500 text-white': link.label === 'Previous' }" :href="link.url">{{ link.label }}</inertia-link>
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
