<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    table  .headtr>td, table .headtr>th {
       /* background-color: #c1ccaf !important;
        color: #222 ;*/
            color: #d00303 !important;
    background-color: white !important;
    }
    table  .headtr2>td, table .headtr2>th {
        background-color: #ffa7a7 !important;
        color: #222 ;
    }
    table  tr>td, table tr>th {

        border: 2px double #000!important;
    }
    .table-mehwer tr>td textarea{
       /* background-color: #dbecbd;*/
       background-color: #ffffff;
    color: green;
    }
    
    .table>tbody>tr>th, .table>tfoot>tr>th, 
    .table>thead>tr>td, .table>tbody>tr>td, 
    .table>tfoot>tr>td {
        
        padding: 5px !important;
    }
    
</style>



<?php
if(isset($last_galsa)&& !empty($last_galsa)){?>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>

        <div class="panel-body">

                    <div class="col-sm-12">

                        <table class="table table-bordered">
                            <thead>
                            <tr class="info">
                                <th><label class="label">رقم الجلسه</label></th>
                                <th><label class="label"> تاريخ بدء الجلسه م</label></th>
                                <th> <label class="label">تاريخ بدء الجلسه هـ</label></th>
                                <th>تسجيل حضور الاعضاء</th>
                                <th>بدء الجلسه</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?php echo date("Y");?>/<?php echo $last_galsa-1;?>

                                    <input type="hidden" name="glsa_rkm" readonly value="<?php echo $last_galsa-1;?>"/></td>
                                <td><?php if(isset($last_galsa_date))echo $last_galsa_date->glsa_date_m;?></td>
                                <td> <?php if(isset($last_galsa_date))echo $last_galsa_date->glsa_date_h;?>
                                
                                
                                </td>
                                <td><button class="btn btn-add" data-toggle="modal" data-target="#myModal">تسجيل حضور الاعضاء</button></td>
                                <td><button class="btn btn-primary">بدء الجلسه</button> <input type="time" value="<?php echo  date("h:i:sa");?>" style="display: none;" id="tim"></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>



                    </div>
            <div class="col-md-12">


            </div>

            <?php
            if(isset($mahawer)&&!empty($mahawer)){
                foreach($mahawer as $row){

            ?>
            <div class="col-md-12 table<?php echo $row->id;?>">


                    <table class="table table-bordered table-striped table-mehwer" style="table-layout: fixed">
                        <tbody>
                        <tr class="headtr">
                            <td style="width: 100px">المحور</td>
                            <td><?php echo $row->mehwar_title;?></td>
                            <td style="width: 100px">الإجراء</td>

                        </tr>
                        <tr>
                            <td style="color: green;">القرار</td>
                            <td><textarea style="border: 1px solid black !important; "  onfocus="$('.mehar<?php echo $row->id;?>').hide();" id="mehar<?php echo $row->id;?>" class="form-control" rows="2"></textarea></td>

                            <td > <button class="btn btn-add" id="btn<?php echo $row->id;?>"
                                          onclick="qrar_mehwar(<?php echo $row->id;?>);">
                                    حفظ</button></td>

                        </tr>
                        </tbody>
                    </table>
                    <span  style="color:red; margin-right: 50%; display: none;" class="mehar<?php echo $row->id;?>">هذا الحقل مطلوب</span>





            </div>
            <?php } }?>
            <div class="col-md-12 update">
                <h4 style="color:red">البنود المنتهي مناقشتها</h4>
                <?php
                if(isset($mahawer_end)&&!empty($mahawer_end)){
                    foreach($mahawer_end as $row){

                        ?>
                        <div class="col-md-12 table<?php echo $row->id;?> no-padding">



                                <table class="table table-bordered table-striped table-mehwer" style="table-layout: fixed">
                                    <tbody>
                                    <tr class="headtr2">
                                        <td style="width: 100px">المحور</td>
                                        <td><?php echo $row->mehwar_title;?></td>
                                        <td style="width: 100px">الإجراء</td>

                                    </tr>
                                    <tr>
                                        <td>القرار</td>
                                        <td><textarea onfocus="$('.mehar<?php echo $row->id;?>').hide();" onclick="make_not_read(<?php echo $row->id;?>);" readonly id="mehar<?php echo $row->id;?>" class="form-control col-md-12" rows="">
                                                <?php echo $row->elqrar;?>
                                            </textarea></td>
                                        <td >  <button class="btn btn-add" id="btn<?php echo $row->id;?>"
                                                       onclick="qrar_mehwar_update(<?php echo $row->id;?>);">
                                                تعديل</button></td>

                                    </tr>
                                    </tbody>
                                </table>



                                <span  style="color:red; margin-right: 50%; display: none;" class="mehar<?php echo $row->id;?>">هذا الحقل مطلوب</span>


                            </div>


                        </div>
                    <?php } }?>
            </div>

               <!----------------- start_modal -----------------------------------------                    ------>
            <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">تفاصيل الأعضاء</h4>
                        </div>
                        <br>
                        <div class="modal-body form-group col-sm-12 col-xs-12">
                            <?php if (isset($members) && !empty($members)) { ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">إسم العضو</th>
                                    <th scope="col">المنصب الإداري</th>
                                    <th scope="col">الحضور</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $types = array( 1 => "رئيس مجلس الإدارة ", 2 => "نائب رئيس مجلس الإدارة ", 3 => "عضو");
                                $x=0;
                                foreach ($members as $row) {
                                    $x++;


                                ?>
                                <tr>
                                    <td>
                                        <?php echo $x++;?>
                                    </td>
                                    <td><?php echo $row->mem_name; ?></td>
                                    <input type="hidden" class="mem_id_fk" value="<?php echo $row->id;?> "/>

                                    <td><?php echo $types[$row->mansp_fk]; ?></td>
                                    <td><input type="radio" <?php if($row->hdoor_satus==1) echo 'checked';?> class="attend" name="<?php echo $row->mem_id_fk; ?>" value="1">حضر 
                                    <input type="radio" <?php if($row->hdoor_satus==0) echo 'checked';?>  class="attend" name="<?php echo $row->mem_id_fk; ?>" value="0">لم يحضر </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?php
                            }else {
                            ?>
                            <div class="alert alert-danger">لايوجد بيانات </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer" style="border-top: 0;">
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="attend_member(<?php echo $last_galsa ; ?>);">حفظ </button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                        </div>
                    </div>
                </div>
            </div>
                <!------------------------- end_modal ----------------------------->





        </div>
    </div>

</div>
<?php }else{?>
    <div class="alert alert-danger">عفوا !......لاتوجد جلسات مفتوحه</div>
<?php } ?>
<script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>
<script>




    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    /*	date1.setAttribute("value",cal1.getDate().getDateString());
     date2.setAttribute("value",cal2.getDate().getDateString());*/

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    //	setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function() {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function() {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        /*	date1.value = cal1.getDate().getDateString();
         date2.value = cal2.getDate().getDateString();*/

        date1.setAttribute("value",cal1.getDate().getDateString());
        date2.setAttribute("value",cal2.getDate().getDateString());
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }



</script>

<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    /*	dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
     dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());*/

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



    calEnd1.show();
    calEnd2.show();
    //	setDateFieldsEnd1();





    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };





    calEnd1.onHide = function() {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function() {
        calEnd2.show(); // prevent the widget from being closed
    };





    function setDateFieldsEnd1() {
        /*	dateEnd1.value = calEnd1.getDate().getDateString();
         dateEnd2.value = calEnd2.getDate().getDateString();*/

        dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
    }




    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {
        if (calEnd2.isHidden())
            calEnd2.show();
        else
            calEnd2.hide();
    }


    //# sourceURL=pen.js

</script>
<script>

    var cal11 = new Calendar(),
        cal22 = new Calendar(true, 0, true, true),
        date11 = document.getElementById('mostadem-date-Miladi'),
        date22 = document.getElementById('mostadem-date-Hijri'),
        cal11Mode = cal11.isHijriMode(),
        cal22Mode = cal22.isHijriMode();


    /*	date11.setAttribute("value",cal11.getDate().getDateString());
     date22.setAttribute("value",cal22.getDate().getDateString());*/

    document.getElementById('cal-11').appendChild(cal11.getElement());
    document.getElementById('cal-22').appendChild(cal22.getElement());


    cal11.show();
    cal22.show();
    //	setDateFields();


    cal11.callback = function () {
        if (cal11Mode !== cal11.isHijriMode()) {
            cal22.disableCallback(true);
            cal22.changeDateMode();
            cal22.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal22Mode = cal22.isHijriMode();
        } else

            cal22.setTime(cal11.getTime());
        setDateFields();
    };

    cal22.callback = function () {
        if (cal22Mode !== cal22.isHijriMode()) {
            cal11.disableCallback(true);
            cal11.changeDateMode();
            cal11.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal22Mode = cal22.isHijriMode();
        } else

            cal11.setTime(cal22.getTime());
        setDateFields();
    };


    cal11.onHide = function() {
        cal11.show(); // prevent the widget from being closed
    };

    cal22.onHide = function() {
        cal22.show(); // prevent the widget from being closed
    };
    function setDateFields() {
        /*	date11.value = cal11.getDate().getDateString();
         date22.value = cal22.getDate().getDateString();*/

        date11.setAttribute("value",cal11.getDate().getDateString());
        date22.setAttribute("value",cal22.getDate().getDateString());
    }

    function showCal11() {
        if (cal11.isHidden())
            cal11.show();
        else
            cal11.hide();
    }

    function showCal22() {
        if (cal22.isHidden())
            cal22.show();
        else
            cal22.hide();
    }



</script>




<script>


    var calEnd11 = new Calendar(),
        calEnd22 = new Calendar(true, 0, true, true),
        dateEnd11 = document.getElementById('mostadem-date-Miladi-end'),
        dateEnd22 = document.getElementById('mostadem-date-Hijri-end'),
        calEnd11Mode = calEnd11.isHijriMode(),
        calEnd22Mode = calEnd22.isHijriMode();


    /*	dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
     dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());*/

    document.getElementById('cal-end-11').appendChild(calEnd11.getElement());
    document.getElementById('cal-end-22').appendChild(calEnd22.getElement());



    calEnd11.show();
    calEnd22.show();
    //	setDateFieldsEnd();





    calEnd11.callback = function () {
        if (calEnd11Mode !== calEnd11.isHijriMode()) {
            calEnd22.disableCallback(true);
            calEnd22.changeDateMode();
            calEnd22.disableCallback(false);
            calEnd11Mode = calEnd11.isHijriMode();
            calEnd22Mode = calEnd22.isHijriMode();
        } else

            calEnd22.setTime(calEnd11.getTime());
        setDateFieldsEnd();
    };

    calEnd22.callback = function () {
        if (calEnd22Mode !== calEnd22.isHijriMode()) {
            calEnd11.disableCallback(true);
            calEnd11.changeDateMode();
            calEnd11.disableCallback(false);
            calEnd11Mode = calEnd11.isHijriMode();
            calEnd22Mode = calEnd22.isHijriMode();
        } else

            calEnd11.setTime(calEnd22.getTime());
        setDateFieldsEnd();
    };





    calEnd11.onHide = function() {
        calEnd11.show(); // prevent the widget from being closed
    };

    calEnd22.onHide = function() {
        calEnd22.show(); // prevent the widget from being closed
    };





    function setDateFieldsEnd() {
        /*	dateEnd11.value = calEnd11.getDate().getDateString();
         dateEnd22.value = calEnd22.getDate().getDateString();*/

        dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
        dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());
    }




    function showCalEnd11() {
        if (calEnd11.isHidden())
            calEnd11.show();
        else
            calEnd11.hide();
    }

    function showCalEnd22() {
        if (calEnd22.isHidden())
            calEnd22.show();
        else
            calEnd22.hide();
    }


    //# sourceURL=pen.js

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>
    function qrar_mehwar(valu)
    {
        var mehar=$('#mehar'+valu).val();
        if($('#mehar'+valu).val()=='')
        {
            $('.mehar'+valu) .show();
            return;

        }

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/update_qrar",
            data: {valu:valu,mehar:mehar},


            success: function (d) {
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'نجاح تم حفظ القرار',
                    showConfirmButton: false,
                    timer: 2000
                })

                var app=$('.table'+valu);
                $('.table'+valu).show();
                $('.update').append($('.table'+valu));
                $('#btn'+valu).text('تعديل');


            }

        });
    }
</script>

<script>
    function qrar_mehwar_update(valu)
    {
        var mehar=$('#mehar'+valu).val();
        if($('#mehar'+valu).val()=='')
        {
            $('.mehar'+valu) .show();
            return;

        }

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/update_qrar",
            data: {valu:valu,mehar:mehar},


            success: function (d) {
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'نجاح تم تعديل القرار',
                    showConfirmButton: false,
                    timer: 2000
                })



            }

        });
    }
</script>
<script>
    function attend_member(valu)
    {
       var attend=[];
       var mem_id_fk=[];

        $(".attend:radio:checked").each(function () {
            attend.push($(this).val());
        })
        $(".mem_id_fk").each(function () {
            mem_id_fk.push($(this).val());
        })
        if(mem_id_fk.length!==attend.length){
            alert("من فضلك ادخل البيانات كامله");
            return;
        }
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/update_member_hdoor",
            data: {mem_id_fk:mem_id_fk,attend:attend},


            success: function (d) {
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'تم تسجيل الحضور بنجاح',
                    showConfirmButton: false,
                    timer:1000
                })
            }

        });

    }
</script>
<script>
    function make_not_read(valu)
    {
        $('#mehar'+valu).prop('readonly', false);
    }
</script>