<template>
    <div class="w-full lg:w-1/2 px-2">
        <div class="flex flex-col bg-white shadow-md mb-4 p-4">
            <div class="flex">
                <h1 class="text-base text-gray-900 font-semibold uppercase mb-2">{{ session.title }}</h1>
                <language class="ml-auto" :language="session.language" :language_color="session.language_color"></language>
            </div>
            <div class="flex text-gray-600">
                <icon name="calendar-date" class="w-4 h-4 mr-2 fill-current"/>
                <span class="text-gray-500 text-sm font-normal italic mb-4">{{ session.display_date }}</span>
            </div>
            <p class="text-gray-600 font-normal text-base w-full mb-4">{{ session.description }}</p>
            <div class="flex text-gray-700">
                <icon name="users" class="w-4 h-4 mr-2 fill-current"/>
                <h1 class="text-sm text-gray-700 font-semibold uppercase mb-4">Developers <span class="text-xs text-gray-600 font-normal ml-2">( 3 of 5 positions filled )</span></h1>
            </div>
            <table class="table-sm">
                <thead class="text-white font-semibold" :class="bgForType">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-gray-800">Mark Otto</td>
                        <td class="text-blue-500 font-semibold"><a href="#">motto@gmail.com</a></td>
                    </tr>
                </tbody>
            </table>
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
            type: String,
        },
        computed: {
            bgForType () {
                if (this.type === 'created') {
                    return 'bg-blue-800';
                }

                return 'bg-green-800';
            }
        }
    }
</script>
