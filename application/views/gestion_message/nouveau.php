
        <div class="col-md-9">
          
          <?php if(isset($_SESSION['message'])){?>
                  <br><p class="alert-success" id="pdelete_message"  style="padding:10px; font-weight:bold; border-radius:9px; margin-bottom:10px;box-shadow:2px 2px 2px rgba(0,0,0,0.4); text-align: center;">
                  <?php  echo $_SESSION['message'] ;unset($_SESSION['message']);?>  
                  <span class="icon-close pull-right" style="cursor:pointer;" id="delete_message"></span>
                   
                </p>
                <?php } ?>
                <?php if(isset($_SESSION['message_error'])){?>
                  <br><p class="alert-danger" id="pdelete_message_error" style="padding:10px; font-weight:bold; border-radius:9px; margin-bottom:10px;box-shadow:2px 2px 2px rgba(0,0,0,0.4); text-align: center;">
                  <?php  echo $_SESSION['message_error'] ;unset($_SESSION['message_error']);?>  
                  <span class="icon-close pull-center" style="cursor:pointer;" id="delete_message_error"></span>
                   
                </p>
                <?php } ?>
    
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose nouveau Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="post" id="save" action="<?php echo site_url(array('Message','save')) ?>">
              <div class="form-group">
                <input class="form-control" type="text" name="titre" placeholder="Titre:" required>
              </div>
              <div class="form-group">
                    <textarea id="compose-textareaf" name="message" class="form-control" style="height: 300px" required>
                    </textarea>
              </div>
              <script type="text/javascript">
                document.getElementById('compose-textareaf').value="";
              </script>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <input type="hidden" name="save_text" id="save_text" value="no">
               
                <button type="submit" name="save_text" value="no" id="save_b1" class="btn btn-default"><i class="fa fa-pencil"></i> 
                save </button>
                <button type="submit" name="save_text" value="yes" id="envoyer_b1" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Envoyer</button>
              </div>
             <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Annuler</button>
            </div>
            <!-- /.box-footer -->
             </form>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  