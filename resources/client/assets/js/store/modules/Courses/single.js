function initialState() {
    return {
        item: {
            id: null,
            title: null,
            instructor: [],
            lessons: [],
            categories: [],
            featured_image: null,
            description: null,
            introduction: null,
            duration: null,
        },
        usersAll: [],
        lessonsAll: [],
        coursescategoriesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    usersAll: state => state.usersAll,
    lessonsAll: state => state.lessonsAll,
    coursescategoriesAll: state => state.coursescategoriesAll,
    
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

            if (_.isEmpty(state.item.instructor)) {
                params.delete('instructor')
            } else {
                for (let index in state.item.instructor) {
                    params.set('instructor['+index+']', state.item.instructor[index].id)
                }
            }
            if (_.isEmpty(state.item.lessons)) {
                params.delete('lessons')
            } else {
                for (let index in state.item.lessons) {
                    params.set('lessons['+index+']', state.item.lessons[index].id)
                }
            }
            if (_.isEmpty(state.item.categories)) {
                params.delete('categories')
            } else {
                for (let index in state.item.categories) {
                    params.set('categories['+index+']', state.item.categories[index].id)
                }
            }
            if (state.item.featured_image === null) {
                params.delete('featured_image');
            }

            axios.post('/api/v1/courses', params)
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

            if (_.isEmpty(state.item.instructor)) {
                params.delete('instructor')
            } else {
                for (let index in state.item.instructor) {
                    params.set('instructor['+index+']', state.item.instructor[index].id)
                }
            }
            if (_.isEmpty(state.item.lessons)) {
                params.delete('lessons')
            } else {
                for (let index in state.item.lessons) {
                    params.set('lessons['+index+']', state.item.lessons[index].id)
                }
            }
            if (_.isEmpty(state.item.categories)) {
                params.delete('categories')
            } else {
                for (let index in state.item.categories) {
                    params.set('categories['+index+']', state.item.categories[index].id)
                }
            }
            if (state.item.featured_image === null) {
                params.delete('featured_image');
            }

            axios.post('/api/v1/courses/' + state.item.id, params)
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
        axios.get('/api/v1/courses/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchUsersAll')
    dispatch('fetchLessonsAll')
    dispatch('fetchCoursescategoriesAll')
    },
    fetchUsersAll({ commit }) {
        axios.get('/api/v1/users')
            .then(response => {
                commit('setUsersAll', response.data.data)
            })
    },
    fetchLessonsAll({ commit }) {
        axios.get('/api/v1/lessons')
            .then(response => {
                commit('setLessonsAll', response.data.data)
            })
    },
    fetchCoursescategoriesAll({ commit }) {
        axios.get('/api/v1/coursescategories')
            .then(response => {
                commit('setCoursescategoriesAll', response.data.data)
            })
    },
    setTitle({ commit }, value) {
        commit('setTitle', value)
    },
    setInstructor({ commit }, value) {
        commit('setInstructor', value)
    },
    setLessons({ commit }, value) {
        commit('setLessons', value)
    },
    setCategories({ commit }, value) {
        commit('setCategories', value)
    },
    setFeatured_image({ commit }, value) {
        commit('setFeatured_image', value)
    },
    
    setDescription({ commit }, value) {
        commit('setDescription', value)
    },
    setIntroduction({ commit }, value) {
        commit('setIntroduction', value)
    },
    setDuration({ commit }, value) {
        commit('setDuration', value)
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
    setInstructor(state, value) {
        state.item.instructor = value
    },
    setLessons(state, value) {
        state.item.lessons = value
    },
    setCategories(state, value) {
        state.item.categories = value
    },
    setFeatured_image(state, value) {
        state.item.featured_image = value
    },
    setDescription(state, value) {
        state.item.description = value
    },
    setIntroduction(state, value) {
        state.item.introduction = value
    },
    setDuration(state, value) {
        state.item.duration = value
    },
    setUsersAll(state, value) {
        state.usersAll = value
    },
    setLessonsAll(state, value) {
        state.lessonsAll = value
    },
    setCoursescategoriesAll(state, value) {
        state.coursescategoriesAll = value
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
