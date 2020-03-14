export default {
    INIT_LINKS(state, links) {
      state.links = links;
    },

    ADD_LINK(state, link) {
      state.links.unshift(link);
    },

    DELETE_LINK(state, linkID) {
      state.links = state.links.filter(item => item.id !== linkID);
    },

    INIT_CURRENT_LINK(state, link) {
      state.currentLink = link;
    },
  };
