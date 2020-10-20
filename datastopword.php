<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>No</td>
<td>Data Stopword</td>

</tr>
<?php
include "index.php";
include "koneksi.php";

$query = "SELECT * FROM stopword";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){  
echo "<tr>";
echo "<td>$no</td>";
echo "<td><font color=blue></font>" . " $row[stopword] " . "<br></td>"; 
echo "</tr>";
$no++;
//echo "ID: $numrows " . " Token : $row[term] " . " = $row[frequency]<br> ";
}
?>