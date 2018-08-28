import Vuex from 'vuex';
import Vue from 'vue';
import UserModule from './modules/user';
import ProviderModule from './modules/provider';
import I18n from './modules/i18n';

Vue.use(Vuex);

const vuex = new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',
    modules: {
        UserModule,
        ProviderModule,
        I18n
    }
});

export default vuex;
