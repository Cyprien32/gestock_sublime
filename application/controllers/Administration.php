<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

	//function qui permet de definir la page d'acceuil de toute l'application
	public function index(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}



		if (isset($_SESSION['ADMIN'])) {
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_admin/admin_account');
			$this->load->view('template_al/footer');	
		}else if (isset($_SESSION['CAISSIER'])) {
			redirect(site_url(array('Caissier','index')));
		}else{
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}


	// fonction qui charge le formulaire de conneixion pour un administrateur
	public function formulaireConnexion(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN'])) {
			if (isset($_SESSION['ADMIN'])) {
				redirect(site_url(array('Administration','index')));
			}else{
				session_destroy();
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
		}else{
			$this->load->view('gestion_admin/formulaire_connexion');
		}
	}


	// fonction qui charge et teste l'existance d'un admin dans la base de donnees
	public function manageConnexion(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_POST['login']) && isset($_POST['password'])) {
			$admin['all'] = $this->Admin->liste_admin();
			for ($i=0; $i < $admin['all']['total']; $i++) { 
				if ($admin['all'][$i]['login'] == $_POST['login'] && $admin['all'][$i]['password'] == $_POST['password']) {
					$admin_tmp['id'] = $admin['all'][$i]['id'];
					$admin_tmp['login'] = $admin['all'][$i]['login'];
					$admin_tmp['password'] = $admin['all'][$i]['password'];
					$admin_tmp['clients'] = $admin['all'][$i]['clients'];

					$info = $this->Admin->findInfoadmin($admin_tmp['id']);
					$admin_tmp['degre'] = $info['degre'];
					$admin_tmp['id_personne'] = $info['id_personne'];
					$admin_tmp['info_personne'] = $this->Personne->findInfo($info['id_personne']);
					$_SESSION['ADMIN'] = $admin_tmp;
				}
			}

			if (isset($_SESSION['ADMIN'])) {
				redirect(site_url(array('Administration','index')));
			}else{
				$_SESSION['ERR'] = 'Les paramtres recus ne correspondent a auccun adminstrateur dans notre Database.<br> <b>Veillez recommencer SVP</b>';
				redirect(site_url(array('Administration','formulaireConnexion')));
			}
		}else{
			redirect(site_url(array('Administration','formulaireConnexion')));
		}
	}



	//function de deconnxion dun administrateur
	public function deconnexion(){
		if (isset($_SESSION['ADMIN'])) {
			session_destroy();
		}
		redirect(site_url(array('Magazin','index')));
	}




	// fonction de gestion de la pagination
	public function pagination($type,$page){
		$_SESSION['pagination'] = array();
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER'])) {
			if ($type == 'admin') {
				unset($_SESSION['pagination']['caissier']);
				unset($_SESSION['pagination']['client']);
				$_SESSION['pagination']['admin']="ok";
				$_SESSION['FILTER']['PAGE'] = $page; //numero de page en cour
				redirect(site_url(array('Administration','loadAdmins')));
			}else if ($type == 'caissier') {
				unset($_SESSION['pagination']['admin']);
				unset($_SESSION['pagination']['client']);
				$_SESSION['pagination']['caissier']="ok";
				$_SESSION['FILTER']['PAGE'] = $page; //numero de page en cour
				redirect(site_url(array('Administration','loadCaissiers')));
			}else if ($type == 'client') {
				unset($_SESSION['pagination']['admin']);
				unset($_SESSION['pagination']['caissier']);
				$_SESSION['pagination']['client']="ok";
				$_SESSION['FILTER']['PAGE'] = $page; //numero de page en cour
				redirect(site_url(array('Administration','loadClients')));
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



/*


	DEBUT DES FONCTION DE GESTION DE L ADMINISTRATEUR


*/












	//fonction qui charge la page de gestion des admins
	public function loadAdmins(){
		if (isset($_SESSION['ADMIN'])) {
			// chargement des amdins
			$data = $this->Admin->liste_admin();
			for ($i=0; $i < $data['total'] ; $i++) { 
				$data[$i]['info_sup'] =$this->Admin->findInfoadmin($data[$i]['id']);
				$data[$i]['info'] = $this->Personne->findInfo($data[$i]['info_sup'] ['id_personne']);
			}

			if (!isset($_SESSION['pagination']['admin'])) {
				$_SESSION['FILTER']['ADMIN'] = $data;
				$_SESSION['FILTER']['PAGE'] = 0; //numero de page en cour
				$_SESSION['FILTER']['NB_PAGE'] = 60; //nombre par page
			}
			



			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_admin/index_admin',array('data' => $data));
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



	// fonction qui  permet de charger le formulaire d'ajout d 'un admin
	public function loadFormulaireAddAdmin(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN'])) {
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_admin/formulaire_add_admin');
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}

//  fonction qui permet d'ajouter un administrateur en base de donnes

	public function addAdminBd(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) && $_POST['post']) {
			//chargement de l'image de l'admin
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image']= $config;
						move_uploaded_file($_FILES['image']['tmp_name'],'assets_al/images/images_admin/images/'.$config);
					}
				}
			}



			//chargement de l'image de la cni l'admin
			if (isset($_FILES['image_cni']) AND $_FILES['image_cni']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image_cni']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image_cni']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image_cni']= $config;
						move_uploaded_file($_FILES['image_cni']['tmp_name'],'assets_al/images/images_admin/images_cni/'.$config);
					}
				}
			}

			//gestion des telephones
			$data = array();
			$data['liste'][0] = $_POST['telephone1'];
			$data['liste'][1] = $_POST['telephone2'];
			$data['total'] = 2;

			$_POST['telephone'] = json_encodeur($data);
			$this->Personne->hydrate($_POST);
			$_POST['id_personne'] = $this->Personne->addPersonne();

			$this->Admin->hydrate($_POST);
			$this->Admin->addAdmin();

			redirect(site_url(array('Administration','loadAdmins')));

		}else{
			redirect(site_url(array('Administration','index')));
		}
	}






	// fonction qui charge le profil d un admin
	public function viewAdminProfil($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
			if (isset($_SESSION['ADMIN'])) {
				if (isset($id)) {
				$data = $this->Admin->findInfoadmin($id);
				
				if ($data['data'] != 'non') {
					$data['info_sup'] =$this->Admin->findInfoadmin($data['id']);
					$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
					$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
					
					$tab['ADMIN'] = $data;

					$this->load->view('template_al/header');
					$this->load->view('template_al/navigation');
					$this->load->view('gestion_admin/admin_account_view',array('data' => $tab));
					$this->load->view('template_al/footer');
				}else{
					redirect(site_url(array('Administration','loadAdmins')));
				}
			}else{
				redirect(site_url(array('Administration','index')));
			}
		}else{
				redirect(site_url(array('Administration','index')));
			}
	}



	// fonction qui permet de charger le formulaire de modification d'un admin
	public function chargeFormulaireModifAdmin($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($id)) {
			$data = $this->Admin->findInfoadmin($id);
			
			if ($data['data'] != 'non') {
				$data['info_sup'] =$this->Admin->findInfoadmin($data['id']);
				$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				
				$tab['ADMIN'] = $data;

				$this->load->view('template_al/header');
				$this->load->view('template_al/navigation');
				$this->load->view('gestion_admin/formulaire_modif_admin',array('data' => $tab));
				$this->load->view('template_al/footer');
			}else{
				redirect(site_url(array('Administration','loadAdmins')));
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}








	//fonction qui permet de modifier un administrateur de la base de donnees
	public function modifAdminBd(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) && $_POST['post']) {
			//chargement de l'image de l'admin
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image']= $config;
						move_uploaded_file($_FILES['image']['tmp_name'],'assets_al/images/images_admin/images/'.$config);
					}
				}
			}



			//chargement de l'image de la cni l'admin
			if (isset($_FILES['image_cni']) AND $_FILES['image_cni']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image_cni']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image_cni']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image_cni']= $config;
						move_uploaded_file($_FILES['image_cni']['tmp_name'],'assets_al/images/images_admin/images_cni/'.$config);
					}
				}
			}

			//gestion des telephones
			$data = array();
			$data['liste'][0] = $_POST['telephone1'];
			$data['liste'][1] = $_POST['telephone2'];
			$data['total'] = 2;

			$_POST['telephone'] = json_encodeur($data);
			$this->Personne->hydrate($_POST);
			$this->Personne->setId($_POST['id_personne']);
			$this->Personne->updatePersonne();


			$this->Admin->hydrate($_POST);
			$this->Admin->setId($_POST['admin']);
			$this->Admin->updateAdmin();

			redirect(site_url(array('Administration','viewAdminProfil/'.$_POST['admin'])));

		}else{
			redirect(site_url(array('Administration','index')));
		}
	}





	//function de suppression d'un administrateur 
	public function supprimeAdminBD(){}




	/*



		DECLARATION DES FONCTIONS DE GESTION DES CAISSIERS



	*/



	//fonction qui charge la page de gestion des Caissiers
	public function loadCaissiers(){
		if (isset($_SESSION['ADMIN'])) {
			// chargement des amdins
			$data = $this->Caissier->liste_caissier();
			for ($i=0; $i < $data['total'] ; $i++) { 
				$data[$i]['info_sup'] =$this->Caissier->findInfoCaissier($data[$i]['id']);
				$data[$i]['info'] = $this->Personne->findInfo($data[$i]['info_sup'] ['id_personne']);
			}

			if (!isset($_SESSION['pagination']['caissier'])) {
				$_SESSION['FILTER']['CAISSIER'] = $data;
				$_SESSION['FILTER']['PAGE'] = 0; //numero de page en cour
				$_SESSION['FILTER']['NB_PAGE'] = 60; //nombre par page
			}

			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_caissier/index_caissier',array('data' => $data));
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



	//fonction qui charge le formulaire d jout d'un caissier
	public function loadFormulaireAddCaissier(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN'])) {
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_caissier/formulaire_add_caissier');
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



	//  fonction qui permet d'ajouter un caissier en base de donnes

	public function addCaissierBd(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) && $_POST['post']) {
			//chargement de l'image de l'admin
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image']= $config;
						move_uploaded_file($_FILES['image']['tmp_name'],'assets_al/images/images_caissier/images/'.$config);
					}
				}
			}



			//chargement de l'image de la cni l'admin
			if (isset($_FILES['image_cni']) AND $_FILES['image_cni']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image_cni']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image_cni']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image_cni']= $config;
						move_uploaded_file($_FILES['image_cni']['tmp_name'],'assets_al/images/images_caissier/images_cni/'.$config);
					}
				}
			}

			//gestion des telephones
			$data = array();
			$data['liste'][0] = $_POST['telephone1'];
			$data['liste'][1] = $_POST['telephone2'];
			$data['total'] = 2;

			$_POST['telephone'] = json_encodeur($data);
			$this->Personne->hydrate($_POST);
			$_POST['id_personne'] = $this->Personne->addPersonne();

			$this->Caissier->hydrate($_POST);
			$this->Caissier->addCaissier();

			redirect(site_url(array('Administration','loadCaissiers')));

		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



	// fonction qui charge le profil d un caissier
	public function viewCaissierProfil($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($id)) {
			$data = $this->Caissier->findInfoCaissier($id);
			
			if ($data['data'] != 'non') {
				$data['info_sup'] =$this->Caissier->findInfoCaissier($data['id']);
				$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				
				$tab['CAISSIER'] = $data;

				$this->load->view('template_al/header');
				$this->load->view('template_al/navigation');
				$this->load->view('gestion_caissier/caissier_account_view',array('data' => $tab));
				$this->load->view('template_al/footer');
			}else{
				redirect(site_url(array('Administration','loadCaissiers')));
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}




// fonction qui permet de charger le formulaire de modification d'un caissier
	public function chargeFormulaireModifCaissier($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($id)) {
			$data = $this->Caissier->findInfoCaissier($id);
			
			if ($data['data'] != 'non') {
				$data['info_sup'] =$this->Caissier->findInfoCaissier($data['id']);
				$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				
				$tab['CAISSIER'] = $data;

				$this->load->view('template_al/header');
				$this->load->view('template_al/navigation');
				$this->load->view('gestion_caissier/formulaire_modif_caissier',array('data' => $tab));
				$this->load->view('template_al/footer');
			}else{
				redirect(site_url(array('Administration','loadAdmins')));
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}




	//fonction qui permet de modifier un caissier de la base de donnees
	public function modifCaissierBd(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) && $_POST['post']) {
			//chargement de l'image de l'admin
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image']= $config;
						move_uploaded_file($_FILES['image']['tmp_name'],'assets_al/images/images_caissier/images/'.$config);
					}
				}
			}



			//chargement de l'image de la cni l'admin
			if (isset($_FILES['image_cni']) AND $_FILES['image_cni']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image_cni']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image_cni']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image_cni']= $config;
						move_uploaded_file($_FILES['image_cni']['tmp_name'],'assets_al/images/images_caissier/images_cni/'.$config);
					}
				}
			}

			//gestion des telephones
			$data = array();
			$data['liste'][0] = $_POST['telephone1'];
			$data['liste'][1] = $_POST['telephone2'];
			$data['total'] = 2;

			$_POST['telephone'] = json_encodeur($data);
			$this->Personne->hydrate($_POST);
			$this->Personne->setId($_POST['id_personne']);
			$this->Personne->updatePersonne();


			$this->Caissier->hydrate($_POST);
			$this->Caissier->setId($_POST['id_caissier']);
			$this->Caissier->updateCaissier();

			redirect(site_url(array('Administration','viewCaissierProfil/'.$_POST['id_caissier'])));

		}else{
			redirect(site_url(array('Administration','index')));
		}
	}





	//function de suppression d'un administrateur 
	public function supprimeCaissierBD(){}





	/*


		FONCTION DE GESTION DES CLIENTS


	*/


	//fonction qui charge la page de gestion des clients
	public function loadClients(){
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER'])) {
			// chargement des amdins
			$data = $this->Client->liste_client();
			for ($i=0; $i < $data['total'] ; $i++) { 
				$data[$i]['info_sup'] =$this->Client->findInfoClient($data[$i]['id']);
				$data[$i]['info'] = $this->Personne->findInfo($data[$i]['info_sup'] ['id_personne']);
			}

			if (!isset($_SESSION['pagination']['client'])) {
				$_SESSION['FILTER']['CLIENT'] = $data;
				$_SESSION['FILTER']['PAGE'] = 0; //numero de page en cour
				$_SESSION['FILTER']['NB_PAGE'] = 60;//nombre par page
			}

			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_client/index_client',array('data' => $data));
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



	//fonction qui charge le formulaire d ajout d'un client
	public function loadFormulaireAddClient(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_client/formulaire_add_client');
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}



	//  fonction qui permet d'ajouter un caissier en base de donnes

	public function addClientBd(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if ((isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']))&& $_POST['post']) {
			//chargement de l'image de l'admin
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						if (isset($_SESSION['ADMIN'])) {
							$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						}else{
							$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['CAISSIER']['login'];
						}
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image']= $config;
						move_uploaded_file($_FILES['image']['tmp_name'],'assets_al/images/images_client/images/'.$config);
					}
				}
			}



			//chargement de l'image de la cni l'admin
			if (isset($_FILES['image_cni']) AND $_FILES['image_cni']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image_cni']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image_cni']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						if (isset($_SESSION['ADMIN'])) {
							$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						}else{
							$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['CAISSIER']['login'];
						}
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image_cni']= $config;
						move_uploaded_file($_FILES['image_cni']['tmp_name'],'assets_al/images/images_caissier/images_cni/'.$config);
					}
				}
			}

			//gestion des telephones
			$data = array();
			$data['liste'][0] = $_POST['telephone1'];
			$data['liste'][1] = $_POST['telephone2'];
			$data['total'] = 2;

			$_POST['telephone'] = json_encodeur($data);
			if (isset($_SESSION['ADMIN'])) {
				$_POST['createur'] = $_SESSION['ADMIN']['info_personne']['id'];
			}else{
				$_POST['createur'] = $_SESSION['CAISSIER']['info_personne']['id'];
			}
			$this->Personne->hydrate($_POST);
			$_POST['id_personne'] = $this->Personne->addPersonne();

			$this->Client->hydrate($_POST);
			$this->Client->addClient();

			redirect(site_url(array('Administration','loadClients')));

		}else{
			redirect(site_url(array('Administration','index')));
		}
	}





	// fonction qui charge le profil d un Client
	public function viewClientProfil($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($id)) {
			$data = $this->Client->findInfoClient($id);
			
			if ($data['data'] != 'non') {
				$data['info_sup'] =$this->Client->findInfoClient($data['id']);
				$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				
				$tab['CLIENT'] = $data;

				$this->load->view('template_al/header');
				$this->load->view('template_al/navigation');
				$this->load->view('gestion_client/client_account_view',array('data' => $tab));
				$this->load->view('template_al/footer');
			}else{
				redirect(site_url(array('Administration','loadClients')));
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}





	// fonction qui permet de charger le formulaire de modification d'un client
	public function chargeFormulaireModifClient($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($id)) {
			$data = $this->Client->findInfoClient($id);
			
			if ($data['data'] != 'non') {
				$data['info_sup'] =$this->Client->findInfoClient($data['id']);
				$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
				
				$tab['CLIENT'] = $data;

				$this->load->view('template_al/header');
				$this->load->view('template_al/navigation');
				$this->load->view('gestion_client/formulaire_modif_client',array('data' => $tab));
				$this->load->view('template_al/footer');
			}else{
				redirect(site_url(array('Administration','loadClients')));
			}
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}




	//fonction qui permet de modifier un client de la base de donnees
	public function modifClientBd(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (( isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER'])) && $_POST['post']) {
			//chargement de l'image de l'admin
			if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image']= $config;
						move_uploaded_file($_FILES['image']['tmp_name'],'assets_al/images/images_client/images/'.$config);
					}
				}
			}



			//chargement de l'image de la cni l'admin
			if (isset($_FILES['image_cni']) AND $_FILES['image_cni']['error'] == 0){
					// Testons si le fichier n'est pas trop gros
				if ($_FILES['image_cni']['size'] <= 1000000){
					// Testons si l'extension est autorisée
					$infosfichier =pathinfo($_FILES['image_cni']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG', 'JPEG', 'GIF','PNG');

					if (in_array($extension_upload,$extensions_autorisees)){
						// On peut valider le fichier et le stocker définitivement
						$config =$_FILES['image_cni']['name'].date('d').'-'.date('m').'-'.date('Y').'a'.date('H').'-'.date('i').$_SESSION['ADMIN']['login'];
						$ma_variable = str_replace('.', '_', $config);
						$ma_variable = str_replace(' ', '_', $config);
						$config = $ma_variable.'.'.$extension_upload;
						$_POST['image_cni']= $config;
						move_uploaded_file($_FILES['image_cni']['tmp_name'],'assets_al/images/images_client/images_cni/'.$config);
					}
				}
			}

			//gestion des telephones
			$data = array();
			$data['liste'][0] = $_POST['telephone1'];
			$data['liste'][1] = $_POST['telephone2'];
			$data['total'] = 2;

			$_POST['telephone'] = json_encodeur($data);
			$this->Personne->hydrate($_POST);
			$this->Personne->setId($_POST['id_personne']);
			$this->Personne->updatePersonne();


			redirect(site_url(array('Administration','viewClientProfil/'.$_POST['id_client'])));

		}else{
			redirect(site_url(array('Administration','index')));
		}
	}





	//function de suppression d'un client 
	public function supprimeClientBD(){}







