<?php
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan-excel.xlsx"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

?>
<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN TRANSAKSI PENJUALAN</p>

<table border="1" align="center" style="width:100%">
<tr>
        <th rowspan="2" width="50">No</th>
        <th colspan="5">tes</th>
</tr>
    <tr>
        <td>Tanggal</td>
        <td>Nama Barang</td>
        <td>Jumlah</td>
        <td>Harga</td>
        <td>Total</td>
</tr>
<tr>
    <td align="center">1</td>
    <td align="center">2021-11-01</td>
    <td>LCD Monitor </td>
    <td align="center">2</td>
    <td align="right">2.500.000</td>
    <td align="right">5.000.000</td>
</tr>
<tr>
    <td align="center">2</td>
    <td align="center">2021-11-02</td>
    <td>Mouse </td>
    <td align="center">3</td>
    <td align="right">150.000</td>
    <td align="right">450.000</td>
</tr>
<tr>
    <td align="center">3</td>
    <td align="center">2021-11-05</td>
    <td>Keyboard </td>
    <td align="center">1</td>
    <td align="right">175.000</td>
    <td align="right">175.000</td>
</tr>
</table>





