<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Kata</td>
<td>Kata Dalam Jumlah Dokumen</td>
<td>Jumlah Dokumen</td>
<td>Invers Document Frequency</td>
</tr>
<?php
include "index.php";
include "koneksi.php";

//$query2 = "delete from tokens";
//$result2 = mysqli_query($koneksi,$query2);

$query = "SELECT d.kata,d.katajmldok,e.jmldok,LOG10(e.jmldok/d.katajmldok) idf from (SELECT kata,COUNT(kata) katajmldok FROM token GROUP BY kata) AS d JOIN (SELECT COUNT(id) jmldok FROM (SELECT * FROM token GROUP BY id) AS c) AS e";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){  
echo "<tr>";
$kata1 = $row['kata'];
$katajmldok1 = $row['katajmldok'];
$jmldok1 = $row['jmldok'];
$idf1 = $row['idf'];

echo "<td><font color=blue></font>" .  strtolower($kata1) . "<br></td>"; 
echo "<td><font color=blue></font>" .  $katajmldok1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $jmldok1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $idf1 . "<br></td>"; 
echo "</tr>";
$no++;

//$query1 = "insert into tokens values ('$id1','$kode1','$kata1','$freq1')";
//$result1 = mysqli_query($koneksi,$query1);
}

?>