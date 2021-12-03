import api from "../../plugins/apis/api";

export default {
    state: {
        user: {},
        isAuth: false,
    },
    getters: {
        user: state => state.user,
        isAuth: state => state.isAuth
    },
    mutations: {
        SET_USER(state, payload){
            state.user = payload;
            state.isAuth = true
        },
        REMOVE_USER(state){
            state.user = {}
            state.isAuth = false
        }
    },
    actions: {
        REGISTER_USER({commit}, payload) {
            return new Promise((resolve, reject) => {
                api.post('auth/registration', payload)
                    .then(response => {
                        if (response.status === 201) {
                            localStorage.setItem('token', response.data.data.token);
                            commit('SET_USER', response.data.data.user)
                            resolve(true)
                        }
                    }).catch(err => {
                        reject(err)
                })
            })
        },
        LOGIN_USER({commit}, payload) {
            return new Promise((resolve, reject) => {
                api.post('auth/login', payload)
                    .then(response => {
                        if (response.status === 200) {
                            localStorage.setItem('token', response.data.data.token);
                            commit('SET_USER', response.data.data.user)
                            resolve(response.data.data.user.name)
                        }
                    }).catch(err => {
                    reject(err)
                })
            })
        },
        GET_USER({commit}, payload){
            return new Promise((resolve, reject) => {
                api.get('user')
                    .then(res => {
                        commit('SET_USER', res.data.user)
                    })
            })
        },
        LOGOUT_USER({commit}){
            return new Promise((resolve, reject) => {
                api.post('auth/logout')
                    .then(res => {
                        commit('REMOVE_USER')
                        localStorage.removeItem('token')
                        resolve(true)
                    }).catch(err => {
                        reject(err)
                })
            })
        }
    }
}
