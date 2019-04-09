<template>
    <div>
        <app-modals></app-modals>
        <vue-snotify></vue-snotify>
        <navigation-component></navigation-component>
        <main-component></main-component>
    </div>
</template>

<script>
    import AppModals from 'LayoutComponents/AppModals.vue';
    import NavigationComponent from 'LayoutComponents/NavigationComponent.vue';
    import MainComponent from 'Components/MainComponent.vue';

    export default {
        components: { AppModals, NavigationComponent, MainComponent },
    }
</script>

<style>

</style>