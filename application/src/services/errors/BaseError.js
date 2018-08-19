class BaseError extends Error {
    constructor (message, options) {
        super(message)
        this.message = message

        this.code = options.code
        this.route = {
            path: null,
            route: null
        }
        if (options.route) {
            this.route.path = options.route.path
            this.route.name = options.route.name
        }
    }

    getRoutePath () {
        return this.route.path
    }

    getRouteName () {
        return this.route.name
    }

    getCode () {
        return this.code
    }

    getMessage () {
        return this.message
    }
    getStackTrace () {
        return this.stack
    }
}

export default BaseError
