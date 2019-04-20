<template>
    <div>
        <div class="w-full bg-indigo-200 border-t-4 border-indigo-800 p-4 mb-8">
            <h1 class="text-xl text-gray-800 font-semibold mb-6">Upcoming Sessions - Created by you</h1>
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:-mx-2">
                <session-card v-for="createdSession in createdSessions" :session="createdSession" :key="createdSession.id" />
            </div>
        </div>
        <div class="w-full bg-green-200 border-t-4 border-green-800 p-4 mb-8">
            <h1 class="text-xl text-gray-800 font-semibold mb-6">Upcoming Sessions - Joined by you</h1>
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:-mx-2">
                <session-card v-for="joinedSession in joinedSessions" :session="joinedSession" :key="joinedSession.id" />
            </div>
        </div>
    </div>
</template>

<script>
    import SessionCard from '@/Shared/SessionCard'
    export default {
        components: { SessionCard },
        data () {
            return {
                createdSessions: null,
                joinedSessions: null,
            }
        },
        props: [
            'sessions'
        ],
        created () {
            this.createdSessions = this.sessions.created;
            this.joinedSessions = this.sessions.joined;
        }
    }
</script>

<style scoped lang="scss">

</style>