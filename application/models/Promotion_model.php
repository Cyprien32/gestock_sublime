<?php
	if ( !defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 
*/
class Promotion_model extends CI_Model{
		
		function __construct()
			{
			
			}

			private $id;
			private $date_creation;
			private $date_fin;
			private $detail_promotion;
			private $id_responsable;
			private $id_stock;
			
			protected $table= 'promotion';


			public function hydrate(array $donnees){
				foreach ($donnees as $key => $value){
					$method = 'set'.ucfirst($key);
					if (method_exists($this, $method)){
						$this->$method($value);
					}
				}
			}
 



			public function addPromotion(){
				$this->db->set('id', $this->id)
			    	->set('date_creation', $this->date_creation)
			    	->set('id_stock', $this->id_stock)
			    	->set('date_fin', $this->date_fin)
			    	->set('detail_promotion', $this->detail_promotion)
			    	->set('id_responsable', $this->id_responsable)
			    	->insert($this->table);
			}


			


			public function findInfoPromotion($id){
				$data =$this->db->select('date_creation,date_fin,detail_promotion,id_responsable')
								->from($this->table)
								->where('id', $id)
								->limit(1)
								->get()
								->result();
							 
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['date_creation']=$row->date_creation;
			       	$donnees['date_fin']=$row->date_fin;
			       	$donnees['detail_promotion']=$row->detail_promotion;
			       	$donnees['id_responsable']=$row->id_responsable;
			       	$donnees['data']='ok';
			       

				}
				
				 
				return $donnees;
			}
			public function findInfoBy_id_stock($id){
				$data =$this->db->select('date_creation,date_fin,detail_promotion,id_responsable')
								->from($this->table)
								->where('id_stock', $id)
								->limit(1)
								->get()
								->result();
							 
					$donnees['data']='non';			
				foreach ($data as $row){
			       	$donnees['date_creation']=$row->date_creation;
			       	$donnees['date_fin']=$row->date_fin;
			       	$donnees['detail_promotion']=$row->detail_promotion;
			       	$donnees['id_responsable']=$row->id_responsable;
			       	$donnees['data']='ok';
			       

				}
				
				 
				return $donnees;
			}
			public function findIdResponsBy_id_stock($id){
				$data =$this->db->select('id_responsable')
								->from($this->table)
								->where('id_stock', $id)
								->limit(1)
								->get()
								->result();
							 
			 			
				foreach ($data as $row){
			       	$donnees['id_responsable']=$row->id_responsable;
			        
			       

				}
				 
				return 	$donnees['id_responsable'];
			}

 


			// setteurs


			public function setId($id){
				$this->id=$id;
			}


			public function setDate_fin($date_fin){
				$this->date_fin=$date_fin;
			}

			 
			public function setDetail_promotion($detail_promotion){
				$this->detail_promotion=$detail_promotion;
			}
			public function setDate_creation($date_creation){
				$this->date_creation=$date_creation;
			}
			public function setId_responsable($id_responsable){
				$this->id_responsable=$id_responsable;
			}
			public function setId_stock($id_stock){
				$this->id_stock=$id_stock;
			}
			 

			// getteurs

			public function getId(){
				return $this->id;
			
			}

			public function getDate_fin(){
				return $this->date_fin;
			
			}

			public function getDetail_promotion(){
				return $this->detail_promotion;
			
			}
			public function getDate_creation(){
				return $this->date_creation;
			
			}
			public function getId_responsable(){
				return $this->id_responsable;
			
			}
			public function getId_Stock(){
				return $this->id_stock;
			
			}
			  
				
	
}


?>
