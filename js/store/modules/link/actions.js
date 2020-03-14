import linkService from './../../../services/link.service.js';
import router from './../../../helpers/router.js';
export default {
    fetchLinks({ commit, dispatch }) {
      linkService.fetchLinks()
               .then(links => {
                  commit('INIT_LINKS', links);
                })
               .catch(function (error) {
                  commit('ERROR', error);
                });

    },

    getLink({ commit }, linkID) {
      linkService.getLink(linkID)
        .then(link => {
          commit('INIT_CURRENT_LINKS', link);
        })
        .catch(error => {
          commit('ERROR', error);
        });
    },

    addLink({ commit }, linkData) {
      linkService.addLink(linkData)
               .then(link => {
                  commit('ADD_LINK', link);
                  router.push('/links');
                })
               .catch(function (error) {
                  commit('ERROR', error);
                });
    },

    deleteLink({ commit }, linkID) {
      linkService.deleteLink(linkID)
               .then(link => {
                  commit('DELETE_LINK', link.id);
                })
               .catch(function (error) {
                  commit('ERROR', error);
                });
    },
  };
