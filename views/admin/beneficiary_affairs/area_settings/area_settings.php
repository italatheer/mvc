
<div class="details-resorce col-xs-11 r-inner-details" >

    <?php if(isset($result)):?>
    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('BeneficiaryAffairs/update_area_settings/'.$result['id'])?>
  
        <div class="col-xs-12">
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> عنوان المنطقة:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4" value="<?php echo $result['title']; ?>" name="title" />
                    </div>
                </div>
                
            </div>
            <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit" name="update" value="تعديل" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
        </div>
 
    <?php echo form_close()?>
    <?php else: ?>
    <?php echo form_open_multipart('BeneficiaryAffairs/area_settings')?>
  
    
        <div class="col-xs-12">
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> عنوان المنطقة:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4"  name="title" required="" >
                    </div>
                </div>
                
            </div>
            <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
        </div>
 
        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>
</div>
<div class="col-md-11  col-sm-11 col-xs-11 inner-side r-data">
<?php if(isset($records)&&$records!=null):?>
    <div class="col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">عنوان المنطقة</th>
            <th width="35%" class="text-center">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title="#" class="text-center"><span class="badge"><?php echo  $record->id?></span></td>
                <td data-title="" class="text-center"><?php echo $record->title?> </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'BeneficiaryAffairs/update_area_settings/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'BeneficiaryAffairs/delete_area_settings/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
</div>
<?php endif;?>
</div>