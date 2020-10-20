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

$query = "SELECT * FROM token";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){  
echo "<tr>";
//echo "<td>$no</td>";

$id1 = $row['id'];
$no1 = $row['no'];
$kode1 = $row['kode'];
$kata1 = $row['kata'];
$freq1 = $row['freq'];

echo "<td><font color=blue></font>" .  $id1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $no1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $kode1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($kata1) . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($freq1) . "<br></td>"; 
echo "</tr>";
$no++;

}
?>