function initialState() {
    return {
        item: {
            id: null,
            trail: null,
            user: null,
            view: false,
            progress: null,
            rating: null,
        },
        trailsAll: [],
        usersAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    trailsAll: state => state.trailsAll,
    usersAll: state => state.usersAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.trail)) {
                params.set('trail_id', '')
            } else {
                params.set('trail_id', state.item.trail.id)
            }
            if (_.isEmpty(state.item.user)) {
                params.set('user_id', '')
            } else {
                params.set('user_id', state.item.user.id)
            }
            params.set('view', state.item.view ? 1 : 0)

            axios.post('/api/v1/datatrails', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.trail)) {
                params.set('trail_id', '')
            } else {
                params.set('trail_id', state.item.trail.id)
            }
            if (_.isEmpty(state.item.user)) {
                params.set('user_id', '')
            } else {
                params.set('user_id', state.item.user.id)
            }
            params.set('view', state.item.view ? 1 : 0)

            axios.post('/api/v1/datatrails/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/datatrails/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchTrailsAll')
    dispatch('fetchUsersAll')
    },
    fetchTrailsAll({ commit }) {
        axios.get('/api/v1/trails')
            .then(response => {
                commit('setTrailsAll', response.data.data)
            })
    },
    fetchUsersAll({ commit }) {
        axios.get('/api/v1/users')
            .then(response => {
                commit('setUsersAll', response.data.data)
            })
    },
    setTrail({ commit }, value) {
        commit('setTrail', value)
    },
    setUser({ commit }, value) {
        commit('setUser', value)
    },
    setView({ commit }, value) {
        commit('setView', value)
    },
    setProgress({ commit }, value) {
        commit('setProgress', value)
    },
    setRating({ commit }, value) {
        commit('setRating', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setTrail(state, value) {
        state.item.trail = value
    },
    setUser(state, value) {
        state.item.user = value
    },
    setView(state, value) {
        state.item.view = value
    },
    setProgress(state, value) {
        state.item.progress = value
    },
    setRating(state, value) {
        state.item.rating = value
    },
    setTrailsAll(state, value) {
        state.trailsAll = value
    },
    setUsersAll(state, value) {
        state.usersAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
