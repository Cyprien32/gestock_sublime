        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Inbox <?php  if($message['total']>0){  ?><span class="label label-warning pull-right"><?php  echo " total: ".$message['total'];  ?></span><?php  } ?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <?php if (isset($corbeille)) { ?>
                      <button type="button" class="btn btn-default btn-sm"><a class="fa fa-trash-o" href="<?php echo site_url(array('Message','supprime' )) ?>"> Vider</a></button>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo site_url(array('Message','delete_sms')) ?>">
                      <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <?php } ?>
                  
                  </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php  if($message['total']>0){ for ($i=$message['total']-1; $i >=0 ; $i--) {      ?>


                    <tr>
                      <td> <?php if (!isset($corbeille)) { ?>
                        <input type="hidden" name="total" value="<?php echo $message['total']; ?>">
                        <input type="checkbox" name="numero<?php echo $i; ?>" value="<?php echo $message[$i]['id']; ?>" ></td>
                         <?php } ?>
                      <td class="mailbox-star"><a href=""><i class="fa fa-star text-yellow"></i></a></td>
                      <td class="mailbox-name"><a href="<?php echo site_url(array('Message','lecture/'.$message[$i]['id'] )) ?>">
                        <?php   echo $message[$i]['titre']; ?></a></td>
                       
                      <td class="mailbox-attachment"></td>
                      <td class="mailbox-date pull-right"><?php  echo $message[$i]['date_creation']; ?></td>
                    </tr>
                    <?php  } }else{  ?>
                   <p style="text-align: center;"> <i>  liste vide</i> </p>
                   <?php  }  ?>
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <?php if (isset($corbeille)) { ?>
                      <button type="button" class="btn btn-default btn-sm"><a class="fa fa-trash-o" href="<?php echo site_url(array('Message','supprime' )) ?>"> Vider</a></button>
                  <?php }else{ ?>
                   <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  </form>
                  <?php } ?>
                  </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>