<template>
    <div>
        <span class="rounded-full inline-block h-2 w-2 mr-1 align-middle" :style="languageBackground">&nbsp;</span>
        <span class="inline-block align-middle text-xs text-gray-600 font-semibold uppercase">{{ language }}</span>
    </div>
</template>

<script>
export default {
    props: [
        'language',
        'language_color',
    ],
    data () {
        return {
            languageStyle: {
                background: '',
            }
        }
    },
    computed: {
        languageBackground () {
            return this.languageStyle;
        }
    },
    created () {
        this.languageStyle.background = this.language_color;
    }
}
</script>

<style>
</style>
