<?php

include 'inc/header.php';

?>

<body>
    <style>
        .my_box {
            margin-top: 100px;
            max-width: 800px;
            border: solid 1px #ccc;
            border-radius: 10px;
            padding: 30px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="my_box">
                    <h2 style="text-align: center;">Connexion</h2>
                    <form action="" method="POST">
                        <div class="form-group  form-control-sm">
                            <label for="">Utilisateur :</label><input name="user" class="form-control" type="text">
                            <label for="" style="margin-top: 5px;">Mot de Passe :</label><input name="password" class="form-control" type="text">
                            <div class="box_btn_sub" style="text-align: center; margin-top: 15px;">
                                <button type="submit" name="login" class="btn btn-primary btn_submit">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>