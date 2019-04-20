<template>
    <div>
        <div class="mb-4">
            <inertia-link class="flex items-center py-3 hover-white" :class="isUrl('dashboard') ? 'text-white' : 'text-indigo-200'" :href="route('dashboard')">
                <icon name="dashboard" class="w-4 h-4 mr-2 fill-current" />
                <div class="font-semibold text-xl uppercase">Dashboard</div>
            </inertia-link>
        </div>
        <!-- <div class="mb-4">
            <inertia-link class="flex items-center py-3 hover-white" :class="isUrl('sessions') ? 'text-white' : 'text-indigo-200'" :href="route('sessions')">
                <icon name="office" class="w-4 h-4 mr-2 fill-current" />
                <div class="font-semibold text-2xl uppercase">My Sessions</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link class="flex items-center py-3 hover-white" :class="isUrl('friends') ? 'text-white' : 'text-indigo-200'" :href="route('friends')">
                <icon name="users" class="w-4 h-4 mr-2 fill-current" />
                <div class="font-semibold text-2xl uppercase">Friends</div>
            </inertia-link>
        </div> -->
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import { InertiaLink } from 'inertia-vue'
import ParsesUrls from 'Mixins/ParsesUrls';

export default {
    components: {
        InertiaLink,
        Icon,
    },
    mixins: [ ParsesUrls, ],
}
</script>

<style lang="scss" scoped>
    .hover-white:hover {
        color: white;
    }
    .hover-white:hover svg, .hover-white:hover path {
        fill: white;
    }
</style>