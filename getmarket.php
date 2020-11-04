<?php include 'inc/header.php';

$screen2 = false;
$error = array();
if (isset($_GET['userToSearch'])) {
    if (empty($_GET['userToSearch'])) {
        array_push($error, "La saisie de chaine de la caractère est incorrecte.");
    }
    if (!$error) {
        $responseData = $research->seeMarket($_GET['userToSearch'], $_GET['version']);
        $screen2 = true;
    }
}

if (isset($_POST['submit'])) {
    $mySearch = $_REQUEST['offerToSearch'];
    $responseData = @$research->getVersion($mySearch);
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
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card" style="margin-top: 10px;">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <h4><?= $principales = $responseData->{'gestion'}->{'indexation'}->{'resumeobjet'};; ?></h4>
                                        <p class="text-secondary mb-1"><?= $idweb = $responseData->{'gestion'}->{'reference'}->{'idweb'}; ?></p>
                                        <p class="text-muted font-size-sm"><?= $objetcomplet = $responseData->{'donnees'}->{'objet'}[0]->{'objetcomplet'}; ?></p>
                                        <p><a href="<?= $url = $responseData->{'donnees'}->{'identite'}->{'url'}; ?>"><?= $url ?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3"style="margin-top: 10px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p><?= $correspondant = $responseData->{'donnees'}->{'identite'}->{'correspondant'}; ?><p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $mel = $responseData->{'donnees'}->{'identite'}->{'mel'}; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Telephone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $tel = $responseData->{'donnees'}->{'identite'}->{'tel'}; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Poste</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $poste = $responseData->{'donnees'}->{'identite'}->{'poste'}; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Addresse</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $cp = $responseData->{'donnees'}->{'identite'}->{'adresse'}; ?> <?= $cp = $responseData->{'donnees'}->{'identite'}->{'cp'}; ?> <?= $ville = $responseData->{'donnees'}->{'identite'}->{'ville'}; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                        <small>Web Design</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Website Markup</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>One Page</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Mobile Template</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Backend API</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                        <small>Web Design</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Website Markup</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>One Page</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Mobile Template</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small>Backend API</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form style="text-align: center;">
                    <input type="button" style="margin-bottom: 10px;" value="Retour" onclick="history.go(-1)" class="btn btn-primary btn_submit">
                </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>

    <?php include 'inc/footer.php'; ?>