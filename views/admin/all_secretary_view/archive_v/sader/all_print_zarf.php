<?php if(isset($all_print_zarf)&&!empty($all_print_zarf)){
                  $x=1;
                  ?>
              <table id="zarf" class="table  table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>   رقم المعامله</th>
                        <th>    بدايه اللقب</th>
                        <th> اسم الجهه</th>
                        <th> نهايه اللقب</th>
                        <th>  القائم بالاضافه</th>
                        <th>   الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_print_zarf as $row){
                        ?>
                        <tr>
                            <td><?= $x; ?></td>
                            <td><?= $row->mo3mla_id_fk;?></td>
                            <td><?=  $row->start_title;?></td>
                            <td><?=  $row->geha_name;?></td>
                            <td><?=  $row->end_title;?></td>
                            <td><?=  $row->publisher_name;?></td>
                            <td>
                            
                            <a href="#" onclick="delete_print_zarf(<?= $row->id ?>,<?= $row->mo3mla_id_fk ?>);"> <i class="fa fa-trash"> </i></a>
                            <a href="#" onclick="print_zarf(<?= $row->id ?>);"> <i class="fa fa-print"> </i></a>
                            </td>
                        </tr>
                        <?php $x++; }?>
                    </tbody>
                    </table>
<?php }?>
<script>
    $('#zarf').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },
            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );
</script>