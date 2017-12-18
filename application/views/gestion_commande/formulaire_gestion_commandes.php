 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Client Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo img_url('images_client/images/'.$data['CLIENT']['info_personne']['image']) ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $data['CLIENT']['info_personne']['nom'].' '.$data['CLIENT']['info_personne']['prenom']  ?></h3>

              <p class="text-muted text-center"><?php echo $data['CLIENT']['info_personne']['telephone']['liste'][0].' <b>|</b> '.$data['CLIENT']['info_personne']['telephone']['liste'][0] ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>COMMANDES</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Achats</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="<?php echo site_url(array('Administration','chargeFormulaireModifClient/'.$data['CLIENT']['id'])) ?>" class="btn btn-primary btn-block"><b>Modifier</b></a>
              <a href="<?php echo site_url(array('Administration','chargeNouvelleAchatClient/'.$data['CLIENT']['id'])) ?>" class="btn bg-green color-palette btn-block"><b>Nouvel Achat</b></a>
              <a href="<?php echo site_url(array('Administration','chargeNouvelleCommandeClient/'.$data['CLIENT']['id'])) ?>" class="btn bg-yellow color-palette btn-block"><b>Nouvelle Commande</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> More Infos</strong>
              <br><br>
              <p class="text-muted">
                  <label>CNI : </label><?php echo $data['CLIENT']['info_personne']['cni'] ?>
              </p>

              <p class="text-muted">
                  <label>Email : </label><?php echo $data['CLIENT']['info_personne']['email'] ?>
              </p>

              <p class="text-muted">
                  <label>Sexe : </label><?php echo $data['CLIENT']['info_personne']['sexe'] ?>
              </p>

              <p class="text-muted">
                  <label>Creation : </label><?php echo $data['CLIENT']['info_sup']['date_creation'] ?>
              </p>

               <p class="text-muted">
                  <label>Dernier Achat : </label><?php echo $data['CLIENT']['info_sup']['date_last_achat'] ?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $data['CLIENT']['info_personne']['adresse'] ?></p>

              <hr>

            

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>En tant que Client j'accepte toutes les conditions et les regles de confidentialites et gestion du magazin.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="row">
              <div class="callout callout-success">
                <h4>Liste des Produits de la base de données</h4>
              </div>
              <!-- disposition pour la bare de recherche  -->
              <div class="row" style="width: 95%;margin-left: 25px; margin-top: 30px;margin-bottom: 30px;">
                <form method="post" id="formulaire_filtre">
                  <div class="row">
                    <div class="col-md-4">
                      <input class="form-control filtres_commande nom" type="text" placeholder="Filtre Par Nom">            
                    </div>

                    <div class="col-md-4">
                      <select class="form-control filtres_commande_select categories">
                        <option value="0">Confondu</option>
                        <option value="1">Sacs</option>
                        <option value="2">Chaussures</option>
                      </select> 
                    </div>

                    <div class="col-md-4">
                      <a class="form-control btn bg-yellow color-palette btn-block" href="#"> Voir le Panier <i class="fa fa-opencart"></i> </a>            
                    </div>
                  </div>
                </form>
              </div>



              <?php // listing de tous les produits de la base de donnees ?>
              <div class="row">
                  
                  

              </div>









            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->