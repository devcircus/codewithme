<template>
    <div class="w-full lg:w-1/2 px-2">
        <div class="flex flex-col bg-white shadow-md mb-4 p-4 h-56">
            <h1 class="text-base text-gray-900 font-semibold uppercase mb-2">{{ session.title }}</h1>
            <div class="flex text-gray-600">
                <icon name="calendar-date" class="w-4 h-4 mr-2 fill-current"/>
                <span class="text-gray-500 text-sm font-normal italic mb-4">{{ session.display_date }}</span>
            </div>
            <p class="text-gray-900 font-normal text-base w-full">{{ session.description }}</p>
        </div>
    </div>
</template>

<script>
    import Icon from 'JS/Shared/Icon.vue';

    export default {
        components: {
            Icon,
        },
        props: {
            session: Object,
        },
    }
</script>
