<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>Kata</td>
<td>Frequency</td>
<td>Jumlah Kata</td>
<td>Term Frequency</td>

</tr>
<?php
include "index.php";
include "koneksi.php";

//$query2 = "delete from tokens";
//$result2 = mysqli_query($koneksi,$query2);

$query = "SELECT a.id,a.kata,a.freq,b.jmlkata,(a.freq/b.jmlkata) tf from(SELECT * FROM token) AS a JOIN (SELECT id,SUM(freq) jmlkata FROM token GROUP BY id) AS b ON a.id=b.id";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){  
echo "<tr>";
//echo "<td>$no</td>";
$id1 = $row['id'];
//$no1 = $row['no'];
//$kode1 = $row['kode'];
$kata1 = $row['kata'];
$freq1 = $row['freq'];
$jmlkata1 = $row['jmlkata'];
$tf1 = $row['tf'];
echo "<td><font color=blue></font>" .  $id1 . "<br></td>"; 
//echo "<td><font color=blue></font>" .  $no1 . "<br></td>"; 
//echo "<td><font color=blue></font>" .  $kode1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($kata1) . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($freq1) . "<br></td>"; 
echo "<td><font color=blue></font>" .  $jmlkata1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $tf1 . "<br></td>"; 
echo "</tr>";
$no++;

//$query1 = "insert into tokens values ('$id1','$kode1','$kata1','$freq1')";
//$result1 = mysqli_query($koneksi,$query1);
}

?>