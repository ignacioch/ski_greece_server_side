<?php

// include 'vendor/composer/autoload_files.php'
require 'vendor/autoload.php';

//include './vendor/dispatch/dispatch/src/dispatch.php';

//set up for propel
Propel::init("./config/build/conf/skigreece-conf.php");
set_include_path("./config/build/classes" . PATH_SEPARATOR . get_include_path());

config([
  'dispatch.url' => '/SkiGreece_201415/backend/livenews/data_backend/',
  'dispatch.router' => 'index.php'
]);


on('GET','/',function(){
	// echo $skicenter->toJSON();
});

prefix('skicenter', function () {

  on('GET', '/_all', function () {
  	//return all skicenters, id, onoma, number of active offer
	$skicenters = SkiCenterQuery::create()->find ();
	$temp = array();
	$result= array();
	// $skicenter = $skicenters->find();
	for($i=0;$i < count($skicenters);$i++){
		$temp['id'] = $skicenters[$i]->getId();
		$temp['name'] = $skicenters[$i]->getName();
		$temp['englishName'] = $skicenters[$i]->getenglishName();
		$temp['open'] = $skicenters[$i]->getOpen();
		$cof = $skicenters[$i]->countOffers();
		if($cof>0){
			$offers = $skicenters[$i]->getOffers();
			$temp2 = array();
			$temp2['url'] = $offers[0]->geturlimage();
			$temp2['comments'] = $offers[0]->getcomments();
			$temp['offers'] = $temp2;
		}
		else{
			$temp['offers'] = '';	
		}
		array_push($result,$temp);
	}
	json_out($result);
  });

  on('GET', '/:id', function() {
  	$id = (int) params('id');
    $skicenter = SkiCenterQuery::create()->findPk($id);
	$temp = $skicenter->toArray();
	$temp['total_lifts'] = $skicenter->countLifts();
	$temp['total_tracks'] = $skicenter ->countTracks();
	$temp['total_cameras'] = $skicenter->countCameras();
	$temp['lifts'] = $skicenter->getLifts()->toArray();
	$temp['tracks'] = $skicenter->getTracks()->toArray();
	$temp['cameras'] = $skicenter->getCameras()->toArray();
	json_out($temp);
  });
});

dispatch();
?>
