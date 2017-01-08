<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>Sinema Rezervasyon Sistemi</title>
</head>
<link href="css.css" rel="stylesheet" type="text/css" />
<form action="index.php" method="post">
<body>
<table border="1" align="center">
<tr>
<tr> <div align="center">Lutfen Koltugunuzu Seciniz<div valign="bottom" align="center">Mavi koltuklar rezerve edilmis koltuklardir.</div></div>
<div align="right"><a href="admin">Admin Paneli</a></div>
<?php
include("baglan.php");
if(isset($_POST['btn3'])){
if($_POST['btn3']=='Rezerve Et'){
$sorgu="INSERT INTO onayli(koltuk,ad) VALUES('$_POST[btnad]','$_POST[ad]')";
mysql_query($sorgu,$baglan);
}
}
$dizi=array("Z20");
$sorgu1="SELECT koltuk FROM onayli";
$giden1=mysql_query($sorgu1,$baglan);
$sq=0;
while($gelen1=mysql_fetch_array($giden1)){
$dizi[$sq]=$gelen1[0];
$sq++;
}
for($i=0;$i<=99;$i++){
if($i%10==0){
$k=chr(round($i/10)+65);
echo "<tr><td bgcolor=\"orange\">".$k;
}
$j=($i%10)+1;
foreach($dizi as $deger){
if($deger=="$k$j"){
$each=1;
break;
}
else{
$each=0;
}
}
if($each==1){
echo "<td bgcolor=\"grey\"><input type=\"submit\" disabled=\"false\" class=\"awesome2\" name=\"btn\" value=\"$k$j\" /></td>";
}
else{
echo "<td bgcolor=\"grey\"><input type=\"submit\" class=\"awesome\" name=\"btn\" value=\"$k$j\" /></td>";
}
}

?>
</td>
</tr>
</table>
<div align="center">
<?php
if(isset($_POST['btn3'])){
if($_POST['btn3']=='Rezerve Et'){
echo "<h3>İslem Basariyla Tamamlandi.";
echo "<br>Lutfen satin almak icin admin ile iletisime gecin <br>Aksi takdirde rezervasyon iptal edilecektir.";
}}
if(isset($_POST['btn2'])){
if($_POST['btn2']=='EVET'){
echo "<div align=\"center\"><h4><br>Koltuk başarıyla rezerve edildi.</h4></div>";
echo "Lutfen islemi tamamlamak icin bilgilerinizi giriniz.<br>";
echo "Ad Soyad:<input type=\"text\" name=\"ad\">";
echo "<br>Koltuk No:". $_POST['btnad'];
$btnad=$_POST['btnad'];
echo "<input type=\"hidden\" name=\"btnad\" value=\"$btnad\">";
echo "<br><input type=\"submit\" name=\"btn3\" value=\"Rezerve Et\" ><input type=\"submit\" name=\"btn3\" value=\"İptal\" >";
}
if($_POST['btn2']=='HAYIR'){
echo "<br><div align=\"center\"><h4>Koltuk rezerve edilmedi.</h4></div>";
}
}
if(isset($_POST['btn'])){
$btnad=$_POST['btn'];
echo "<div align=\"center\"<br><h4>".$_POST['btn']." numarali koltugu sectiniz. Rezerve etmek istiyor musunuz?</h4></div>";
echo '<br><div align="center"> <input type="submit" name="btn2" value="EVET"> <input type="submit" name="btn2" value="HAYIR"></div>';
echo "<input type=\"hidden\" name=\"btnad\" value=\"$btnad\">";
}
?>
</div>
<br><br><br> 
</body>
</form>
</html>
