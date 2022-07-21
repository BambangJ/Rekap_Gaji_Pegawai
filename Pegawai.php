<center>
<font size=7>
Rekap Gaji Pegawai P.T UNIKOM MART<br>
10121030-BAMBANG JAYASANTIKA<br>
<hr>
<table border=5>
<tr bgcolor=silver><td width=50><center>No<td> <center>NIP 
<td><center>NAMA PEGAWAI<td><center>BAGIAN<td><center>GAJI POKOK<td><center>ANAK<td><center>TUNJ_ANAK<td><center>PENDIDIKAN
<td><center>TUNJ_PENDIDIKAN<td><center>MASUK_KERJA<td><center>LAMA KERJA<td><center>TUNJ_KERJA<td><center>TUNJ_GAJI TOTAL
<?php
$conn=mysqli_connect("localhost","root","","if1");
$sql="select pegawai.nip, pegawai.nama, pegawai.bagian, bagian.gaji_pokok, pegawai.anak, bagian.tunj_anak, pegawai.pendidikan, pendidikan.tunj_pendidikan ,pegawai.masuk from pegawai,pendidikan,bagian where pegawai.bagian = bagian.nama_bagian and pegawai.pendidikan = pendidikan.jenjang";
$hasil=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($hasil);
$n=1;

do
{
list($NIP,$NAMA,$BAGIAN,$GAJIPOKOK,$ANAK,$TUNJ_ANAK,$PENDIDIKAN,$TUNJ_PENDIDIKAN,$MASUK)=$row;
$lk = 2022 - $MASUK ;
$TUNJ_KER = $lk * 500000;
$TUNJ_ANAK2 = $TUNJ_ANAK / 100 * ($GAJIPOKOK * $ANAK);
$Total =$TUNJ_ANAK2 + $TUNJ_KER + $TUNJ_KER;
echo "<tr><td>$n<td>$NIP<td>$NAMA<td>$BAGIAN<td>$GAJIPOKOK<td>$ANAK<td>($TUNJ_ANAK%)$TUNJ_ANAK2<td>$PENDIDIKAN<td>$TUNJ_PENDIDIKAN<td>$MASUK<td>$lk<td>$TUNJ_KER<td>$Total";
$n++;
}
while($row=mysqli_fetch_row($hasil));
