<?php
	require 'vendor/autoload.php';
	require 'credentials.php';
	
	require "classes/connector.php";
	require "classes/searchor.php";
	require "classes/functionor.php";
	
	$datos = array(
		"username" => $email,
		"password" => $password,
		"platform" => $platform,
		"hash" => $hash
	);
	
	$connector = new Connector($datos);
	$con = $connector->Connect();
	
//	echo "NUCLEUS ID: ".$con["nucleusId"];
//
//	echo "<br><br>";
//
//	echo "SID: ".$con["sessionId"];
//
//	echo "<br><br>";
//
//	echo "TOKEN: ".$con["phishingToken"];
//	
	$searcher = new searchor($con["nucleusId"], $con["sessionId"], $con["phishingToken"]);
	$functions = new functionor();
	
	$micr = 0; 		//min bid
	$macr = 600; 	//max bid
	$num = 2; 		//num hits
	$cat = ""; 		//category (not used)
	$playStyle = "";//play style (not used)
	$pos = "any";	//[any, defence, midfield, attacker]
	$team = "";		//team
	$league = "";	//league
	$nation = "";	//nation
	$start = 0;		//the index to start from backend query result
	$lev = "";		//level
	$minb = "";		//min B?
	$maxb = "";		//max B?
	
	$search = $searcher->Playersearch($macr,$micr,$num,$cat,$playStyle,$pos,$team,$league,$nation,$start,$lev,$minb,$maxb);
	
	//$searchJSON = json_encode($search);
	
	foreach ($search["auctionInfo"] as $item) {
		$resId = $item["itemData"]["resourceId"];
		$baseId = $functions->baseID($resId);
		$player = $functions->playerInfo($baseId);
		echo $player;
		echo $baseId;
		echo "\n";
	}
	
?>