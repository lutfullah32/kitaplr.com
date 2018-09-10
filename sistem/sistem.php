<?php
$host ="localhost";
$user="kitaplrc_ana";
$pass="lutfullah.32";
$db="kitaplrc_ana";


//mysql bağlantısı
$vt=mysqli_connect($host,$user,$pass,$db);
$vt->set_charset("utf8");
//türkçe saat ve tarih yazdırma
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_ALL, 'turkish');
session_start();
