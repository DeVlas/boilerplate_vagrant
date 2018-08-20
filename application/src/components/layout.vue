<template>
    <div>
        {{ $t('hello_world') }}
    </div>
</template>
<script>
    import { mapActions } from 'vuex'
    import PostModel from 'models/post'

    export default {
        name: 'layout',
        methods: {
            ...mapActions('UserModule', {
                loadUser: 'loadUser'
            }),
            ...mapActions('ProviderModule', {
                loadProvider: 'loadUser'
            }),
            getPost () {
                PostModel.items().then(response => {
                    console.log('post model response', response)
                })
            }
        }
    }
</script>
<style lang="scss" scoped>
    .lol {
        background: blue;
        border: 1px solid;
    }
</style>