/*


	ZONE DE GESTION DES COMMANDES


*/


// fonction de creation de nouvelle commande
	public function newCommande(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
			if (isset($_SESSION['pagination'])) {
				unset($_SESSION['pagination']);
			}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER'])) {
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_commande/choix_type_client');
			$this->load->view('template_al/footer');
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}


	// fonction qui charge la gestion des commandes pour un client
	public function chargeNouvelleCommandeClient($id){
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER'])) {
			//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
			if (isset($_SESSION['pagination'])) {
				unset($_SESSION['pagination']);
			}
			if (isset($id)) {
				$data = $this->Client->findInfoClient($id);
				
				if ($data['data'] != 'non') {
					$data['info_sup'] =$this->Client->findInfoClient($data['id']);
					$data['login'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
					$data['info_personne'] = $this->Personne->findInfo($data['info_sup'] ['id_personne']);
					
					$tab['CLIENT'] = $data;

					$this->load->view('template_al/header');
					$this->load->view('template_al/navigation');
					$this->load->view('gestion_commande/formulaire_gestion_commandes',array('data' => $tab));
					$this->load->view('template_al/footer');
				}else{
					redirect(site_url(array('Administration','loadClients')));
				}
			}else{
				redirect(site_url(array('Administration','index')));
			}
				
		}else{
			redirect(site_url(array('Administration','index')));
		}
	}




}
