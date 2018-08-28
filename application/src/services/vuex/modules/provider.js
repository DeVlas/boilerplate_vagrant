export default {
    namespaced: true,
    state: {
        user: null
    },
    getters: {
        user (state) {
            return state.user;
        }
    },
    mutations: {
        setUser (state, user) {
            state.user = user;
        }
    },
    actions: {
        loadUser (state) {
            let user = {
                name: 'Pisya',
                last_name: 'Kamushin',
                age: 11
            };
            setTimeout(() => {
                state.commit('setUser', user);
            }, 1000);
        }
    }
};
