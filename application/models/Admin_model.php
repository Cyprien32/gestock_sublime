<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Admin_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $id_personne;
			private $login;
			private $password;
			private $degre=1;
			
			protected $table= 'admin';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}

			// fonction qui permet de compter les elements de la base de donnes
			public function count($where = array()){
				return (int) $this->db->where($where)
									  ->count_all_results($this->table);
			}
 



			public function addAdmin(){
				$this->db->set('id_personne', $this->id_personne)
			    	->set('login', $this->login)
			    	->set('password', $this->password)
			    	->set('degre', $this->degre)
			    	->insert($this->table);

			    $data =$this->db->select('id')
								->from($this->table)
								->where('id_personne', $this->id_personne)
						    	->where('login', $this->login)
						    	->where('password', $this->password)
						    	->where('degre', $this->degre)
								->limit(1)
								->get()
								->result();

				$donnees['id']='non';						
				foreach ($data as $row){
			       	$donnees['id']=$row->id;
				}

				return $donnees['id'];
			}



			//fonction de mise a jour de l'admin
			public function updateAdmin(){
				$this->db->set('login', $this->login)
			    	->set('password', $this->password)
			    	->where('id',$this->id)
			    	->update($this->table);
			}

			


			public function liste_admin(){
				$data =$this->db->select('id,login,password,id_personne')
								->from($this->table)
								->order_by('id DESC')
								->get()
								->result();
							$i=0;
					$donnees['data']='non';	
					$donnees['homme'] = 0;
				    $donnees['femme'] = 0;
					$i=0;		
					foreach ($data as $row){
				       	$donnees[$i]['id']=$row->id;
				       	$donnees[$i]['login']=$row->login;
				       	$donnees[$i]['id_personne']=$row->id_personne;
				       	$donnees[$i]['password']=$row->password;
				       	$donnees['data']='ok';

				       	// recherche du nombre de clients creer par cet Admin
				       	$tmp = 0;
				       	$liste_client = $this->Client->liste_client();
				       	for ($k=0; $k < $liste_client['total']; $k++) { 
				       		if ($liste_client[$k]['createur'] == $donnees[$i]['id_personne']) {
				       			$tmp++;
				       		}
				       	}
				       	$donnees[$i]['clients'] = $tmp;

				       	if ($this->Personne->findInfo($donnees[$i]['id'])['sexe'] =='M') {
				       		$donnees['homme'] ++;
				       	}else{
				       		$donnees['femme'] ++;
				       	}
				       	$i++;
					}
				
				$donnees['total']=$i;
				return $donnees;
			}


			public function findInfoadmin($id){
				$data =$this->db->select('id,id_personne,degre,login,password')
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
			       	$donnees['degre']=$row->degre;
			       	$donnees['login']=$row->login;
			       	$donnees['password']=$row->password;
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

			public function setLogin($login){
				$this->login=$login;
			}

			public function setPassword($password){
				$this->password=$password;
			}
			public function setDegre($degre){
				$this->degre=$degre;
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
			public function getdegre(){
				return $this->degre;
			
			}
				
	
}


?>
