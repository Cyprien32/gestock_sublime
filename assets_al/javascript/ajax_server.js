// fichier ajax de gestion des requetes vers le server
$(document).ready(function(){
	
	function lanceFiltreAdmin(){
		$data = {
			nom : $('#formulaire_filtre').find('.nom').val(),
			prenom : $('#formulaire_filtre').find('.prenom').val(),
			sexe : $('#formulaire_filtre').find('.sexe').val(),
			cni : $('#formulaire_filtre').find('.cni').val(),
			telephone : $('#formulaire_filtre').find('.telephone').val(),
			email : $('#formulaire_filtre').find('.email').val(),
		};

		// appel de la fonction ajax
		$.ajax({
			url : 'http://localhost/gestock/index.php/Finder/filtreAdmin',
			method:'post',
			data : $data,
			dataType:'json',

			success : function(data){
				$('#div_liste_admin').find('.ma_liste_tmp').remove();
				$('#div_liste_admin').append($('<div class="ma_liste_tmp"></>'));
				for (var i = 0; i < data['data']['total']; i++) {
					$div =  '<a href="http://localhost/gestock/index.php/Administration/viewAdminProfil/'+data['data'][i]['id_admin']+'" > ';
				    $div += '   <div class="col-md-4">';
				    $div += '      <!-- Widget: user widget style 1 -->'
				    $div +=	'	      <div class="box box-widget widget-user">';
				    $div +=	'		                  <!-- Add the bg color to the header using any of the bg-* classes -->';
				    $div +=	'		                  <div class="widget-user-header bg-aqua-active">';
				    $div +=	'		                    <h3 class="widget-user-username">'+data["data"][i]['nom']+'  '+data["data"][i]["prenom"]+'</h3>';
				    $div +=	'		                    <h5 class="widget-user-desc"> <b>CNI : </b>'+data['data'][i]['cni']+' <br> '+data["data"][i]["email"] +'</h5>';
				    $div +=	'		                    <h5 class="widget-user-desc"> '+data['data'][i]['telephone']['liste'][0]+' <b>|</b> '+data['data'][i]['telephone']['liste'][1]+'</h5>';
				    $div +=	'		                  </div>';
				    $div +=	'		                  <div class="widget-user-image">';
				    $div +=	'		                    <img class="img-circle" src="http://localhost/gestock/assets_al/images/images_admin/images/'+data['data'][i]['image']+'" alt="User Avatar">';
				    $div +=	'		                  </div>';
				    $div +=	'		                  <div class="box-footer">';
				    $div +=	'		                    <div class="row">';
				    $div +=	'		                      <div class="col-sm-4 border-right">';
				    $div +=	'		                        <div class="description-block">';
				    $div +=	'		                          <h5 class="description-header">3,200</h5>';
				    $div +=	'		                          <span class="description-text">COMMADES</span>';
				    $div +=	'		                        </div>';
				    $div +=	'		                        <!-- /.description-block -->';
				    $div +=	'		                      </div>';
				    $div +=	'		                      <!-- /.col -->';
				    $div +='			                      <div class="col-sm-4 border-right">';
				    $div +='			                        <div class="description-block">';
				    $div +='			                          <h5 class="description-header">13,000</h5>';
				    $div +='			                          <span class="description-text">VENTES</span>';
				    $div +='			                        </div>';
				    $div +='			                        <!-- /.description-block -->';
				    $div +='			                      </div>';
				    $div +='			                      <!-- /.col -->';
				    $div +='			                      <div class="col-sm-4">';
				    $div +='			                        <div class="description-block">';
				    $div +='			                          <h5 class="description-header">35</h5>';
				    $div +='			                          <span class="description-text">CLIENTS</span>';
				    $div +='			                        </div>';
				    $div +='			                        <!-- /.description-block -->';
				    $div +='			                      </div>';
				    $div +='			                      <!-- /.col -->';
				    $div +='			                    </div>';
				    $div +='			                    <!-- /.row -->';
				    $div +='			                  </div>';
				    $div +='			                </div>';
				    $div +='			                <!-- /.widget-user -->';
				    $div +='			              </div>';
				    $div +='			            </a>';


				    $('#div_liste_admin').find('.ma_liste_tmp').append($($div));
				}



			},


			error: function(data){
				console.log('error');
				console.log(data);
			}
		});
		
	}


	$('.filtre_admin').on('keyup', lanceFiltreAdmin);
	$('.filtre_admin_select').on('change', lanceFiltreAdmin);


	
	function lanceFiltreCaissier(){
		$data = {
			nom : $('#formulaire_filtre').find('.nom').val(),
			prenom : $('#formulaire_filtre').find('.prenom').val(),
			sexe : $('#formulaire_filtre').find('.sexe').val(),
			cni : $('#formulaire_filtre').find('.cni').val(),
			telephone : $('#formulaire_filtre').find('.telephone').val(),
			email : $('#formulaire_filtre').find('.email').val(),
		};

		// appel de la fonction ajax
		$.ajax({
			url : 'http://localhost/gestock/index.php/Finder/filtreCaissier',
			method:'post',
			data : $data,
			dataType:'json',

			success : function(data){
				$('#div_liste_caissier').find('.ma_liste_tmp').remove();
				$('#div_liste_caissier').append($('<div class="ma_liste_tmp"></>'));
				for (var i = 0; i < data['data']['total']; i++) {
					$div =  '<a href="http://localhost/gestock/index.php/Administration/viewCaissierProfil/'+data['data'][i]['id_caissier']+'" > ';
				    $div += '   <div class="col-md-4">';
				    $div += '      <!-- Widget: user widget style 1 -->'
				    $div +=	'	      <div class="box box-widget widget-user">';
				    $div +=	'		                  <!-- Add the bg color to the header using any of the bg-* classes -->';
				    $div +=	'		                  <div class="widget-user-header bg-yellow color-palette">';
				    $div +=	'		                    <h3 class="widget-user-username">'+data["data"][i]['nom']+'  '+data["data"][i]["prenom"]+'</h3>';
				    $div +=	'		                    <h5 class="widget-user-desc"> <b>CNI : </b>'+data['data'][i]['cni']+' <br> '+data["data"][i]["email"] +'</h5>';
				    $div +=	'		                    <h5 class="widget-user-desc"> '+data['data'][i]['telephone']['liste'][0]+' <b>|</b> '+data['data'][i]['telephone']['liste'][1]+'</h5>';
				    $div +=	'		                  </div>';
				    $div +=	'		                  <div class="widget-user-image">';
				    $div +=	'		                    <img class="img-circle" src="http://localhost/gestock/assets_al/images/images_caissier/images/'+data['data'][i]['image']+'" alt="User Avatar">';
				    $div +=	'		                  </div>';
				    $div +=	'		                  <div class="box-footer">';
				    $div +=	'		                    <div class="row">';
				    $div +=	'		                      <div class="col-sm-4 border-right">';
				    $div +=	'		                        <div class="description-block">';
				    $div +=	'		                          <h5 class="description-header">3,200</h5>';
				    $div +=	'		                          <span class="description-text">COMMADES</span>';
				    $div +=	'		                        </div>';
				    $div +=	'		                        <!-- /.description-block -->';
				    $div +=	'		                      </div>';
				    $div +=	'		                      <!-- /.col -->';
				    $div +='			                      <div class="col-sm-4 border-right">';
				    $div +='			                        <div class="description-block">';
				    $div +='			                          <h5 class="description-header">13,000</h5>';
				    $div +='			                          <span class="description-text">VENTES</span>';
				    $div +='			                        </div>';
				    $div +='			                        <!-- /.description-block -->';
				    $div +='			                      </div>';
				    $div +='			                      <!-- /.col -->';
				    $div +='			                      <div class="col-sm-4">';
				    $div +='			                        <div class="description-block">';
				    $div +='			                          <h5 class="description-header">35</h5>';
				    $div +='			                          <span class="description-text">CLIENTS</span>';
				    $div +='			                        </div>';
				    $div +='			                        <!-- /.description-block -->';
				    $div +='			                      </div>';
				    $div +='			                      <!-- /.col -->';
				    $div +='			                    </div>';
				    $div +='			                    <!-- /.row -->';
				    $div +='			                  </div>';
				    $div +='			                </div>';
				    $div +='			                <!-- /.widget-user -->';
				    $div +='			              </div>';
				    $div +='			            </a>';


				    $('#div_liste_caissier').find('.ma_liste_tmp').append($($div));
				}



			},


			error: function(data){
				console.log('error');
				console.log(data);
			}
		});
		
	}


	$('.filtre_caissier').on('keyup', lanceFiltreCaissier);
	$('.filtre_caissier_select').on('change', lanceFiltreCaissier);







	function lanceFiltreClient(){
		console.log('je filtre client');
		$data = {
			nom : $('#formulaire_filtre').find('.nom').val(),
			prenom : $('#formulaire_filtre').find('.prenom').val(),
			sexe : $('#formulaire_filtre').find('.sexe').val(),
			cni : $('#formulaire_filtre').find('.cni').val(),
			telephone : $('#formulaire_filtre').find('.telephone').val(),
			email : $('#formulaire_filtre').find('.email').val(),
		};

		// appel de la fonction ajax
		$.ajax({
			url : 'http://localhost/gestock/index.php/Finder/filtreClient',
			method:'post',
			data : $data,
			dataType:'json',

			success : function(data){
				$('#div_liste_client').find('.ma_liste_tmp').remove();
				$('#div_liste_client').append($('<div class="ma_liste_tmp"></>'));
				for (var i = 0; i < data['data']['total']; i++) {
					$div =  '<a href="http://localhost/gestock/index.php/Administration/viewClientProfil/'+data['data'][i]['id_client']+'" > ';
				    $div += '   <div class="col-md-4">';
				    $div += '      <!-- Widget: user widget style 1 -->'
				    $div +=	'	      <div class="box box-widget widget-user">';
				    $div +=	'		                  <!-- Add the bg color to the header using any of the bg-* classes -->';
				    $div +=	'		                  <div class="widget-user-header bg-green-active color-palette">';
				    $div +=	'		                    <h3 class="widget-user-username">'+data["data"][i]['nom']+'  '+data["data"][i]["prenom"]+'</h3>';
				    $div +=	'		                    <h5 class="widget-user-desc"> <b>CNI : </b>'+data['data'][i]['cni']+' <br> '+data["data"][i]["email"] +'</h5>';
				    $div +=	'		                    <h5 class="widget-user-desc"> '+data['data'][i]['telephone']['liste'][0]+' <b>|</b> '+data['data'][i]['telephone']['liste'][1]+'</h5>';
				    $div +=	'		                  </div>';
				    $div +=	'		                  <div class="widget-user-image">';
				    $div +=	'		                    <img class="img-circle" src="http://localhost/gestock/assets_al/images/images_client/images/'+data['data'][i]['image']+'" alt="User Avatar">';
				    $div +=	'		                  </div>';
				    $div +=	'		                  <div class="box-footer">';
				    $div +=	'		                    <div class="row">';
				    $div +=	'		                      <div class="col-sm-4 border-right">';
				    $div +=	'		                        <div class="description-block">';
				    $div +=	'		                          <h5 class="description-header">3,200</h5>';
				    $div +=	'		                          <span class="description-text">COMMADES</span>';
				    $div +=	'		                        </div>';
				    $div +=	'		                        <!-- /.description-block -->';
				    $div +=	'		                      </div>';
				    $div +=	'		                      <!-- /.col -->';
				    $div +='			                      <div class="col-sm-4 border-right">';
				    $div +='			                        <!-- /.description-block -->';
				    $div +='			                      </div>';
				    $div +='			                      <!-- /.col -->';
				    $div +='			                      <div class="col-sm-4">';
				    $div +='			                        <div class="description-block">';
				    $div +='			                          <h5 class="description-header">35</h5>';
				    $div +='			                          <span class="description-text">ACHATS</span>';
				    $div +='			                        </div>';
				    $div +='			                        <!-- /.description-block -->';
				    $div +='			                      </div>';
				    $div +='			                      <!-- /.col -->';
				    $div +='			                    </div>';
				    $div +='			                    <!-- /.row -->';
				    $div +='			                  </div>';
				    $div +='			                </div>';
				    $div +='			                <!-- /.widget-user -->';
				    $div +='			              </div>';
				    $div +='			            </a>';

				    $new_div = $($div);
				    $new_div.click(function(){
				    	$(this).find('a').trigger('click');
				    });

				    $('#div_liste_client').find('.ma_liste_tmp').append($($div));
				}



			},


			error: function(data){
				console.log('error');
				console.log(data);
			}
		});
		
	}


	$('.filtre_client').on('keyup', lanceFiltreClient);
	$('.filtre_client_select').on('change', lanceFiltreClient);



});