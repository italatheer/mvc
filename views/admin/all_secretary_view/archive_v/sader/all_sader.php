<?php
if (isset($all_sader) && !empty($all_sader)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <!--<div class="panel-title">
                    <h4><?=$title?></h4>
                </div>-->
            </div>
            <div class="panel-body">
                <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>   رقم الصادر</th>
                        <th>   نوع الصادر</th>
                        <th>تاريخ الارسال</th>
                        <th>وقت الارسال</th>
                        <th>الجهة المرسل اليها</th>
                        <th>عنوان الموضوع</th>
                        <!-- <th>طريقة الارسال</th> -->
                        <th>الاولويه</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_sader as $row){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td>  <span class="label" style="background-color: #32e26b">  <?=$row->year.'/'. $row->emp_depart_code .'/'.$row->sader_rkm?>
                            </span>
                            </td>
                            <td><?php if( $row->sader_type==1){echo 'داخلي';}
                        else if($row->sader_type==2){echo 'خارجي';};?></td>
                            <td><?php if (!empty($row->ersal_date)) {
                                echo  $row->ersal_date;
                                } else{
                                echo 'غير محدد' ;
                                }
                               ?></td>
                               <td><?php if (!empty($row->ersal_time)) {
                                echo  $row->ersal_time;
                                } else{
                                echo 'غير محدد' ;
                                }
                               ?></td>
                            <!-- <td><?php if (!empty($row->geha_ekhtsas_n)) {
                                    echo  $row->geha_ekhtsas_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td> -->
                                 <td><?php if (!empty($row->geha_morsel_n)) {
                                    echo  $row->geha_morsel_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->mawdo3_name)) {
                                    echo  $row->mawdo3_name;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <!-- <td><?php if (!empty($row->tarekt_ersal_n)) {
                                    echo  $row->tarekt_ersal_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td> -->
                            <td><?php if (!empty($row->awlawia_n)) {
                                    echo  $row->awlawia_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td>
                                <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/sader/Add_sader/add_deal/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                    <li> <a onclick="get_print('<?php echo  $row->id?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->sader_rkm?>','<?php echo  $row->morfaq_num?>','<?php echo $row->mawdo3_name?>');"
                                        data-toggle="modal" data-target="#barcodeModal" ><i class="fa fa-print" aria-hidden="true"></i>طباعه الباركود</a></li>
                                              <li> <a href="#" onclick='swal({
                                    title: "هل انت متأكد من التعديل ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-warning",
                                    confirmButtonText: "تعديل",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    window.location="<?php echo base_url(); ?>all_secretary/archive/sader/Add_sader/update_sader/<?php echo $row->id; ?>";
                                    });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a></li>
                               <li> <a href="#" onclick='swal({
                                    title: "هل انت متأكد من الحذف ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "حذف",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    swal("تم الحذف!", "", "success");
                                    window.location="<?php echo base_url(); ?>all_secretary/archive/sader/Add_sader/delete_sader/<?php echo $row->id; ?>";
                                    });'>
                                    <i class="fa fa-trash"> </i>حذف</a></i>
                                    <li>
                                    <a    aria-hidden="true"
                                               data-toggle="modal" 
                                               data-target="#myModal_reason_end<?=$row->id?>"><i class="fa fa-archive"> </i>انهاء للمعامله</a></li>
                                               <li>
                                    <a    aria-hidden="true"
                                               data-toggle="modal" onclick="get_print_zarf(<?=$row->id?>,1)"
                                               data-target="#myModal_print_zarf<?=$row->id?>"><i class="fa fa-print"> </i> طباعه الظرف</a></li>
                  </ul>
                </div> 
                <a onclick="load_details(<?= $row->id?>);"
                                            aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#detailsModal"><i     class="fa fa-search-plus" aria-hidden="true"></i></a>
                            </td>
                        </tr>
<div class="modal fade" id="myModal_reason_end<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> انهاء المعامله </h4>
            </div>
            <div class="modal-body" style="
    height: 171px;
">
            <div class="form-group col-sm-12">    
            <div class="form-group col-md-4 col-sm-6 padding-4" 
                     >
                    <label class="label  "> سبب انهاء المعامله </label>
                    <input type="text" name="reason_name" id="reason_name" value=""
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:80%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#myModal_end').modal('show'); get_reason_end();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" id="reason_id_fk" name="reason_id_fk" value=""/>
                    <button type="button" data-toggle="modal" data-target="#myModal_end" 
                    onclick="get_reason_end();"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-md-4 col-sm-6 padding-4">
                         <label class="label">المسلم  </label>
                         <input type="text" class="form-control"
                        type="text" 
                                   name="from_user_n" id="from_user_n"  
                                   value="">
                     </div>
                <div class="form-group col-md-4 col-sm-6 padding-4">
                         <label class="label">المستلم منه  </label>
                         <input type="text" class="form-control"
                         placeholder=" حدد الموظف م" type="text" style="width: 78%;float: right;"
                                   name="to_user_n" id="to_user_n"  
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "
                                   value="">
                                   <input type="hidden" id="to_user_id" name="to_user_id" value=""/>
                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                     </div>
                     <div class="form-group col-md-4 col-sm-6 padding-4">
                         <label class="label">التاريخ </label>
                         <input type="date" class="form-control"
                        type="text" 
                                   name="date_end" id="date_end"  
                                   value="<?=date('Y-m-d');?>">
                     </div>
                     <div class="form-group col-md-2 col-sm-6 padding-4">
                         <label class="label">رقم القيد الخارجي </label>
                         <input type="number" class="form-control"
                        type="text" 
                                   name="num_end" id="num_end"  
                                   value="">
                     </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="button"
                                class="btn btn-labeled btn-success "  onclick="add_reason(<?= $row->id?>)"
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
            </div>
        </div>
    </div>
