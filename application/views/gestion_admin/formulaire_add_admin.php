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
        <div class="col-md-6 col-md-offset-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Ajout d'un Admin a la platteforme</b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url(array('Administration','addAdminBd')) ?>" enctype="multipart/form-data">
              <input type="hidden" name="post" value="ok">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nom </label>
                  <input type="text" class="form-control" name="nom" id="exampleInputEmail1" placeholder="Nom"  required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Prenom</label>
                  <input type="text" class="form-control" name="prenom" id="exampleInputPassword1" placeholder="Prenom" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Sexe</label>
                  <select class="form-control" name="sexe">
                    <option value="M">Homme</option>
                    <option value="F">Femme</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">CNI</label>
                  <input type="number" class="form-control" name="cni" id="exampleInputPassword1" placeholder="CNI" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email" required>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Telephone 1</label>
                  <input type="number" class="form-control" name="telephone1" id="exampleInputPassword1" placeholder="Numero de telephone" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone 2</label>
                  <input type="number" class="form-control" name="telephone2" id="exampleInputPassword1" placeholder="Numero de telephone" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Image CNI</label>
                  <input type="file" class="form-control" name="image_cni" id="exampleInputPassword1" placeholder="Images CNI" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Image Admin</label>
                  <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="Images CNI" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Adresse</label>
                  <textarea name="adresse" class="form-control" required></textarea>
                </div>
                
                <h2>Parametres de connexion</h2>
                <div class="form-group">
                  <label for="exampleInputEmail1">Login </label>
                  <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Nom"  required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Prenom" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->




















        