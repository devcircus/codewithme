<template>
    <div class="w-full lg:w-1/2 px-2">
        <div class="flex flex-col bg-white shadow-md mb-4 p-4 h-56">
            <div class="flex">
                <h1 class="text-base text-gray-900 font-semibold uppercase mb-2">{{ session.title }}</h1>
                <language class="ml-auto" :language="session.language" :language_color="session.language_color"></language>
            </div>
            <div class="flex text-gray-600">
                <icon name="calendar-date" class="w-4 h-4 mr-2 fill-current"/>
                <span class="text-gray-500 text-sm font-normal italic mb-4">{{ session.display_date }}</span>
            </div>
            <p class="text-gray-700 font-normal text-base w-full">{{ session.description }}</p>
        </div>
    </div>
</template>

<script>
    import Icon from 'JS/Shared/Icon.vue';
    import Language from 'JS/Shared/Language.vue';

    export default {
        components: {
            Icon,
            Language,
        },
        props: {
            session: Object,
        },
    }
</script>
