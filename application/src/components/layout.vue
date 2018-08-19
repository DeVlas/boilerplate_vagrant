<template>
    <div>
        {{ $t('hello_world') }}
    </div>
</template>
<script>
    import TopMenu from 'components/top-menu'
    import Footer from 'components/footer'
    import { mapActions } from 'vuex'
    import PostModel from 'models/post'

    export default {
        name: 'layout',
        components: {
            TopMenu,
            Footer
        },
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
        border: 1px solid;
        background: blue;
    }
</style>