</div>



<!-- print_zarf-->
<div class="modal fade" id="myModal_print_zarf<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title">  طباعه الظرف :
                </h4>
            </div>
            <div class="modal-body">
            
                    <div class="col-sm-12 form-group">
                      
                                <div class="col-sm-2  col-md-2 padding-2 ">
                                <input type="hidden" class="form-control" id="mo3mla_id_fk" value="<?= $row->id?>">
                                <input type="hidden" class="form-control" id="mo3mla_type" value="1">
                                <label class="label "> نوع الظرف</label>
                                <select  type="text" name="type_zarf" id="type_zarf"
                                        value=""
                                        class="form-control  "   >
                                    <option value="">اختر</option>
                                    <?php
                                    $type_zarf = array('1'=>'صغير ','2'=>'كبير');
                                    foreach ($type_zarf as $key=>$value){
                                        ?>
                                        <option value="<?= $key?>"
                                        ><?= $value?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="col-sm-2  col-md-2 padding-2 ">
                                    <label class="label   ">  بدايه اللقب </label>
                                    <!-- <input type="text" name="start_title" id="start_title" 
                                           value=""
                                           class="form-control "> -->
                                           <select name="start_title" id="start_title"
                            class="selectpicker no-padding form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($startings)) {
                            foreach ($startings as $greeting) { ?>
                                <option value="<?= $greeting->title_setting ?>"> <?= $greeting->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                                   
                                </div>
                                <div class="col-sm-2  col-md-2 padding-2 ">
                                    <label class="label   ">   اسم الجهه </label>
                                    <input type="text" name="geha_name" id="geha_name" 
                                           value=""
                                           class="form-control ">
                                   
                                </div>
                                <div class="col-sm-2  col-md-2 padding-2 ">
                                    <label class="label   ">  نهايه اللقب </label>
                                    <!-- <input type="text" name="end_title" id="end_title" 
                                           value=""
                                           class="form-control "> -->
                                         
                    <select name="end_title" id="end_title"
                            class="selectpicker no-padding form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($greetings)) {
                            foreach ($greetings as $greeting) { ?>
                                <option value="<?= $greeting->title_setting ?>"> <?= $greeting->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                                   
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4"  style="display: block;">
                                    <button type="button" onclick="add_print_zarf()"
                                            style="margin-top: 27px;"
                                            class="btn btn-labeled btn-warning" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعه
                                    </button>
                                </div>
                                
                        </div>
                    </div>
                        <br>
                        <br>
          
              <div id="print_zarf">
           
               </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
               
               </div>
            </div>
           
       </div>

   </div>
</div>
</div>
<!-- print_Zarf-->
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- new -->
<!-- new -->
<!--  -->
<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel_emp()">
                    <label for="esnad1" class="radio-label"> موظف</label>
                </div>
                <!-- <div class="radio-content">
                    <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                    <label for="esnad2" class="radio-label"> قسم</label>
                </div> -->
                </div>
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="myModal_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> انهاء المعامله :
                </h4>
            </div>
            <div class="modal-body">
            <div id="reason_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input6').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه سبب انهاء المعامله
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input6" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">سبب انهاء المعامله </label>
                                    <input type="text" name="reason_setting" id="reason_setting" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_reason_setting" style="display: block;">
                                    <button type="button" onclick="add_reason_setting($('#reason_setting').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_reason_setting" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_reason_setting">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
            </div>
              <div id="end">
               </div>
             </div>
       </div>
   </div>
</div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- barcodeModal-->
<div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">نموذج الطباعة </h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
                <div class="col-sm-12">
                    <div id="div_print" ></div>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                <!--
                <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
               -->
                <button
                        type="button" onclick="printdiv('printableArea');"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- new -->

<script>
    function get_print(id ,date ,num,morfaq_num,subject){
       // var print_id=id;
      //  var date_export=date;
       // var num_post =num ;
       // var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/PrintCode',
            data:{id:id,date:date,num:num,morfaq_num:morfaq_num,subject:subject},
            dataType: 'html',
            cache:false,
            success: function(html){
                //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>
<script>
  function add_reason_setting(value) {
      $('#div_update_reason_setting').hide();
      $('#div_add_reason_setting').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'reason_setting=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_setting',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#reason_setting').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تمت الاضافه بنجاح!",
      }
      );
      get_reason_end();
              }
          });
      }
  }
