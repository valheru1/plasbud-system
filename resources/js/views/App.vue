<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >
      <v-list dense>
        <v-list-item @click="home">
          <v-list-item-action>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-action>
          <v-list-item-content >
            <v-list-item-title name="home">Tablica</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="clients">
          <v-list-item-action>
            <v-icon>mdi-settings</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title name="clients">Rejestr klientów</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      clipped-left
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Plas-bud Panel</v-toolbar-title>
    </v-app-bar>

    <v-content>
      <v-container
        fluid
        top
      >
        <router-view></router-view>

      </v-container>
    </v-content>

    <v-footer app>
      <span>&copy; 2019 Plas-bud</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
    created () {
      this.$vuetify.theme.dark = true
    },
    methods: {
        home() {
            this.$router.push({name: 'home'})
        },
        clients() {
            this.$router.push({name: 'clients'})
        }

    }
  }
</script>
