<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Connexion</h1>
                </div>
                <div class="panel-body">
                        <div class="form-group">
                            <input v-model="email" class="form-control" type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input v-model="password" class="form-control" type="password" placeholder="Password">
                        </div>
                        <button @click="login" class="btn btn-success btn-block">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login () {
            var data = {
                client_id: 2,
                client_secret: 'pc3MYd8dhcRGo5Ld5sAz3pfYXAg2Oga858Dw3xPz',
                grant_type: 'password',
                username: this.email,
                password: this.password
            }

            this.$http.post("http://localhost:8000/oauth/token", data)
              .then(response => {
                console.log(response)
              })
             /*
               .then(function(response) {
                    console.log(response)
               })
               */
        }
    }
}
</script>

<style>

</style>
