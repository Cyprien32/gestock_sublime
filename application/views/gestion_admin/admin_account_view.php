 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo img_url('images_admin/images/'.$data['ADMIN']['info_personne']['image']) ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $data['ADMIN']['info_personne']['nom'].' '.$data['ADMIN']['info_personne']['prenom']  ?></h3>

              <p class="text-muted text-center"><?php echo $data['ADMIN']['info_personne']['telephone']['liste'][0].' <b>|</b> '.$data['ADMIN']['info_personne']['telephone']['liste'][0] ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>COMMANDES</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>VENTES</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>PROMOTIONS</b> <a class="pull-right">13,287</a>
                </li>
                <li class="list-group-item">
                  <b>CLIENTS</b> <a class="pull-right"><?php echo $data['ADMIN']['clients'] ?></a>
                </li>
              </ul>

              <a href="<?php echo site_url(array('Administration','chargeFormulaireModifAdmin/'.$data['ADMIN']['id'])) ?>" class="btn btn-primary btn-block"><b>Modifier</b></a>
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
                  <label>CNI : </label><?php echo $data['ADMIN']['info_personne']['cni'] ?>
              </p>

              <p class="text-muted">
                  <label>Email : </label><?php echo $data['ADMIN']['info_personne']['email'] ?>
              </p>

              <p class="text-muted">
                  <label>Sexe : </label><?php echo $data['ADMIN']['info_personne']['sexe'] ?>
              </p>

              <p class="text-muted">
                  <label>Login : </label><?php echo $data['ADMIN']['info_sup']['login'] ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $data['ADMIN']['info_personne']['adresse'] ?></p>

              <hr>

            

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>En tant que Admin j'accepte toutes les conditions et les regles de confidentialites et gestion du magazin.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#activity" data-toggle="tab"><h3>Informations complementaire sur le Magazin</h3></a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="" alt="user image">
                        <span class="username">
                          <a href="#">Photo et nom du fondateur</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">formation du fondateur</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="" alt="User Image">
                        <span class="username">
                          <a href="#">Image et nom des cofondateurs</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">formation du cofondateur</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  
                </div>
                <!-- /.post -->

              </div>
              <!-- /.tab-pane -->
             

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

          <div class="tab-content">
            <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="" data-original-title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visitors(futur version)
              </h3>
            </div>
            <div class="box-body">
            
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"><canvas width="80" height="50" style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas></div>
                  <div class="knob-label">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"><canvas width="80" height="50" style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas></div>
                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"><canvas width="80" height="50" style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas></div>
                  <div class="knob-label">Exists</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>


          <div class="tab-content">
            <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="" data-original-title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Information Visuelle d'identite
              </h3>
            </div>
            <div class="box-body">
              <img src="<?php echo img_url('images_admin/images/'.$data['ADMIN']['info_personne']['image']) ?>">
            </div>
            
          </div>

           <div class="tab-content">
            <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="" data-original-title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Information Visuelle carte d'identite
              </h3>
            </div>
            <div class="box-body">
              <img src="<?php echo img_url('images_admin/images_cni/'.$data['ADMIN']['info_personne']['image_cni']) ?>">
            </div>
            
          </div>
          </div>
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