<style>
    .specific_style{

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2{
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }
</style>

<?php
  if($this->input->post('status') ==1) {
      if (isset($records) && !empty($records)) {
          ?>
          <table id="" class="table table-bordered example" role="table" style="table-layout: fixed;">
              <thead>
              <tr class="info">
                  <th width="10%">م</th>
                  <th class="text-left">رقم الحساب</th>
                  <th class="text-left">إسم الحساب</th>
                  <th class="text-left">الإيرادات</th>
                  <th class="text-left">المصروفات</th>


              </tr>
              </thead>
              <tbody>
              <?php

              if (isset($records) && $records != null) {
                  $x = 1;
                  $total_erad_value = 0;
                  $total_masrofat_value = 0;
                  foreach ($records as $value) {
                      $total_erad_value += $value->total_erad;
                      $total_masrofat_value += $value->total_masrofat;
                      ?>
                      <tr>
                          <td><?= $x++ ?></td>
                          <td><?= $value->code ?></td>
                          <td><?= $value->name ?></td>
                          <td><?= $value->total_erad ?></td>
                          <td><?= $value->total_masrofat ?></td>

                      </tr>
                      <?php
                  }
              }
              ?>
              </tbody>
          </table>


          <div class="text-center">
              <table class="table table-bordereds  " style="width: 50%; margin: auto;">
                  <tbody>
                  <tr>
                      <td class="specific_style" style="width: 280px;"> إجمالي المصروفات</td>
                      <td class="specific_style_2" style="width: 280px;"><?php echo $total_erad_value; ?></td>

                  </tr>
                  <?php $titles = '';
                  $values = 0;

                  if ($total_masrofat_value > $total_erad_value) {
                      $titles = 'العجز';
                      $values = ($total_erad_value - $total_masrofat_value);

                  }elseif($total_erad_value > $total_masrofat_value) {

                      $titles = 'الفائض';
                      $values = ($total_masrofat_value-$total_erad_value );

                  } ?>
                  <tr>
                      <td class="specific_style" style="width: 280px;">إجمالي الإيرادات</td>
                      <td class="specific_style_2" style="width: 280px;"><?php echo $total_masrofat_value; ?></td>
                  </tr>
                  <tr>
                      <td class="specific_style" style="width: 280px;"><?php echo $titles; ?></td>
                      <td class="specific_style_2" style="width: 280px;"><?php echo $values; ?></td>
                  </tr>


                  </tbody>
              </table>
          </div>


          <?php
      } else {

          ?>
          <div class="alert alert-danger ">لا يوجد نتيجة للبحث</div>
          <?php
      }
  }
?>







<script>



      $('.example').DataTable({
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










