<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Caissier_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $id_personne;
			private $login;
			private $password;
			private $date_creation;
			private $date_last_connexion="null";
			
			protected $table= 'caissier';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
 



			public function addCaissier(){
				$this->setDate_creation();
				$this->db->set('id', $this->id)
			    	->set('id_personne', $this->id_personne)
			    	->set('login', $this->login)
			    	->set('password', $this->password)
			    	->set('date_creation', $this->date_creation)
			    	->set('date_last_conexion', $this->date_last_connexion)
			    	->insert($this->table);
			}


			//function de mise a jour d'un caissier
			public function updateCaissier(){
				$this->db->set('login', $this->login)
			    	->set('password', $this->password)
			    	->where('id',$this->id)
			    	->update($this->table);
			}

			//fonction de mise a jou de derniere connxion
			public function updateCaissierConnexion($id){
				$this->setDate_last_connexion();
				$this->db->set('date_last_conexion', $this->date_last_connexion)
			    	->where('id',$id)
			    	->update($this->table);
			}

			public function liste_caissier(){
				$data =$this->db->select('id,login,password,id_personne')
								->from($this->table)
								->get()
								->result();
							$i=0;
					$donnees['data']='non';	
					$donnees['homme'] = 0;
				    $donnees['femme'] = 0;		
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_personne']=$row->id_personne;
			       	$donnees[$i]['login']=$row->login;
			       	$donnees[$i]['password']=$row->password;
			       	$donnees['data']='ok';

			       		// recherche du nombre de clients creer par ce Caissier
				       	$tmp = 0;
				       	$liste_client = $this->Client->liste_client();
				       	for ($k=0; $k < $liste_client['total']; $k++) { 
				       		if ($liste_client[$k]['createur'] == $donnees[$i]['id_personne']) {
				       			$tmp++;
				       		}
				       	}
				       	$donnees[$i]['clients'] = $tmp;

			       	if ($this->Personne->findInfo($donnees[$i]['id_personne'])['sexe'] =='M') {
				       		$donnees['homme'] ++;
				       	}else{
				       		$donnees['femme'] ++;
				       	}
			       	$i++;

				}
				
				$donnees['total']=$i;
				return $donnees;
			}


			public function findInfoCaissier($id){
				$data =$this->db->select('id,id_personne,login,password,date_creation,date_last_conexion')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();

						$donnees['data']='non';						
				foreach ($data as $row){
			       	$donnees['id']=$row->id;
			       	$donnees['id_personne']=$row->id_personne;
			       	// recherche du nombre de clients creer par ce Caissier
				       	$tmp = 0;
				       	$liste_client = $this->Client->liste_client();
				       	for ($k=0; $k < $liste_client['total']; $k++) { 
				       		if ($liste_client[$k]['createur'] == $donnees['id_personne']) {
				       			$tmp++;
				       		}
				       	}
				       	$donnees['clients'] = $tmp;
			       	$donnees['login']=$row->login;
			       	$donnees['password']=$row->password;
			       	$donnees['date_creation']=$row->date_creation;
			       	$donnees['date_last_connexion']=$row->date_last_conexion;
			       	$donnees['data']='oui';	
				}

				return $donnees;
			}



			// setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_personne($id_personne){
				$this->id_personne=$id_personne;
			}

			public function setlogin($login){
				$this->login=$login;
			}

			public function setPassword($password){
				$this->password=$password;
			}
			public function setDate_creation(){
				$this->date_creation=date('d').'-'.date('m').'-'.date('Y').' a '.date('H').':'.date('i');
			}
			public function setDate_last_connexion(){
				$this->date_last_connexion=date('d').'-'.date('m').'-'.date('Y').' a '.date('H').':'.date('i');
			}
			

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			public function getId_personne(){
				return $this->id_personne;
			
			}

			public function getLogin(){
				return $this->login;
			
			}

			public function getPassword(){
				return $this->password;
			
			}
			public function getDate_creation(){
				return $this->date_creation;
			
			}
			public function getDate_last_conexion(){
				return $this->date_last_conexion;
			
			}
				
	
}


?>
