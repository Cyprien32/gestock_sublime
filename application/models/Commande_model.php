<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Commande_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $id_client;
			private $id_caissier;
			private $date_commande;
			private $date_livraison;
			private $info_commande;
			private $statut_commande;
			
			protected $table= 'commande';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
 



			public function addCommande(){
				$this->db->set('id', $this->id)
			    	->set('id_client', $this->id_client)
			    	->set('id_caissier', $this->id_caissier)
			    	->set('date_commande', $this->date_commande)
			    	->set('date_livraison', $this->date_livraison)
			    	->set('info_commande', $this->info_commande)
			    	->set('statut_commande', $this->statut_commande)
			    	->insert($this->table);
			}


			


			public function findInfoCommande($id){
				$data =$this->db->select('id_client,id_caissier,date_commande,date_livraison,info_commande,statut_commande')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();
							 
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['id_client']=$row->id_client;
			       	$donnees['id_caissier']=$row->id_caissier;
			       	$donnees['date_commande']=$row->date_commande;
			       	$donnees['date_livraison']=$row->date_livraison;
			       	$donnees['info_commande']=$row->info_commande;
			       	$donnees['statut_commande']=$row->statut_commande;
			       	$donnees['data']='ok';
			       

				}
				
				 
				return $donnees;
			}

 


			// setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setId_client($id_client){
				$this->id_client=$id_client;
			}

			 
			public function setId_caissier($id_caissier){
				$this->id_caissier=$id_caissier;
			}
			public function setDate_commande($date_commande){
				$this->date_commande=$date_commande;
			}
			public function setDate_livraison($date_livraison){
				$this->date_livraison=$date_livraison;
			}
			public function setInfo_commande($info_commande){
				$this->info_commande=$info_commande;
			}
			public function setStatut_commande($statut_commande){
				$this->statut_commande=$statut_commande;
			}

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			public function getId_client(){
				return $this->id_client;
			
			}

			public function getId_caissier(){
				return $this->date_creation;
			
			}
			public function getDate_commande(){
				return $this->date_commande;
			
			}
			public function getDate_livraison(){
				return $this->date_livraison;
			
			}
			public function getInfo_commande(){
				return $this->info_commande;
			
			}
			public function getStatut_commande(){
				return $this->statut_commande;
			
			}
				
	
}


?>
