<template>


    <div class="row justify-center">
        <q-card inline class="q-ma-lg q-pa-lg justify-center column inline light">
                    <q-card-title class="items-center">
                        Logowanie
                    </q-card-title>
                    <q-card-main>
                    <form method="POST" action="/login" @submit.prevent="onSubmit">

                        <p><q-input v-model="name" float-label="Nazwa użytkownika:" /></p>
                        <p><q-input v-model="password" type="password" float-label="Hasło:" /></p>
                        <p class="center">
                            <q-btn color="primary" type="submit" icon-right="send" label="Zaloguj"></q-btn>
                        </p>
                    </form>
                    </q-card-main>
                    <p class="center">albo</p>
                    <p class="center">
                        <q-btn color="secondary" to="/register" icon-right="assignment_ind" label="Zarejestruj się"></q-btn>
                    </p>
        </q-card>

    </div>

</template>

<script>
    export default {
        name: 'app',

        data() {
            return {
                name: '',
                password: '',
                errors: {}
            }
        },
        methods: {

                onSubmit() {
                    axios.post('/login', this.$data)
                        .then(response => window.location = "/home")
                        .catch(error => this.$q.notify({
                            icon: 'warning',
                            message:'nieprawidłowy login lub hasło',
                            timeout: 0
                            }))
                }

        }
   }



</script>

<style>
body {
    padding-top: 50px;
}

/* .row {
    margin-top:10px;
} */

.q-card-title {
    text-align: center;
}

.center {
    text-align: center;
    padding-top: 0px;
}

</style>
