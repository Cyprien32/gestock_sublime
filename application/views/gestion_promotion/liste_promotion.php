 <!-- Content Wrapper. Contains page content -->
 
   <style type="text/css">
                    .taille_image img{
                      width: 150px;
                      height: 150px;

                    }
                    .Detail{
                      margin-left: 5px;
                    }
                </style> <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
                   <?php if (isset($en_promo)) {?>
                   Liste des 
                   <?php }else{?>
                    Gestion
                   <?php }?>

        <small>Promotions <?php if (isset($en_promo)) {?>
                   En Cour 
                   <?php } ?>
        </small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Magazin','index')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url(array('Promotion','nouvelle')); ?>">Cathegorie</a></li>
        <li class="active">Detail</li>
         
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          
      <?php if (isset($liste_cathegorie)) { ?>
      <div class="row">
        <div class="col-md-6">
          
         <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                      (total: <?php  echo $liste_cathegorie['total'] ;?>)
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            
               <?php $mittel=(int)($liste_cathegorie['total']/2); for ($i=$liste_cathegorie['total']-1; $i>=$mittel ; $i--) {  ?>
                <li>
                   <?php if(($i%6)==0){ ?>
                     <i class="fa fa-laptop bg-blue"></i>
                  <?php }elseif(($i%5)==0){ ?>
                     <i class="fa fa-laptop bg-aqua"></i>
                  <?php }elseif(($i%4)==0){ ?>
                     <i class="fa fa-laptop bg-yellow"></i>
                  <?php }elseif(($i%3)==0){ ?>
                     <i class="fa fa-laptop bg-purple"></i>
                  <?php }elseif(($i%2)==0){ ?>
                     <i class="fa fa-laptop bg-maroon"></i>
                  <?php }elseif(($i%1)==0){ ?>
                     <i class="fa fa-laptop bg-gray"></i>
                  <?php }?>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i><?php echo $liste_cathegorie[$i]['dateCreation']; ?></span>

                <h3 class="timeline-header"><a href="#"><?php echo $liste_cathegorie[$i]['nom_article']; ?></a></h3>
                  
                <div class="row">
                
                <div class="col-md-6 ">
                <div class="timeline-footer Detail"><br>
                   <i class="fa fa-hourglass-end text-blue languages"> Stock restant:  <?php echo $liste_cathegorie[$i]['dateModification']; ?></i>
                   <?php if (isset($en_promo)) {?><br>
                    enregistre le :<i class="fa fa text-blue languages">  <?php echo $liste_cathegorie[$i]['info_promo']['detail_promotion']; ?></i>
                    <br>Par :<i class="fa fa text-blue languages">  <?php echo $liste_cathegorie[$i]['nom_responsable']['nom']." ".$liste_cathegorie[$i]['nom_responsable']['prenom']; ?></i>
                    <br>valide du :<i class="fa fa text-blue languages">  <?php echo $liste_cathegorie[$i]['info_promo']['date_creation']." au ".$liste_cathegorie[$i]['info_promo']['date_fin']; ?></i>
                 
                   <?php }else{?>
                   <i class="fa fa text-blue languages">date derniere modiffication:  <?php echo $liste_cathegorie[$i]['dateModification']; ?></i>
                 
                   <?php }?>
                     
                   
                </div><br><br>
                <form method="post" class="form_l" action="<?php echo site_url(array('Promotion','formulaire')) ?>" >
                  <?php if (isset($en_promo)) {?>
                    <button class="btn btn-red   Read m_promo " name="button" value="retire">retirer de la  Promotion</button><br><br>
                   <?php }else{?>
                      <button class="btn btn-primary btn-xs Read m_promo " name="button" value="met">Mettre en Promotion</button>
                   <?php }?>
                    
                    <input type="hidden" name="id_stock" value="<?php echo $liste_cathegorie[$i]['id_stock']; ?>">
                    <input type="hidden" name="nom" value="<?php echo $liste_cathegorie[$i]['nom_article']; ?>">
                    <input type="hidden" name="date1" value="<?php echo $liste_cathegorie[$i]['dateModification']; ?>">
                    <input type="hidden" name="date2" value="<?php echo $liste_cathegorie[$i]['dateCreation']; ?>">
                    <input type="hidden" name="image" value="<?php echo $liste_cathegorie[$i]['image']; ?>">
                    
                </form> 
               </div>
                <div class="col-md-6 taille_image">
                   <img class="img-circle taille_image_galerie" src="<?php echo img_url('StockImage/'.$liste_cathegorie[$i]['image']) ?>" alt="User Avatar">
                </div>
              </div>

              <div class="row div_promo" style="display: none">
                <style type="text/css">
                  .form_l{
                    width: 80%;
                    margin-left: 10%;
                  }
                </style>
                    <form method="post" class="form_l" action="<?php echo site_url(array('Promotion','save')) ?>" >
                      
                  <div class="contenu dimcasse6">
                        <fieldset>
                          <label>Pourcentage de reduction :</label><input type="number" class="form-control"   name="titre1" value="" ><br>
                          <label>Valide a partir du :</label>
                  <input type="date" class="form-control" value=""  name="date_debut" style="display:0n" required><br>
                            <label>Jusqu'au:</label><input type="date" class="form-control" value="" name="date_fin" ><br>
                            
                  <label> 
                             

                          
                  </div>
                      <input type="hidden" value="<?php echo $liste_cathegorie[$i]['id_stock']; ?>" name="id_realisation" >
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
            
                <?php  } ?>
          </ul>
   
           
        <!-- /.col -->
      </div>
       <div class="col-md-6">
           <br><br>
         <ul class="timeline">
            <!-- timeline time label -->
          
            <!-- /.timeline-label -->
            <!-- timeline item -->
            
               <?php $mittel=(int)($liste_cathegorie['total']/2); for ($i=$mittel-1; $i>=0 ; $i--) {  ?>
                <li>
                   <?php if(($i%6)==0){ ?>
                     <i class="fa fa-laptop bg-blue"></i>
                  <?php }elseif(($i%5)==0){ ?>
                     <i class="fa fa-laptop bg-aqua"></i>
                  <?php }elseif(($i%4)==0){ ?>
                     <i class="fa fa-laptop bg-yellow"></i>
                  <?php }elseif(($i%3)==0){ ?>
                     <i class="fa fa-laptop bg-purple"></i>
                  <?php }elseif(($i%2)==0){ ?>
                     <i class="fa fa-laptop bg-maroon"></i>
                  <?php }elseif(($i%1)==0){ ?>
                     <i class="fa fa-laptop bg-gray"></i>
                  <?php }?>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i><?php echo $liste_cathegorie[$i]['dateCreation']; ?></span>

                <h3 class="timeline-header"><a href="#"><?php echo $liste_cathegorie[$i]['nom_article']; ?></a></h3>

                  <div class="row">
                
                <div class="col-md-6">
                 
                 <div class="timeline-footer Detail"><br>
                   <i class="fa fa-hourglass-end text-blue languages"> Stock restant:  <?php echo $liste_cathegorie[$i]['dateModification']; ?></i>
                   <?php if (isset($en_promo)) {?><br>
                    enregistre le :<i class="fa fa text-blue languages">  <?php echo $liste_cathegorie[$i]['info_promo']['detail_promotion']; ?></i>
                    <br>Par :<i class="fa fa text-blue languages">  <?php echo $liste_cathegorie[$i]['nom_responsable']['nom']." ".$liste_cathegorie[$i]['nom_responsable']['prenom']; ?></i>
                    <br>valide du :<i class="fa fa text-blue languages">  <?php echo $liste_cathegorie[$i]['info_promo']['date_creation']." au ".$liste_cathegorie[$i]['info_promo']['date_fin']; ?></i>
                 
                   <?php }else{?>
                   <i class="fa fa text-blue languages">date derniere modiffication:  <?php echo $liste_cathegorie[$i]['dateModification']; ?></i>
                 
                   <?php }?>
                     
                   
                </div><br><br>
               <form method="post" class="form_l" action="<?php echo site_url(array('Promotion','formulaire')) ?>" >
                  <?php if (isset($en_promo)) {?>
                    <button class="btn btn-red   Read m_promo " name="button" value="retire">retirer de la  Promotion</button><br><br>
                   <?php }else{?>
                      <button class="btn btn-primary btn-xs Read m_promo " name="button" value="met">Mettre en Promotion</button>
                   <?php }?>
                    <input type="hidden" name="id_stock" value="<?php echo $liste_cathegorie[$i]['id_stock']; ?>">
                    <input type="hidden" name="nom" value="<?php echo $liste_cathegorie[$i]['nom_article']; ?>">
                    <input type="hidden" name="date1" value="<?php echo $liste_cathegorie[$i]['dateModification']; ?>">
                    <input type="hidden" name="date2" value="<?php echo $liste_cathegorie[$i]['dateCreation']; ?>">
                    <input type="hidden" name="image" value="<?php echo $liste_cathegorie[$i]['image']; ?>">
                </form> 
                  
                     
               </div>
              
                <div class="col-md-6 taille_image">
                   <img class="img-circle taille_image_galerie" src="<?php echo img_url('StockImage/'.$liste_cathegorie[$i]['image']) ?>" alt="User Avatar">
                </div>
              
              </div>
              </div> 

            </li>
            <!-- END timeline item -->
            
                <?php  } ?>
          </ul>
          <!-- /.box -->
          </div>
     
           
        <!-- /.col -->
      </div>
       <?php  } ?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  