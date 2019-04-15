export default {
    mounted () {
        this.clearNotifications();
    },
    methods: {
        clearNotifications () {
            setTimeout(() => this.$store.notification = null, 5000);
        }
    }
}