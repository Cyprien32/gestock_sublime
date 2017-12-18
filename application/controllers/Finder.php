<?php
defined('BASEPATH') OR exit('No direct script access allowed');



// Classe globale permettant de faire les filtres JS
class Finder extends CI_Controller {

	
	public function filtreAdmin(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
			$this->db->select('id,nom,prenom,email,sexe,cni,image_cni,image,adresse,telephone')
								->from('personne');
								if ($_POST['nom'] != '') {
									$this->db->where('nom LIKE', '%'.$_POST['nom'].'%');
								}

								if ($_POST['prenom'] != '') {
									$this->db->where('prenom LIKE', '%'.$_POST['prenom'].'%');
								}

								if ($_POST['email'] != '') {
									$this->db->where('email LIKE', '%'.$_POST['email'].'%');
								}

								if ($_POST['cni'] != '') {
									$this->db->where('cni LIKE', '%'.$_POST['cni'].'%');
								}


								if ($_POST['sexe'] == 1) {
									$this->db->where('sexe', 'M');
								}

								if ($_POST['sexe'] == 2) {
									$this->db->where('sexe', 'F');
								}

								if ($_POST['telephone'] != '') {
									$this->db->where('telephone LIKE', '%'.$_POST['telephone'].'%');
								}
									
					$data =$this->db->order_by('id DESC')
											->get()
											->result();
						 
					$donnees['data']='non';	
					$i=0;		
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['email']=$row->email;
			       	$donnees[$i]['sexe']=$row->sexe;
			       	$donnees[$i]['cni']=$row->cni;
			       	$donnees[$i]['image_cni']=$row->image_cni;
			       	$donnees[$i]['image']=$row->image;
			       	$donnees[$i]['adresse']=$row->adresse;
			       	$donnees[$i]['telephone']=json_decodeur($row->telephone);
			       	$donnees['data']='ok';
			       	$i++;

				}
				
				$donnees['total']=$i;
				$admins = $this->Admin->liste_admin();


				$result = array();
				$result['msg'] = 'no';
				$tmp = 0;

				for ($i=0; $i < $donnees['total']; $i++) { 
					for ($j=0; $j < $admins['total']; $j++) { 
						if ($donnees[$i]['id'] == $admins[$j]['id_personne']) {
							$donnees[$i]['id_admin'] = $admins[$j]['id'];
							$result['data'][$tmp] = $donnees[$i];
							$tmp++;
						}
					}
				}

				$result['data']['total'] = $tmp;
				if ($tmp !=0) {
					$result['msg'] = 'ok';
				}
				echo json_encode($result);
	}






	public function filtreCaissier(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
			$this->db->select('id,nom,prenom,email,sexe,cni,image_cni,image,adresse,telephone')
								->from('personne');
								if ($_POST['nom'] != '') {
									$this->db->where('nom LIKE', '%'.$_POST['nom'].'%');
								}

								if ($_POST['prenom'] != '') {
									$this->db->where('prenom LIKE', '%'.$_POST['prenom'].'%');
								}

								if ($_POST['email'] != '') {
									$this->db->where('email LIKE', '%'.$_POST['email'].'%');
								}

								if ($_POST['cni'] != '') {
									$this->db->where('cni LIKE', '%'.$_POST['cni'].'%');
								}


								if ($_POST['sexe'] == 1) {
									$this->db->where('sexe', 'M');
								}

								if ($_POST['sexe'] == 2) {
									$this->db->where('sexe', 'F');
								}

								if ($_POST['telephone'] != '') {
									$this->db->where('telephone LIKE', '%'.$_POST['telephone'].'%');
								}
									
					$data =$this->db->order_by('id DESC')
											->get()
											->result();
						 
					$donnees['data']='non';	
					$i=0;		
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['email']=$row->email;
			       	$donnees[$i]['sexe']=$row->sexe;
			       	$donnees[$i]['cni']=$row->cni;
			       	$donnees[$i]['image_cni']=$row->image_cni;
			       	$donnees[$i]['image']=$row->image;
			       	$donnees[$i]['adresse']=$row->adresse;
			       	$donnees[$i]['telephone']=json_decodeur($row->telephone);
			       	$donnees['data']='ok';
			       	$i++;

				}
				
				$donnees['total']=$i;
				$admins = $this->Caissier->liste_caissier();


				$result = array();
				$result['msg'] = 'no';
				$tmp = 0;

				for ($i=0; $i < $donnees['total']; $i++) { 
					for ($j=0; $j < $admins['total']; $j++) { 
						if ($donnees[$i]['id'] == $admins[$j]['id_personne']) {
							$donnees[$i]['id_caissier'] = $admins[$j]['id'];
							$result['data'][$tmp] = $donnees[$i];
							$tmp++;
						}
					}
				}

				$result['data']['total'] = $tmp;
				if ($tmp !=0) {
					$result['msg'] = 'ok';
				}
				echo json_encode($result);
	}





	public function filtreClient(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
			$this->db->select('id,nom,prenom,email,sexe,cni,image_cni,image,adresse,telephone')
								->from('personne');
								if ($_POST['nom'] != '') {
									$this->db->where('nom LIKE', '%'.$_POST['nom'].'%');
								}

								if ($_POST['prenom'] != '') {
									$this->db->where('prenom LIKE', '%'.$_POST['prenom'].'%');
								}

								if ($_POST['email'] != '') {
									$this->db->where('email LIKE', '%'.$_POST['email'].'%');
								}

								if ($_POST['cni'] != '') {
									$this->db->where('cni LIKE', '%'.$_POST['cni'].'%');
								}


								if ($_POST['sexe'] == 1) {
									$this->db->where('sexe', 'M');
								}

								if ($_POST['sexe'] == 2) {
									$this->db->where('sexe', 'F');
								}

								if ($_POST['telephone'] != '') {
									$this->db->where('telephone LIKE', '%'.$_POST['telephone'].'%');
								}
									
					$data =$this->db->order_by('id DESC')
											->get()
											->result();
						 
					$donnees['data']='non';	
					$i=0;		
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['nom']=$row->nom;
			       	$donnees[$i]['prenom']=$row->prenom;
			       	$donnees[$i]['email']=$row->email;
			       	$donnees[$i]['sexe']=$row->sexe;
			       	$donnees[$i]['cni']=$row->cni;
			       	$donnees[$i]['image_cni']=$row->image_cni;
			       	$donnees[$i]['image']=$row->image;
			       	$donnees[$i]['adresse']=$row->adresse;
			       	$donnees[$i]['telephone']=json_decodeur($row->telephone);
			       	$donnees['data']='ok';
			       	$i++;

				}
				
				$donnees['total']=$i;
				$admins = $this->Client->liste_client();


				$result = array();
				$result['msg'] = 'no';
				$tmp = 0;

				for ($i=0; $i < $donnees['total']; $i++) { 
					for ($j=0; $j < $admins['total']; $j++) { 
						if ($donnees[$i]['id'] == $admins[$j]['id_personne']) {
							$donnees[$i]['id_client'] = $admins[$j]['id'];
							$result['data'][$tmp] = $donnees[$i];
							$tmp++;
						}
					}
				}

				$result['data']['total'] = $tmp;
				if ($tmp !=0) {
					$result['msg'] = 'ok';
				}
				echo json_encode($result);
	}


















}
