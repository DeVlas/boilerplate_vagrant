<template>
    <div class="">
        {{ $t('hello_world') }}
        <form novalidate autocomplete="off" @submit.prevent="submit">
            <label for="name">Name</label>
            <input id="name"
                   v-model="form.attributes.name"
                   type="text"
                   placeholder="add somthing"
            >
            <div>{{ form.getError('name') }}</div>
            <input id="phone"
                   v-model="form.attributes.phone"
                   type="text"
                   placeholder="add somthing"
            >
            <button type="submit">
                Click meww
            </button>
        </form>
    </div>
</template>
<script>
    import {mapActions} from 'vuex';
    import PostModel from 'models/post';
    import Form from 'services/form';
    import Rules from 'services/rules';

    export default {
        name: 'layout',
        data () {
            return {
                form: new Form({
                    name: null,
                    phone: null,
                    last_name: null
                }, {
                    rules: new Rules([
                        {
                            attributes: ['name'],
                            validator: 'Required',
                            options: {
                                message: 'Name is required'
                            }
                        },
                        {
                            attributes: ['phone'],
                            validator: 'Required',
                            options: {
                                message: 'Name is required'
                            }
                        },
                        {
                            attributes: ['last_name'],
                            validator: 'Required',
                            options: {
                                message: 'Lat name  is required'
                            }
                        }
                    ])
                })
            };
        },
        methods: {
            submit () {
                console.log('submit form');
                this.form.validate();
            },
            ...mapActions('UserModule', {
                loadUser: 'loadUser'
            }),
            ...mapActions('ProviderModule', {
                loadProvider: 'loadUser'
            }),
            getPost () {
                PostModel.items().then(response => {
                    console.log('post model response', response);
                });
            }
        }
    };
</script>
<style lang="scss" scoped>
    .lol {
        background: blue;
        border: 1px solid;
    }
</style>
