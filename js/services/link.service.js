const linkService = {
    fetchLinks,
    addLink,
    getLink,
    deleteLink,
  };

export default linkService;

function fetchLinks() {
  return new Promise((resolve, reject) => {
      Vue.axios.get('/api/links')
           .then(response => {
              resolve(response.data);
            })
           .catch(error => {
              reject(error);
            });

    });
}

function getLink(linkID) {
  return new Promise((resolve, reject) => {
      Vue.axios.get('/api/links/' + linkID)
           .then(response => {
              console.log(response);
              if (response.status == 200) {
                resolve(response.data);
              }
            })
           .catch(error => {
              reject(error);
            });

    });
}

function addLink(link) {
  return new Promise((resolve, reject) => {
    Vue.axios.post('/api/links', link)
      .then(response => {
          if (response.status == 201) {
            resolve(response.data);
          }
        })
      .catch(error => {
          reject(error);
        });
  });
}

function deleteLink(linkID) {
  return new Promise((resolve, reject) => {
    Vue.axios.delete('/api/links/' + linkID)
      .then(response => {
          if (response.status == 200) {
            resolve(response.data);
          }
        })
      .catch(error => {
          reject(error);
        });
  });
}
