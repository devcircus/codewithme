<template>
    <layout>
        <user-account-summary :user="page.props.auth.user"></user-account-summary>
        <cards :sessions="sessions"></cards>
    </layout>
</template>

<script>
    import Cards from '@/Shared/Cards';
    import Layout from '@/Shared/Layout';
    import UserAccountSummary from '@/Pages/Partials/UserAccountSummary';

    export default {
        props: ['sessions'],
        components: {
            Layout,
            Cards,
            UserAccountSummary,
        },
        inject: ['page'],
    }
</script>