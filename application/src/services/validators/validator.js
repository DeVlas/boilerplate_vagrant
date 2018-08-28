class Validator {
    constructor (attribute, value, options = {}) {
        this.attribute = attribute;
        this.value = value;
        this.errors = [];
    }

    validate () {
        throw new Error('Base class can\t validate');
    }
}

export default Validator;
