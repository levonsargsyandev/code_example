<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <span>Add Link</span>
                </div>
                <div class="card-body">
                  <div class="container">
                    <form
                      id="app"
                      @submit="submitForm"
                      action=""
                      method="post"
                      >
                      <div class="form-group">
                        <p v-if="errors  && errors.length">
                          <b>Please correct the following error(s):</b>
                          <ul>
                            <li v-for="error in errors">{{ error }}</li>
                          </ul>
                        </p>

                        <p>
                          <label for="link">Link</label>
                          <input
                            id="link"
                            class="form-control"
                            v-model="link.link"
                            type="text"
                          />
                        </p>

                        <p>
                          <label for="name">Name</label>
                          <input
                            id="name"
                            class="form-control"
                            v-model="link.name"
                            type="text"
                          />
                        </p>



                        <p>
                          <input
                            type="submit"
                            class="btn btn-primary float-right"
                            value="Add"
                          >
                        </p>
                        </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
      name : 'AddLink',
      data : function () {
        return {
          errors : null,
          link: {
            link : null,
            name : null,
          }
        }
      },
      methods: {
        submitForm: function (e) {
          this.errors = [];
          e.preventDefault();
          if (!this.link.link) {
            this.errors.push("Link required.");
          }
          if (!this.link.name) {
            this.errors.push("Name required.");
          }

          if (!this.errors.length) {
            this.$store.dispatch('Link/addLink', this.link);
            this.link = {};
          }
        }
      },
      mounted: function(){
        console.log('Add Link mounted');
      }
    }
</script>
