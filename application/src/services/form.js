class Form {
    constructor (attributes, options) {
        this.attributes = attributes;
        this.errors = [];
        this.rules = options.rules || null;
    }

    getError (attribute) {
        return this.errors[attribute];
    }

    validate () {
        if (this.rules) {
            this.rules.clearErrors();
            this.rules.setAttributes(this.attributes);
            this.rules.validate();

            this.setErrors(this.rules.getErrors());
        }
    }

    setErrors (errors) {
        console.log('form set errors', errors);
        this.errors = errors;
    }
}

export default Form;
