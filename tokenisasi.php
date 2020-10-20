<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>No</td>
<td>Kode</td>
<td>Kata</td>
<td>Frek</td>

</tr>
<?php
include "index.php";
include "koneksi.php";

$query3 = "DELETE FROM token";
$result3 = mysqli_query($koneksi,$query3);

$query = "select id, isi from berita order by id";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result)){  
echo "<tr>";

$id1 = $row['id'];
$text1 = $row['isi'];

$string = $text1;
$str = strtolower(preg_replace("/[^a-zA-Z]+/"," ",$string));
  
$jml = str_word_count($str);
$terms = str_word_count($str,1);
$frek = array_count_values($terms);

$no=1;
foreach ($terms as $key => $val){
$insert = "insert into token values ('$id1','$no','0','$val','1');";
$insert_query = mysqli_query($koneksi,$insert);	
$no++;
}
}

$query2 = "SELECT * FROM token";
$result2 = mysqli_query($koneksi,$query2);
$no=1;
while($row = mysqli_fetch_array($result2)){  
echo "<tr>";
$id3 = $row['id'];
$no3 = $row['no'];
$kode3 = $row['kode'];
$kata3 = $row['kata'];
$frek3 = $row['freq'];
echo "<td><font color=blue></font>" .  $id3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $no3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $kode3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $kata3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $frek3 . "<br></td>"; 
echo "</tr>";
$no++;
}
?>