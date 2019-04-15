<template>
    <div>
        <div class="mb-4">
            <inertia-link class="flex items-center py-3 hover-white" :class="isUrl('dashboard') ? 'text-white' : 'text-indigo-200'" :href="route('dashboard')">
                <icon name="dashboard" class="w-4 h-4 mr-2 fill-current" />
                <div class="font-semibold">Dashboard</div>
            </inertia-link>
        </div>
        <!-- <div class="mb-4">
            <inertia-link class="flex items-center py-3 hover-white" :class="isUrl('sessions') ? 'text-white' : 'text-indigo-200'" :href="route('sessions')">
                <icon name="office" class="w-4 h-4 mr-2 fill-current" />
                <div class="font-semibold">My Sessions</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link class="flex items-center py-3 hover-white" :class="isUrl('friends') ? 'text-white' : 'text-indigo-200'" :href="route('friends')">
                <icon name="users" class="w-4 h-4 mr-2 fill-current" />
                <div class="font-semibold">Friends</div>
            </inertia-link>
        </div> -->
    </div>
</template>

<script>
import { InertiaLink } from 'inertia-vue'
import Icon from '@/Shared/Icon'

export default {
    components: {
        InertiaLink,
        Icon,
    },
    methods: {
        isUrl (...urls) {
            if (urls[0] === '') {
                return location.pathname.substr(1) === ''
            }
            console.log(location.pathname.substr(1));

            return urls.filter(url => location.pathname.substr(1).startsWith(url)).length
        },
    },
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