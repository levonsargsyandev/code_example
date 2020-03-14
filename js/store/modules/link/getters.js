export default {
    getLinks(state) {
      return state.Links;
    },

    getCurrentLink(state) {
      return { ...state.currentLink };
    },
  };
