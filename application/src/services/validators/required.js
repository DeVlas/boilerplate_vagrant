import Validator from '../validators/validator';

export default class Required extends Validator {
    constructor (attribute, value, options) {
        super(attribute, value, options);
        this.message = options.message || '{attribute} is require'.replace(/{.*?}/, this.attribute);
    }

    validate () {
        if (this.value === undefined || !this.value) {
            return this.message;
        }
    }
}
