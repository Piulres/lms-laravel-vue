function initialState() {
    return {
        item: {
            id: null,
            title: null,
            categories: [],
            courses: [],
        },
        trailscategoriesAll: [],
        coursesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    trailscategoriesAll: state => state.trailscategoriesAll,
    coursesAll: state => state.coursesAll,
    
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

            if (_.isEmpty(state.item.categories)) {
                params.delete('categories')
            } else {
                for (let index in state.item.categories) {
                    params.set('categories['+index+']', state.item.categories[index].id)
                }
            }
            if (_.isEmpty(state.item.courses)) {
                params.delete('courses')
            } else {
                for (let index in state.item.courses) {
                    params.set('courses['+index+']', state.item.courses[index].id)
                }
            }

            axios.post('/api/v1/trails', params)
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

            if (_.isEmpty(state.item.categories)) {
                params.delete('categories')
            } else {
                for (let index in state.item.categories) {
                    params.set('categories['+index+']', state.item.categories[index].id)
                }
            }
            if (_.isEmpty(state.item.courses)) {
                params.delete('courses')
            } else {
                for (let index in state.item.courses) {
                    params.set('courses['+index+']', state.item.courses[index].id)
                }
            }

            axios.post('/api/v1/trails/' + state.item.id, params)
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
        axios.get('/api/v1/trails/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchTrailscategoriesAll')
    dispatch('fetchCoursesAll')
    },
    fetchTrailscategoriesAll({ commit }) {
        axios.get('/api/v1/trailscategories')
            .then(response => {
                commit('setTrailscategoriesAll', response.data.data)
            })
    },
    fetchCoursesAll({ commit }) {
        axios.get('/api/v1/courses')
            .then(response => {
                commit('setCoursesAll', response.data.data)
            })
    },
    setTitle({ commit }, value) {
        commit('setTitle', value)
    },
    setCategories({ commit }, value) {
        commit('setCategories', value)
    },
    setCourses({ commit }, value) {
        commit('setCourses', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setTitle(state, value) {
        state.item.title = value
    },
    setCategories(state, value) {
        state.item.categories = value
    },
    setCourses(state, value) {
        state.item.courses = value
    },
    setTrailscategoriesAll(state, value) {
        state.trailscategoriesAll = value
    },
    setCoursesAll(state, value) {
        state.coursesAll = value
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
