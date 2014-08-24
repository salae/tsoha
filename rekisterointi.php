<?php 
  require_once 'libs/common.php'; 
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  session_start(); 
//  $tayteHenkilo;
//  if(empty($data['henkilo'])){
//    $tayteHenkilo = new Henkilo();
//  } else {
//    $tayteHenkilo = $data['henkilo'];
//}
// 
//naytaNakyma("rekisterointi", array('henkilo'=> $tayteHenkilo));
//  naytaNakyma("rekisterointi");
naytaNakyma("rekisterointi", array('henkilo'=> new Henkilo()));