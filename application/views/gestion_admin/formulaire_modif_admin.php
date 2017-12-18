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
                  <b>CLIENTS</b> <a class="pull-right">13,287</a>
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
          <div class="col-md-10 col-md-offset-1">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Modification d'un Admin sur la platteforme</b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url(array('Administration','modifAdminBd')) ?>" enctype="multipart/form-data">
              <input type="hidden" name="post" value="ok">
              <input type="hidden" name="admin" value="<?php echo $data['ADMIN']['id'] ?>">
              <input type="hidden" name="id_personne" value="<?php echo $data['ADMIN']['info_personne']['id'] ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nom </label>
                  <input type="text" class="form-control" name="nom" id="exampleInputEmail1" placeholder="Nom" value="<?php echo $data['ADMIN']['info_personne']['nom'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Prenom</label>
                  <input type="text" class="form-control" name="prenom" id="exampleInputPassword1" placeholder="Prenom" value="<?php echo $data['ADMIN']['info_personne']['prenom'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Sexe</label>
                  <select class="form-control" name="sexe">
                    <?php if ($data['ADMIN']['info_personne']['sexe'] == 'M'){ ?>
                      <option value="M" selected>Homme</option>
                      <option value="F">Femme</option>
                    <?php } else{?>
                      <option value="M" >Homme</option>
                      <option value="F" selected>Femme</option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">CNI</label>
                  <input type="number" class="form-control" name="cni" id="exampleInputPassword1" placeholder="CNI" value="<?php echo $data['ADMIN']['info_personne']['cni'] ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email" value="<?php echo $data['ADMIN']['info_personne']['email'] ?>" required>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Telephone 1</label>
                  <input type="number" class="form-control" name="telephone1" id="exampleInputPassword1" placeholder="Numero de telephone" value="<?php echo $data['ADMIN']['info_personne']['telephone']['liste'][0] ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone 2</label>
                  <input type="number" class="form-control" name="telephone2" id="exampleInputPassword1" placeholder="Numero de telephone" value="<?php echo $data['ADMIN']['info_personne']['telephone']['liste'][1] ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Image CNI</label>
                  <input type="file" class="form-control" name="image_cni" id="exampleInputPassword1" placeholder="Images CNI" >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Image Admin</label>
                  <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="Images CNI" >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Adresse</label>
                  <textarea name="adresse" class="form-control" required>
                    <?php echo $data['ADMIN']['info_personne']['adresse'] ?>
                  </textarea>
                </div>
                
                <h2>Parametres de connexion</h2>
                <div class="form-group">
                  <label for="exampleInputEmail1">Login </label>
                  <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Login" value="<?php echo $data['ADMIN']['info_sup']['login'] ?>"  required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="password" value="<?php echo $data['ADMIN']['info_sup']['password']  ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Valider les Modifications </button>
              </div>
            </form>
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