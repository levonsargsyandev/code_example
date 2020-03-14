<template>
<div >
    <div class="row justify-content-center">
      <div class="container mb-3">
        <router-link class="btn btn-primary float-right" to="/todos/add">Add</router-link>
      </div>

        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Link</th>
                <th>Assigned to</th>
                <th>Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="link in links" >
                <td>{{ link.id }}</td>
                <td>{{ link.link }}</td>
                <td>
                  <a href="#" v-on:click.prevent="" v-for="geo in link.linkGeos">
                    {{ geo.code }}
                  </a>

                </td>
                <td>{{ link.name | truncate }}</td>
                <td>
                  <a href="/" v-on:click.prevent="deleteLink(link.id)" title="Delete" class="fa fa-close"  style="color:#000">
                      <font-awesome-icon :icon="['fas', 'trash']" flip="horizontal" />
                  </a>
                  <a href="/" v-on:click.prevent="openGeosModal(link.id)" title="Assign geo" class="fa fa-user-plus"  >
                      <font-awesome-icon :icon="['fas', 'user-plus']" flip="horizontal" />
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    <assigned-users-modal v-bind:todo="this.currentTodo"></assigned-users-modal>
</div>
</template>

<script>
import assignedGeosModal from './../../hoc/geos-modal.vue';
import { mapGetters, mapActions } from 'vuex'
    export default {
      name : 'links',
      data: function() {
        return {
          currentTodo: {}
        }
      },
      components: {
        'geos-modal' : assignedGeosModal,
      },
      computed: {
        ...mapGetters({
          'links': 'Link/getLinks',
        }),
      },
      methods: {
        ...mapActions({
          'deleteLink': 'Link/deleteLink'
        }),

        openUsersModal: function(linkID){
          //this.$store.dispatch('Link/showModal', linkID);
        },


      },
      filters: {
        truncate: (string, maxLength = 50) => {
          if (!string) return null;
          const showDots = string.length > maxLength;
          return `${string.substring(0, maxLength)}${showDots ? '...' : ''}`;
        }
      },
      mounted() {
        this.$store.dispatch('Link/fetchLinks');
      }
    }
</script>
