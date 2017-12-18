<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazin extends CI_Controller {

	//function qui permet de definir la page d'acceuil de toute l'application
	public function index(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		echo 'Bienvenu dans notre application de gestion d\'un Magazin ';
	}
}
