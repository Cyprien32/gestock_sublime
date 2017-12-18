      <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

  
  public function index(){
     //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
    if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
    $data['message']=$this->Message->findMessageEnvoyer();
    
    $this->load->view('template_al/header');
    $this->load->view('template_al/navigation');
    $this->load->view('gestion_message/message_header');
    $this->load->view('gestion_message/gestion_message',$data);
    $this->load->view('template_al/footer');

    }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
    public function Brouillon(){
     //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
    if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
    
    $data['message']=$this->Message->findMessageBrouillon();
    
    $this->load->view('template_al/header');
    $this->load->view('template_al/navigation');
    $this->load->view('gestion_message/message_header');
    $this->load->view('gestion_message/gestion_message',$data);
    $this->load->view('template_al/footer');

    }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
public function important(){
     //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
    if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
    
    $data['message']=$this->Message->findMessageImportant();
    
    $this->load->view('template_al/header');
    $this->load->view('template_al/navigation');
    $this->load->view('gestion_message/message_header');
    $this->load->view('gestion_message/gestion_message',$data);
    $this->load->view('template_al/footer');

    }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
  public function lecture($id){
    //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
    $data['message']=$this->Message->findMessageBrouillon();
    $data['detail_sms']=$this->Message->findInfoMessage($id);
    $this->load->view('template_al/header');
    $this->load->view('template_al/navigation');
    $this->load->view('gestion_message/message_header');
    $this->load->view('gestion_message/lecture',$data);
    $this->load->view('template_al/footer'); 
    
  }
  public function nouveau(){
    //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
    
    if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) { 
      $this->load->view('template_al/header');
      $this->load->view('gestion_message/message_header');
      $this->load->view('gestion_message/nouveau');
      $this->load->view('template_al/navigation');
      $this->load->view('template_al/footer');
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
          if (isset($_POST['save_text']) &&  isset($_POST['titre']) && isset($_POST['message']) || isset($_POST['id_sms'])) {
            
            if (!isset($_POST['id_sms'])) {
              
            
              $data['date_creation']=$data['date']=date('d').'-'.date('M').'-'.date('Y').'  a '.date('H').':'.date('i').':'.date('s');
              $data['titre']=$_POST['titre'] ;
              $data['contenu']=$_POST['message'] ;
              
              if(isset($_SESSION['ADMIN'])){
                $data['id_responsable']=$_SESSION['ADMIN']['id_personne'] ;
              }else{
                $data['id_responsable']=$_SESSION['CAISSIER']['id_personne'] ;  
              }
               
            if ($_POST['save_text']=="no" ) {

               $this->Message->hydrate($data);
               $this->Message->addMessage();

               $_SESSION['message']=" Message enregistre avec succes";
             


            }else{


              $this->Message->hydrate($data);
              $this->Message->addEnvoyeMessage();

               $_SESSION['message']=" Message Envoye avec succes";
             $data['id_sms']=$this->Message->findIdSms($data);
            
            }
          }
          if (isset($_POST['id_sms'])  || isset($data['id_sms']) ) {
              if (isset($data['id_sms']) && $data['id_sms']['data']=="non" ) {
              $_SESSION['message_error']="Virus detecte veuillez contactez l 'administrateur car le message a ete enregistre mais pas envoyer";
                  
              }else{
                if (isset($_POST['Restaurer'])) {
                     $_SESSION['message']=" Message Restaure avec succes";
                     $this->Message->restaurer($_POST['Restaurer']);
                  
                }else{
                if (isset($_POST['id_sms'])) {
                  $id_sms=$_POST['id_sms'];
                }else{
                  $id_sms=$data['id_sms']['id'];
                }
                $_SESSION['message']=" Message Envoye avec succes";
                print_r("code de partage");
                 //  Api envoye de message *************************************************** 
               $this->Message->Envoyer($id_sms);
              }
            }
            
          }

               redirect(site_url(array('Message','nouveau')));

          }else{
             
              $_SESSION['message_error']="Virus detecte veuillez contactez l 'administrateur";
              redirect(site_url(array('Message','nouveau')));
              
            
          }
    }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
  public function supprime(){
    //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
        if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
              if (isset($_POST['id'])) {
                      $this->Message->supprime($_POST['id']);
                      $data['supprimer_sms']=" Message supprimé";
              }else{
                     $this->Message->videCorbeille();
                     $data['supprimer_sms']="corbeille vide !!";
              }
              
              if (isset($_POST['lecture']) || isset($data['supprimer_sms'])) {
                  
                  $this->load->view('template_al/header');
                  $this->load->view('template_al/navigation');
                  $this->load->view('gestion_message/message_header');
                  $this->load->view('gestion_message/lecture',$data);
                  $this->load->view('template_al/footer'); 
              }else{

              }
        }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
  public function corbeille(){
    //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
        if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
              $data['corbeille']="Vider"; 
           $data['message']=$this->Message->findMessageSupprime();
           $this->load->view('template_al/header');
           $this->load->view('template_al/navigation');
           $this->load->view('gestion_message/message_header');
           $this->load->view('gestion_message/gestion_message',$data);
           $this->load->view('template_al/footer');
        }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
  public function delete_sms(){
    //pour eliminer la session de pagination a mettre au debut de toutes les fonctions
    if (isset($_SESSION['pagination'])) {
      unset($_SESSION['pagination']);
    }
    if (isset($_SESSION['ADMIN']) || isset($_SESSION['CAISSIER']) ) {
        
    for ($i=0; $i <$_POST['total'] ; $i++) { 
       if (isset($_POST['numero'.$i])) {
            $this->Message->supprime($_POST['numero'.$i]);
            $data['supprimer_sms']=" Message supprimé"; 
       }
    }
    $_SESSION['message']=" Messages supprime avec succes";

    redirect(site_url(array('Message','nouveau')));

    }else{
      redirect(site_url(array('Magazin','index')));
    }
  }
}
