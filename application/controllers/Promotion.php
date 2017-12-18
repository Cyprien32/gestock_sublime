<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

	
	public function index(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
	    	$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_promotion/gestion_promotion');
			$this->load->view('template_al/footer'); 
	    }else{
	      redirect(site_url(array('Magazin','index')));
	    }
		
	}
	public function nouvelle(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
	     	
			$data['liste_cathegorie']=$this->Cat_stock->findAllCat_stock();
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_promotion/new_promotion',$data);
			$this->load->view('template_al/footer');
	     }else{
	      redirect(site_url(array('Magazin','index')));
	    }
	}
	public function liste_produit($id){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
	    	$data['liste_cathegorie']=$this->Stock->findAllStockPromotion($id);
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_promotion/liste_promotion',$data);
			$this->load->view('template_al/footer');
	     }else{
	      redirect(site_url(array('Magazin','index')));
	    }
		
	}
	public function formulaire(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
	     	if (isset($_POST['button']) && $_POST['button']=="retire") {
			$this->Stock->MetHorPromo($_POST['id_stock']);
			redirect(site_url(array('Promotion','liste_promotion')));
			}else{

			$data['id_stock']=$_POST['id_stock'];
			$data['nom_article']=$_POST['nom'];
			$data['dateCreation']=$_POST['date2'];
			$data['dateModification']=$_POST['date1'];
			$data['image']=$_POST['image'];
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_promotion/formulaire',$data);
			$this->load->view('template_al/footer');	
			}
	    }else{
	      redirect(site_url(array('Magazin','index')));
	    }
		
		
	}
	public function save(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
	     		if (isset($_POST['pourcentage']) && isset($_POST['date_debut'])&& isset($_POST['date_fin']) ) {
			$data['date_creation']=$_POST['date_debut'];
			$data['date_fin']=$_POST['date_fin'];
			$data['id_stock']=$_POST['id_stock'];
			$data['detail_promotion']=date('d').'-'.date('M').'-'.date('Y').'  a '.date('H').':'.date('i').':'.date('s');
			 if(isset($_SESSION['ADMIN'])){
                $data['id_responsable']=$_SESSION['ADMIN']['id_personne'] ;
              }else{
                $data['id_responsable']=$_SESSION['CAISSIER']['id_personne'] ;  
              }
              $this->Stock->miseEnPromo($_POST['id_stock']);

              $this->Promotion->hydrate($data);
              $this->Promotion->addPromotion();

              $data['titre']="Super Promotion de ".$_POST['nom'];
              $data['contenu']="Nous offrons  une reduction de ".$_POST['pourcentage']." % sur chaque ".$_POST['nom']." du ".$_POST['date_debut']." au ".$_POST['date_fin'];
              $this->Message->hydrate($data);
              $this->Message->addMessageImportant();
              $_SESSION['message']=" Promotion enregistree avec succes";
              
            }else{
				$_SESSION['message_error']="Virus detecte veuillez contactez l 'administrateur";
			}
			redirect(site_url(array('Promotion','nouvelle')));

	     }else{
	      redirect(site_url(array('Magazin','index')));
	    }
		
	 	 
		
		
	}
	public function liste_promotion(){
		//pour eliminer la session de pagination a mettre au debut de toutes les fonctions
		if (isset($_SESSION['pagination'])) {
			unset($_SESSION['pagination']);
		}
		if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
			$data['liste_cathegorie']=$this->Stock->findAllPromotion();
			$data['en_promo']="true";
			$this->load->view('template_al/header');
			$this->load->view('template_al/navigation');
			$this->load->view('gestion_promotion/liste_promotion',$data);
			$this->load->view('template_al/footer');
	
	     }else{
	      redirect(site_url(array('Magazin','index')));
	    }
		
	}
}
