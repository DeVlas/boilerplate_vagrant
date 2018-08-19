import Vue from 'vue'
import ApplicationLoading from 'components/application-loading'
import Application from 'components/application'
import router from 'services/router'
import store from 'services/vuex'
import i18n from 'services/i18n'

import './assets/stylesheets/index.scss'
// import 'javascript/services/assets';

const vue = new Vue({
    el: '#root',
    router,
    store,
    i18n,
    components: {
        ApplicationLoading,
        Application
    },
    data () {
        return {
            loading: false
        }
    },
    created () {
        console.log('created')
        setTimeout(() => {
            this.loading = false
            this.$i18n.setLocaleMessage('ru', {hello_world: 'Привет мир '})
        }, 3000)
    },
    mounted () {

    },
    template: '<transition appear name="component-fade" mode="out-in">' +
      '<application class="application" v-if="!loading"/><application-loading v-if="loading"/>' +
      '</transition>'
})

export default vue
