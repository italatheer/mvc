<?php

//echo "<pre>";
//print_r($rows);
//return;

?>


<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(isset($rows)&& !empty($rows)){
                //  echo "<pre>";
                    //print_r($rows[0]->details[0]->no3_elsdad);
                $action=base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/update_db/'.$rows[0]->t_rkm.'/'.$rows[0]->id ;
                $rkm=$rows[0]->t_rkm ;
                $total=$rows[0]->total_value;
                $total_ar=$total_ar;
                $t_date=$rows[0]->t_date_ar;
                $to_geha_name=$rows[0]->to_geha_name;

                $to_geha_id_fk=$rows[0]->to_geha_id_fk;
                $mawdo3=$rows[0]->mawdo3;
//yara

$no3_elsdad=$rows[0]->details[0]->no3_elsdad;
            }else{
                $action=base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora_db';
                $rkm=$last_rkm ;
                $total=0;
                $total_ar='';
                $t_date=date("Y-m-d");
                $to_geha_id_fk='';
                $to_geha_name='';
                $mawdo3='';
                //yara
                $no3_elsdad='';

            }
            ?>
            <form action="<?php echo $action ; ?>" method="post">
            <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
             <label> رقم الطلب </label>
                <input type="text" readonly=""   name="t_rkm" id="t_rkm"
                       value="<?=$rkm?>" data-validation="required"
                       onkeypress="validate_number(event);"
                       class="form-control bottom-input"
                       onkeypress="validate_number(event);"
                       data-validation-has-keyup-event="true">
            </div>
            <!-- YARA -->
            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label>نوع السداد  </label>
                    <select name="no3_elsdad" id="no3_elsdad" value=<?php if($no3_elsdad==1){echo 'مدفوعات حكوميه';}elseif($no3_elsdad==2){echo 'سداد فواتير';}?>
                            class="form-control" style="    width: 190px;
    height: 33px;"
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="<?= $no3_elsdad?>"><?php if($no3_elsdad==1){echo 'مدفوعات حكوميه';}elseif($no3_elsdad==2){echo 'سداد فواتير';}else{echo 'اختر';}?></option>
                       
                                <option  value="1" >مدفوعات حكوميه</option>
                                <option  value="2"> سداد فواتير</option>
                                   

                                   
                           
                       
                    </select>
                </div>
