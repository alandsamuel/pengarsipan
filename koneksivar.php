<?php

$DBServer = 'localhost';
$DBUser   = 'root';
$DBPass   = ''; 
$DBName   = 'pengarsipan';
$asal_sk0="avatar.jpg";
$css="greenblack.css";//greenblack,gradient,flickr,amazon
$PATH="ypathcss";
$YPATH="ypathfile";

$tittle="Sistem Pengelolaan Administrasi Arsip Direktorat Jenderal Pendidikan Islam Kementrian Agama RI";
$header="Sistem Pengelolaan Administrasi Arsip Direktorat Jenderal Pendidikan Islam Kementrian Agama RI";
$footer="Sistem Pengelolaan Administrasi Arsip Direktorat Jenderal Pendidikan Islam Kementrian Agama RI";

$tbadmin="tb_admin";
$tbpegawai="tb_pegawai";
$tbbagian="tb_bagian";
$tbsurat="tb_surat";
$tbsuratmasuk = $tbsurat;
$tbsuratkeluar = $tbsurat;
$tbstatistik="statistik";
$databulan = array('Januari' => '01', 'Februari' => '02', 'Maret' => '03', 'April' => '04', 'Mei' => '05', 'Juni' => '06', 'Juli' => '07', 'Agustus' => '08', 'September' => '09', 'Oktober' => '10', 'November' => '11', 'Desember' => '12');
$dir = array('MENTRI AGAMA' => 'MENAG', 'DIREKTUR DIKTIS' => 'DIKTIS', 'DIREKTUR DITPENMAD' => 'DITPENMAD', 'DIRJEN' => 'DIRJEN', 'SEKRETARIS DITJEN PENDIS' => 'PENDIS', 'DIREKTUR DITPONTREN' => 'DITPONTREN', 'DIREKTUR DITPAIS' => 'DITPAIS');
$png = array('TU. SEDITJEN' => 'SEDITJEN', 'TU. DIKTIS' => 'DIKTIS', 'TU. DITPAIS' => 'DITPAIS', 'TU. DITPKPONTREN' => 'DITPKPONTREN', 'TU. DITPENMAD' => 'DITPENMAD', 'BAG I' => 'BAGI', 'BAG II' => 'BAGII', 'BAG III' => 'BAGII', 'BAG IV' => 'BAGIV', 'DIRJEN' => 'DIRJEN', 'SEKRETARIS DITJEN PENDIS' => 'PENDIS');
$dt = date('Y');
$sft = array('Biasa' => 'biasa', 'Penting' => 'penting', 'Rahasia' => 'rahasia', 'Segera' => 'segera', 'Sangat Rahasia' =>'sangatrahasia');
$kls = array('HJ : Haji' => 'hj', 'HK : Hukum' => 'hk', 'HM : Kehumasan' => 'hm', 'KP : Kepegawaian' => 'kp', 'KS : Keserikatan' => 'ks', 'KU : Keuangan' => 'ku', 'OT : Organisasi dan Tatalaksana' => 'ot', 'BA : Pembinaan Agama' => 'ba', 'PP : Pendidikan dan Pengajaran' => 'pp', 'TL : Penelitian' => 'tl', 'PS : Pengawasan' => 'ps', 'PW : Perkawinan' => 'pw');
?>