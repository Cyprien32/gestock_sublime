<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Tablegenerated_model extends CI_Model{
		
		function __construct()
		{
		
		}

	
	 
	private $id; 
	  
	private $quantite;  
	private $stock_id;  
	private $prix_min; 
	private $prix_max=12; 
	private $code;  
	private $modele;  
	private $couleur; 
	private $pointure="{total:0}";  
	private $taille="{total:0}"; 
	private $marque;
	private $type;
	private $dateCreation; 
	private $dateModification;
	private $database_bella = 'bella_nina';


	// fonction qui genere la table d'un nouveau article
	public function newTable($nom_table){
		$this->createTable($nom_table);
	}

	

	// fonction qui creer une table dans une base de donnee
	public function createTable($nom_table){
		$query = "CREATE TABLE ".$nom_table." ( id int(11) UNSIGNED NOT NULL AUTO_INCREMENT, quantite int(11),
		  stock_id int(11), prix_min int(11), prix_max int(11), code varchar(255) UNIQUE,
		  modele TEXT, couleur TEXT, pointure TEXT, taille text, marque varchar(255), type varchar(255), 
		  dateCreation DATETIME, dateModification DATETIME, PRIMARY KEY (id) ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ";
		$this->db->db_select($this->database_bella);
		$this->db->query($query);

	}
	


	// fonction qui teste si une table existe deja dans la base de donnee
	public function testTable($nom_table){
		$this->db->db_select($this->database_bella);
		if ($this->db->table_exists($nom_table)){
        	return TRUE;
        }else{
        	return FALSE;
        }
	}




	// ajout des articles

	public function hydrate(array $donnees){
		foreach ($donnees as $key => $value){
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}


	public function addArticle($nom_table){

	    $this->db->set('marque', $this->marque)
	    	->set('stock_id', $this->stock_id)
	    	->set('prix_max', $this->prix_max)
	    	->set('prix_min', $this->prix_min)
	    	->set('type', $this->type)
	    	->set('quantite', $this->quantite)
	    	->set('couleur', $this->couleur)
	    	->set('code', $this->code)
	    	->set('modele', $this->modele)
	    	->set('pointure', $this->pointure)
	    	->set('taille', $this->taille)
	    	->set('dateCreation', $this->dateCreation)
	    	->insert($nom_table);
	}

	public function updateArticle($data, $nom_table,$id){
		if ($data['prix_max'] != '') {
			$this->db->set('prix_max',$data['prix_max'] );
		}
		
		if ($data['prix_min'] != '') {
	    	$this->db->set('prix_min',$data['prix_min']);
	    }

	    if ($data['code'] != '') {
	    	$this->db->set('code',$data['code']);
	    }

	    if ($data['couleur'] != '') {
	    	$this->db->set('couleur',$data['couleur']);
	    }

	    if ($data['quantite'] != '') {
	    	$this->db->set('quantite',$data['quantite']);
	    }

	    if ($data['modele'] != '') {
	    	$this->db->set('modele',$data['modele']);
	    }

	    if($nom_table=='chaussure'){
	    	$this->db->set('pointure',$data['pointure']);
	    }
	    if ($nom_table=='chemise' || $nom_table=='costume') {
	    	$this->db->set('taille',$data['taille']);
	    }
	   
	   	if ($data['dateModification'] != '') {
	    	$this->db->set('dateModification',$data['dateModification']);
	    }

    	$this->db->where('id',(int)$id)->update($nom_table);

	}



	public function deleteArticle($nom_table,$id){

	    $this->db->where('id',(int)$id)
	    	->delete($nom_table);	
	}




	public function findCode($nom_table, $stock_id){
		$data =$this->db->select('code')
					->from($nom_table)
					->where('stock_id', $stock_id)
					->get()
					->result();
			$i=0;
		foreach ($data as $row){
	       	$donnees[$i]['code'] = $row->code;
	       $i++;
		}
			$donnees['total']=$i;
		return $donnees;
	}


	public function findAllDonneeTable($nom_table){
		$data =$this->db->select('id,marque, stock_id, prix_max, prix_min, type, quantite, couleur, code, modele, pointure, taille, dateCreation, dateModification')
						->from($nom_table)
						->get()
						->result();
			$i=0;
		foreach ($data as $row){
	       	$donnees[$i]['id'] = $row->id;
	       	$donnees[$i]['marque'] = $row->marque;
	       	$donnees[$i]['stock_id'] = $row->stock_id;
	       	$donnees[$i]['prix_max'] = $row->prix_max;
	       	$donnees[$i]['prix_min'] = $row->prix_min;
	       	$donnees[$i]['type'] = $row->type;
	       	$donnees[$i]['quantite'] = $row->quantite;
	       	$donnees[$i]['couleur'] = $row->couleur;
	       	$donnees[$i]['code'] = $row->code;
	       	$donnees[$i]['modele'] = $row->modele;
	       	$donnees[$i]['pointure'] = $row->pointure;
	       	$donnees[$i]['taille'] = $row->taille;
	       	$donnees[$i]['dateCreation'] = $row->dateCreation;
	       	$donnees[$i]['dateModification'] = $row->dateModification;
	       $i++;
		}
				$donnees['total']=$i;
		return $donnees;
			
	}
	public function findInfoModif($nom_table, $id){
		$data =$this->db->select('id,marque, stock_id, code, prix_max, prix_min, type,stock_id, quantite, couleur, modele')
						->from($nom_table)
						->where('id', $id)
						->limit(1)
						->get()
						->result();

		foreach ($data as $row){
	       	$donnees['id']=$row->id;
	       	$donnees['marque']=$row->marque;
	       	$donnees['code']=$row->code;
	       	$donnees['stock_id']=$row->stock_id;
	       	$donnees['prix_min']=$row->prix_min;
	       	$donnees['prix_max']=$row->prix_max;
	       	$donnees['type']=$row->type;
	       	$donnees['quantite']=$row->quantite;
	       	$donnees['couleur']=$row->couleur;
	       	$donnees['modele']=$row->modele;
		}
		return $donnees;
	}

	public function findInfoPointure($nom_table, $id){
		$data =$this->db->select('pointure')
						->from($nom_table)
						->where('id', $id)
						->limit(1)
						->get()
						->result();

		foreach ($data as $row){
	       $donnees['pointure']=$row->pointure;
		}
		return $donnees;
	}

	public function findInfoTaille($nom_table, $id){
		$data =$this->db->select('taille')
						->from($nom_table)
						->where('id', $id)
						->limit(1)
						->get()
						->result();

		foreach ($data as $row){
	       $donnees['taille']=$row->taille;
		}
		return $donnees;
	}

	public function updateTable($nom_table, $id){
		if ($data['prix_max'] != '') {
			$this->db->set('prix_max',$data['prix_max'] );
		}
		
		if ($data['prix_min'] != '') {
	    	$this->db->set('prix_min',$data['prix_min']);
	    }

	    if ($data['type'] != '') {
	    	$this->db->set('type',$data['type']);
	    } 

	    if ($data['quantite']!=''){
    		$this->db->set('quantite', $data['quantite']);
    	}

    	if ($data['couleur']!=''){
    		$this->db->set('couleur', $data['couleur']);
    	}

    	if ($data['code']!=''){
    		$this->db->set('code', $data['code']);
    	}

    	if ($data['modele']!=''){
    		$this->db->set('modele', $data['modele']);
    	}

    	if ($data['pointure']!=''){
    		$this->db->set('pointure', $data['pointure']);
    	}

    	if ($data['taille']!=''){
    		$this->db->set('taille', $data['taille']);
    	}

       	if ($data['dateModification'] != '') {
	    	$this->db->set('dateModification',$data['dateModification']);
	    }

  	    	$this->db->where('id',(int)$data['id'])
			 ->update($nom_table);
	}


	public function  countAllArticle($nom_table){
		return (int)$this->db->count_all_results($nom_table);
	}

			// setteurs


			public function setStock_id($stock_id){
				$this->stock_id=$stock_id;
			}

			public function setMarque($marque){
				$this->marque=$marque;
			}

			public function setCode($code){
				$this->code=$code;
			}

			public function setPrix_min($prix_min){
				$this->prix_min=$prix_min;
			}

			public function setPrix_max($prix_max){
				$this->prix_max=$prix_max;
			}

			public function setType($type){
				$this->type=$type;
			}

			public function setQuantite($quantite){
				$this->quantite=$quantite;
			}

			public function setCouleur($couleur){
				$this->couleur=$couleur;
			}

			public function setModele($modele){
				$this->modele=$modele;
			}

			public function setPointure($pointure){
				$this->pointure=$pointure;
			}

			public function setTaille($taille){
				$this->taille=$taille;
			}

			public function setDateCreation($dateCreation){
				$this->dateCreation=$dateCreation;
			}

			public function setDateModification($dateModification){
				$this->dateModification=$dateModification;
			}
			
			// getteurs

			public function getStock_id(){
				return $this->stock_id;
			
			}

			public function getMarque(){
				return $this->marque;
			
			}

			public function getCode(){
				return $this->code;
			
			}

			public function getCouleur(){
				return $this->couleur;
			
			}

			public function getModele(){
				return $this->modele;
			
			}

			public function getPrix_max(){
				return $this->prix_max;
			
			}

			public function getPrix_min(){
				return $this->prix_min;
			
			}

			public function getTaille(){
				return $this->taille;
			
			}

			public function getPointure(){
				return $this->pointure;
			
			}

			public function getQuantite(){
				return $this->quantite;
			
			}

			public function getType(){
				return $this->type;
			
			}

			public function getDateCreation(){
				return $this->dateCreation;
			
			}

			public function getDateModification(){
				return $this->dateModification;
			
			}		
				
}


?>
