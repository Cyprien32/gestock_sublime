<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caissier extends CI_Controller {

	//function qui permet de definir la page d'acceuil de toute l'application
	public function index(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['CAISSIER'])) {
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_caissier/caissier_account');
			$this->load->view('template_al/footer');	
		}else{
			redirect(site_url(array('Caissier','formulaireConnexion')));
		}
	}

// fonction qui charge le formulaire de conneixion pour un caissier
	public function formulaireConnexion(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['CAISSIER'])) {
			if (isset($_SESSION['CAISSIER'])) {
				redirect(site_url(array('Caissier','index')));
			}else{
				session_destroy();
				redirect(site_url(array('Caissier','formulaireConnexion')));
			}
		}else{
			$this->load->view('gestion_caissier/formulaire_connexion');
		}
	}


	// fonction qui charge et teste l'existance d'un admin dans la base de donnees
	public function manageConnexion(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_POST['login']) && isset($_POST['password'])) {
			$admin['all'] = $this->Caissier->liste_caissier();
			for ($i=0; $i < $admin['all']['total']; $i++) { 
				if ($admin['all'][$i]['login'] == $_POST['login'] && $admin['all'][$i]['password'] == $_POST['password']) {
					$admin_tmp['id'] = $admin['all'][$i]['id'];
					$admin_tmp['login'] = $admin['all'][$i]['login'];
					$admin_tmp['password'] = $admin['all'][$i]['password'];

					$this->Caissier->updateCaissierConnexion($admin_tmp['id']);
					$info = $this->Caissier->findInfoCaissier($admin_tmp['id']);
					$admin_tmp['degre'] = $info['degre'];
					$admin_tmp['id_personne'] = $info['id_personne'];
					$admin_tmp['date_creation'] = $info['date_creation'];
					$admin_tmp['date_last_connexion'] = $info['date_last_connexion'];
					$admin_tmp['info_personne'] = $this->Personne->findInfo($info['id_personne']);
					$_SESSION['CAISSIER'] = $admin_tmp;
				}
			}

			if (isset($_SESSION['CAISSIER'])) {
				redirect(site_url(array('Caissier','index')));
			}else{
				$_SESSION['ERR'] = 'Les paramtres recus ne correspondent a auccun Caissier dans notre Database.<br> <b>Veillez recommencer SVP</b>';
				redirect(site_url(array('Caissier','formulaireConnexion')));
			}
		}else{
			redirect(site_url(array('Caissier','formulaireConnexion')));
		}
	}


	//function de deconnxion dun caissier
	public function deconnexion(){
		if (isset($_SESSION['CAISSIER'])) {
			session_destroy();
		}
		redirect(site_url(array('Magazin','index')));
	}








}
