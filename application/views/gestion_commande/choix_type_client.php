<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestion Commandes
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Gestion Commandes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Commandes traitées</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-up"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Commandes en Cours</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Commandes < 3jours </p>
            </div>
            <div class="icon">
              <i class="fa fa-warning"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Commandes Passées</p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-down"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      



      <div class="row">
        
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="box-body" style="padding-top: 100px;">
                  
                  <a href="<?php echo site_url(array('Administration','loadClients')) ?>">
                    <div class="callout col-md-5  callout-info">
                      <h4>Commende pour un Ancien Client ?</h4>

                      <p>Vous allez etre redirigé vers la page de gestion des clients. De cetter page vous pourrez faire une recherche sur ce client et une fois dans son compte lancer le processus de creation de la commande</p>
                    </div>
                  </a>

                  <a href="<?php echo site_url(array('Administration','loadFormulaireAddClient')) ?>">
                    <div class="callout col-md-5 callout-success" style="margin-left: 50px;">
                      <h4>Commande Pour un nouveau Client ?</h4>
                      <p>Vous allez etre redirigé vers le formulaire de creation des clients. De cetter page vous pourrez creer ce client et une fois dans son compte lancer le processus de creation de la commande</p>
                    </div>
                  </a>
                </div>




            </div>
        </div>

      </div>





    </section>
    <!-- /.content -->
  </div>