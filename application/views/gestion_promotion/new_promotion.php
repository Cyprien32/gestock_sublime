 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestion
        <small>Promotions</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Magazin','index')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Cathegorie</a></li>
      
         
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-11">
          
         <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                   Cathegories Produits
                  </span>
            </li>
            <!-- /.timeline-label -->
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
            <?php for ($i=0; $i <$liste_cathegorie['total'] ; $i++) {  ?>
              
            <!-- timeline item -->
            <li>
              <i class="fa fa-th bg-blue"></i>
              
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $liste_cathegorie[$i]['dateCreation']; ?></span>
                <h3 class="timeline-header"><form method="post" class="form_p" action="<?php echo site_url(array('Promotioin','Liste_produit')) ?>">
                  <a href="<?php echo site_url(array('Promotion','liste_produit/'.$liste_cathegorie[$i]['id_cat'] )) ?>" class="action_form"><?php echo $liste_cathegorie[$i]['libelle'] ; ?></a> <?php echo $liste_cathegorie[$i]['description']; ?>
                </form></h3>
               <script type="text/javascript">
                  $(document).ready(function(){
                    $(".action_form").click(function(){
                      $(this).parent().find("form").submit();
                    })
                  });
               </script>
              </div>
            </li>
            <?php } ?>
            <!-- END timeline item -->
            
            
          </ul>
    
           
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  