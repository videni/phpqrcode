<?php

	include('../lib/full/qrlib.php');

	// how to save PNG codes to server
	
	$tempDir = dirname(__FILE__).'/temp/';
	
	$codeContents = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a';
	
	// generating
	QRcode::png($codeContents, $tempDir.'006_L.png', QR_ECLEVEL_L);
	QRcode::png($codeContents, $tempDir.'006_M.png', QR_ECLEVEL_M);
	QRcode::png($codeContents, $tempDir.'006_Q.png', QR_ECLEVEL_Q);
	QRcode::png($codeContents, $tempDir.'006_H.png', QR_ECLEVEL_H);
		
	// end displaying
	echo '<img src="temp/006_L.png" />';
	echo '<img src="temp/006_M.png" />';
	echo '<img src="temp/006_Q.png" />';
	echo '<img src="temp/006_H.png" />';
	