<style type="text/css">    .reply-comment {        display: inline-block;        width: 100%;        margin-bottom: 20px    }    .reply-img {        width: 15%;        float: right;    }    .reply-img img {        width: 100%;        max-width: 70px;        height: 70px;        border: 1px solid #eee;    }    .reply-comment {        float: right;        width: 85%;    }    .label-inverse {        background-color: #888;        color: #fff;    }    .reply-comment span.label {        text-align: center;        padding-right: 10px;        display: inline-block;        width: auto;        font-size: 14px;    }    .reply-comment .name {        color: #888;        font-size: 15px;    }    .comments-sec .well {        height: 100%;    }    .bubble-div img {        width: 150px;        max-width: 100%;    }    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {        margin: 0 0 0 0;    }            .card {    margin-bottom: 20px !important;    box-shadow: none !important;}</style><?php //if ($load == 0){////$this->load->view('admin/all_secretary_view/email/main_tabs');//?><!--<div class="col-md-10 padding-4">--><!--    --><?php //} ?><!--<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">    <div class="panel-heading">        <h3 class="panel-title"><i class="fa fa-plus-square"></i> تفاصيل الرساله </h3>    </div>    <div class="panel-body " style="background-color: #fff;">    -->        <div class="col-xs-12 inbox-mail">            <div class="panel panel-default">                <div class="panel-heading">                    <div class="inbox-avatar p-20 border-btm" style=" padding: 0 0 0 0;">                        <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png"                             class="border-green hidden-xs hidden-sm" alt="">                        <div class="inbox-avatar-text">                            <span style="background-color: green;" class="bg-green badge avatar-text">      <i class="fa fa-paper-plane" aria-hidden="true"></i>      المرسل  </span>      <span style="color: black !important;">      <?php if (isset($message->email_from_n) && !empty($message->email_from_n)) {                                echo $message->email_from_n;                            } ?>      </span>                            <span style="background-color: #009688;" class="bg-green badge avatar-text">        </span>         <span style="color: black !important;">      <?php if (isset($message->title) && !empty($message->title)) {                            echo $message->title;                            } ?></span>                        </div>                        <div class="inbox-date text-right hidden-xs hidden-sm">                            <span class="bg-green badge avatar-text" style="float: left">      <i class="fa fa-calendar" aria-hidden="true"></i>                                <?php if (isset($message->date_ar) && !empty($message->date_ar)) {                                    echo $message->date_ar;                                } ?>    </span>                        </div>                    </div>                </div>                <div class="panel-body" style="background: #fff;">                                                               <div class="panel panel-default">      <div class="panel-header">                       <span style="background-color: #fcb632;color: black;" class="bg-green badge avatar-text">        <i class="fa fa-align-justify" aria-hidden="true"></i>      الموضوع  </span>         <span style="background-color: #462542; font-weight: normal;margin-right: 100px;font-size: 13px;" class="bg-green badge avatar-text">       <i class="fa fa-comments-o" aria-hidden="true"></i>     <?php if (isset($message->content) && !empty($message->content)) {                    //    echo $message->content;                        echo nl2br($message->content);                    } ?>     </span>           </div>       </div>                                                                                             <ul class="nav nav-tabs" id="myTab" role="tablist">  <li class="nav-item">    <a class="nav-link active" id="answers-tab" data-toggle="tab" href="#answers" role="tab" aria-controls="answers" aria-selected="true">    <i class="fa fa-comments-o" aria-hidden="true"></i>    الردود</a>  </li>  <li class="nav-item">    <a class="nav-link" id="morfaq-tab" data-toggle="tab" href="#morfaq" role="tab" aria-controls="morfaq" aria-selected="false">    <i class="fa fa-paperclip" aria-hidden="true"></i>    المرفقات</a>  </li> </ul><div class="tab-content" id="myTabContent">  <div class="tab-pane fade show active" id="answers" role="tabpanel" aria-labelledby="answers-tab">            <div class="panel panel-success">                           <div class="panel-body" id="dive_replays">                    <?php if (isset($replays) && !empty($replays)) { ?>                        <?php foreach ($replays as $item) { ?>                            <div class="panel panel-default">                                <div class="panel-heading">      <span class="bg-green badge avatar-text">      <i class="fa fa-paper-plane" aria-hidden="true"></i>      المرسل  </span>      <span style="color: black;"><?php echo $item->emp_name; ?></span>                                          <span class="bg-green badge avatar-text" style="float: left">      <i class="fa fa-calendar" aria-hidden="true"></i>                                        <?php echo date('Y-m-d', strtotime($item->time_replay)); ?>    </span>                                    <span class="bg-green badge avatar-text" style="float: left"><i class="fa fa-clock-o" aria-hidden="true"></i>                                        <?php echo date('g:i a', strtotime($item->time_replay)); ?>     </span>                                </div>                                <div class="panel-body"><div class="inbox-avatar">    <img src="<?php if (isset($item->emp_photo) && !empty($item->emp_photo) ) {        echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $item->emp_photo;    } else {        echo base_url() . 'asisst/admin_asset/arch/default_img.png';    }    ?>"         class="border-green hidden-xs hidden-sm" alt="">    <div class="inbox-avatar-text">        <div class="avatar-name"></div>        <div><span style="color: black  !important;"> <i class="fa fa-comments-o" aria-hidden="true"></i><?php echo $item->comment ?></span>        </div>    </div></div>                                </div>                            </div>                        <?php }                        ?>                    <?php } ?>                </div>            </div>  </div>  <div class="tab-pane fade" id="morfaq" role="tabpanel" aria-labelledby="morfaq-tab">                     <div class="col-md-12 ">                        <h4><i class="fa fa-paperclip"></i> المرفقات</h4>                        <div class="row">                            <?php foreach ($files as $files) { ?>                                <div class="  col-sm-2 col-xs-4">                                    <div class="card">                                        <img class="img-thumbnail img-responsive card-img-top" alt="attachment"                                             style="width: 100px;height: 100px;"                                             src="<?php echo base_url() ?>/uploads/images/<?= $files->file; ?>">                                        <div class="card-body">                                            <div class="card-footer ">                                                <div class="col-md-12">                                                    <?php                                                    if (!empty($files->file) || $files->file != 0) {                                                        $ext = pathinfo($files->file, PATHINFO_EXTENSION);                                                        $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');                                                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');                                                        if (in_array($ext, $img)) {                                                            ?>                                                            <div class="col-md-2">                                                                <a onclick="$('#email_img').attr('src','<?= base_url() . "uploads/images/" . $files->file ?>')"                                                                   data-toggle="modal" data-target="#exampleModal"                                                                   class="btn btn-info btn-xs">                                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>                                                            </div>                                                            <?php                                                        }                                                        ?>                                                        <div class="col-md-2">                                                            <a href="<?= base_url() . "all_secretary/email/Emails/download_file/" . $files->file ?>"                                                               class="btn btn-info btn-xs" download>                                                                <i class="fa fa-download " aria-hidden="true"></i>                                                            </a>                                                        </div>                                                        <?php                                                    } ?>                                                </div>                                            </div>                                        </div>                                    </div>                                </div>                                <?php                            }                            ?>                        </div>                    </div>        </div> </div>                                                                            </div>                <?php if (isset($message->need_replay) && !empty($message->need_replay) && $message->need_replay == 1) { ?>                    <div class="panel-footer" id="myTabs">                        <!--                            <div class="m-t-20 border-all p-20">--><div class="col-md-12 ">    <div class="col-md-8"></div>    <div class="col-md-4" style="margin-right: 75%;">        <a data-toggle="modal" data-target="#replay_Modal" class="btn btn-info ">       <i class="fa fa-retweet" aria-hidden="true"></i>        الرد </a>        <a class="btn btn-success "           href="<?= base_url() . "all_secretary/email/Emails/reply_message/" . $message->id ?>">           <i class="fa fa-share-square-o" aria-hidden="true"></i>           التحويل </a>        <button type="button" class="btn btn-danger"                onclick='swal({                        title: "هل انت متاكد من تحويل الرساله الي الارشيف ؟",                        text: "",                        type: "danger",                        showCancelButton: true,                        confirmButtonClass: "btn-danger",                        confirmButtonText: "تحويل",                        cancelButtonText: "إلغاء",                        closeOnConfirm: false                        },                        function(){                        archive_message(<?= $message->id ?>);                        });'>                        <i class="fa fa-trash-o" aria-hidden="true"></i>                        أرشفة        </button>    </div>                        </div>                    </div>                <?php } ?>            </div>            <hr>            <br>            <br>        </div>        <!--</div></div>--><!--    --><?php //if ($load == 0) {//    ?><!--</div>--><?php //} ?><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"     aria-hidden="true">    <div class="modal-dialog" role="document">        <div class="modal-content">            <div class="modal-body">                <button type="button" class="close" data-dismiss="modal" aria-label="Close"                        style="font-size: xx-large;">                    <span aria-hidden="true">&times;</span>                </button>                <img src="" id="email_img" style="width: 100%">            </div>            <div class="modal-footer">                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>            </div>        </div>    </div></div><div class="modal fade" id="replay_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"     aria-hidden="true">    <div class="modal-dialog" role="document">        <div class="modal-content">            <div class="modal-header">                <h5 class="modal-title" id="exampleModalLabel">رد نصي  </h5>                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                    <span aria-hidden="true">&times;</span>                </button>            </div>            <div class="modal-body">                <div class="container-fluid">                    <div class="col-md-12">                        <textarea class="form-control" id="replay_pop"></textarea>                    </div>                </div>            </div>            <div class="modal-footer">                <button type="button" class="btn btn-success" onclick="make_replay()" data-dismiss="modal">                <i class="fa fa-paper-plane" aria-hidden="true"></i>                إرسال</button>                <button type="button" class="btn btn-danger" data-dismiss="modal">                <i class="fa fa-times-circle" aria-hidden="true"></i>                اغلاق</button>            </div>        </div>    </div></div><script>    function make_replay() {        var replay = $('#replay_pop').val();        $.ajax({            type: 'post',            url: "<?php echo base_url();?>all_secretary/email/Emails/make_replay/",            data: {replay: replay, id: <?=$message->email_rkm?>},            success: function (d) {                $('#replay_pop').val('');                get_email_replay();                /*  var obj = JSON.parse(d).replay;                  var div = '<article class="reply-comment">\n' +                      '  <div class="reply-img">\n' +                      '   <img src="<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs"?>/' + obj.emp_photo + '"' +                    '    class="img-circle" width="45" height="45" alt="user">\n' +                    '\n' +                    '</div>\n' +                    ' <div class="reply-comment ">\n' +                    ' <h5 class="name">\n' +                    '  <span class="label label-inverse ">' + obj.emp_name + ' </span> ' + obj.time_replay + '\n' +                    '   <p>' + obj.comment + '</p>\n' +                    ' </div>\n' +                    '\n' +                    ' </article>\n';                console.warn(' dive :: ' + div);*/                // $('#dive_replays').html(d);                // $('#dive_replays').append(div);                // $('.selectpicker').selectpicker("refresh");                // reset_file_input('file');            }        });    }    function get_email_replay() {        $.ajax({            type: 'post',            url: "<?php echo base_url();?>all_secretary/email/Emails/get_email_replay/<?=$message->email_rkm?>",            success: function (d) {                $('#replay_pop').val('');                $('#dive_replays').html(d);            }        });    }    var min = 1;    setInterval(get_email_replay, (1000 * 60*min));</script><script>    function archive_message(id) {        $.ajax({            type: 'post',            url: '<?php echo base_url()?>all_secretary/email/Emails/archive_message',            data: {id: id},            dataType: 'html',            cache: false,            success: function (html) {                // get_details_message(id);                swal({                    title: " تمت التحويل الي الارشيف بنجاح ",                    type: "success",                    confirmButtonClass: "btn-warning",                    closeOnConfirm: false                });                get_my_emails('page_content','message_details',<?=$message->id?>)            }        });    }</script>