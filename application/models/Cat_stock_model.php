<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Cat_stock_model extends CI_Model{
		
		function __construct()
		{
		
		}
		
			

			private $id_cat;
			private $libelle;
			private $description;
			private $image;
			private $dateCreation;
			private $dateModification;

			protected $table= 'cat_stock';

			public function addCat_stock(){

				// $field=array(
				// 	'libelle'=>$this->input->post('libelle'),
				// 	'description'=>$this->input->post('description'),
				// 	'image'=>$this->input->post('image'),
				// 	'dateCreation'=>date('Y-m-d H:i:s')
				// );

				// $this->db->insert('cat_stock',$field);

				// if ($this->db->affected_rows()>0) {
				//  	return true;
				// }else{
				// 	return false;
				// } 

			    $this->db->set('libelle', $this->libelle)
			    	->set('description', $this->description)
			    	->set('image', $this->image)
			    	->set('dateCreation', $this->dateCreation)
			    	->insert($this->table);
			}


			public function getCat_stock(){
				// $this->db->order_by('created_at','desc');

				$query=$this->db->get('cat_stock');
				if ($query->num_rows()>0) {
					return $query->result();
				}else{
					return false;
				}
			}

			

			public function findAllCat_stock(){
				$data =$this->db->select('id_cat,libelle,image, description, dateCreation,dateModification')
								->from($this->table)
								->get()
								->result();
					$i=0;
				foreach ($data as $row){
			       	$donnees[$i]['id_cat'] = $row->id_cat;
			       	$donnees[$i]['libelle'] = $row->libelle;
			       	$donnees[$i]['description'] = $row->description;
			       	$donnees[$i]['image'] = $row->image;
			       	$donnees[$i]['dateCreation'] = $row->dateCreation;
			       	$donnees[$i]['dateModification'] = $row->dateModification;
			       	$i++;
				}
 					$donnees['total']=$i;
				return $donnees;
			}
			

			public function deleteCat_stock($id_cat){

			    $this->db->where('id_cat',(int)$id_cat)
			    	->delete($this->table);	
			}
			

			public function updateCat_stock($data){
				if ($data['libelle'] != '') {
					$this->db->set('libelle',$data['libelle'] );
				}
				
				if ($data['description'] != '') {
			    	$this->db->set('description',$data['description']);
			    }

			    if ($data['image'] != '') {
			    	$this->db->set('image',$data['image']);
			    }

				
				if ($data['dateModification'] != '') {
			    	$this->db->set('dateModification',$data['dateModification']);
			    }

	  	    	$this->db->where('id_cat',(int)$data['id_cat'])
    			 		->update($this->table);
			}


			public function findDescription($id_cat){
				$data =$this->db->select('description')
								->from($this->table)
								->where('id_cat', $id_cat)
								->limit(1)
								->get()
								->result();

											
				foreach ($data as $row){
			       	$donnees['description']=$row->description;
				}

				return $donnees['description'];
			}

			public function findLibelle($id_cat){
				$data =$this->db->select('libelle')
								->from($this->table)
								->where('id_cat',$id_cat)
								->limit(1)
								->get()
								->result();		
				foreach ($data as $row){
			       
			       	$donnees['libelle']=$row->libelle; 
				}
				return $donnees['libelle'];
			}



			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
		

					// setteurs


			public function setId_cat($id_cat){
				$this->id_cat=$id_cat;
			}


			public function setLibelle($libelle){
				$this->libelle=$libelle;
			}

			public function setDescription($description){
				$this->description=$description;
			}

			public function setImage($image){
				$this->image=$image;
			}

			public function setDateCreation($dateCreation){
				$this->dateCreation=$dateCreation;
			}

			public function setDateModification($dateModification){
				$this->dateModification=$dateModification;
			}
		
				

					// getteurs

			public function getId_cat(){
				return $this->id_cat;
			
			}

			public function getLibelle(){
				return $this->libelle;
			
			}
			
			public function getDescription(){
				return $this->description;
			
			}

			public function getImage(){
				return $this->image;
			
			}

			public function getDateCreation(){
				return $this->dateCreation;
			
			}
			
			public function getDateModification(){
				return $this->dateModification;
			
			}
			
				
}


?>