<!-- yara -->
                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label>التاريخ </label>
                    <input type="date"   name="t_date" id="t_date"
                           value="<?= $t_date ?>" data-validation="required"
                           class="form-control bottom-input"
                           onkeypress="validate_number(event);"
                           data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                    <label>بدايه اللقب </label>
                    <select name="start_laqb" id="start_laqb"
                            class="form-control"
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($titles)) {
                            foreach ($titles as $title) { ?>
                                <option data-title="<?= $title->title_setting ?>" value="<?= $title->id_setting ?>"
                                    <?php if(isset($rows[0]->start_laqb) && !empty($rows[0]->start_laqb)){ //$to_geha_id_fk
                                        if($title->id_setting==$rows[0]->start_laqb)
                                        {
                                            echo 'selected';
                                        }
                                    }
                                    ?>

                                > <?= $title->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4 " style="">
                    <label class="label"> الجهه </label>
                    <input type="hidden" value="<?=$to_geha_id_fk?>"  class="" name="to_geha_id_fk" id="to_geha_id_fk"/>

                    <input type="text"  data-validation="required"   class="to_geha_name2" data-validation="required" name="" id="to_geha_name" readonly value="<?=$to_geha_name?>"
                           class="form-control input-style" style="width: 80%;float: right">
                    <button type="button" onclick="" data-toggle="modal"
                            data-target="#to_geha" class="btn btn-success btn-next"
                            style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>

<!--                    </select>-->

                <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
                    <label>نهايه اللقب </label>
                    <select name="end_laqb" id="end_laqb"
                            class=" form-control   "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($greetings)) {
                            foreach ($greetings as $greeting) { ?>
                                <option data-title="<?= $greeting->title_setting ?>"
                                        value="<?= $greeting->id_setting ?>"
                                    <?php if(isset($rows[0]->end_laqb) && !empty($rows[0]->end_laqb)){
                                        if($greeting->id_setting==$rows[0]->end_laqb)
                                        {
                                            echo 'selected';
                                        }
                                    }
                                    ?>


                                > <?= $greeting->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                    <label> الموضوع</label>
                    <input type="text"   name="mawdo3" id="mawdo3"
                           value="<?= $mawdo3 ?>"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true">
                </div>
                <?php if(isset($rows) && !empty($rows)){?>
                <div class="col-md-12">

                    <div class="col-xs-11 col-xs-offset-1">
                        <h3 style="font-weight: bold;    margin-top: 10px;"><?php echo $rows[0]->start_laqb_name;?>/<?php echo $rows[0]->to_geha_name;?><span style="float: left;"><?php echo $rows[0]->end_laqb_name;?> </span> </h3>

                    </div>
                    <div class="col-xs-12 form-group">

                        <textarea class="form-control ckeditor2" name="salam"> <?php echo $rows[0]->salam;?> </textarea>
                    </div>
                    <div class="col-xs-12 form-group">
                        <textarea class="form-control ckeditor2" name="debaga"> <?php echo $rows[0]->debaga;?> </textarea>

                        <h5> </h5>
                    </div>
                    
                    
                    
                    
                    
                </div>
                <?php } ?>


                <div class="col-md-12">
               <br>
                <table class="table table-striped table-bordered"   style="" id="mytable">
                    <thead>
                    <tr class="info">
                        <th>المبلغ </th>
                        <th>التاريخ </th>
                        <th>الجهه </th>

                        <th>رقم الفاتوره</th>
                        <th>البيان</th>
                        <th>مركز التكلفه</th>
                        <th>الاجراء </th>
                    </tr>
                    </thead>
                    <tbody id="resultTable">
                    <?php if(isset($rows[0]->details) && !empty($rows[0]->details)){
                        $y=1;
                        foreach ($rows[0]->details as $row){

                        ?>
                            <tr id="<?=$y?>">

                                <td><input type="text" data-validation="required" onkeyup="put_total();"   onkeypress="validate_number(event);" value="<?php echo $row->f_value;?>" class="form-control valu f_value"  name="f_value[]"></td>
                                <td><input type="date" data-validation="required" name="date[]" style="width: 150px;" class="form-control date" value="<?php echo $row->date_ar;?>"/> </td>
                                <td>
                                    <input type="hidden" value="<?php echo $row->f_geha_id_fk;?>" name="f_geha_id_fk[]" class="f_geha_id_fk" id="geha_id_fk1"/>

                                    <input type="text"  value=" <?php echo $row->f_geha_name ;?>" data-validation="required" name="f_geha_name[]" id="geha_name1" readonly value=""
                                           class="form-control input-style f_geha_name" style="width: 80%;float: right">
                                    <button type="button" onclick="get_len();" data-toggle="modal"
                                            data-target="#myModalInfo" class="btn btn-success btn-next"
                                            style="float: right;">
                                        <i class="fa fa-plus"></i></button></td>
                                <td> <input type="text" value="<?php echo $row->rkm_fatora;?>" onkeypress="validate_number(event);" name="rkm_fatora[]"  class="form-control rkm_fatora"/> </td>
                                <td><input type="text " value="<?php echo $row->byan;?>" class="form-control byan" name="byan[]"></td>
                                <td>
                                    <select name="f_markz_taklfa_id_fk[]" id="markz"
                                            class="form-control f_markz_taklfa_id_fk"
                                            data-show-subtext="true" data-validation="required" data-live-search="true" aria-required="true">


                                        <option value="">اختر</option>
                                        <?php
                                        if(isset($markz)&& !empty($markz)){
                                            foreach ($markz as $markz2){

                                        ?>
                                        <option value="<?=$markz2->id_setting?>" <?php if(isset($row->f_markz_taklfa_id_fk) && !empty($row->f_markz_taklfa_id_fk)){
                                            if($markz2->id_setting==$row->f_markz_taklfa_id_fk)
                                            {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?=$markz2->title_setting?></option>
                                        <?php } } ?>
                                    </select>

                                </td>

                                <td>        <a href="#" <?php if($y!=1){?> onclick="$('#<?php echo $y ;?>').remove();

                        put_total();" <?php } ?> >
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a title="عرض المرفق" href="#" onclick="put_val_id(<?=$row->id ?>);" data-toggle="modal" data-target="#myModal_attach"> <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>
                                        </td>
                            </tr>

                    <?php $y++;  } } else { ?>
                    <tr id="1">
                        <td><input type="text" data-validation="required" onkeyup="put_total();"   onkeypress="validate_number(event);" class="form-control valu f_value" value="" name="f_value[]"></td>
                        <td><input type="date" data-validation="required" name="date[]" style="width: 150px;" class="form-control date" value="<?php echo date("Y-m-d");?>"/> </td>
                        <td>
                            <input type="hidden" value=""  class="f_geha_id_fk" name="f_geha_id_fk[]" id="geha_id_fk1"/>

                            <input type="text"  data-validation="required"  class="f_geha_name" data-validation="required" name="f_geha_name[]" id="geha_name1" readonly value=""
                                   class="form-control input-style" style="width: 80%;float: right">
                            <button type="button" onclick="get_len();" data-toggle="modal"
                                    data-target="#myModalInfo" class="btn btn-success btn-next"
                                    style="float: right;">
                                <i class="fa fa-plus"></i></button></td>

                        <td> <input type="text" onkeypress="validate_number(event);" name="rkm_fatora[]"  class="form-control rkm_fatora"/> </td>
                        <td><input type="text" name="byan[]" class="form-control byan"/></td>
                        <td>
                            <select name="f_markz_taklfa_id_fk[]" id="markz"
                                    class="form-control  f_markz_taklfa_id_fk"
                                    data-show-subtext="true" data-validation="required" data-live-search="true" aria-required="true">
                                <option value="">اختر</option>
                                <?php
                                if(isset($markz)&& !empty($markz)){
                                    foreach ($markz as $markz){

                                        ?>
                                        <option value="<?=$markz->id_setting?>"><?=$markz->title_setting?></option>
                                    <?php } } ?>
                            </select>

                           </td>

                        <td>        <a href="#" onclick="">


                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                
                                <a title="عرض المرفق" href="#" onclick="put_val_id( <?=$rkm?>);" data-toggle="modal" data-target="#myModal_attach"> <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>
                                </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td> <span style="color:red;" id="total"><?php echo $total;?></span> </td>
                        <td colspan="5">مبلغا وقدره:-<span id="total_arabic" style="color:red;"><?php echo $total_ar;?></span></td>
                        <td> <button type="button" onclick="add_row()"
                                     class="btn btn-success btn-next"/><i class="fa fa-plus"></i>  </button></td>

                    </tr>
                    </tfoot>
                    <input type="hidden" value="<?php echo $total;?>" name="total_value" id="total_value"/>
                    <input type="hidden" value="" name="" id="total_value_arabic"/>
                </table>
                
            <div class="col-xs-12 form-group">
                        <textarea class="form-control ckeditor2" name="t_foot"> <?php if(isset($rows)) {echo $rows[0]->t_foot;}else{ echo 'نأمل التكرم لمن يلزمه الامر بعمل اللازم';}?> </textarea>

                        <h5> </h5>
                    </div>
            </div>

<div class="col-md-6 text-center">
    <button type="submit" name="insert"  class="btn btn-labeled btn-success "> <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
    
<?php if(isset($rows) && !empty($rows)){?>
    <button type="button" onclick="put_val_id(<?=$rows[0]->id ?>);"  class="btn btn-labeled btn-inverse " id="attach_button"  data-toggle="modal" data-target="#myModal_attach">
        <span class="btn-label"><i class="glyphicon glyphicon-cloud-upload"></i></span>
        اضافة مرفق
    </button>
    <?php }else{?>
    <button type="button"  onclick="func_show()" data-toggle="modal" data-target="" name="insert"  class="btn btn-labeled btn-primary "> <span class="btn-label"><i class="fa fa-eye"> </i></span>عرض</button>

<?php } ?>

</div>


            </form>







<?php if(isset($records)&& !empty($records)){?>

            <table class="table-bordered table table-responsive example">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>رقم الطلب </th>
                    <th>اجمالي المبلغ</th>
                    <th> عدد الفواتير</th>
                    <th>الجهه الموجه اليها</th>
                    <th>  القائم بالاضافه</th>


                    <th>الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $key=1;
                foreach ($records as $row) {
                    ?>
                    <tr>
                        <td  scope="row" > <?= $key ?></td>
                        <td><?=$row->t_rkm ?></td>
                        <td><?=$row->total_value ?></td>
                        <td><?=$row->num_fators ?></td>
                        <td><?=$row->to_geha_name ?></td>

                        <td><?=$row->publisher_name ?></td>

                        <td>
                            <a title="عرض المرفق" href="#" onclick="put_val_id(<?=$row->id ?>);" data-toggle="modal" data-target="#myModal_attach"> <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>

                            <a href="#modal_details"  data-toggle="modal"  onclick="get_fatora_details(<?php echo $row->t_rkm;?>)"> <i class="fa fa-eye"> </i></a>


                            <a onclick="alert('هل انت متأكد من حذف ؟!!')"
                               href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/delete_by_rkm/' . base64_encode($row->t_rkm) ?>">
                                <i class="fa fa-trash"></i></a>
                            <a href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/update_fatora/' . base64_encode($row->t_rkm) ?>">
                                <i class="fa fa-pencil"></i></a>


                        </td>
                    </tr>
                <?php $key++ ;  } ?>
                </tbody>
            </table>
            <?php } ?>



        </div>
        </div>

    </div>
    
<!---------------------------------------------- المرفقات--------------------------------------------------------------->

<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>
            <div class="modal-body">

                <div class="AttachTable">

<form action="<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/add_fatora_attach" method="post" enctype="multipart/form-data"/>
                    <input type="hidden" id="row_id" name="row_id">
                    <table class="table table-striped table-bordered fixed-table mytable" id="attachTable">

                        <thead>
                        <tr class="info">
                            <th class="text-center"> إسم المرفق</th>
                            <th class="text-center">المرفق</th>
                            <th class="text-center"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="attachTable">
                        <?php if (!empty($result->attaches)) { ?>
                            <?php $x = 1;
                          foreach ($result->attaches as $row_img) { ?>
                                       <?php if(($row_img!=NULL)){?>
                                <tr class="<?= $x ?>">
                                    <td><input type="input" name="title[]" readonly id="title"
                                               value="<?php if (isset( $row_img->title )){ echo $row_img->title; }?>" class="form-control  "
                                               data-validation="reuqired"></td>
                                    <td>
                      
                                    <img id="img_view<?= $x ?>"
                                             src="<?php echo base_url() . 'uploads/images/finance_accounting/box/quods/' . $row_img->file_attached ?>"
                                             width="150px" height="150px"/>
                                   
                                             </td>
                                    <td>

                                        <a onclick="$('#adele').attr('href', '<?php echo base_url() . 'finance_accounting/box/quods/Quods/deleteQuodImg/' . $row_img->id . '/' . $row_img->qued_rkm_fk ?>');"
                                           data-toggle="modal" data-target="#modal-delete" title="حذف"><i
                                                    class="fa fa-trash"></i></a>


                                        <!--              <a href="<?php /*echo  base_url().'finance_accounting/box/quods/Quods/deleteQuodImg/'.$row_img->id.'/'.$row_img->qued_rkm_fk*/ ?>"  onclick="DeleteRowImg('<? /*=$x*/ ?>')"> <i class="fa fa-trash" ></i> </a></td>-->
    </tr>
<?php $x++;
}}
}else{?>

                            <tr>
                                <td><input type="input" name="title[]" id="title"  class="form-control  " data-validation="reuqired"></td>
                                <td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td>
                                <td> <a   onclick="DeleteRowImg(' + len + ')"> <i class="fa fa-trash" ></i> </a></td>
                            </tr>


                        <?php } ?>
</tbody>
                        <tfoot>

                        <tr>
                            <td colspan="2"></td>
                            <td> <button type="button" onclick="add_row_attach()"
                                         class="btn btn-success btn-next"/><i class="fa fa-plus"></i>  </button></td>
                        </tr>
                        </tfoot>
</table>
                    <button type="submit" class="btn btn-success save"  style="display: none;padding: 6px 12px;"
                            onclick=""
                             >حفظ
                    </button>
                    </form>
</div>
</div>
<div class="modal-footer" style="display: inline-block;width: 100%">
    <!--<input type="hidden" name="id" id="id" >-->

    <button type="button" class="btn btn-danger"
            data-dismiss="modal">إغلاق
    </button>

</div>
</div>
</div>
</div>
<div class="col-md-12 " id="AttachTableDiv"></div>
<!---------------------------------------------- start_modal _ details--------------------------------------------------------------->
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل الفاتوره</h4>
            </div>
            <div class="modal-body" id="details"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button
                    type="button" onclick="print_order(document.getElementById('print_id').value)"
                    class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------- start- modal- show ---------------------------------------------------------------->
<div class="modal fade" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل </h4>
            </div>
            <form action="<?php echo $action ?>" method="post"/>
            <div class="modal-body" id="show">







            </div>

            </form>



            <div class="modal-footer" style="display: inline-block;width: 100%">
           
		
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------- start_modal_to_geha ----------------------------------------------------------------->
<div class="modal fade" id="to_geha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الجهه الموجهه اليها</h4>
            </div>
            <div class="modal-body">


                    <?php if (!empty($gehat)) { ?>
                        <table id="" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="20%">#</th>
                                <th class="text-center">الجهة</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($gehat as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-id="<?= $value->id ?>" data-title="<?= $value->title ?>"
                                               id="radio" ondblclick="put_to_geha($(this).attr('data-title'),$(this).attr('data-id'))"></td>
                                    <td><?= $value->title ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>


                    <?php } else { ?>

                        <div class="alert alert-danger">لاتوجد بيانات !!</div>
                    <?php } ?>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------- start_modal_gehat ----------------------------------------------------------------->
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الجهة</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="len" value=""/>

                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <!-- <button type="button" class="btn btn-labeled btn-success " onclick="$('#geha_input').show()"
                                     style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                 <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة جهة
                             </button>-->
                            <button type="button" class="btn btn-labeled btn-success " onclick="$('#geha_input').show(); show_add()"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة جهة
                            </button>

                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">

                        <div id="geha_input" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label label-green  ">إسم الجهة </label>
                                <input type="text" name="geha_title" id="geha_title"
                                       value=""
                                       class="form-control input-style">
                                <input type="hidden" class="form-control" id="s_id" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4 ">
                                <label class="label label-green  ">رقم الجوال </label>
                                <input type="text" name="mob" id="mob"
                                       value=""
                                       class="form-control input-style">
                            </div>
                            <div class="col-sm-3  col-md-3  ">
                                <label class="label label-green  ">العنوان </label>
                                <input type="text" name="address" id="address"
                                       value=""
                                       class="form-control input-style">
                            </div>

                            <!--<div class="col-sm-3  col-md-2 padding-4">
                               <label class="label label-green  ">  </label>
                                <button type="button" onclick="add_geha($('#geha_title').val())"
                                        class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>-->

                            <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: none;">
                                <button type="button" onclick="add_geha($('#geha_title').val())" style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                            <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                <button type="button"
                                        class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <br>  <br>  <br>
                <div id="myDiv_geha"><br><br>
                    <?php if (!empty($geha_table)) { ?>
                        <table id="" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center">الجهة</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($geha_table as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-id="<?= $value->id ?>" data-title="<?= $value->title ?>"
                                               id="radio" ondblclick="getTitle($(this).attr('data-title'),$(this).attr('data-id'))"></td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->mob ?></td>
                                    <td><?= $value->address ?></td>
                                    <td>
                                        <!--
                                          <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
-->
                                        <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                                        <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>





                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>


                    <?php } else { ?>

                        <div class="alert alert-danger">لاتوجد بيانات !!</div>
                    <?php } ?>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
    function put_to_geha(geha_title,geha_id)
    {
       //to_geha_name to_geha_id_fk

        $('#to_geha_name').val(geha_title);
        $('#to_geha_id_fk').val(geha_id);
        $('#to_geha').modal('hide');
    }
</script>



<script>
    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var length = x.rows.length + 1;

        var dataString   ='length=' + length   ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_data',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
                $('#saves').show();
                // get_new_option(2);
            }
        });

    }
    //-----------------------------------------------

</script>

<script>
    function get_len()
    {
        var x = document.getElementById('resultTable');
        var length = x.rows.length;
       // alert(length);
        $('#len').val(length);
    }

</script>

<script>
    function add_geha(value) {
        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

        var mob = $('#mob').val();
        var address = $('#address').val();
        if (value != 0 && value != '' && mob != ' ' && address != ' ') {
            var dataString = 'title=' + value + '&mob=' + mob + '&address=' + address;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/insert_geha_ajax',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);
                }
            });
        }

    }

    /*
     function add_geha(value) {
     var mob = $('#mob').val();
     var address = $('#address').val();
     if (value != 0 && value != '' && mob != ' ' && address != ' ') {
     var dataString = 'title=' + value + '&mob=' + mob + '&address=' + address;
     $.ajax({
     type: 'post',
     url: '<?php echo base_url() ?>family_controllers/namazegs/Namazeg/insert_geha_ajax',
     data: dataString,
     dataType: 'html',
     cache: false,
     success: function (html) {
     $("#myDiv_geha").html(html);
     }
     });
     }

     }
     */
</script>


<script>
    function getTitle(value,val_id) {
        if (value != '') {
            var valu=$('#len').val();
            $('#geha_name'+valu).val(value);
            $('#geha_id_fk'+valu).val(val_id);
           // $('#geha_name'+valu).removeAttr('readonly');
            $('#myModalInfo').modal('hide');
        }
    }
</script>
<script>
    function show_add() {
        $('#div_update').hide();
        $('#div_add').show();

    }
</script>
<script>

    function update_geha(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url :"<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/getById",
            type : "Post",
            dataType : "html",
            data: {id:id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#geha_title').val(obj.title);
                $('#mob').val(obj.mob);
                $('#address').val(obj.address);
                $('#s_id').val(obj.id);


            }

        });

        $('#update').on('click',function() {
            var geha_title = $('#geha_title').val();
            var address = $('#address').val();
            var mob = $('#mob').val();
            var s_id = $('#s_id').val();

            $.ajax({
                url :"<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/update_geha",
                type : "Post",
                dataType : "html",
                data: {geha_title:geha_title,address:address,mob:mob,id:s_id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);

                    $('#geha_input').hide();

                }

            });

        });

    }
    </script>
