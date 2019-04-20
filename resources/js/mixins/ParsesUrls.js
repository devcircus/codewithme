export default {
    methods: {
        isUrl (...urls) {
            if (urls[0] === '') {
                return location.pathname.substr(1) === ''
            }

            return urls.filter(url => location.pathname.substr(1).startsWith(url)).length
        },
    }
}