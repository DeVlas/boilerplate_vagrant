let lazyMessages = {
    en: {
        hello_world: 'hello world'
    },
    ru: {
        hello_world: 'Привет мир!'
    }
}

export default {
    namespaced: true,
    state: {
        messages: [],
        language: null
    },
    getters: {
        messages (state) {
            return state.messages
        },
        language (state) {
            return state.language
        }
    },
    mutations: {
        setMessages (state, messages) {
            state.messages = messages
        },
        setLanguage (state, language) {
            state.language = language
        }
    },
    actions: {
        getMessages (state) {
            console.log('store i18n action get message')
            setTimeout(() => {
                state.messages = lazyMessages
            }, 2000)
        }
    }

}
