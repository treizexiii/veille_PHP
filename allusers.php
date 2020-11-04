<?php include 'inc/header.php'; ?>

<body>
  <style>
    .my_box {
      margin-top: 100px;
      max-width: 600px;
      border: solid 1px #ccc;
      border-radius: 10px;
      padding: 30px;
    }

    /* .btn_submit {
      margin: 20px;
      min-width: 300px;
    }

    .box_btn_sub {
      text-align: center;
    } */
  </style>
  <div class="container">
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 style="text-align: center;">Liste des appels d'offres</h1>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                $responseData = array_reverse($research->getMarket($_SESSION['allMarket']));
                foreach ($responseData as $data) {
                ?>
                  <tr>
                    <th scope="row"><?= $data['value'] ?></th>
                    <td><?= $data['description'] ?>
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
                  </td>  
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>

  <?php include 'inc/footer.php'; ?>