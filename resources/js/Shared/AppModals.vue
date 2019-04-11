<template>
    <div>
        <modal-component name="modal-name" width="80%" :maxWidth="1000" :adaptive="true" :delay="250" height="auto" class="text-center center" @before-open="beforeOpen($event)">

        </modal-component>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                //
            }
        },
        methods: {
            beforeOpen (event) {
                //
            },
        }
    }
</script>

<style>
    .v--modal-overlay[data-modal="modal-name"] .v--modal-box.v--modal {
        opacity: 1;
        overflow: visible;
        top: 178px !important;
    }
</style>