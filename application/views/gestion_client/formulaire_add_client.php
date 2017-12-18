<!-- Content Wrapper. Contains page content -->
<style type="text/css">
  .ma_classe_image{
    background-image: url('../../../assets_al/images/system/img_client.jpg') !important;
    background-size: 100% 100% !important;
  }
</style>
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
      <div class="row ma_classe_image">
        <div class="col-md-6 col-md-offset-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Ajout d'un Client a la platteforme</b></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url(array('Administration','addClientBd')) ?>" enctype="multipart/form-data">
              <input type="hidden" name="post" value="ok">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nom </label>
                  <input type="text" class="form-control" name="nom" id="exampleInputEmail1" placeholder="Nom"  >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Prenom</label>
                  <input type="text" class="form-control" name="prenom" id="exampleInputPassword1" placeholder="Prenom" >
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
                  <input type="number" class="form-control" name="cni" id="exampleInputPassword1" placeholder="CNI" >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email" >
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Telephone 1</label>
                  <input type="number" class="form-control" name="telephone1" id="exampleInputPassword1" placeholder="Numero de telephone" >
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone 2</label>
                  <input type="number" class="form-control" name="telephone2" id="exampleInputPassword1" placeholder="Numero de telephone" >
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
                  <textarea name="adresse" class="form-control" ></textarea>
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




















        