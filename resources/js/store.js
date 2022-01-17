import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  user: {
    name: 'takeshi',
    auth : null,
  }
}

const getters = {
  user: (state) => state.user,
}

const mutations = {
  setUser(state, payload) {
    state.user.name = payload;
  },
  setAuth(state, payload) {
    state.user.auth = payload;
  },
}

const actions = {
  setUser(context, user) {
    context.commit('setUser', user);
  },
}

export default new Vuex.Store({
  state,
  getters,
  mutations,
  actions
})