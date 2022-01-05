<?php
echo form_open_multipart('jam/create');
?>

<table border='1'>
    <tr>
        <td>kode_barang</td>
        <td><?php echo form_input('kode_barang'); ?> </td>
    </tr>
    <tr>
        <td>merk</td>
        <td><?php echo form_input('merk'); ?> </td>
    </tr>
    <tr>
        <td>harga</td>
        <td><?php echo form_input('harga'); ?> </td>
    </tr>
    <tr>
        <td>sewa</td>
        <td><?php echo form_input('sewa'); ?> </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit('submit', 'Simpan'); ?>
            <?php echo anchor('jam', 'Kembali'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>