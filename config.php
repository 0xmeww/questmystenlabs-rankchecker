<?php 

include 'lastupdate.php';
// Format tanggal dan waktu awal
$datetimeString = lastUpdate();

// Buat objek DateTime dengan format awal dan zona waktu UTC
$datetime = new DateTime($datetimeString, new DateTimeZone('UTC'));

// Tetapkan zona waktu yang diinginkan (GMT+7)
$timezone = new DateTimeZone('Asia/Jakarta');
$datetime->setTimezone($timezone);

// Formatkan tanggal dan waktu dalam format yang diinginkan
$formattedDateTime = $datetime->format('Y-m-d H:i:s');
?>