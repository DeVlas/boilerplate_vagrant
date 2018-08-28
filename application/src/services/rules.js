import Required from 'services/validators/required';

class Rules {
    constructor (rules) {
        this.rules = [];
        this.validators = {
            Required
        };

        this.errors = {};

        rules.forEach((rule) => {
            if (!(rule.attributes && rule.attributes.length) || !rule.validator) {
                throw new Error('You must set attribute(s) and validator');
            }
            if (!(rule.attributes instanceof Array)) {
                rule.attributes = [rule.attributes];
            }
        });

        this.rules = rules;
    }

    setAttributes (attributes) {
        this.attributes = attributes;
    }

    validate () {
        this.rules.forEach((rule) => {
            let validator = null;
            if (typeof rule.validator === 'string') {
                validator = rule.validator[0].toUpperCase() + rule.validator.slice(1);
            } else if (typeof rule.validator === 'function') {
                validator = rule.validator;
            }

            rule.attributes.forEach(attribute => {
                let instance = new this.validators[validator](attribute, this.attributes[rule.attribute], rule.options);
                let error = instance.validate();
                if (error) {
                    this.errors[attribute] = this.errors[attribute] || {};
                    this.errors[attribute][Object.keys(this.errors[attribute]).length + 1] = error;
                }
            });
        });
    }

    clearErrors () {
        this.errors = [];
    }

    hasErrors () {
        return this.errors.length > 0;
    }

    getErrors () {
        // console.log('rules get errors', this.errors);
        // this.errors.map((value, idx) => {
        //     console.log(value, idx);
        // });
        return this.errors;
    }
}

export default Rules;
