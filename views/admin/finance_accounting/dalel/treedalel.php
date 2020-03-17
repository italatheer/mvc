<style type="text/css">    .padd {        padding: 0 3px !important;    }    .no-padding {        padding: 0;    }    .no-margin {        margin: 0;    }    h4 {        margin-top: 0;    }    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {        height: 34px !important;        border-radius: 4px !important;        margin: 0 !important;    }    .bootstrap-select.btn-group .dropdown-toggle .caret {        right: 92% !important;    }    .btn-label {        left: 12px;    }    .tree ul {        margin-right: 10px;        position: relative;        margin-left: 0;    }    .tree ul li {        padding-left: 0;    }    .tree ul ul {        margin-left: 0;    }    @media (min-width: 992px) {        .col_md_10 {            width: 10%;            float: right;        }        .col_md_15 {            width: 15%;            float: right;        }        .col_md_20 {            width: 20%;            float: right;        }        .col_md_25 {            width: 25%;            float: right;        }        .col_md_30 {            width: 30%;            float: right;        }        .col_md_35 {            width: 35%;            float: right;        }        .col_md_40 {            width: 40%;            float: right;        }        .col_md_45 {            width: 45%;            float: right;        }        .col_md_50 {            width: 50%;            float: right;        }        .col_md_60 {            width: 60%;            float: right;        }        .col_md_70 {            width: 70%;            float: right;        }        .col_md_75 {            width: 75%;            float: right;        }        .col_md_80 {            width: 80%;            float: right;        }        .col_md_85 {            width: 85%;            float: right;        }        .col_md_90 {            width: 90%;            float: right;        }        .col_md_95 {            width: 95%;            float: right;        }        .col_md_100 {            width: 100%;            float: right;        }    }    .label_title_2 {        width: 100%;        color: #000;        height: auto;        margin: 0;        font-family: 'hl';        padding-right: 0px;        font-size: 16px;        margin-bottom: 5px;        margin-top: 5px;        display: inline-block;    }    .input_style_2 {        border-radius: 0px;        width: 100%;    }    ul span {        display: inline !important;    }    span.dalel-num {        padding: 1px 4px;        border-radius: 2px;    }    .scrol_width ::-webkit-scrollbar {        width: 15px;        height: 5px;    }    .tree li a {        font-size: 16px;    }</style><div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">    <div class="panel-heading">        <div class="panel-title">            <h4><?php echo $title; ?></h4>        </div>    </div>    <div class="panel-body">        <!--  <div class="col-md-7 col-sm-12 col-xs-12 padding-4">          </div>     -->        <!---------------------------------------------------------------------------->        <div class="col-md-2 col-sm-12 col-xs-12 padding-4">        </div>        <div class=" col-md-8 col-sm-12 col-xs-12 padding-4">            <h5 class="no-margin">شجرة دليل الحسابات</h5>            <div class="panel-body" style="height: 400px; overflow-y: scroll;">                <div class="col-sm-12 col-xs-12 no-padding">                    <?php                    function buildTree($tree)                    {                        //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');                        $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');                        ?>                        <ul id="tree3">                            <?php foreach ($tree as $record) { ?>                                <li>                                    <a data-toggle="modal" data-target="#add_editAccounDalel"                                       onclick="add_editAccounDalel(<?= $record->id ?>,2,this)">                                <span class="dalel-num" style="background-color: <?= $color[$record->level] ?>">                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?></a>                                    <div class="pull-right">                                        <?php if ($record->parent != 0) {                                            if ($record->hesab_no3 == 2) {                                                ?>                                                <a onclick="$('#adele').attr('href', '<?= base_url() . "finance_accounting/dalel/Dalel/deleteAccount/" . $record->id ?>');"                                                   data-toggle="modal" data-target="#modal-delete" title="حذف"><i                                                            class="fa fa-trash"></i></a>                                            <?php }                                        } ?>                                        <a title="إضافة" id="add_account" data-toggle="modal"                                           data-target="#add_editAccounDalel" data-parent="<?= $record->id ?>"                                           data-parent_name="<?= $record->code . '--' . $record->name ?>"                                           data-parent_code="<?= $record->code ?>" data-ttype="<?= $record->ttype ?>"                                           data-level="<?= $record->level ?>"                                           onclick="add_editAccounDalel(0,1,this,<?= $record->code ?>);"><i                                                    class="fa fa-plus-square"></i></a>                                        <a data-toggle="modal" data-target="#add_editAccounDalel"                                           onclick="add_editAccounDalel(<?= $record->id ?>,2,this)"                                           title="تعديل الحساب"><i class="fa fa-pencil-square"></i></a>                                    </div>                                    <?php                                    if (isset($record->subs)) {                                        buildTree($record->subs);                                    }                                    ?>                                </li>                            <?php } ?>                        </ul>                        <?php                    }                    if (isset($tree) && $tree != null) {                        buildTree($tree);                    }                    ?>                </div>            </div>        </div>        <div class="col-md-2 col-sm-12 col-xs-12 padding-4">        </div>    </div></div><!----------------------------------------------------------------------------><!----------------------------------------------------------------------------><div class="modal fade " id="add_editAccounDalel" tabindex="-1" role="dialog"     aria-labelledby="myModalLabel">    <div class="modal-dialog " style="width: 80%" role="document">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span                            aria-hidden="true">&times;</span></button>                <h4 class="modal-title" id="myModalLabel_header"></h4>            </div>            <div class="modal-body">                <div class="container-fluid">                    <div class="  col-xs-12 no-padding" id="load_Accoun">                    </div>                </div>            </div>            <div class="modal-footer">                <!-- <button type="button"                         class="btn btn-labeled btn-success " id="save_account_dalel" onclick="add_editAccounDalel_ajex(0)"                         name="add" value="حفظ">                     <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ                 </button>-->                <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>                <button type="button"                        class="btn btn-labeled btn-danger " data-dismiss="modal">                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق                </button>            </div>        </div>    </div></div><!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/admin_asset/js/jquery-1.10.1.min.js"></script>--><script>    function save_account(type) {        // $('#registerForm').serialize(),        var all_inputs = $('[data-validation="required"]');        var valid = 1;        var text_valid = "";        all_inputs.each(function (index, elem) {            console.log(elem.id + $(elem).val());            if ($(elem).val() != '') {                // valid=1;                $(elem).css("border-color", "");            } else {                valid = 0;                $(elem).css("border-color", "red");            }        });        var markz_tklfa_fk = $('#markz_tklfa_fk').val();        var hesab_no3 = $("input[class='hesab_no3']:checked").val();        var markz_tklfa = $("input[class='markz_tklfa']:checked").val();        console.warn("markz_tklfa_fk " + markz_tklfa_fk);        if (!hesab_no3) {            valid = 0;            text_valid += "-نوع الحساب ";        } else if (hesab_no3 == 2) {            if (!markz_tklfa) {                valid = 0;                text_valid += "- مركز التكلفة ";            } else if (markz_tklfa == 1) {                if (markz_tklfa_fk === null) {                    console.warn("markz_tklfa_fk " + markz_tklfa_fk);                    valid = 0;                    text_valid += "- مركز التكلفة ";                    $('#markz_tklfa_fk_span').show();                } else {                    $('#markz_tklfa_fk_span').hide();                }            }        }        $.ajax({            type: 'post',            url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/addAccount',            data: $('#MyFormDalil').serialize(),            cache: false,            beforeSend: function (xhr) {                if (valid == 0) {                    swal({                        title: 'من فضلك ادخل كل الحقول ',                        text: text_valid,                        type: 'error',                        confirmButtonText: 'تم'                    });                    xhr.abort();                } else if (valid == 1) {                    swal({                        title: 'جاري اضافة حساب ',                        type: 'success',                        confirmButtonText: 'تم'                    });                }            },            success: function (html) {                swal({                    title: 'تم اضافة حساب بنجاح',                    type: 'success',                    confirmButtonText: 'تم'                });                if (type == 1){                    $('#add_editAccounDalel').modal('hide');                    location.reload();                } else if (type == 2){                    getCode();                    $('#name').val('');                    var level = parseFloat($('#level').val()) - 1;                    $('#level').val(level);                }            }        });    }    function add_editAccounDalel(id, method, obj,code) {        $.ajax({            type: 'post',            url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/add_editAccounDalel/' + id,            data: {id: id, method: method,code:code},            cache: false,            beforeSend: function () {                $("#load_Accoun").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (html) {                $("#load_Accoun").html(html);                $('.selectpicker').selectpicker("refresh");                if (method == 1) {                    // var obj=$(obj);                    $('#parent').val(obj.dataset.parent);                    $('#parent_name').val(obj.dataset.parent_name);                    $('#parent_code').val(obj.dataset.parent_code);                    $('#ttype').val(obj.dataset.ttype);                    $('#level').val(obj.dataset.level);                    getCode();                }            }        });    }    function editAccounDalel_ajex(method) {        var from_id = $("#from_id").val();        var id = $('#id').val();        var level = $('#level').val();        var ttype = $('#ttype').val();        var parent_code = $('#parent_code').val();        var parent_name = $('#parent_name').val();        var parent = $('#parent').val();        var code = $('#code').val();        var name = $('#name').val();        var hesab_tabe3a = $('#hesab_tabe3a').val();        var hesab_report = $('#hesab_report').val();        var markz_tklfa_fk = $('#markz_tklfa_fk').val();        var hesab_no3 = $("input[class='hesab_no3']:checked").val();        var markz_tklfa = $("input[class='markz_tklfa']:checked").val();        console.warn('from_id:' + from_id);        console.warn('method:' + method);        console.warn('hesab_no3:' + hesab_no3);        console.warn('name:' + name);        console.warn('markz_tklfa_fk :' + markz_tklfa_fk);        $.ajax({            type: 'post',            url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/update/' + id,            data: {                method: method,                id: id,                level: level,                ttype: ttype,                parent_code: parent_code,                parent_name: parent_name,                parent: parent,                code: code,                name: name,                hesab_tabe3a: hesab_tabe3a,                hesab_report: hesab_report,                markz_tklfa_fk: markz_tklfa_fk,                hesab_no3: hesab_no3,                markz_tklfa: markz_tklfa,                from_ajex: 1            },            cache: false,            beforeSend: function () {                swal({                    title: 'جاري التعديل ',                    type: 'success',                    confirmButtonText: 'تم'                });            },            success: function (html) {                swal({                    title: 'تم التعديل بنجاح',                    type: 'success',                    confirmButtonText: 'تم'                });                $('#add_editAccounDalel').modal('hide');                location.reload();            }        });    }</script><script>    function GetDiv_tree(div) {        $.ajax({            type: 'post',            url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/GetDiv_tree',            cache: false,            beforeSend: function () {                $("#" + div).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (html) {                $("#" + div).html(html);                $('#tree3').treed({                    openedClass: 'fa-minus',                    closedClass: 'fa-plus'                });            }        });    }</script><script>    function GetDiv_accounts(div) {        $.ajax({            type: 'post',            url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getConnection_account',            cache: false,            beforeSend: function () {                $("#" + div).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (html) {                $("#" + div).html(html);            }        });    }    function Get_account_Name(obj) {        var from_id = $("#from_id").val();        console.log(' obj :' + obj.dataset.name + ': ');        var name = obj.dataset.name;        var code = obj.dataset.code;        var ttype = obj.dataset.ttype;        var level = obj.dataset.level;        var id = obj.dataset.id;        document.getElementById('parent_name').value = code + '--' + name;        document.getElementById('parent').value = id;        $("#myModal .close").click();        $('#parent_code').val(code);        $('#ttype').val(ttype);        $('#level').val(level);        getCode();    }</script><script>    function show_markz(obj) {        var from_id = $("#from_id").val();        if (obj.value == 1) {            $('#markz_tklfa_div').hide();        } else {            $('#markz_tklfa_div').show();        }    }    function check_markz_tklfa(obj) {        var from_id = $("#from_id").val();        if (obj.value == 1) {            $('#markz_tklfa_fk').removeAttr("disabled");            $('#markz_tklfa_fk').attr("data-validation", 'required');            $('.selectpicker').selectpicker("refresh");        } else {            $('#markz_tklfa_fk').attr("disabled", 'disabled');            $('#markz_tklfa_fk').removeAttr("data-validation");            $('.selectpicker').selectpicker("refresh");        }    }</script><!--14-1-om--><script>    function getCode() {        var from_id = $("#from_id").val();        var level = parseFloat($('#level').val()) + 1;        $('#level').val(level);        if ($('#parent').val()) {            var dataString = 'id=' + $('#parent').val();            $.ajax({                type: 'post',                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getLastSubCode',                data: dataString,                cache: false,                success: function (result) {                    if (result) {                        code = parseFloat(result) + 1;                    }                    if (result == 0 && (level - 1) > 0) {                        code = $('#parent_code').val();                        // code = $('#parent').find('option:selected').attr('code');                        for (i = 1; i < (level - 1) && i < 3; i++) {                            code = code + 0;                        }                        code = code + 1;                    }                    $('#code').val(code);                }            });            var dataString = 'id=' + $('#parent').val();            $.ajax({                type: 'post',                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getParentData',                data: dataString,                cache: false,                success: function (result) {                    if (result) {                        var obj = JSON.parse(result);                        $('#hesab_tabe3a').val(obj['hesab_tabe3a']);                        $('#hesab_report').val(obj['hesab_report']);                    }                }            });        }    }</script>