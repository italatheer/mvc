<style type="text/css">

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php

            if ((isset($one_data)) && (!empty($one_data))) {
                echo form_open_multipart(base_url() . 'st/tabr3_ayni/Tabr3_ayni/update/' . base64_encode($one_data['tabr3']->id));
                $submitSave = 'button';
                $submitEdit = 'submit';
                //=====================
                $type_ezn=$one_data['tabr3']->type_ezn;
                $pay_method=$one_data['tabr3']->pay_method;
                $supplier_name=$one_data['tabr3']->supplier_name;
                $supplier_jwal=$one_data['tabr3']->supplier_jwal;
                //=================
                $rkm_ezen = $one_data['tabr3']->ezn_rkm;
                $ezn_date = $one_data['tabr3']->ezn_date_ar;
                $storage_fk = $one_data['tabr3']->storage_fk;
                $storage_name = $one_data['tabr3']->storage_name;
                $rkm_hesab = $one_data['tabr3']->rkm_hesab;
                $hesab_name = $one_data['tabr3']->hesab_name;
                $all_value = $one_data['tabr3']->all_value;
                $motbr3_id_fk = $one_data['tabr3']->motbr3_id_fk;
                $motbr3_name = $one_data['tabr3']->motbr3_name;
                $motbr3_jwal = $one_data['tabr3']->motbr3_jwal;
                $last_tabro3_date = $one_data['tabr3']->last_tabro3_date_ar;
                $no3_tabro3 = $one_data['tabr3']->no3_tabro3;
                $no3_tabro3_title = $one_data['no3_tabro3_title'];
                $fe2a = $one_data['tabr3']->fe2a;
                $fe2a_title = $one_data['fe2a_title'];
                $band = $one_data['tabr3']->band;
                $band_title = $one_data['band_title'];
                $mostand_rkm = $one_data['tabr3']->mostand_rkm;
                $geha_name = $one_data['tabr3']->geha_name;
                $geha_jwal = $one_data['tabr3']->geha_jwal;
                $mostand_date = $one_data['tabr3']->mostand_date_ar;
            } else {
                echo form_open_multipart(base_url() . 'st/tabr3_ayni/Tabr3_ayni');
                $submitSave = 'submit';
                $submitEdit = 'button';
                $ezn_date = date('Y-m-d');
                $storage_fk = '';
                $storage_name = '';
                $rkm_hesab = '';
                $hesab_name = '';
                $all_value = '';
                $motbr3_id_fk = '';
                $motbr3_name = '';
                $motbr3_jwal = '';
                $last_tabro3_date = date('Y-m-d');
                $no3_tabro3 = '';
                $fe2a = '';
                $band = '';
                $mostand_rkm = '';
                $geha_name = '';
                $geha_jwal = '';
                $type_ezn='';
                $pay_method='';
                $supplier_name='';
                $supplier_jwal='';
                $mostand_date = date('Y-m-d');
            }

            ?>
            <div class="col-md-12">
                <div class="form-group col-md-2 col-sm-6 padding-4">
                   <input type="radio"  data-validation="required" <?php if($type_ezn==1) echo 'checked';?> onchange="get_form($(this).val());" value="1" name="type_ezn">تبرع عيني
                    <input type="radio"  data-validation="required"  <?php if($type_ezn==2) echo 'checked';?> onchange="get_form($(this).val());" value="2" name="type_ezn"> مشتريات عينيه

                </div>

                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label"> رقم الإذن </label>
                    <input type="number" name="ezn_rkm" id="ezn_rkm" value="<?= $rkm_ezen ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> تاريخ الإذن </label>
                    <input type="date" name="ezn_date" id="ezn_date" value="<?= $ezn_date ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> المستودع </label>
                    <select class="form-control " id="storage_fk" name="storage_fk" class="form-control"
                            data-validation="required" onchange="getCode(this.value);">

                        <option value="">اختر</option>

                        <?php
                        if (isset($storage) && !empty($storage)) {
                            foreach ($storage as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"

                   <?php if($row->id_setting==$storage_fk) { echo 'selected' ; }?>            ><?php echo $row->title_setting; ?></option>

                            <?php }
                        } ?>
                    </select>
                    <input type="hidden" name="storage_name" id="storage_name" value="<?= $storage_name ?>">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> كود الحساب </label>
                    <input type="text" name="rkm_hesab" id="rkm_ezn_edafa" value="<?= $rkm_hesab ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم الحساب </label>
                    <input type="text" name="hesab_name" id="ezn_edafa_name" value="<?= $hesab_name ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>
                <!---------------------------------------------->
                <div id="tabro3" <?php if($type_ezn==2){?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> طريقة الشراء</label>

                    <select class="form-control " id="pay_method" name="pay_method" class="form-control"
                           >

                        <option value="">اختر</option>

                        <?php
                        $process = array(1 => 'نقدي', 2 => 'آجل');

                        foreach ($process as $key => $value) {
                            ?>
                            <option value="<?= $key; ?>"

                          <?php if($pay_method==$key) echo 'selected' ;?>  ><?= $value; ?></option>

                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم المورد</label>

                    <input type="text" class="form-control testButton inputclass" name="supplier_name"
                           id="name"
                           readonly=""

                           ondblclick="$(this).attr('readonly','readonly'); $('#myModal2').modal('show');"
                           style="cursor:pointer;" autocomplete="off"
                           onkeypress="return isNumberKey(event);"
                           onblur="$(this).attr('readonly','readonly')"
                           value="<?php echo $supplier_name ;?> ">
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> رقم الجوال</label>

                    <input type="text" class="form-control inputclass" name="jwal"

                           aria-required="true" readonly=""
                           id="jwal"
                           style="width: 100% !important;"
                           value="<?php echo $supplier_jwal ;?>"
                    >
                    <input type="hidden" name="supplier_fk" id="supplier_fk" value="">
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">  رقم المستند</label>
                    <input type="text" name="mostand_rkm"  value="<?php echo $mostand_rkm ;?>"
                           class="form-control "
                           onkeypress="validate_number(event);">

                </div>
                </div>
                <!--------------------------------------------->
                <div id="moshtrat" <?php if($type_ezn==1){?> style="display: block;" <?php }else{ ?> style="display: none;" <?php } ?>>
                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label"> المبلغ </label>
                    <input type="number" name="all_value" id="all_value" value="<?= $all_value ?>"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-4 col-sm-6 padding-4">
                    <label class="label"> اسم المتبرع </label>
                    <input type="text" name="motbr3_name" id="motbr3_name" value="<?= $motbr3_name ?>"
                           style="width:90%; float: right;"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                    <button type="button" data-toggle="modal" data-target="#myModalInfo"
                            class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="motbr3_id_fk" id="motbr3_id_fk" value="<?= $motbr3_id_fk ?>">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> رقم الجوال </label>
                    <input type="number" name="motbr3_jwal" id="motbr3_jwal" value="<?= $motbr3_jwal ?>"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> تاريخ آخر تبرع </label>
                    <input type="date" name="last_tabro3_date" id="last_tabro3_date" value="<?= $last_tabro3_date ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> نوع التبرع </label>
                    <select name="no3_tabro3" id="no3_tabro3"
                            onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'fe2a');"
                            class="form-control "

                            data-validation-has-keyup-event="true">
                        <option> - إختر -</option>

                        <?php if (isset($erad_tabro3) && (!empty($erad_tabro3))) {
                            foreach ($erad_tabro3 as $value) {
                                ?>
                                <option value="<?= $value->code ?>"
                                        data-from_id="<?= $value->from_id ?>"
                                    <?php if ($no3_tabro3 == $value->code) echo 'selected' ?>> <?= $value->title ?></option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> الفئة </label>
                    <select name="fe2a" id="fe2a"
                            onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'band')"
                            class="form-control "

                            data-validation-has-keyup-event="true">
                        <?php if (isset($fe2a_title)) { ?>
                            <option value="<?= $fe2a ?>"><?= $fe2a_title ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> البند </label>
                    <select name="band" id="band"
                            class="form-control "

                            data-validation-has-keyup-event="true">
                        <?php if (isset($band_title)) { ?>
                            <option value="<?= $band ?>"><?= $band_title ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label"> رقم السند </label>
                    <input type="text" name="mostand_rkm" id="mostand_rkm" value="<?= $mostand_rkm ?>"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم الجهة </label>
                    <input type="text" name="geha_name" id="geha_name" value="<?= $geha_name ?>"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> رقم الجوال </label>
                    <input type="number" name="geha_jwal" id="geha_jwal" value="<?= $geha_jwal ?>"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> تاريخ المستند </label>
                    <input type="date" name="mostand_date" id="mostand_date" value="<?= $mostand_date ?>"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                </div>
                </div>

            </div>

            <div class="col-md-12">

                <table id="table_anf" class="table-bordered table table-responsive">
                    <thead>
                    <tr class="success">
                        <th>م</th>
                        <th>كود الصنف</th>
                        <th>باركود</th>
                        <th>اسم الصنف</th>
                        <th> الوحدة</th>
                        <th> الرصيد المتاح</th>
                        <th> الكمية</th>
                        <th> سعر الوحدة</th>
                        <th> القيمة الإجمالية</th>
                        <th> تاريخ الصلاحية</th>
                        <th> التشغيلة</th>
                        <th> الرصيد الحالي</th>
                        <th> الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="asnafe_table">
                    <?php
                    $total = '';
                    if ((isset($one_data['asnaf'])) && (!empty($one_data['asnaf'])) && ($one_data['asnaf'] != 0)) {
                        $z = 1;
                        foreach ($one_data['asnaf'] as $sanfe) {
                            ?>
                            <tr id="row_<?= $z ?>">
                                <td><?= $z ?></td>
                                <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                           id="sanf_code<?= $z ?>"
                                           value="<?= $sanfe->sanf_code ?>"
                                           ondblclick="$('#myModal').modal('show'); GetDiv_sanfe('myDiv_sanfe',<?= $z ?>)"
                                           readonly/></td>
                                <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                                           id="sanf_coade_br<?= $z ?>"
                                           value="<?= $sanfe->sanf_coade_br ?>" readonly/></td>
                                <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                           id="sanf_name<?= $z ?>"
                                           value="<?= $sanfe->sanf_name ?>" readonly/></td>
                                <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                           id="sanf_whda<?= $z ?>"
                                           value="<?= $sanfe->sanf_whda ?>" readonly/></td>
                                <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                                           id="sanf_rased<?= $z ?>"
                                           value="<?= $sanfe->sanf_amount ?>" readonly/></td>
                                <td><input type="text" name="sanf_amount[]" oninput="get_total(this,<?= $z ?>)"
                                           class="form-control testButton inputclass"
                                           id="sanf_amount<?= $z ?>"
                                           value="<?= $sanfe->sanf_amount ?>"/></td>
                                <td><input type="text" name="sanf_one_price[]"
                                           class="form-control testButton inputclass" id="sanf_one_price<?= $z ?>"
                                           value="<?= $sanfe->sanf_one_price ?>" readonly/></td>
                                <td><input type="text" name="all_egmali[]" readonly
                                           class="form-control testButton inputclass"
                                           id="all_egmali<?= $z ?>"
                                           value="<?= $sanfe->all_egmali ?>"/></td>
                                <td><?php if(!empty($sanfe->sanf_salahia_date_ar)){
                                    $type='date';
                                        $read='';

                                    }else{
                                        $type='text';
                                        $read='readonly';
                                    }  ?>
                                    <input type="<?=$type?>" name="sanf_salahia_date[]"
                                           class="form-control testButton inputclass" id="sanf_salahia_date<?= $z ?>"
                                           value="<?= $sanfe->sanf_salahia_date_ar ?>" <?=$read?>/></td>
                                <td><input type="text" name="lot[]" id="lot<?= $z ?>" value="<?= $sanfe->lot ?>"/></td>
                                <td><input type="text" name="rased_hali[]" class="form-control testButton inputclass"
                                           id="rased_hali<?= $z ?>"
                                           value="<?= $sanfe->rased_hali ?>"/></td>

                                <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            $total = $total + $sanfe->all_egmali;
                            $z++;
                        }
                    } else { ?>
                        <tr id="row_1">
                            <td>1</td>
                            <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                       id="sanf_code1" value=""
                                       ondblclick="$('#myModal').modal('show'); GetDiv_sanfe('myDiv_sanfe',1)"
                                       readonly/></td>
                            <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                                       id="sanf_coade_br1" value="" readonly/></td>
                            <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                       id="sanf_name1" value="" readonly/></td>
                            <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                       id="sanf_whda1" value="" readonly/></td>
                            <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                                       id="sanf_rased1" value="" readonly/></td>
                            <td><input type="text" name="sanf_amount[]" oninput="get_total(this,1)"
                                       class="form-control testButton inputclass"
                                       id="sanf_amount1" value=""/></td>
                            <td><input type="text" name="sanf_one_price[]" class="form-control testButton inputclass"
                                       id="sanf_one_price1" value="" readonly/></td>
                            <td><input type="text" name="all_egmali[]" readonly
                                       class="form-control testButton inputclass"
                                       id="all_egmali1" value=""/></td>
                            <td><input type="text" name="sanf_salahia_date[]" class="form-control testButton inputclass"
                                       id="sanf_salahia_date1" value=""/></td>
                            <td><input type="text" name="lot[]" class="form-control testButton inputclass" id="lot1"
                                       value=""/></td>
                            <td><input type="text" name="rased_hali[]" class="form-control testButton inputclass"
                                       id="rased_hali1" value=""/></td>

                            <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="8" class="text-center"> <strong> الإجمالي </strong></th>
                        <th colspan="4" id="total"><?= $total ?></th>
                        <th>
                            <button type="button" onclick="add_row_sanfe()" class="btn-success btn"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-xs-12 text-center">

                <button type="<?= $submitSave ?>" class="btn btn-labeled btn-success" name="save" value="save"
                        id="myBtn">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <button type="<?= $submitEdit ?>" class="btn btn-labeled btn-warning" style="color: #002342;"
                        name="edit" value="edit">
                    <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                </button>

                <button type="button" class="btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>
                <button type="button" class="btn btn-labeled btn-inverse " id="attach_button" onclick="checkInputs()"
                        data-toggle="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-cloud-upload"></i></span>
                    اضافة مرفق
                </button>
                <button type="button" class="btn btn-labeled btn-inverse " id="search_button" data-target="#searchModal"
                        data-toggle="modal">
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>


            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-------------------------------------- modal-------------------------->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الموردين </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">م</th>
                        <th style="font-size: 15px;" class="text-left"> كود المورد</th>
                        <th style="font-size: 15px;" class="text-left">إسم المورد</th>
                        <th style="font-size: 15px;" class="text-left"> رقم الجوال</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($suppliers) && !empty($suppliers)) {
                        $x = 1;
                        foreach ($suppliers as $supplier) {
                            //  $onclick = "$('#name').val(" .$supplier->name. "); $('#myModal').modal('hide');";


                            ?>
                            <tr ondblclick="get_supplier('<?= $supplier->name ?>',<?= $supplier->resp_jwal ?>,<?= $supplier->id ?>);">
                                <td><?= $x++ ?></td>
                                <td><?= $supplier->code ?></td>
                                <td><?= $supplier->name ?></td>
                                <td><?= $supplier->resp_jwal ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php

                ?>
                <button
                        type="button" onclick="print_moshtriat(document.getElementById('moshtriat_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>

<!------------------------------------------>
<?php if ((isset($all_data)) && (!empty($all_data))) { ?>

    <div class="col-xs-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $title ?></h3>
            </div>
            <div class="panel-body">
                <table class="table-bordered table  example">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>رقم الإذن</th>
                        <th>تاريخ الإذن</th>
                        <th>المستودع</th>
                        <th>اسم المتبرع</th>
                        <th> الجوال</th>
                        <th> تفاصيل</th>
                        <th> الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x = 1;
                    foreach ($all_data as $datum) { ?>
                        <tr>
                            <td><?= $x ?></td>
                            <td><?= $datum->ezn_rkm ?></td>
                            <td><?= $datum->ezn_date_ar ?></td>
                            <td><?= $datum->storage_name ?></td>
                            <td><?= $datum->motbr3_name ?></td>
                            <td><?= $datum->motbr3_jwal ?></td>
                            <?php if($datum->ezn_rkm==1){?>
                            <td>

                                <button type="button" class="btn btn-info " data-toggle="modal"
                                        data-target="#myModalInfo_asnafe"
                                        onclick="get_details_sanf('<?= $datum->id ?>')"></i> تفاصيل
                                </button>
                            </td>
                            <?php } else{ ?>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal" onclick="load_page(<?= $datum->id?>);">التفاصيل</button>


                            <?php } ?>
                            </td>
                            <td><a onclick='swal({
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
                                        window.location="<?= base_url() . 'st/tabr3_ayni/Tabr3_ayni/update/' . base64_encode($datum->id) ?>";
                                        });'>
                                    <i class="fa fa-pencil"> </i></a>
                                <a onclick=' swal({
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
                                        setTimeout(function(){window.location="<?= base_url() . 'st/tabr3_ayni/Tabr3_ayni/delete/' . base64_encode($datum->id) . '/' . base64_encode($datum->ezn_rkm) ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i></a>

                            </td>
                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
<?php }
?>

<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المتبرعين </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalInfo_asnafe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> تفاصيل تبرع العيني </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 0">
                <div class="col-xs-12 ">
                    <input type="hidden" id="ezn_rkm_pop_h" value="">
                    <div class="col-xs-3">
                        <p><strong>رقم الإذن :</strong><span id="ezn_rkm_pop"> </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong> تاريخ الإذن :</strong><span id="ezn_date_ar_pop">  </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong> المبلغ : </strong><span id="all_value_pop">  </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong>المستودع : </strong><span id="storage_name_pop"> </span></p>
                    </div>

                    <div class="col-xs-4">
                        <p><strong>اسم الحساب : </strong> <span id="hesab_name_pop"> </span></p>
                    </div>
                    <div class="col-xs-2">
                        <p><strong> كود الحساب :</strong><span id="rkm_hesab_pop">  </span></p>
                    </div>
                    <div class="col-xs-4">
                        <p><strong> اسم المتبرع :</strong><span id="motbr3_name_pop">  </span></p>
                    </div>
                    <div class="col-xs-2  ">
                        <p><strong> رقم جوال :</strong><span id="motbr3_jwal_pop">   </span></p>
                    </div>

                    <div class="col-xs-3">
                        <p><strong> تاريخ اخر المتبرع :</strong><span id="last_tabro3_date_ar_pop">  </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong>نوع التبرع : </strong><span id="no3_tabro3_pop">  </span></p>
                    </div>
                    <div class="col-xs-3  ">
                        <p><strong>الفئة : </strong><span id="fe2a_pop">   </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong> البند : </strong><span id="band_pop">  </span></p>
                    </div>
                    <div class="col-xs-2">
                        <p><strong> رقم السند : </strong><span id="mostand_rkm_pop">  </span></p>
                    </div>
                    <div class="col-xs-3  ">
                        <p><strong> اسم الجهة : </strong><span id="geha_name_pop">   </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong> رقم جوال : </strong><span id="geha_jwal_pop">  </span></p>
                    </div>
                    <div class="col-xs-3">
                        <p><strong> تاريخ المستند : </strong><span id="mostand_date_ar_pop">  </span></p>
                    </div>
                </div>
                <div class="col-xs-12 ">

                    <table class="table table-bordered" id="orders_details" style="display: none">
                        <thead>
                        <tr class="success">
                            <th>م</th>
                            <th>كود الصنف</th>
                            <th>باركود</th>
                            <th>اسم الصنف</th>
                            <th> الوحدة</th>
                            <th> الرصيد المتاح</th>
                            <th> الكمية</th>
                            <th> سعر الوحدة</th>
                            <th> القيمة الإجمالية</th>
                            <th> تاريخ الصلاحية</th>
                            <th> التشغيلة</th>
                            <th> الرصيد الحالي</th>
                        </tr>
                        </thead>
                        <tbody id="orders_details_body">
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="8">الإجمالي</th>
                            <th colspan="4" id="total_pop"></th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
<!--                print_pop -->
                <button onclick="print_rescrv(document.getElementById('ezn_rkm_pop_h').value)"
                        type="button"
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الأصناف </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_sanfe"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    function GetDiv(div) {
        html = '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الهوية </th><th style="width: 170px;" >الجوال</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/tabr3_ayni/Tabr3_ayni/getConnection',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }


</script>
<script>

    function GetDiv_sanfe(div, row_id) {
        html = '<div class="col-md-12"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/tabr3_ayni/Tabr3_ayni/getConnection2/' + row_id,

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }

</script>
<script>

    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }

    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 1) {
            document.getElementById('sanf_salahia_date' + id).type = 'date';
        } else {
            document.getElementById('sanf_salahia_date' + id).type = 'text';
            $('#sanf_salahia_date' + id).attr('readonly','readonly');
            $('#sanf_salahia_date' + id).val('');

        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        document.getElementById('sanf_coade_br' + id).value = code_br;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;

        $("#myModal .close").click();

    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;
        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_code[]" id="sanf_code' + (len + 1) + '" value=""  ondblclick="$(\'#myModal\').modal(\'show\'); GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_amount[]" oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }

    function get_details_sanf(id) {
        var request = $.ajax({
            url: "<?=base_url() . 'st/tabr3_ayni/Tabr3_ayni/get_detailes'?>",
            type: "POST",
            data: {id: id}
        });
        request.done(function (msg) {
            var obj = JSON.parse(msg);

            document.getElementById('ezn_rkm_pop').innerText = obj.tabr3.ezn_rkm;
            document.getElementById('ezn_rkm_pop_h').value = obj.tabr3.ezn_rkm;
            document.getElementById('ezn_date_ar_pop').innerText = obj.tabr3.ezn_date_ar;
            document.getElementById('all_value_pop').innerText = obj.tabr3.all_value;
            document.getElementById('ezn_date_ar_pop').innerText = obj.tabr3.ezn_date_ar;
            document.getElementById('fe2a_pop').innerText = obj.fe2a_title;
            document.getElementById('geha_jwal_pop').innerText = obj.tabr3.geha_jwal;
            document.getElementById('geha_name_pop').innerText = obj.tabr3.geha_name;
            document.getElementById('hesab_name_pop').innerText = obj.tabr3.hesab_name;
            document.getElementById('last_tabro3_date_ar_pop').innerText = obj.tabr3.last_tabro3_date_ar;
            document.getElementById('mostand_date_ar_pop').innerText = obj.tabr3.mostand_date_ar;
            document.getElementById('mostand_rkm_pop').innerText = obj.tabr3.mostand_rkm;
            document.getElementById('motbr3_jwal_pop').innerText = obj.tabr3.motbr3_jwal;
            document.getElementById('motbr3_name_pop').innerText = obj.tabr3.motbr3_name;
            document.getElementById('no3_tabro3_pop').innerText = obj.no3_tabro3_title;
            document.getElementById('band_pop').innerText = obj.band_title;
            document.getElementById('rkm_hesab_pop').innerText = obj.tabr3.rkm_hesab;
            document.getElementById('storage_name_pop').innerText = obj.tabr3.storage_name;

            if (obj.asnaf === 0) {
                document.getElementById('orders_details').style.display = 'none';
            } else {

                delete_table();
                document.getElementById('orders_details').style.display = 'inline-table';
                var total_pop = 0;
                for (var i = 0; i < obj.asnaf.length; i++) {
                    console.log('sanf_amount : ' + parseInt(obj.asnaf[i].sanf_amount));
                    total_pop = total_pop + parseFloat(obj.asnaf[i].all_egmali);
                    var row_html = ' <tr>\n' +
                        '                            <td >' + (i + 1) + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_code + ' </td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_coade_br + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_name + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_whda + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_rased) + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_amount) + ' </td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_one_price) + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].all_egmali) + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_salahia_date_ar + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].lot + '</td>\n' +
                        '                            <td >' + parseInt(obj.asnaf[i].rased_hali) + '</td>\n' +
                        '                        </tr>';
                    $('#orders_details_body').append(row_html);

                }

                $('#total_pop').text(total_pop);

            }


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function delete_table() {
        var table = document.getElementById('orders_details_body');
        var len = table.rows.length;
        console.log('lenthg  table : ' + len);
        $("#orders_details_body").find("tr").remove();


    }
</script>

<script>

    function GEtF2a(value, type) {
        if (value != 0 && value > 0 && value != 0) {

            var dataString = 'id=' + value + '&type=' + type;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/tabr3_ayni/Tabr3_ayni/GetData',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    //   console.log(JSONObject);
                    if (type === 'fe2a') {
                        //  if(JSONObject.length > 1) {
                        var html = '<option value="">إختر </option>';
                        //}
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].code + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#fe2a").html(html);

                    } else if (type === 'band') {
                        if (JSONObject.length > 1) {
                            var html = '<option value="">إختر </option>';
                        }
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].code + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#band").html(html);

                    }
                }
            });
        }

    }

    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseInt($('#sanf_rased' + id).val()));
        if (amount.value <= sanf_rased) {
            $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
            $('#rased_hali' + id).val(sanf_rased - amount.value);
            set_sum();
        }else {
            amount.value=0;
            $('#all_egmali' + id).val(0);
            $('#rased_hali' + id).val(0);
            set_sum();

        }
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);

        $('#total').text(sum);
    }

    function print_rescrv(id) {
        var request = $.ajax({
            url: "<?=base_url() . 'st/tabr3_ayni/Tabr3_ayni/print_pop/'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>

<script>
    function get_form(valu) {
     if(valu==2)
     {
         $('#tabro3').show();
         $('#moshtrat').hide();
     }else{
         $('#tabro3').hide();
         $('#moshtrat').show();

     }
    }
</script>

<script>
    function getCode(id) {
       var type=$("input[name='type_ezn']:checked").val();
        var dataString = 'id=' + id;

        if(type==2) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/moshtriat_ayni/Moshtriat_ayni/get_code',
            data: dataString,
            dataType: 'html',

            cache: false,
            success: function (html) {
                // alert(html);

                arr = JSON.parse(html);
                // if ( arr == '') {
                //     alert('hh');
                // } // rkm_ezn_edafa  ezn_edafa_name
                $('#rkm_ezn_edafa').val(arr.rkm_hesab_moshtriat);
                $('#ezn_edafa_name').val(arr.hesab_moshtriat_name);

            }
        });
    }else{
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/moshtriat_ayni/Moshtriat_ayni/get_code',                data: dataString,
                dataType: 'html',

                cache: false,
                success: function (html) {
                    // alert(html);

                    arr = JSON.parse(html);
                    // if ( arr == '') {
                    //     alert('hh');
                    // } // rkm_ezn_edafa  ezn_edafa_name
                    $('#rkm_ezn_edafa').val(arr.rkm_hesab);
                    $('#ezn_edafa_name').val(arr.hesab_name);

                }
            });

        }

    }
</script>

<script>
    function get_supplier(name2,jwal,id) {

        $('#name').val(name2);
        $('#jwal').val(jwal);
        $('#supplier_fk').val(id);
        $('#myModal').modal('hide');

    }


</script>
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/tabr3_ayni/Tabr3_ayni/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>

<script>
    function print_moshtriat(row_id) {
        var request = $.ajax({
// print_resrv -- print_contract
            url: "<?=base_url().'st/tabr3_ayni/Tabr3_ayni/Print_moshtriat'?>",
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