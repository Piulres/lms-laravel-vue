function initialState() {
    return {
        item: {
            id: null,
            title: null,
            introduction: null,
            study_material: [],
            uploaded_study_material: [],
            content: null,
        },
        
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    
    
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

            params.set('uploaded_study_material', state.item.uploaded_study_material.map(o => o['id']))

            axios.post('/api/v1/lessons', params)
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

            params.set('uploaded_study_material', state.item.uploaded_study_material.map(o => o['id']))

            axios.post('/api/v1/lessons/' + state.item.id, params)
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
        axios.get('/api/v1/lessons/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setTitle({ commit }, value) {
        commit('setTitle', value)
    },
    setIntroduction({ commit }, value) {
        commit('setIntroduction', value)
    },
    setStudy_material({ commit }, value) {
        commit('setStudy_material', value)
    },
    destroyStudy_material({ commit }, value) {
        commit('destroyStudy_material', value)
    },
    destroyUploadedStudyMaterial({ commit }, value) {
        commit('destroyUploadedStudyMaterial', value)
    },
    setContent({ commit }, value) {
        commit('setContent', value)
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
    setIntroduction(state, value) {
        state.item.introduction = value
    },
    setStudy_material(state, value) {
        for (let i in value) {
            let study_material = value[i];
            if (typeof study_material === "object") {
                state.item.study_material.push(study_material);
            }
        }
    },
    destroyStudy_material(state, value) {
        for (let i in state.item.study_material) {
            if (i == value) {
                state.item.study_material.splice(i, 1);
            }
        }
    },
    destroyUploadedStudyMaterial(state, value) {
        for (let i in state.item.uploaded_study_material) {
            let data = state.item.uploaded_study_material[i];
            if (data.id === value) {
                state.item.uploaded_study_material.splice(i, 1);
            }
        }
    },
    setContent(state, value) {
        state.item.content = value
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
