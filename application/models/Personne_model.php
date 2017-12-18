<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Personne_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $nom="null";
			private $prenom="null";
			private $email="null";
			private $sexe="null";
			private $cni="null";
			private $image_cni="null";
			private $image="null";
			private $adresse="null";
			private $telephone="{total:0}";
			protected $table= 'personne';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
 



			public function addPersonne(){
				$this->db->set('nom', $this->nom)
			    	->set('prenom', $this->prenom)
			    	->set('email', $this->email)
			    	->set('sexe', $this->sexe)
			    	->set('cni', $this->cni)
			    	->set('image_cni', $this->image_cni)
			    	->set('image', $this->image)
			    	->set('adresse', $this->adresse)
			    	->set('telephone', $this->telephone)
			    	->insert($this->table);
			    	$data =$this->db->select('id')
								->from($this->table)
								->where('nom', $this->nom)
						    	->where('prenom', $this->prenom)
						    	->where('email', $this->email)
						    	->where('sexe', $this->sexe)
						    	->where('cni', $this->cni)
						    	->where('image_cni', $this->image_cni)
						    	->where('image', $this->image)
						    	->where('adresse', $this->adresse)
						    	->where('telephone', $this->telephone)
								->get()
								->result();

				$donnees['id']='non';			
				foreach ($data as $row){
			       	$donnees['id']=$row->id;
				}
				return $donnees['id'];
			}


			//fonction de mise a jour d'une personne
			public function updatePersonne(){
				$this->db->set('nom', $this->nom)
			    	->set('prenom', $this->prenom)
			    	->set('email', $this->email)
			    	->set('sexe', $this->sexe)
			    	->set('cni', $this->cni);
			    	if ($this->image_cni != 'null') {
			    		$this->db->set('image_cni', $this->image_cni);
			    	}

			    	if ($this->image != 'null') {
			    		$this->db->set('image', $this->image);
			    	}
			    	
			    	
			    	$this->db->set('adresse', $this->adresse)
			    	->set('telephone', $this->telephone)
			    	->where('id',$this->id)
			    	->update($this->table);
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

			public function findInfo($id){
				$data =$this->db->select('id,nom,prenom,email,sexe,cni,image_cni,image,adresse,telephone')
								->from($this->table)
								->where('id',$id)
								->get()
								->result();
							 
					$donnees['data']='non';	
					$i=0;		
				foreach ($data as $row){
			       	$donnees['id']=$row->id;
			       	$donnees['nom']=$row->nom;
			       	$donnees['prenom']=$row->prenom;
			       	$donnees['email']=$row->email;
			       	$donnees['sexe']=$row->sexe;
			       	$donnees['cni']=$row->cni;
			       	$donnees['image_cni']=$row->image_cni;
			       	$donnees['image']=$row->image;
			       	$donnees['adresse']=$row->adresse;
			       	$donnees['telephone']=json_decodeur($row->telephone);
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


			public function setNom($nom){
				$this->nom=$nom;
			}	
			public function setPrenom($prenom){
				$this->prenom=$prenom;
			}

			public function setEmail($email){
				$this->email=$email;
			}

			public function setSexe($sexe){
				$this->sexe=$sexe;
			}
			
			public function setImage_cni($image_cni){
				$this->image_cni=$image_cni;
			}
			public function setImage($image){
				$this->image=$image;
			}
			public function setAdresse($adresse){
				$this->adresse=$adresse;
			}
			public function setTelephone($telephone){
				$this->telephone=$telephone;
			}

			public function setCni($cni){
				$this->cni=$cni;
			}
			

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			
			public function getNom(){
				return $this->nom;
			
			}

			public function getPresonne(){
				return $this->personne;
			
			}

			public function getEmail(){
				return $this->email;
			
			}
			public function getSexe(){
				return $this->sexe;
			
			}
			public function getCni(){
				return $this->sexe;
			
			}
			public function getImage_cni(){
				return $this->sexe;
			
			}
			public function getimage(){
				return $this->sexe;
			
			}
			public function getAdresse(){
				return $this->adresse;
			
			}
			public function getTelephone(){
				return $this->telephone;
			
			}
				
	
}


?>
