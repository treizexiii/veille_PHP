<?php

include 'inc/header.php';

$screen2 = false;
$error = array();
if (isset($_POST['userToSearch'])) {
  if (empty($_POST['userToSearch'])) {
    array_push($error, "La saisie de chaine de la caractère est incorrecte.");
  }

  if (!$error) {
    $responseData = $research->getMarket($_POST['userToSearch']);

    $screen2 = true;
  }
}

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

    <!-- Page Content -->
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="my_box">
          <h2 style="text-align: center;">Veille</h2><br>
          <?php if (!$screen2) { ?>
            <?php if ($error) { ?>
              <?php count($error); ?>
              <div class="alert alert-danger">
                <strong>Erreur de saisie !</strong>
                <ul>
                  <?php foreach ($error as $err) { ?>
                    <li><?php echo $err; ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>
            <form action="" method="post">
              <div class="form-group">
                <label for="">Rechercher par mot-clefs</label>
                <input name="userToSearch" class="form-control" type="text" placeholder="<?= (isset($_POST['userToSearch'])) ? $_POST['userToSearch'] : "Taper votre recherche ici"; ?>">
              </div>
              <div class="box_btn_sub" style="text-align: center;">
                <button type="submit" class="btn btn-primary btn_submit">Rechercher</button>
              </div>
            </form><br>
            <form action="getmarket.php" method="post">
              <div class="form-group">
                <label for="">Rechercher par ID </label>
                <input name="offerToSearch" class="form-control" type="text" placeholder="<?= (isset($_POST['offerToSearch'])) ? $_POST['offerToSearch'] : "Taper votre recherche ici"; ?>">
                <div class="box_btn_sub" style="text-align: center; margin-top: 15px;">
                  <button type="submit" name="submit" class="btn btn-primary btn_submit" >Rechercher</button>
                </div>
            </form>
        </div>
      </div>
    <?php } ?>
    <?php if ($screen2) { ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Rechercher un utilisateur </label>
          <input name="userToSearch" class="form-control" type="text" placeholder="<?= (isset($_POST['userToSearch'])) ? $_POST['userToSearch'] : "Taper votre recherche ici"; ?>">
        </div>

        <div class="box_btn_sub" style="text-align: center;">
          <button type="submit" class="btn btn-primary btn_submit">Rechercher</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-12">
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = array_reverse($responseData);
                foreach ($result as $data) {
                ?>
                  <tr>
                    <th scope="row"><?= $data['value'] ?></th>
                    <td><?= $data['description'] ?></td>
                    <td>
                      <?php
                      if (strpos($data['schema'], "v110")) {
                        $version = "v110";
                      } else if (strpos($data['schema'], "v010")) {
                        $version = "v010";
                      } else if (strpos($data['schema'], "v230")) {
                        $version = "v230";
                      } else {
                        $version = "v110";
                      }
                      ?>
                      <a href="<?= "http://localhost/Boamp/getmarket.php?userToSearch=" . $data['value'] . "&version=" . $version ?>">
                        <button type="button" class="btn btn-success">
                          Voir
                        </button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
            <?php
            if (!$responseData) {
              print("Aucun résultat");
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

</div>
</div>
<!-- /#page-content-wrapper -->
</div>

<?php include 'inc/footer.php'; ?>