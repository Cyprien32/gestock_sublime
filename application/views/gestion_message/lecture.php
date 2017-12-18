                                          <!-- /.col -->
        <div class="col-md-9">
            <?php if (!isset($supprimer_sms)) { ?>
               <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">Etat:
                <i><?php if($detail_sms['etat']==0 || $detail_sms['etat']==2){ echo " pas encore envoyé";  }else{  if($detail_sms['etat']==1){ echo "envoyé";  } if($detail_sms['etat']==3){ echo "Supprime";  } } ?>
              </i></h5>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $detail_sms['titre']; ?></h3>
                <h5>Rédigé par: <?php if($detail_sms['nom_responsable']['data']!="non"){ echo $detail_sms['nom_responsable']['nom']." ".$detail_sms['nom_responsable']['prenom'];  }else{ echo "Nom pas trouvé";} ?>
                  <span class="mailbox-read-time pull-right"><?php echo $detail_sms['date_creation'] ; ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Hello ,</p>

                <p><?php echo $detail_sms['contenu']; ?></p>
 

 
              </div>
              <!-- /.mailbox-read-message -->
            </div>
             <div class="box-footer">
              <div class="row">
                <div class="col-md-6">
                  <?php if (isset($detail_sms) && $detail_sms['etat']!=3 ) { ?>
                  <form method="post" action="<?php  echo site_url(array('Message' ,'Supprime')) ?>">
                    <input type="hidden" name="id" value="<?php echo $detail_sms['id'] ?>" >
                    <input type="hidden" name="lecture" value="oui" >
                    <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i> Suprime</button>
                  </form>
                  <?php } ?>
                </div> 
                <div class="col-md-6">
                  <?php if (isset($detail_sms) && $detail_sms['etat']!=1 && $detail_sms['etat']!=3 ) { ?>
                  <form method="post" id="save" action="<?php echo site_url(array('Message','save')) ?>">
                   <button type="submit"  name="save_text" value="yes" id="envoyer_b1" class="btn btn-primary pull-right "><i class="fa fa-envelope-o"></i> Envoyer</button>
                    <input type="hidden" name="id_sms" value="<?php echo $detail_sms['id'] ?>">
                  </form>
                  <?php } ?>
                   <?php if (isset($detail_sms) && $detail_sms['etat']==3 ) { ?>
                  <form method="post" id="save" action="<?php echo site_url(array('Message','save')) ?>">
                   <button type="submit"  name="save_text" value="yes" id="envoyer_b1" class="btn btn-primary pull-right "><i class="fa fa-mail-reply "></i> Restaurer</button>
                    <input type="hidden" name="id_sms" value="<?php echo $detail_sms['id'] ?>">
                    <input type="hidden" name="Restaurer" value="<?php echo $detail_sms['id'] ?>">
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
          <!-- /. box -->
          <?php }else{ ?>
              <br><br>
              <br><br>
              <p class="alert-success" id="pdelete_message"  style="padding:10px; font-weight:bold; border-radius:9px; margin-bottom:10px;box-shadow:2px 2px 2px rgba(0,0,0,0.4); text-align: center;">
                  <?php  echo $supprimer_sms;?>  
                  <span class="icon-close pull-right" style="cursor:pointer;" id="delete_message"></span>
                   
                </p>
          <?php } ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
