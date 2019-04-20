class Errors {
    constructor (errors = {}) {
        this.record(errors)
    }

    record (errors = {}) {
        this.errors = errors
    }

    all () {
        return this.errors
    }

    any () {
        return Object.keys(this.errors).length > 0
    }

    has (key) {
        return key in this.errors
    }

    first (field) {
        if (Array.isArray(this.errors[field])) {
            return this.get(field)[0] || null
        }

        return this.get(field) || null
    }

    get (field) {
        return this.errors[field] || null
    }
}

export default Errors
