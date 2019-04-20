<template>
    <div class="w-full h-48 bg-blue-900 shadow-md p-4 mb-8">
        <h1 class="text-xl text-white font-semibold mb-6">Session Summary</h1>
        <div class="flex w-full">
            <div class="flex flex-col w-full">
                <div class="flex mb-2">
                    <inertia-link class="flex group text-white hover:text-blue-200" href="#">
                        <icon name="clock" class="w-4 h-4 mr-2 fill-current"/>
                        <span class="text-base mb-2">Next session on 04/23/19 at 7:30pm cst</span>
                    </inertia-link>
                </div>
                <div class="flex mb-2">
                    <inertia-link class="flex group text-white hover:text-blue-200" href="#">
                        <icon name="calendar-date" class="w-4 h-4 mr-2 fill-current"/>
                        <span class="text-base mb-2">3 of 4 upcoming sessions are awaiting partners</span>
                    </inertia-link>
                </div>
                <div class="flex mb-2">
                    <inertia-link class="flex group text-white hover:text-blue-200" href="#">
                        <icon name="calendar" class="w-4 h-4 mr-2 fill-current"/>
                        <span class="text-base">2 archived sessions</span>
                    </inertia-link>
                </div>
            </div>
            <div class="flex flex-col w-full ml-auto">
                <!-- <div class="flex mb-2">
                    <inertia-link class="flex group text-white hover:text-blue-200" href="#">
                        <icon name="calendar" class="w-4 h-4 mr-2 fill-current"/>
                        <span class="text-white text-base">3 Upcoming Sessions awaiting developers</span>
                    </inertia-link>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import Icon from 'JS/Shared/Icon.vue';
    import { InertiaLink } from 'inertia-vue'

    export default {
        components: {
            Icon,
            InertiaLink,
        },
        props: ['user'],
    }
</script>

<style>

</style>