<script>
    function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r =  confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/delete_geha',
                data:{ id:id},
                dataType: 'html',
                cache:false,
                success: function(html){
                    //   alert(html);
                    $("#myDiv_geha").html(html);

                }
            });
        }

    }
</script>


<script>
    function put_total()
    {
        var sum = 0;
        $('.valu').each(function(){
            if($(this).val()!='') {
                sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
            }
        });
        $('#total').text(sum);
        $('#total_value').val(sum);
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/GetTotalValueArabic",
            data:{number:sum},
            success:function(d){

         var obj=JSON.parse(d);
               // alert(obj.title);

                    $('#total_arabic').html(obj.title);
                    $('#total_value_arabic').val(obj.title);



            }

        });

    }

</script>

<script>
    function get_fatora_details(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_details",
            data:{rkm:valu},
            success:function(d){


$('#details').html(d);


            }

        });
    }
</script>
<script>
    function print_order(row_id) {


        var request = $.ajax({
// print_resrv -- print_contract
            url: "<?=base_url().'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_print'?>",
            type: "POST",
            data: {rkm: row_id},
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




<script>
    function func_show() {

        var f_value=[];
        var date=[];
        var f_geha_id_fk=[];
        var f_geha_name=[];
        var rkm_fatora=[];
        var byan=[];
        var f_markz_taklfa_id_fk=[];
        var f_markz_taklfa_name=[];

        $(".f_value").each(function(){
            f_value.push($(this).val());
        });
        $(".date").each(function(){
            date.push($(this).val());
        });
        $(".f_geha_id_fk").each(function(){
            f_geha_id_fk.push($(this).val());
        });
        $(".f_geha_name").each(function(){
            f_geha_name.push($(this).val());
        });

        $(".rkm_fatora").each(function(){
            rkm_fatora.push($(this).val());
        });
        $(".byan").each(function(){
            byan.push($(this).val());
        });
        $(".f_markz_taklfa_id_fk").each(function(){
            f_markz_taklfa_id_fk.push($(this).val());
        });
        $(".f_markz_taklfa_id_fk").each(function(){
            f_markz_taklfa_name.push( $(this).find('option:selected').text());
        });




var t_rkm=$('#t_rkm').val();
var total_value_arabic=$('#total_value_arabic').val();
var total_value=$('#total_value').val();
var t_date=$('#t_date').val();
var start_laqb=$('#start_laqb').val();
var start_laqb_name=$( "#start_laqb option:selected" ).text();
var to_geha_id_fk=$('#to_geha_id_fk').val();
        var to_geha_name=$( "#to_geha_name option:selected" ).text();
        var to_geha_name2=$( ".to_geha_name2").val();



        var end_laqb=$('#end_laqb').val();
        var end_laqb_name=$("#end_laqb option:selected" ).text();

        var mawdo3=$('#mawdo3').val();

        if(to_geha_id_fk==''||total_value==0)
        {


           alert("من فضلك قم بادخال المبلغ والجهه الموجهه اليها");
            return;

        }else {

            $('#modal_show').modal('show');

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/show_fatora",
                data: {
                    t_rkm: t_rkm,
                    t_date: t_date,
                    start_laqb: start_laqb,
                    to_geha_id_fk: to_geha_id_fk,
                    end_laqb: end_laqb,
                    mawdo3: mawdo3,
                    start_laqb_name: start_laqb_name
                    ,
                    f_geha_name: f_geha_name,
                    to_geha_name: to_geha_name,
                    end_laqb_name: end_laqb_name,
                    f_value: f_value,
                    f_geha_id_fk: f_geha_id_fk,
                    f_geha_name: f_geha_name,
                    rkm_fatora: rkm_fatora,
                    byan: byan,
                    f_markz_taklfa_id_fk: f_markz_taklfa_id_fk,
                    f_markz_taklfa_name: f_markz_taklfa_name,
                    total_value_arabic: total_value_arabic,
                    total_value: total_value,
                    date: date,
                    to_geha_name2:to_geha_name2
                },
                success: function (d) {


                    $('#show').html(d);
                    // alert(d);


                }

            });
        }
    }
</script>
<script>
    function add_row_attach() {
        $(".mytable").show();
        $(".save").show();
        var x = document.getElementById('attachTable');
        var length = x.rows.length;
        var len=length+1;

        $(".attachTable").append('<tr class="' + len + '"><td><input type="input" name="title[]" id="title"  class="form-control  " data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a   onclick="DeleteRowImg(' + len + ')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }

    function DeleteRowImg(valu) {
        $('.' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".attachTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }

</script>

<script>
    function put_val_id(val_id)
    {
        $('#row_id').val(val_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_attach",
            data: {
                val_id: val_id,

            },
            success: function (d) {


                $(".attachTable").html(d);

            }

        });
    }


</script>

