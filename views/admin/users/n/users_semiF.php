<div class="col-xs-12" >    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">        <div class="panel-heading">            <h3 class="panel-title"><?php echo $title?> </h3>        </div>        <div class="panel-body">            <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">                <!-- Nav tabs -->                <ul class="nav nav-tabs">                    <li   class="<?php if(isset($result)){                        if($result['role_id_fk'] == 1){                            ?> active <?php } }else{ ?> active <?php }                    ?>">                        <a href="#<?php if(isset($result)){                            if($result['role_id_fk'] == 1){ ?>tab1<?php }                        }else{ echo 'tab1';} ?>"                           data-toggle="tab">إضافة مدير علي النظام</a>                    </li>                    <li  class="<?php if(isset($result)){ if($result['role_id_fk'] == 2){                        ?>active <?php } } ?>">                        <a href="#<?php if(isset($result)){ if($result['role_id_fk'] == 2){ ?>                             tab2<?php } }else{ echo 'tab2';} ?>"                           data-toggle="tab">إضافة عضو مجلس الإدارة</a></li>                    <li  class="<?php if(isset($result)){ if($result['role_id_fk'] == 3){                        ?>active <?php } }?>">                        <a href="#<?php if(isset($result)){ if($result['role_id_fk'] == 3){                            ?>tab3<?php } }else{ echo 'tab3';} ?>"                           data-toggle="tab">إضافة مستخدم لموظف</a></li>                    <li  class="<?php if(isset($result)){ if($result['role_id_fk'] == 4){                        ?>active <?php } }?>">                        <a href="#<?php if(isset($result)){ if($result['role_id_fk'] == 4){                            ?>tab4<?php } }else{ echo 'tab4';} ?>"                           data-toggle="tab">إضافة مستخدم لجمعية عمومية</a></li>                    <li  class="<?php if(isset($result)){ if($result['role_id_fk'] == 5){                        ?>active <?php } }?>">                        <a href="#<?php if(isset($result)){ if($result['role_id_fk'] == 5){                            ?>tab5<?php } }else{ echo 'tab5';} ?>"                           data-toggle="tab">إضافة مستخدم متطوع</a></li>                </ul>                <!-- Tab panels -->                <div class="tab-content col-xs-12 col-sm-12">                    <div class="tab-pane fade  <?php if(isset($result)){ if($result['role_id_fk'] == 1)                    { ?> in active <?php } }else{?> in active<?php } ?>" id="tab1">                        <div class="panel-body" ><br>                            <?php                            if(isset($result)):                                echo form_open_multipart('Dashboard/update_users/'.$result['user_id']);                            else:                                echo form_open_multipart('Dashboard/add_user');                            endif;                            ?>                            <div class="col-sm-12 col-xs-12">                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إسم المستخدم  </label>                                    <input type="text" class="form-control half input-style" id="user_name" name="user_name" data-validation="required" placeholder="إسم المستخدم" value="<?php                                     if(isset($result)){ echo $result['user_name']; }  ?>"  >                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الجوال  </label>                                    <input type="text" class="form-control half input-style " name="user_phone" placeholder=" رقم الجوال" value="<?php                                     if(isset($result)){ echo $result['user_phone']; }?>" data-validation="required" onkeypress="validate_number(event)">                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الهوية  </label>                                    <input type="text"  name="id_number" id="id_number"  data-validation="required" onkeypress="validate_number(event)"   value="<?php                                      if(isset($result)){ echo $result['user_id_number']; }  ?>" class="form-control half input-style " placeholder=" رقم الهوية"  />                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half"> كلمة المرور <strong></strong> </label>                                    <input type="password" id="user_pass" class="form-control half input-style"  name="user_pass" onkeyup="return valid('validate1','user_pass','button');" autocomplete="off"  placeholder=" كلمه المرور " data-validation="<?php if(isset($result)){ }else{ echo 'required';}?>"/>                                    <span  id="validate1" class="span-validation"></span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">تاكيد كلمة المرور <strong></strong> </label>                                    <input type="password"   id="user_pass_validate" class="form-control half input-style"  placeholder="تأكيد كلمة المرور" onkeyup="return valid2('validate','user_pass_validate','button','user_pass');"  />                                    <span  id="validate" class="span-validation"> </span>                                </div>                            </div>                            <div class="col-xs-12 col-lg-pull-5">                                <input type="hidden" name="role_id_fk" value="1">                                <button type="submit" class="btn btn-purple w-md m-b-5 mybutton" name="add_user" id="button" value="add_user">حفظ</button>                            </div>                            <?php  echo form_close();?>                        </div>                    </div>                    <div class="tab-pane fade <?php if(isset($result) && $result['role_id_fk'] == 2){ if($result['role_id_fk'] == 2){?> in active <?php } }  ?>" id="tab2">                        <div class="panel-body"><br>                            <?php                            if(isset($result)):                                echo form_open_multipart('Dashboard/update_users/'.$result['user_id']);                            else:                                echo form_open_multipart('Dashboard/add_user');                            endif;                            //echo $this->uri->segment(2);                            if( $this->uri->segment(2)== 'add_user' ){                                $disabl = '';                            }elseif($this->uri->segment(2)== 'update_users' ){                                $disabl = 'disabled';                            }                            ?>                            <div class="col-sm-12 col-xs-12">                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إختار العضو </label>                                    <select <?php echo $disabl; ?>  name="emp_code" id="doc_id"   class="form-control half selectpicker "  data-validation="required"  aria-required="true" data-show-subtext="true" data-live-search="true" onchange="getMyDetails(this.value)">                                        <option value="">إختر العضو </option>                                        <?php                                        if(!empty($all_members) &&  isset($all_members) && $all_members!=null){                                            foreach ($all_members as $one):                                                $select='';                                                if(isset($result)){                                                    if($result['emp_code'] == $one->id){                                                        $select='selected';                                                    }                                                } ?>                                                <option value="<?php echo $one->id?>" <?php echo $select;?>> <?php echo $one->member_name?> </option>                                                <?php                                            endforeach;                                        }else{                                            echo '<option value="">لايوجد أعضاء</option>';                                        }                                        ?>                                    </select>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الهوية  </label>                                    <input type="text"    readonly name="id_number" id="member_id_number"    value="<?php                                    if(isset($result)){ echo $result['user_id_number']; }  ?>"   class="form-control half input-style " placeholder=" رقم الهوية"  />                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الجوال  </label>                                    <input type="text"  readonly class="form-control half input-style "  value="<?php                                     if(isset($result)){ echo $result['user_phone']; }  ?>"  name="user_phone" id="member_mob" placeholder=" رقم الجوال"  >                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إسم المستخدم  </label>                                    <input type="text" class="form-control half input-style" id="member_name" name="user_name"  value="<?php                                     if(isset($result)){ echo $result['user_name'];  } ?>" data-validation="required" placeholder="إسم المستخدم" value="<?php if(isset($result)) echo $result['user_name'] ?>"  >                                    <span  id="lenth" class="span-validation"> </span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half"> كلمة المرور <strong></strong> </label>                                    <input type="password" id="member_user_pass" class="form-control half input-style"  name="user_pass" onkeyup="return valid('member_validate1','member_user_pass','member_button');" autocomplete="off"  placeholder=" كلمه المرور " data-validation="<?php                                     if(isset($result)){ }else{ echo 'required';}  ?>" />                                    <span  id="member_validate1" class="span-validation"></span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">تاكيد كلمة المرور <strong></strong> </label>                                    <input type="password"   id="member_user_pass_validate" class="form-control half input-style"  placeholder="تأكيد كلمة المرور" onkeyup="return valid2('member_validate','member_user_pass_validate','member_button','member_user_pass');"  />                                    <span  id="member_validate" class="span-validation"> </span>                                </div>                                <div class="col-xs-12 col-lg-pull-5">                                    <input type="hidden" name="role_id_fk" value="2">                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add_user" id="member_button" value="add_user">حفظ</button>                                </div>                                <?php  echo form_close();?>                            </div>                        </div>                    </div>                    <div class="tab-pane fade <?php if(isset($result) && $result['role_id_fk'] == 3){ if($result['role_id_fk'] == 3){?> in active <?php } } ?>" id="tab3">                        <div class="panel-body"><br>                            <?php                            if(isset($result)):                                echo form_open_multipart('Dashboard/update_users/'.$result['user_id']);                            else:                                echo form_open_multipart('Dashboard/add_user');                            endif;                            if( $this->uri->segment(2)== 'add_user' ){                                $disabl = '';                            }elseif($this->uri->segment(2)== 'update_users' ){                                $disabl = 'disabled';                            }                            ?>                            <div class="col-sm-12 col-xs-12">                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إختار الموظف </label>                                    <select    <?php echo $disabl; ?>  name="emp_code" id="employee_id"   class="form-control half selectpicker "  data-validation="required"  aria-required="true" data-show-subtext="true" data-live-search="true" onchange="getEmployeeDetails(this.value)">                                        <option value="">إختر الموظف</option>                                        <?php                                        if(!empty($all_empolyee) &&  isset($all_empolyee) && $all_empolyee!=null){                                            foreach ($all_empolyee as $one):                                                /*     if(in_array($one->id,$employes)){                                                     continue;                                                             }*/                                                $select='';                                                 if(isset($result)){                                                    if($result['emp_code'] == $one->id){                                                        $select='selected';                                                    }                                                } ?>                                                <option value="<?php echo $one->id?>" <?php echo $select;?>> <?php echo $one->employee?> </option>                                                <?php                                            endforeach;                                        }else{                                            echo '<option value="">لايوجد موظفين</option>';                                        }                                        ?>                                    </select>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الهوية  </label>                                    <input type="text"    readonly name="id_number" id="employee_id_number"  value="<?php if(isset($result)){ echo $result['user_id_number']; }?>"  class="form-control half input-style " placeholder=" رقم الهوية"  />                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الجوال  </label>                                    <input type="text"  readonly class="form-control half input-style" name="user_phone" value="<?php if(isset($result)){ echo $result['user_phone']; }?>" id="employee_mob" placeholder=" رقم الجوال"  >                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إسم المستخدم  </label>                                    <input type="text" class="form-control half input-style" id="employee_id_name" name="user_name" value="<?php if(isset($result)){ echo $result['user_name']; }?>" data-validation="required" placeholder="إسم المستخدم" value="<?php if(isset($result)) echo $result['user_name'] ?>"  >                                    <span  id="lenth" class="span-validation"> </span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half"> كلمة المرور <strong></strong> </label>                                    <input type="password" id="emp_user_pass" class="form-control half input-style"  name="user_pass" onkeyup="return valid('emp_validate1','emp_user_pass','emp_button');" autocomplete="off"  placeholder=" كلمه المرور " data-validation="<?php if(isset($result)){ }else{ echo 'required';}?>"/>                                    <span  id="emp_validate1" class="span-validation"></span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">تاكيد كلمة المرور <strong></strong> </label>                                    <input type="password"   id="emp_user_pass_validate" class="form-control half input-style"  placeholder="تأكيد كلمة المرور" onkeyup="return valid2('emp_validate','emp_user_pass_validate','emp_button','emp_user_pass');"  />                                    <span  id="emp_validate" class="span-validation"> </span>                                </div>                                <div class="col-xs-12 col-lg-pull-5">                                    <input type="hidden" name="role_id_fk" value="3">                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add_user" id="emp_button" value="add_user">حفظ</button>                                </div>                                <?php  echo form_close();?>                            </div>                        </div>                    </div>                    <div class="tab-pane fade <?php if(isset($result) && $result['role_id_fk'] == 4){ if($result['role_id_fk'] == 4){?> in active <?php } } ?>" id="tab4">                        <div class="panel-body"><br>                            <?php                            if(isset($result)):                                echo form_open_multipart('Dashboard/update_users/'.$result['user_id']);                            else:                                echo form_open_multipart('Dashboard/add_user');                            endif;                            if( $this->uri->segment(2)== 'add_user' ){                                $disabl = '';                            }elseif($this->uri->segment(2)== 'update_users' ){                                $disabl = 'disabled';                            }                            ?>                            <div class="col-sm-12 col-xs-12">                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إختر العضو </label>                                    <select    <?php echo $disabl; ?>  name="emp_code" id="employee_id"   class="form-control half selectpicker "  data-validation="required"  aria-required="true" data-show-subtext="true" data-live-search="true" onchange="getGeneral_assembley_member_Details(this.value)">                                        <option value="">إختر العضو </option>                                        <?php                                        if(!empty($general_assembley_members) &&  isset($general_assembley_members) && $general_assembley_members!=null){                                            foreach ($general_assembley_members as $one):                                                     if(in_array($one->id,$general_assembley_members)){                                                     continue;                                                             }                                                $select='';                                                if(isset($result)){                                                    if($result['emp_code'] == $one->id){                                                        $select='selected';                                                    }                                                } ?>                                                <option value="<?php echo $one->id?>" <?php echo $select;?>> <?php echo $one->name?> </option>                                                <?php                                            endforeach;                                        }else{                                            echo '<option value="">لايوجد أعضاء مضافين</option>';                                        }                                        ?>                                    </select>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم العضويه </label>                                    <input type="text"    readonly name="id_number" id="general_assembley_member_number"  value="<?php if(isset($result)){ echo $result['user_id_number']; }?>"  class="form-control half input-style " placeholder=" رقم الهوية"  />                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الجوال  </label>                                    <input type="text"  readonly class="form-control half input-style" name="user_phone" value="<?php if(isset($result)){ echo $result['user_phone']; }?>" id="general_assembley_member_phone" placeholder=" رقم الجوال"  >                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إسم المستخدم  </label>                                    <input type="text" class="form-control half input-style" id="general_assembley_member_name" name="user_name" value="<?php if(isset($result)){ echo $result['user_name']; }?>" data-validation="required" placeholder="إسم المستخدم" value="<?php if(isset($result)) echo $result['user_name'] ?>"  >                                    <span  id="lenth" class="span-validation"> </span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half"> كلمة المرور <strong></strong> </label>                                    <input type="password" id="emp_user_pass" class="form-control half input-style"  name="user_pass" onkeyup="return valid('emp_validate1','emp_user_pass','emp_button');" autocomplete="off"  placeholder=" كلمه المرور " data-validation="<?php if(isset($result)){ }else{ echo 'required';}?>"/>                                    <span  id="emp_validate1" class="span-validation"></span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">تاكيد كلمة المرور <strong></strong> </label>                                    <input type="password"   id="emp_user_pass_validate" class="form-control half input-style"  placeholder="تأكيد كلمة المرور" onkeyup="return valid2('emp_validate','emp_user_pass_validate','emp_button','emp_user_pass');"  />                                    <span  id="emp_validate" class="span-validation"> </span>                                </div>                                <div class="col-xs-12 col-lg-pull-5">                                    <input type="hidden" name="role_id_fk" value="4">                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add_user" id="emp_button" value="add_user">حفظ</button>                                </div>                                <?php  echo form_close();?>                            </div>                        </div>                    </div>                    <div class="tab-pane fade  <?php if(isset($result)){ if($result['role_id_fk'] == 5)                    { ?> in active <?php } } ?> " id="tab5">                        <div class="panel-body" ><br>                            <?php                            if(isset($result)):                                echo form_open_multipart('Dashboard/update_users/'.$result['user_id']);                            else:                                echo form_open_multipart('Dashboard/add_user');                            endif;                            ?>                            <div class="col-sm-12 col-xs-12">                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">إسم المستخدم  </label>                                    <input type="text" class="form-control half input-style" id="user_name" name="user_name" data-validation="required" placeholder="إسم المستخدم" value="<?php if(isset($result)){ echo $result['user_name']; }?>"  >                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الجوال  </label>                                    <input type="text" class="form-control half input-style " name="user_phone" placeholder=" رقم الجوال" value="<?php if(isset($result)){ echo $result['user_phone']; }?>" data-validation="required" onkeypress="validate_number(event)">                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">رقم الهوية  </label>                                    <input type="text"  name="id_number" id="id_number"  data-validation="required" onkeypress="validate_number(event)"   value="<?php if(isset($result)){ echo $result['user_id_number']; }?>" class="form-control half input-style " placeholder=" رقم الهوية"  />                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half"> كلمة المرور <strong></strong> </label>                                    <input type="password" id="user_pass" class="form-control half input-style"  name="user_pass" onkeyup="return valid('validate1','user_pass','button');" autocomplete="off"  placeholder=" كلمه المرور " data-validation="<?php if(isset($result)){ }else{ echo 'required';}?>"/>                                    <span  id="validate1" class="span-validation"></span>                                </div>                                <div class="form-group col-sm-4 col-xs-12">                                    <label class="label label-green  half">تاكيد كلمة المرور <strong></strong> </label>                                    <input type="password"   id="user_pass_validate" class="form-control half input-style"  placeholder="تأكيد كلمة المرور" onkeyup="return valid2('validate','user_pass_validate','button','user_pass');"  />                                    <span  id="validate" class="span-validation"> </span>                                </div>                            </div>                            <div class="col-xs-12 col-lg-pull-5">                                <input type="hidden" name="role_id_fk" value="5">                                <button type="submit" class="btn btn-purple w-md m-b-5 mybutton" name="add_user" id="button" value="add_user">حفظ</button>                            </div>                            <?php  echo form_close();?>                        </div>                    </div>                </div>            </div>            <br/>            <br/>                        <?php if(isset($users)&&$users!=null):?>                          <div class="col-xs-12">                              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">                              <thead>                                <tr>                                    <th class="text-center">م</th>                                    <th class="text-center">الإسم الخاص بـ الموظف - العضو  </th>                                    <th class="text-center">الاسم </th>                                    <th class="text-center"> رقم التليفون </th>                                    <th class="text-center"> نوع المستخدم </th>                                    <th class="text-center">التحكم </th>                                    <th class="text-center"> حالة الأكونت   </th>                                </tr>                                </thead>                                <tbody class="text-center">                                <?php                                $arr=array(1=>'مدير على النظام',3=>'موظف',2=>'عضو',4=>'مستخدم جمعية عمومية',5=>'مستخدم متطوع');                                $x = 0 ;                                /*  echo '<pre>';                                print_r($users);                                echo '<pre>';*/                                foreach($users as $record){?>                                    <tr>                                    <td><?php echo($x+1);?></td>                                    <td><?php                                        if($record->role_id_fk == 3){                                            $classs_n = 'warning';                                            $name = $record->emp_name;                                        }elseif($record->role_id_fk == 2){                                            $classs_n ='primary';                                            $name = $record->member_name;                                        }elseif($record->role_id_fk == 1 ){                                            $name = $record->user_name;                                            $classs_n ='success';                                        }elseif ($record->role_id_fk == 4 || $record->role_id_fk == 4){                                            $name = $record->user_name;                                            $classs_n ='info';                                        }elseif ($record->role_id_fk == 5){                                            $name = $record->user_name;                                            $classs_n ='danger';                                        }                                        ?>                                        <span class="label-custom label label-<?echo $classs_n ?>" style="font-size: 12px;">                                        <?php  echo $name ; ?></span>                                    </td>                                    <td><?php echo $record->user_name; ?> </td>                                    <td><?php echo $record->user_phone;?></td>                                    <td><?php if(!empty($arr[$record->role_id_fk])){ ?>                                            <?php                                            ?>                                            <span class="label-custom label label-<?=$classs_n ?>" style="font-size: 12px;">                                        <?php  echo $arr[$record->role_id_fk]; ?></span>                                        <?php  };?></td>                                    <td>                                        <a href="<?php echo base_url('Dashboard/update_users').'/'.$record->user_id?>" onclick="checkActive(<?php echo $record->role_id_fk;?>)">                                            <i class="fa fa-pencil " aria-hidden="true"></i> </a>                                        <a href="<?php echo  base_url('Dashboard/delete').'/'.$record->user_id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >                                            <i class="fa fa-trash" aria-hidden="true"></i></a>                                    </td>                                    <td>                                        <?php if($record->approved == 1){                                            $class = 'success';                                            $name = 'نشط';                                            ?>                                        <?php }else{                                            $class = 'danger';                                            $name = 'غير نشط';                                        }  ?>                                        <a  href="<?php echo base_url().'Dashboard/approved_user/'.$record->user_id.'/'.$record->approved?>"                                            onclick="return confirm('هل انت متأكد من هذا الإجراء ');" class="btn btn-<?php echo $class; ?> btn-sm ">                                            <?php echo $name; ?></a>                                    </td>                                    </tr>                                    <?php $x++;} ?>                                </tbody>                            </table>                          </div>                        <?php endif; ?>        </div>    </div></div><script>    function getMyDetails(member_id) {        if (member_id !=0 &&  member_id >0 &&  member_id!='') {            var dataString = 'member_id=' + member_id;            $.ajax({                type:'post',                url: '<?php echo base_url() ?>Dashboard/getMemberDetails',                data:dataString,                cache:false,                success: function(json_data){                    var JSONObject = JSON.parse(json_data);                    console.log(JSONObject);                    /*   $('#member_id_number').val(JSONObject['appointment_date']);                     $('#member_mob').val(JSONObject['appointment_date']);                     $('#member_name').val(JSONObject['appointment_date']);*/                    $('#member_id_number').val(JSONObject['member_national_num']);                    $('#member_mob').val(JSONObject['member_phone']);                    $('#member_name').val(JSONObject['member_national_num']);                }            });            return false;        }    }</script><script>    function getEmployeeDetails(employee_id) {        if (employee_id !=0 &&  employee_id >0 &&  employee_id!='') {            var dataString = 'employee_id=' + employee_id;            $.ajax({                type:'post',                url: '<?php echo base_url() ?>Dashboard/getEmployeeDetails',                data:dataString,                cache:false,                success: function(json_data){                    var JSONObject = JSON.parse(json_data);                    console.log(JSONObject);                    $('#employee_id_number').val(JSONObject['card_num']);                    $('#employee_mob').val(JSONObject['phone']);                    $('#employee_id_name').val(JSONObject['card_num']);                }            });            return false;        }    }</script><script>    function getGeneral_assembley_member_Details(employee_id) {        if (employee_id !=0 &&  employee_id >0 &&  employee_id!='') {            var dataString = 'employee_id=' + employee_id;            $.ajax({                type:'post',                url: '<?php echo base_url() ?>Dashboard/getGeneral_assembley_member_Details',                data:dataString,                cache:false,                success: function(json_data){                    var JSONObject = JSON.parse(json_data);                    console.log(JSONObject);                    $('#general_assembley_member_number').val(JSONObject['membership_num']);                    $('#general_assembley_member_phone').val(JSONObject['mob']);                    $('#general_assembley_member_name').val(JSONObject['membership_num']);                }            });            return false;        }    }</script><script>    function valid(div1,div2,button) {        if ($("#" + div2).val().length < 4) {            document.getElementById(div1).style.color = '#F00';            document.getElementById(div1).innerHTML = 'كلمة المرور اكثر من اربع حروف';            document.getElementById(button).setAttribute("disabled", "disabled");        }        if ($("#" + div2).val().length > 4 && $("#user_pass").val().length < 10) {            document.getElementById(div1).style.color = '#F00';            document.getElementById(div1).innerHTML = 'كلمة المرور ضعيفة';            document.getElementById(button).removeAttribute("disabled", "disabled");        }        if ($("#" + div2).val().length > 10) {            document.getElementById(div1).style.color = '#00FF00';            document.getElementById(div1).innerHTML = 'كلمة المرور قوية';            document.getElementById(button).removeAttribute("disabled", "disabled");        }    }    function valid2(div2,div3,button,input){        if($("#"+input).val() == $("#" + div3).val()){            document.getElementById(div2).style.color = '#00FF00';            document.getElementById(div2).innerHTML = 'كلمة المرور متطابقة';            document.getElementById(button).removeAttribute("disabled", "disabled");        }else{            document.getElementById(div2).style.color = '#F00';            document.getElementById(div2).innerHTML = 'كلمة المرور غير متطابقة';            document.getElementById(button).setAttribute("disabled", "disabled");        }    }</script>