<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>Kata</td>
<td>Term Frequency</td>
<td>Invers Document Frequency</td>
<td>TF.IDF</td>

</tr>
<?php
include "index.php";
include "koneksi.php";

//$query2 = "delete from tokens";
//$result2 = mysqli_query($koneksi,$query2);

$query = "SELECT f.id,f.kata,f.tf,g.idf,f.tf*g.idf tf_idf FROM (SELECT a.id,a.kata,a.freq,b.jmlkata,(a.freq/b.jmlkata) tf from (SELECT * FROM token) AS a JOIN (SELECT id,SUM(freq) jmlkata FROM token GROUP BY id) AS b ON a.id=b.id) AS f JOIN (SELECT d.kata,d.katajmldok,e.jmldok,LOG10(e.jmldok/d.katajmldok) idf from (SELECT kata,COUNT(kata) katajmldok FROM token GROUP BY kata) AS d JOIN (SELECT COUNT(id) jmldok FROM (SELECT * FROM token GROUP BY id) AS c) AS e) AS g ON f.kata=g.kata";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){  
echo "<tr>";
//echo "<td>$no</td>";
$id1 = $row['id'];
$kata1 = $row['kata'];
$tf1 = $row['tf'];
$idf1 = $row['idf'];
$token1 = $row['tf_idf'];

echo "<td><font color=blue></font>" .  $id1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($kata1) . "<br></td>"; 
echo "<td><font color=blue></font>" .  $tf1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $idf1 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $token1 . "<br></td>"; 
echo "</tr>";
$no++;

//$query1 = "insert into tokens values ('$id1','$kode1','$kata1','$freq1')";
//$result1 = mysqli_query($koneksi,$query1);
}

?>