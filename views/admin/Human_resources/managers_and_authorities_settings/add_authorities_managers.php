<style type="text/css">
    .top-label {
        font-size: 13px;
    }

    .inner-heading-green{
        background-color: #5eab5e;
        padding: 10px;
        color: #fff;
    }
.tb_table tbody td,.tb_table tbody th{
    padding: 0 !important;
}
</style>

<div class="col-sm-12  col-xs-12 no-padding" >

            <?php echo form_open_multipart('human_resources/Managers_and_authorities_settings/add_authorities_managers');?>
            <div class="col-sm-12 col-xs-12">

                <div class="col-sm-1 col-xs-12"></div>
                <div class="col-sm-10 col-xs-12">
                   
                    <button type="button" value="" id="" onclick="add_row()" class="btn btn-success btn-labeled"/><span class="btn-label"><i class="fa fa-plus"></i></span> إضافة </button>

                    <table class="table table-striped table-bordered tb_table"   style="display: none" id="mytable">
                        <thead>
                        <tr class="info">
                            <th>المسمي الوظيفي</th>
                            <th style="width: 30%;">الإسم</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="resultTable">

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1 col-xs-12"></div>
            </div>





            <div class="col-sm-12 text-center">
               
                   <button type="submit" value="حفظ" name="add" id="saves" style="display: none" class="btn btn-success btn-labeled"/><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ </button>
            
            </div>
            <?php  echo form_close()?>


            <div class="col-sm-12 no-padding" ><br>
                <?php if(!empty($records) && isset($records)){ ?>
                    <table   class="table table-striped table-bordered "   >
                        <thead>
                        <tr class="info">
                            <th class="text-center" >م </th>
                            <th class="text-center" > المسمي الوظيفي</th>
                            <th class="text-center" >الإسم </th>
                            <th class="text-center" > الملف </th>
                            <th class="text-center" > الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=1; foreach($records as $record){ ?>
                            <tr>
                                <td style="text-align: center!important;"><?php echo $count++; ?></td>
                                <td style="text-align: center!important;"><?php echo $record->jobtitle_name; ?></td>
                                <td style="text-align: center!important;"><?php echo $record->empolyee_name; ?></td>
                                <td style="text-align: center!important;">
                                    <?php if(!empty($record->sign_img)){?>
                                        <a href=" <?php echo base_url().'uploads/images/'.$record->sign_img?>" download> <i class="fa fa-download"></i> </a>
                                        <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $record->id;?>"> <i class="fa fa-eye"></i> </a>
                                    <?php }else{ echo'لايوجد ملف'; } ?>
                                </td>
                                <td style="text-align: center!important;">
                                    <a href="#"  data-toggle="modal" data-target="#modal-update<?php echo $record->id;?>" onclick="getUpdateForm(<?php echo $record->id;?>)">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a href="<?php echo  base_url('').'human_resources/Managers_and_authorities_settings/Delete_authorities_managers/'.$record->id."" ?>"
                                       onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>


                            <!------------------------------------------------------------------------------------->
                            <div class="modal" id="myModal-view<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                <div class="modal-dialog" role="document" style="width: 70%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo base_url().'uploads/images/'.$record->sign_img?>" width="100%">
                                        </div>
                                        <div class="modal-footer" style="display: inline-block;width: 100%">
                                            <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق </button>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!------------------------------------------------------------------------------------->

                        <?php } ?>

                        </tbody>
                    </table>






                <?php $count=1; foreach($records as $record){ ?>






                        <div class="modal" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                        <div class="modal-dialog" role="document" style="width: 70%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                </div>
                                <div class="modal-body" id="myUpdateForm<?php echo $record->id;?>"></div>
                                <div class="modal-footer" style="display: inline-block;width: 100%">
                                    <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                <?php } ?>
            </div>





</div>

<script>
    var a=1;
    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = a++;
        // var len = x.rows.length;
        var dataString   ='lenth=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>human_resources/Managers_and_authorities_settings/get_jobtitle',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
                $('#saves').show();
            }
        });

    }
    //--------
    //-----------------------------------------------

</script>

<script>
    function getUpdateForm(update_id) {
        if( update_id !='' ){
            var dataString = 'update_id=' + update_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Managers_and_authorities_settings/Update_authorities_managers',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#myUpdateForm" + update_id).html(html);
                }
            });
        }
    }

</script>

