<a href= "http://localhost/RAUF_restapi-master/jam/create">Tambah Data</a>
<table border="1">
    <tr>
        <th>kode_barang</th>
        <th>merk</th>
        <th>harga</th>
        <th>sewa</th>
    </tr>
    <?php
    foreach($jam as $jm1){
        $kode_barang= $jm1['kode_barang'];
        $merk= $jm1['merk'];
        $harga= $jm1['harga'];
        $sewa= $jm1['sewa'];

    echo "<tr>
    <td>$kode_barang</td>
    <td>$merk</td>
    <td>$harga</td>
    <td>$sewa</td>
    <td>
    ". anchor('jam/edit/'.$kode_barang, 'Edit')."
    ". anchor('jam/delete/'.$kode_barang, 'Delete')."
    </td>
    </tr>";  
          
    }
    ?>
</table>