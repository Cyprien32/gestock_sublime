<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Client_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $id_personne;
			private $date_creation;
			private $date_last_achat;
			private $createur;
			
			protected $table= 'client';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
 



			public function addClient(){
				$this->setDate_creation();
				$this->setDate_last_achat();
				$this->db->set('id', $this->id)
			    	->set('id_personne', $this->id_personne)
			    	->set('date_creation', $this->date_creation)
			    	->set('date_last_achat', $this->date_last_achat)
			    	->set('createur', $this->createur)
			    	->insert($this->table);
			}


			//fonction de mise a jou de derniere connxion
			public function updateClientAchat($id){
				$this->setDate_last_achat();
				$this->db->set('date_last_achat', $this->date_last_achat)
			    	->where('id',$id)
			    	->update($this->table);
			}
			


			public function findInfoClient($id){
				$data =$this->db->select('id_personne,date_creation,date_last_achat,id')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();
							 
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['id_personne']=$row->id_personne;
			       	$donnees['id']=$row->id;
			       	$donnees['date_creation']=$row->date_creation;
			       	$donnees['date_last_achat']=$row->date_last_achat;
			       	$donnees['data']='ok';
			       

				}
				
				 
				return $donnees;
			}


			public function liste_client(){
				$data =$this->db->select('id,id_personne,date_creation,date_last_achat,createur')
								->from($this->table)
								->get()
								->result();
							 
					$donnees['data']='non';
					$donnees['homme'] = 0;
				    $donnees['femme'] = 0;	
				    $i = 0;			
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['createur']=$row->createur;
			       	$donnees[$i]['id_personne']=$row->id_personne;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['date_last_achat']=$row->date_last_achat;
			       	$donnees['data']='ok';
			        if ($this->Personne->findInfo($donnees[$i]['id_personne'])['sexe'] =='M') {
				       		$donnees['homme'] ++;
				       	}else{
				       		$donnees['femme'] ++;
				       	}
			       	$i++;
				}
				
				  $donnees['total'] = $i;
				return $donnees;
			}

 


			// setteurs


			public function setId($id){
				$this->id=$id;
			}

			public function setCreateur($id){
				$this->createur=$id;
			}


			public function setId_personne($id_personne){
				$this->id_personne=$id_personne;
			}

			 
			public function setDate_creation(){
				$this->date_creation=date('d').'-'.date('m').'-'.date('Y').' a '.date('H').':'.date('i');
			}
			public function setDate_last_achat(){
				$this->date_last_achat=date('d').'-'.date('m').'-'.date('Y').' a '.date('H').':'.date('i');
			}
			

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			public function getId_personne(){
				return $this->id_personne;
			
			}

			 
			public function getDate_creation(){
				return $this->date_creation;
			
			}
			public function getDate_last_achat(){
				return $this->date_last_achat;
			
			}
				
	
}


?>
