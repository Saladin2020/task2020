<?php
session_start();
if (isset($_SESSION["Allow"])) {
    header("Location: ./");
    //header("Location: http://49.229.25.51/track");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="assets/js/vue.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <title>Task2020</title>
</head>

<body style="padding-top:3rem;">
    <div class="container">
        <div id="auth">
            <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">
                        <img src="assets/images/magic.svg" width="50">
                        Task Magic
                    </h4>
                    <div class="card-text">
                        <form id="form_001" @submit.prevent="login">
                            <div class="form-group">
                                <label> user :</label>
                                <input class="form-control" v-model="user" type="text">
                            </div>
                            <div class="form-group">
                                <label> password :</label>
                                <input class="form-control" v-model="password" type="text">
                            </div>
                            <span v-if="message == 'incorrect'">incorrect</span>
                            <span v-else>&nbsp;</span>
                            <br><br>
                        </form>
                        <button form="form_001" class="btn btn-block btn-dark" type="submit"><i class="fas fa-save"></i>login</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    new Vue({
        el: '#auth',
        data: {
            user: "",
            password: "",
            message: ""
        },
        methods: {
            login: function() {
                let post_data = {
                    "user": this.user,
                    "password": this.password
                }
                axios.post('./v1/auth.php', post_data)
                    .then(response => {
                        console.log(response.data)
                        this.message = response.data.message
                        if(this.message == 'login'){
                            location.reload()
                        }
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            }
        },
    })
</script>

</html>