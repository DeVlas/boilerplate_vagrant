import Base from 'services/errors/Base';

class Http extends Base {
    constructor (message, code = 500) {
        super(message, {code: code});
        this.name = 'Http Error';
    }
}

export default Http;
