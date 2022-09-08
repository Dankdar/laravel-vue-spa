export const state = {
    user: null,
    transaction: null,
};

export const actions = {
    ['set_user'](context, user) {
        context.commit('updateUser', user);
    },
    ['attempt_user'](context) {
       return axios.get('/api/v1/me')
            .then((response) => {
                context.commit('updateUser', response.data.data)
                return response
            })
            .catch((error) => {
                context.commit('updateUser', null);
                return error
            })
    },
    // ['attempt_transaction'](context) {
    //     return axios.post('/api/v1/me')
    //          .then((response) => {
    //              context.commit('makeTransaction', response.data.data)
    //              return response
    //          })
    //          .catch((error) => {
    //              context.commit('makeTransaction', null);
    //              return error
    //          })
    //  },
    ['logout'](context) {
        return axios.post('/logout')
            .then((response) => {
                context.commit('logoutUser');
            })
            .catch((error) => {})
    },
};

export const mutations = {
    updateUser: (state, user) => {
        state.user = user
    },
    logoutUser: (state) => {
        state.user = null
    }
};

export const getters = {
    ['user'](state) {
        return state.user
    },
    // ['transaction'](state){
    //     return state.trans
    // }
};

export default {
    state,
    actions,
    mutations,
    getters
};
