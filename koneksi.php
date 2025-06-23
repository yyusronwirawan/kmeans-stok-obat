<?php
	$host = "localhost";
	$user = "sgioffic_user_k-means";
	$pass = "MyyJ_Vczb&94nQ)C";
	$db   = "sgioffic_db_k-means";
	
	$kon = mysql_connect($host,$user,$pass);
	$kondb = mysql_select_db($db, $kon);
	
	// Cuma buat ngetes doank
	/*if($kon){
		echo "Terkoneksi dgn MySQL Server ";
		if($kondb){
		   echo "Database $db bisa diakses";
		}else{
		   echo "Database $db tidak ada";
		}
	}else{
		echo "Gagal Koneksi ";
	}*/
?>