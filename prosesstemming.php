<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>No</td>
<td>Kode</td>
<td>Kata</td>
<td>Freq</td>

</tr>
<?php
include "index.php";
include "koneksi.php";

// demo.php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

$query = "SELECT * FROM token";
$result = mysqli_query($koneksi,$query);
while($row = mysqli_fetch_array($result)){  
    $names[] = $row['kata']; 
} 

// stem
$sentence = implode(" ", $names); 
$output = $stemmer->stem($sentence);

$lines = preg_split("/[\s]+/", $output);
$baris = preg_split("/[\s]+/", $sentence);

foreach ($baris as $index => $value)
{
    //echo $baris[$index] . " " . $lines[$index];
/*	echo "<tr>";
	echo "<td>$no</td>";
	echo "<td><font color=blue></font>" . " $baris[$index] " . "<br></td>"; 
	echo "<td><font color=blue></font>" . " $lines[$index] " . "<br></td>"; 
	echo "</tr>";*/
	$query = "UPDATE token SET kata='$lines[$index]' WHERE kata='$baris[$index]'";
	$result = mysqli_query($koneksi,$query);
}

$query = "SELECT * FROM token";
$result = mysqli_query($koneksi,$query);
$no=1;
while($row = mysqli_fetch_array($result)){  
$id1 = $row['id'];
$no1 = $row['no'];
$kode1 = $row['kode'];
$kata1 = $row['kata'];
$freq1 = $row['freq'];
echo "<td><font color=blue></font>" . " $row[id] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[no] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[kode] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[kata] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[freq] " . "<br></td>"; 
echo "</tr>";
$no++;
}
?>