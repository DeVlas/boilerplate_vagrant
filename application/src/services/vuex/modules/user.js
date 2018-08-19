export default {
    namespaced: true,
    state: {
        user: null
    },
    getters: {
        user (state) {
            return state.user
        }
    },
    mutations: {
        setUser (state, user) {
            state.user = user
        }
    },
    actions: {
        loadUser (state) {
            let user = {
                name: 'Oleg',
                age: 21
            }
            setTimeout(() => {
                state.commit('setUser', user)
            }, 1000)
        }
    }
}
