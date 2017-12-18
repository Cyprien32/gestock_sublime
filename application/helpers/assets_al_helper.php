<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed') ;

if ( ! function_exists('admin')){
	function admin($nom){
		return base_url() . 'assets_al/admin/' . $nom ;
	}
}


if ( ! function_exists('css_url')){
	function css_url($nom){
		return base_url() . 'assets_al/css/' . $nom . '.css';
	}
}



if ( ! function_exists('img_url')){
	function img_url($nom){
		return base_url() . 'assets_al/images/' . $nom;
	}
}

if ( ! function_exists('js_url')){
	function js_url($nom){
		return base_url() . 'assets_al/javascript/' . $nom . '.js';
	}
}




if ( ! function_exists('video_url')){
	function video_url($nom){
		return base_url() . 'assets_al/videos/' . $nom;
	}
}








if ( ! function_exists('json_decodeur')){
	function json_decodeur($str){
		$tab_retour = array();
	 	$chaine = '';
	 	// purification de la sous chaine sans accolades
	 	if ($str[0] == "{") {
	 		for ($i=1; $i < strlen($str)-1; $i++) { 
	 			$chaine.=$str[$i];
	 		}
	 	}else{
	 		$chaine = $str;
	 	}
	 	// parcour et decoupage de la chaine
	 	$tmp = '';
	 	$tab_tmp = array();
	 	for ($i=0; $i < strlen($chaine); $i++) {
	 		if($chaine[$i] == ','){
	 			$bool = 0;
	 			$bool2 = 0;
	 			
	 			for ($j=0; $j < strlen($tmp); $j++) { 
	 				if ($tmp[$j] == '{') {
	 					$bool++;
	 				}elseif ($tmp[$j] == '}') {
	 					$bool--;
	 				}
	 			}

	 			$pos_point = -1;
	 			$pos_virgul = -1;
	 			for ($k=$i+1; $k < strlen($chaine); $k++) { 
	 				if ($chaine[$k] == ',') {
	 					if ($pos_point == -1) {
	 						$pos_point++;
	 						$bool2 = 1;
	 						break;
	 					}
	 				}elseif ($chaine[$k] == ':') {
	 					if ($pos_virgul == -1) {
	 						$pos_virgul++;
	 						$bool2 = 0;
	 						break;
	 					}
	 				}
	 			}
	 			if ($pos_point == -1 && $pos_virgul == -1) {
	 				$bool2 = 1;
	 			}

	 			if ($bool == 0 && $bool2 == 0) {
	 				$tab_tmp_2 = json_decodeur($tmp);
			 		foreach ($tab_tmp_2 as $key => $value) {
			 			$tab_tmp[$key] = $value;
			 		}
	 				$tmp ='';
	 			}else{
	 				$tmp.= $chaine[$i];
	 			}
	 		}else{
	 			$tmp.=$chaine[$i];
	 		}
	 	}

	 	//recuperation de la derniere chaine
	 	if (strlen($tmp) == strlen($chaine)) {
	 		$bool = 0;
 			for ($j=0; $j < strlen($tmp); $j++) { 
 				if ($tmp[$j] == '{') {
 					if($tmp[($j-1)] == ':'){
 						$bool++;
 						break;
 					}
 				}
 			}
 			if ($bool == 0) {
 				$new_tab = explode(':', $tmp);
	 			$tab_tmp[$new_tab[0]] = $new_tab[1];
 			}else{
 				$nom_tmp = '';
 				for ($k=0; $k < strlen($tmp); $k++) { 
 					if ($tmp[$k] == ':') {
 						break;
 					}else{
 						$nom_tmp.=$tmp[$k];
 					}
 				}
 				$newtmpab = array();
 				$chaine_tmp = '';
 				for ($k=strlen($nom_tmp)+1; $k < strlen($tmp); $k++) { 
 					$chaine_tmp.= $tmp[$k];
 				}
 				$tab_tmp[$nom_tmp] = json_decodeur($chaine_tmp);
 			}
	 	}else{
	 		$tab_tmp_2 = json_decodeur($tmp);
	 		foreach ($tab_tmp_2 as $key => $value) {
	 			$tab_tmp[$key] = $value;
	 		}
	 	}
	 	$tab_retour = $tab_tmp;	
		return $tab_retour;
	}
}




if ( ! function_exists('json_encodeur')){
	function json_encodeur($array){
	 	$chaine_retour = '{';
	 	foreach ($array as $key => $value) {
	 		if (is_string($value) || is_int($value) ){
	 			$chaine_retour .= $key.':'.$value.',';
	 		}else{
	 			$chaine_retour .= $key.':'.json_encodeur($value).',';
	 		}
	 	}
	 	$chaine_retour[strlen($chaine_retour)-1] = '}';
		return $chaine_retour;
	 }
}




?>


