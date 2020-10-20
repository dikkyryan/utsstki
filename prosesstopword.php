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

$query2 = "DELETE FROM token where kata IN (SELECT * FROM stopword)";
$result2 = mysqli_query($koneksi,$query2);
$query3 = "SELECT * FROM token";
$result3 = mysqli_query($koneksi,$query3);
$numrows = mysqli_num_rows($result3);
$no=1;
while($row = mysqli_fetch_array($result3)){  
echo "<tr>";

$id3 = $row['id'];
$no3 = $row['no'];
$kode3 = $row['kode']; 
$isi3 = $row['kata'];
$freq3 = $row['freq'];
echo "<td><font color=blue></font>" .  $id3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $no3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $kode3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($isi3) . "<br></td>"; 
echo "<td><font color=blue></font>" .  $freq3 . "<br></td>"; 
echo "</tr>";
$no++;

}

?>