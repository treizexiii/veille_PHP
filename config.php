<?php
include 'inc/header.php';
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="my_box">
                    <h2 style="text-align: center;">Configuration</h2><br>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Mot clefs :</label>
                            <input name="allMarkets" class="form-control" type="text" placeholder="<?= $_SESSION['allMarket']; ?>">
                            <div class="box_btn_sub" style="text-align: center; margin-top: 15px;">
                                <button type="submit" name="setup" class="btn btn-primary btn_submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>