</script>
<script>
    function update_reason_setting(id) {
        var id = id;
        $('#geha_input6').show();
        $('#div_add_reason_setting').hide();
        $('#div_update_reason_setting').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_reason_setting",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
                $('#reason_setting').val(obj.title);
            }
        });
        $('#update_reason_setting').on('click', function () {
            var reason_setting = $('#reason_setting').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_reason_setting",
                type: "Post",
                dataType: "html",
                data: {reason_setting: reason_setting,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_setting').val('');
                    $('#div_update_reason_setting').hide();
                    $('#div_add_reason_setting').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
        }
        );
        get_reason_end();    
                }
            });
        });
    }
</script>
<script>
  function delete_reason_setting(id) {
  //  confirm('?? ??? ????? ?? ????? ????? ?');
       var r = confirm('هل انت متاكد من الحذف ?');
  if (r == true) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
              $('#reason_setting').val('');
             // $('#Modal_esdar').modal('hide');
              swal({
                  title: "تم الحذف!",
  }
  );
  get_reason_end();
          }
      });
  }
}
</script>
<script>
    function load_tahwel_emp() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel_emp' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id,name) {
        var checkBox = document.getElementById("myCheck"+id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
 //$('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
        $('#to_user_id').val(id);
        $('#to_user_n').val(name);
        $('#tahwelModal').modal('hide');
    }
</script>
<script>
    function load_details(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>
<script>
  function add_reason(id) {
var id=id;
    var value=$('#reason_id_fk').val();
    var name=$('#reason_name').val();
    var to_user_n=$('#to_user_n').val();
    var to_user_id=$('#to_user_id').val();
    var from_user_n=$('#from_user_n').val();
    var date_end=$('#date_end').val();
    var num_end=$('#num_end').val();
      if (value != 0 && value != '' && name != 0 && name != '' && to_user_n != 0 && to_user_n != '' && from_user_n != 0 && from_user_n && num_end != 0 && num_end  ) {
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_reason_end',
              data: {id:id,value:value,name:name,to_user_n:to_user_n,to_user_id:to_user_id,from_user_n:from_user_n,date_end:date_end,num_end:num_end},
              dataType: 'html',
              cache: false,
              success: function (html) {
                $('#myModal_end').modal('hide');
                  swal({
                      title: "تم انهاء المعامله بنجاح!",
      }
      );
      window.location.reload();
// $('#update_reason').hide();
// $('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",
      }
      );
      }
  }
</script>
<script>
    function getTitle_reason(id,value) {
        $('#reason_id_fk').val(id);
        $('#reason_name').val(value);
        $('#myModal_end').modal('hide');
    }
</script>
<script>
    function get_reason_end() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_reason",
            beforeSend: function () {
                $('#end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#end').html(d);
            }
        });
    }
</script>

<script>
function add_print_zarf()
{
    var mo3mla_id_fk=$('#mo3mla_id_fk').val();
    var mo3mla_type=$('#mo3mla_type').val();
    var type_zarf=$('#type_zarf').val();
    var start_title=$('#start_title').val();
    var geha_name=$('#geha_name').val();
    var end_title=$('#end_title').val();
    if (mo3mla_id_fk != 0 && mo3mla_id_fk != '' && mo3mla_type != 0 && mo3mla_type != '' && type_zarf != 0 && type_zarf != '' && start_title != 0 && start_title && geha_name != 0 && geha_name && end_title != 0 && end_title  ) {
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_print_zarf',
              data: {mo3mla_id_fk:mo3mla_id_fk,mo3mla_type:mo3mla_type,type_zarf:type_zarf,start_title:start_title,geha_name:geha_name,end_title:end_title},
              dataType: 'html',
              cache: false,
              
              success: function (data) {
               
    $('#mo3mla_id_fk').val('');
    $('#mo3mla_type').val('');
    $('#type_zarf').val('');
    $('#start_title').val('');
    $('#geha_name').val('');
    $('#end_title').val('');
    
    get_print_zarf(mo3mla_id_fk,1);
    print_zarf(data);
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",
      }
      );
      }
}
</script>
<script>
    function get_print_zarf(id,type) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{id:id,type:type},
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/get_all_print_zarf",
            beforeSend: function () {
                $('#print_zarf').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#print_zarf').html(d);
            }
        });
    }
</script>
<script>
  
    
        function delete_print_zarf(id,mo3mla_id_fk){
        swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم",
  cancelButtonText: "لا",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/delete_print_zarf',
                data: {id: id},
                dataType: 'html',
                cache: false,
                beforeSend: function()
                {
                    swal({
    title: "جاري الحذف ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {
                    //   alert(html);
                   
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_print_zarf(mo3mla_id_fk,1);

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});
    }
</script>
<script>
    function print_zarf(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'all_secretary/archive/sader/Add_sader/print_zarf'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script> 