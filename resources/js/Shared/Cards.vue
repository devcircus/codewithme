<template>
    <div>
        <div v-for="session in sessions" class="flex flex-col md:flex-row justify-between" :key="session.id">
            <session-card :session="session"></session-card>
        </div>
    </div>
</template>

<script>
import SessionCard from '@/Shared/SessionCard'
export default {
    components: { SessionCard },

}
</script>

<style>

</style>
