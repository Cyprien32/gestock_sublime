 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo site_url(array('Message','nouveau')) ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Menu</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo site_url(array('Message','nouveau')) ?>"><i class="fa fa-inbox"></i> nouveau
                  </a></li>
                <li><a href="<?php echo site_url(array('Message','index')) ?>"><i class="fa fa-envelope-o"></i> Envoyer </a></li>
                <li><a href="<?php echo site_url(array('Message','brouillon')) ?>"><i class="fa fa-file-text-o"></i> brouillon</a></li>
                <li><a href="<?php echo site_url(array('Message','important')) ?>"><i class="fa fa-filter"></i>  messages important</a>
                </li>
                <li><a href="<?php echo site_url(array('Message','corbeille')) ?>"><i class="fa fa-trash-o"></i> corbeille</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
        </div>
