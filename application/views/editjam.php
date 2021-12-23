<?php
echo form_open('jam/edit/');
?>

<table border='1'>
    <tr>
        <td>kode_barang</td>
        <td><?php echo form_input('kode_barang',$jam['kode_barang'],"readonly"); ?></td>
    </tr>
    <tr>
        <td>merk</td>
        <td><?php echo form_input('merk',$jam['merk']); ?> </td>
    </tr>
    <tr>
        <td>harga</td>
        <td><?php echo form_input('sewa',$jam['sewa']); ?> </td>
    </tr>
    <tr>
        <td>sewa</td>
        <td><?php echo form_input('harga',$jam['harga']); ?> </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit('submit', 'Update'); ?>
            <?php echo anchor('jam', 'Kembali'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); 
?>