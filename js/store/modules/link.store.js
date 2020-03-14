import Vue from 'vue';
import Vuex from 'vuex';
import actions from './link/actions.js';
import mutations from './link/mutations.js';
import getters from './link/getters.js';

Vue.use(Vuex);

const state = {
    links: [],
    currentLink: {},
  };

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
  };
