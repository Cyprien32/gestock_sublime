<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Message_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $date_creation;
			private $titre;
			private $contenu;
			private $id_responsable;
			private $etat;
			protected $table= 'message';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
 



			public function addMessage(){
				$this->db->set('id', $this->id)
			    	->set('date_creation', $this->date_creation)
			    	->set('titre', $this->titre)
			    	->set('contenu', $this->contenu)
			    	->set('id_responsable', $this->id_responsable)
			    	->set('etat',0)
			    	->insert($this->table);
			}
			public function addMessageImportant(){
				$this->db->set('id', $this->id)
			    	->set('date_creation', $this->date_creation)
			    	->set('titre', $this->titre)
			    	->set('contenu', $this->contenu)
			    	->set('id_responsable', $this->id_responsable)
			    	->set('etat',2)
			    	->insert($this->table);
			}
				public function addEnvoyeMessage(){
					$this->db->set('id', $this->id)
				    	->set('date_creation', $this->date_creation)
				    	->set('titre', $this->titre)
				    	->set('contenu', $this->contenu)
				    	->set('id_responsable', $this->id_responsable)
				    	->set('etat',2)
				    	->insert($this->table);
				}
				public function restaurer($id){
					$this->db->set('etat',0)
						->from($this->table)
						->where('id', $id)
						->update($this->table);
			    }
				public function Envoyer($id){
					$this->db->set('etat',1)
						->from($this->table)
						->where('id', $id)
						->update($this->table);
			    }

				public function supprime($id){
					$this->db->set('etat',3)
						->from($this->table)
						->where('id', $id)
						->update($this->table);
			    }
			    public function videCorbeille(){
					$this->db->set('etat',4)
						->from($this->table)
						->where('etat', 3)
						->update($this->table);
			    }
			
			    public function findIdSms($data){
				$data =$this->db->select('id')
								->from($this->table)
								->where('date_creation', $data['date_creation'])
								->where('titre', $data['titre'])
								->where('contenu', $data['contenu'])
								->where('id_responsable', $data['id_responsable'])
								->limit(1)
								->get()
								->result();
							 
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['id']=$row->id;
			       	$donnees['data']='ok';
			    }
				return $donnees;
			}

			public function findInfoMessage($id){
				$data =$this->db->select('id,date_creation,titre,contenu,id_responsable,etat')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();
							 
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['date_creation']=$row->date_creation;
			       	$donnees['titre']=$row->titre;
			       	$donnees['etat']=$row->etat;
			       	$donnees['id']=$row->id;
			       	$donnees['contenu']=$row->contenu;
			       	$donnees['id_responsable']=$row->id_responsable;
			       	$donnees['nom_responsable']=$this->Personne->findInfo($row->id_responsable);
			       	$donnees['data']='ok';
			       

				}
				
				 
				return $donnees;
			}

 			
 			
			public function findMessageEnvoyer(){
				$data =$this->db->select('id,id_responsable,date_creation,contenu,titre')
								->from($this->table)
								->where('etat',1)
								->get()
								->result();
							$i=0;
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_responsable']=$row->id_responsable;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['contenu']=$row->contenu;
			       	$donnees[$i]['titre']=$row->titre;
			       	$donnees['data']='ok';
			       	$i++;

				}
				
				$donnees['total']=$i;
				return $donnees;
			}
			public function findMessageSupprime(){
							$data =$this->db->select('id,id_responsable,date_creation,contenu,titre')
											->from($this->table)
											->where('etat',3)
											->get()
											->result();
										$i=0;
								$donnees['data']='non';			
							foreach ($data as $row){
						       	$donnees[$i]['id']=$row->id;
						       	$donnees[$i]['id_responsable']=$row->id_responsable;
						       	$donnees[$i]['date_creation']=$row->date_creation;
						       	$donnees[$i]['contenu']=$row->contenu;
						       	$donnees[$i]['titre']=$row->titre;
						       	$donnees['data']='ok';
						       	$i++; 

							}
							
							$donnees['total']=$i;
							return $donnees;
						}

				public function findMessageBrouillon(){
				$data =$this->db->select('id,id_responsable,date_creation,contenu,titre')
								->from($this->table)
								->where('etat',0)
								->get()
								->result();
							$i=0;
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_responsable']=$row->id_responsable;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['contenu']=$row->contenu;
			       	$donnees[$i]['titre']=$row->titre;
			       	$donnees['data']='ok';
			       	$i++;

				}
				
				$donnees['total']=$i;
				return $donnees;
			}
			public function findMessageImportant(){
				$data =$this->db->select('id,id_responsable,date_creation,contenu,titre')
								->from($this->table)
								->where('etat',2)
								->get()
								->result();
							$i=0;
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees[$i]['id']=$row->id;
			       	$donnees[$i]['id_responsable']=$row->id_responsable;
			       	$donnees[$i]['date_creation']=$row->date_creation;
			       	$donnees[$i]['contenu']=$row->contenu;
			       	$donnees[$i]['titre']=$row->titre;
			       	$donnees['data']='ok';
			       	$i++;

				}
				
				$donnees['total']=$i;
				return $donnees;
			}



			// setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setTitre($titre){
				$this->titre=$titre;
			}

			 
			public function setContenu($contenu){
				$this->contenu=$contenu;
			}
			public function setDate_creation($date_creation){
				$this->date_creation=$date_creation;
			}
			public function setId_responsable($id_responsable){
				$this->id_responsable=$id_responsable;
			}
			public function setEtat($etat){
				$this->etat=$etat;
			}
			 

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			public function getTitre(){
				return $this->titre;
			
			}

			public function getContenu(){
				return $this->contenu;
			
			}
			public function getDate_creation(){
				return $this->date_creation;
			
			}
			public function getId_responsable(){
				return $this->id_responsable;
			
			}
			public function getEtat(){
				return $this->etat;
			
			}
			  
				
	
}


?>
