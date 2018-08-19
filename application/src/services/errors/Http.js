import BaseError from 'services/errors/BaseError'

class Http extends BaseError {
    constructor (message, code = 500) {
        super(message, {code: code})
        this.name = 'Http Error'
    };
}

export default Http
