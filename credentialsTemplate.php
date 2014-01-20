<?php
	require "classes/eahashor.php";

	$eaHasher = new EAHashor();

	$email = "youremailhere";
	$password = "yourpasswordhere";
	$platform = "yourplatformhere"; // 360, pc, ps3
	$hash = $eaHasher->eaEncode("yoursecretanswerhere")  // answer in hash
?>