<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Magazin | AM
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-indent"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Caissiers</span>
              <span class="info-box-number"><?php echo $data['total'] ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-mars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hommes</span>
              <span class="info-box-number"><?php echo $data['homme']  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-venus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Femmes</span>
              <span class="info-box-number"><?php echo $data['femme']  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <a href="<?php echo site_url(array('Administration','loadFormulaireAddCaissier')) ?>">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b style="font-size: 2.5em;display: inline-block;margin-top: 15px;">Ajouter</b></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->
      </div>

    <!-- disposition pour la bare de recherche  -->
    <div class="row" style="width: 95%;margin-left: 25px; margin-top: 30px;margin-bottom: 30px;">
      <form method="post" id="formulaire_filtre">
        <div class="row">
          <div class="col-md-2">
            <input class="form-control filtre_caissier nom" type="text" placeholder="Filtre Nom">            
          </div>

          <div class="col-md-2">
            <input class="form-control filtre_caissier prenom" type="text" placeholder="Filtre Prenom">            
          </div>

          <div class="col-md-2">
            <select class="form-control filtre_caissier_select sexe">
              <option value="0">Confondu</option>
              <option value="1">Homme</option>
              <option value="2">Femme</option>
            </select> 
          </div>

          <div class="col-md-2">
            <input class="form-control filtre_caissier cni" type="text" placeholder="Filtre CNI">            
          </div>

          <div class="col-md-2">
            <input class="form-control filtre_caissier telephone" type="text" placeholder="Filtre Telephnone">            
          </div>
          <div class="col-md-2">
            <input class="form-control filtre_caissier email" type="text" placeholder="Filtre Email">            
          </div>
        </div>
      </form>
    </div>
















    <!-- liste des admins de la plate forme -->

    <div class="row" id="div_liste_caissier">
      <div class="ma_liste_tmp">
      <?php 
        $fin = 0;
        if ($_SESSION['FILTER']['PAGE']*$_SESSION['FILTER']['NB_PAGE'] + $_SESSION['FILTER']['NB_PAGE'] >= $data['total']) {
             $fin = $data['total']; 
        }else{
          $fin = $_SESSION['FILTER']['PAGE']*$_SESSION['FILTER']['NB_PAGE'] + $_SESSION['FILTER']['NB_PAGE']; 
        }
      for ($i=($_SESSION['FILTER']['PAGE']*$_SESSION['FILTER']['NB_PAGE']); $i < $fin; $i++) {?>
          <a href="<?php echo site_url(array('Administration','viewCaissierProfil/'.$data[$i]['id'])) ?>">
              <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-yellow color-palette">
                    <h3 class="widget-user-username"><?php echo $data[$i]['info']['nom'].'  '.$data[$i]['info']['prenom'] ?></h3>
                    <h5 class="widget-user-desc"><?php echo '<b>CNI : </b>'.$data[$i]['info']['cni'].' <br> '.$data[$i]['info']['email'] ?></h5>
                    <h5 class="widget-user-desc"><?php echo $data[$i]['info']['telephone']['liste'][0].' <b>|</b> '.$data[$i]['info']['telephone']['liste'][1] ?></h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo img_url('images_caissier/images/'.$data[$i]['info']['image']) ?>" alt="User Avatar">
                  </div>
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">3,200</h5>
                          <span class="description-text">COMMADES</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">13,000</h5>
                          <span class="description-text">VENTES</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header"><?php echo $data[$i]['clients'] ?></h5>
                          <span class="description-text">CLIENTS</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>
            </a>
      <?php } ?>
      </div>
    </div>

















    <!--zone de pagination -->
    <div class="row" id="row row_de_pagination">
      <div class="box-tools pull-right" style="margin-right: 20px;">
        <ul class="pagination pagination-sm inline">
          
          <?php if ($_SESSION['FILTER']['PAGE'] !=0) { ?>
            <li><a href="<?php echo site_url(array('Administration','pagination/caissier/'.($_SESSION['FILTER']['PAGE'] -1))) ?>" >«</a></li>
          <?php } ?>

          <?php if ( (floor($data['total'] /$_SESSION['FILTER']['NB_PAGE']) +1) >=1) { 
            for ($i=0; $i < (floor($data['total'] /$_SESSION['FILTER']['NB_PAGE'] ) +1 ) ; $i++) { 
          ?>
              <li><a href="<?php echo site_url(array('Administration','pagination/caissier/'.$i)) ?>" <?php if ($i==$_SESSION['FILTER']['PAGE']) {?> style="background-color: #00a7d0 !important;color: white;" <?php } ?> ><?php echo $i+1 ?></a></li>
          <?php 
              }
            }
         ?>

         <?php if ( ($_SESSION['FILTER']['CAISSIER']['total'] -$_SESSION['FILTER']['PAGE']*$_SESSION['FILTER']['NB_PAGE']) > $_SESSION['FILTER']['NB_PAGE']) {?>
          <li><a href="<?php echo site_url(array('Administration','pagination/caissier/'.($_SESSION['FILTER']['PAGE'] +1))) ?>">»</a></li>
        <?php } ?>
        </ul>
      </div>
    </div>








    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
