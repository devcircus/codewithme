<template>
    <div>
        <div class="w-full bg-blue-200 border-t-4 border-blue-800 p-4 mb-8">
            <h1 class="text-xl text-gray-800 font-semibold mb-6">Upcoming Sessions - Created by you</h1>
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:-mx-2">
                <session-card v-for="createdSession in sessions.created.data" :session="createdSession" :key="createdSession.id" type="created" />
            </div>
            <div class="w-1/2">
                <pagination :links="sessions.created.links" />
            </div>
        </div>
        <div class="w-full bg-green-200 border-t-4 border-green-800 p-4 mb-8">
            <h1 class="text-xl text-gray-800 font-semibold mb-6">Upcoming Sessions - Joined by you</h1>
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:-mx-2">
                <session-card v-for="joinedSession in sessions.joined.data" :session="joinedSession" :key="joinedSession.id" type="joined" />
            </div>
            <div class="w-1/2">
                <pagination :links="sessions.joined.links" />
            </div>
        </div>
    </div>
</template>

<script>
    import Pagination from '@/Shared/Pagination'
    import SessionCard from '@/Shared/SessionCard'

    export default {
        components: { SessionCard, Pagination },
        props: [
            'sessions'
        ],
    }
</script>

<style scoped lang="scss">

</style>