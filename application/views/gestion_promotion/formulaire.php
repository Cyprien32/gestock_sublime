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
        <li><a href="<?php echo site_url(array('Promotion','nouvelle')); ?>">Cathegorie</a></li>
        <li class="active"><?php  echo $nom_article ;?></li>
        <li class="active">Detail</li>
         
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
       <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
          
         <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                      (detail)
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            
                  <li>
                    <i class="fa fa-laptop bg-blue"></i>
                  
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i><?php echo $dateCreation; ?></span>

                <h3 class="timeline-header"><a href="#"><?php echo $nom_article ; ?></a></h3>
                  
                <div class="row">
                
                <div class="col-md-6 ">
                <div class="timeline-footer Detail"><br>
                   <i class="fa fa-hourglass-end text-blue languages"> Stock restant:  <?php echo $dateModification; ?></i>
                     <i class="fa fa text-blue languages">date derniere modiffication:  <?php echo $dateModification; ?></i>
                 
                   
                </div><br><br>
                <form method="post" class="form_l" action="<?php echo site_url(array('Promotion','formulaire')) ?>" >
                    <button class="btn btn-primary btn-xs Read m_promo ">Mettre en Promotion</button>
                    <input type="hidden" name="id_stock" value="<?php echo $id_stock; ?>">
                </form> 
               </div>
                <div class="col-md-6 taille_image">
                   <img class="img-circle taille_image_galerie" src="<?php echo img_url('StockImage/'.$image) ?>" alt="User Avatar">
                </div>
              </div>

              <div class="row div_promo" >
                <style type="text/css">
                  .form_l{
                    width: 80%;
                    margin-left: 10%;
                  }
                </style>
                    <form method="post" class="form_l" action="<?php echo site_url(array('Promotion','save')) ?>" >
                      
                  <div class="contenu dimcasse6">
                        <fieldset>
                          <label>Pourcentage de reduction :</label><input type="number" class="form-control"   name="pourcentage" value="" ><br>
                          <label>Valide a partir du :</label>
                          <input type="hidden" name="nom" value="<?php  echo $nom_article ;?>">
                  <input type="date" class="form-control" value=""  name="date_debut" style="display:0n" required><br>
                            <label>Jusqu'au:</label><input type="date" class="form-control" value="" name="date_fin" ><br>
                            
                  <label> 
                             
                     <style type="text/css">
                    .taille_image img{
                      width: 150px;
                      height: 150px;

                    }
                    .Detail{
                      margin-left: 5px;
                    }
                </style>
                          
                  </div>
                      <input type="hidden" value="<?php echo $id_stock ; ?>" name="id_stock" >
                <div class="row">
                  <div class="  col-md-6 detail-grids">
                    <button class=" bg-green add_rubriq_bouton btn btn_success btn_modifie" value="" style="font-size:1em;height:30px;width:83px;border:1px;border-radius:5px;"  >
                     
                        Enregistrer
                      
                     </button>
                  </div>
                  <div class="  col-md-6 detail-grids">
                    <a class="annule_bouton btn btn_success btn_modifie pull-right" value="" style="font-size:1em;height:30px;width:83px;border:1px;border-radius:5px;"  >
                     
                        annuler
                      
                     </a>
                     <br>
                     <br>
                     <br>
                  </div>
                  </div>
                    </form>
                </div>

              </div>

            </li>
            <!-- END timeline item -->
            
                
          </ul>
   
           
        <!-- /.col -->
      </div>
      <div class="col-md-2"></div>
        
           
        <!-- /.col -->
      </div>
     
    </section>
    <!-- /.content -->
  </div>
  