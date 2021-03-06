<style>
    @page {
        size: landscape;
    }

    .specific_style {

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2 {
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }


    .table-scroll {
        position: relative;
        max-width: 1280px;
        width: 100%;
        margin: auto;
        display: table;
    }

    .table-wrap {
        width: 100%;
        display: block;
        height: 500px;
        overflow: auto;
        position: relative;
        z-index: 1;
    }

    .table-scroll table {
        width: 100%;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-scroll th, .table-scroll td {
        padding: 5px 10px;
        border: 1px solid #000;
        background: #fff;
        vertical-align: top;
    }

    .faux-table table {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        pointer-events: none;
    }

    .faux-table table + table {
        top: auto;
        bottom: 0;
    }

    .faux-table table tbody, .faux-table tfoot {
        visibility: hidden;
        border-color: transparent;
    }

    .faux-table table + table thead {
        visibility: hidden;
        border-color: transparent;
    }

    .faux-table table + table tfoot {
        visibility: visible;
        border-color: #000;
    }

    .faux-table thead th,
    .faux-table tfoot th,
    .faux-table tfoot td {
        background: #ccc;
    }

    .faux-table {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        overflow-y: scroll;
    }

    .faux-table thead,
    .faux-table tfoot,
    .faux-table thead th,
    .faux-table tfoot th,
    .faux-table tfoot td {
        position: relative;
        z-index: 2;
    }
</style>
<div class="col-sm-12 col-md-12 col-xs-12">

    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>ميزان مراجعه</h4>
            </div> -->
        </div>
        <div class="panel-body">
            <?php if (isset($records) && $records != null) {


                ?>


                <button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button>

                <div id="table-scroll" class="table-scroll">
                    <div id="faux-table" class="faux-table" aria="hidden"></div>
                    <div class="table-wrap" id="printMe">


                        <table id="main-table" class=" table table-bordered result_table" role="table">
                            <thead>
                            <tr class="greentd text-center">
                                <th colspan="2" class="text-center"> تفاصيل الحساب</th>
                                <th colspan="2" class="text-center">رصيد ماقبل</th>
                                <th colspan="2" class="text-center">الحركة</th>
                                <th colspan="2" class="text-center">الإجمالي</th>
                                <th colspan="2" class="text-center">الرصيد</th>
                            </tr>
                            <tr class="greentd text-center">
                                <th class="text-center">رمز الحساب</th>
                                <th class="text-center">إسم الحساب</th>
                                <th class="text-center">مدين</th>
                                <th class="text-center">دائن</th>
                                <th class="text-center">مدين</th>
                                <th class="text-center">دائن</th>
                                <th class="text-center">مدين</th>
                                <th class="text-center">دائن</th>
                                <th class="text-center">مدين</th>
                                <th class="text-center">دائن</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php
                            /*   echo '<pre>';
                               print_r($data);
                              */
                            $count1 = 1;

                            function drows($data, $count, $class, $sum_madeen = 0, $sum_dayen = 0)
                            {
                                $total_madeen = 0;
                                $total_dayen = 0;
                                $rased_madeen =0;
                                $rased_dayen =0;
                                $count1 = $count;
                                for ($z = 0; $z < count($data); $z++) {

                                    if (isset($data[$z]['children'])) {
                                        $class = '';

                                        $count = drows($data[$z]['children'], $count1, 'btn-infooo', $sum_madeen, $sum_dayen);
                                        $sum_madeen = $data[$z]['madeen'] + $count[1];
                                        $sum_dayen = $data[$z]['dayen'] + $count[2];
                                        $count1 = $count[0];
                                    } else {
                                        $sum_madeen = $data[$z]['madeen'];
                                        $sum_dayen = $data[$z]['dayen'];
                                    }


                                    if ($data[$z]['hesab_tabe3a'] == 1) {

                                        $rased_madeen = ($data[$z]['all_madeen']) - ($data[$z]['all_dayen']);
                                    } elseif ($data[$z]['hesab_tabe3a'] == 2) {
                                        $rased_dayen = ($data[$z]['all_dayen']) - ($data[$z]['all_madeen']);
                                    }

                                    echo '<tr class="' . $class . ' text-center">
                              <td>' . $data[$z]['code'] . '</td>
                              <td>' . $data[$z]['name'] . '</td>
                               <td class="countable1">0</td>
                               <td class="countable2">0</td>
                               <td class="countable3">' . sprintf("%.2f", ($data[$z]['all_madeen'])) . '</td>
                               <td class="countable4">' . sprintf("%.2f", ($data[$z]['all_dayen'])) . '</td>
                               <td class="countable5">0</td>
                               <td class="countable6">0</td>
                               <td class="countable7">'.$rased_madeen.'</td>
                               <td class="countable8">'.$rased_dayen.'</td>
                      </tr>';
                                    $total_madeen += $sum_madeen;
                                    $total_dayen += $sum_dayen;
                                }
                                return array($count1, $total_madeen, $total_dayen);
                            }

                            $rased_madeen =0;
                            $rased_dayen =0;
                            for ($x = 0; $x < count($records); $x++) {
                                if (isset($records[$x]['children'])) {
                                    $count = drows($records[$x]['children'], $count1, 'btn-successss');
                                    $sum_madeen = $count[1];
                                    $sum_dayen = $count[2];
                                    $count1 = $count[0];
                                } else {
                                    $sum_madeen = $records[$x]['maden'];
                                    $sum_dayen = $records[$x]['dayen'];
                                }

                                if ($records[$x]['hesab_tabe3a'] == 1) {

                                    $rased_madeen = ($records[$x]['all_madeen']) - ($records[$x]['all_dayen']);
                                } elseif ($records[$x]['hesab_tabe3a'] == 2) {
                                    $rased_dayen = ($records[$x]['all_dayen']) - ($records[$x]['all_madeen']);
                                }


                                echo '<tr class="text-center">
                              <td>' . $records[$x]['code'] . '</td>
                              <td>' . $records[$x]['name'] . '</td>
                               <td class="countable1">0</td>
                               <td class="countable2">0</td>
                               <td class="countable3">' . sprintf("%.2f", ($records[$x]['all_madeen'])) . '</td>
                               <td class="countable4">' . sprintf("%.2f", ($records[$x]['all_dayen'])) . '</td>
                               <td class="countable5">0</td>
                               <td class="countable6">0</td>
                               <td class="countable7">'.$rased_madeen.'</td>
                               <td class="countable8">'.$rased_dayen.'</td>
                              </tr>';
                            }
                            ?>

                            <tr class="visible-print">
                                <td colspan="2" style="text-align: center;color: red">الإجمالي</td>
                                <td class="result1">0</td>
                                <td class="result2">0</td>
                                <td class="result3">0</td>
                                <td class="result4">0</td>
                                <td class="result5">0</td>
                                <td class="result6">0</td>
                                <td class="result7">0</td>
                                <td class="result8">0</td>
                            </tr>
                            </tbody>
                            <tfoot class="hidden-print">
                            <tr>
                                <td colspan="2" style="text-align: center;color: red">الإجمالي</td>
                                <td class="result1">0</td>
                                <td class="result2">0</td>
                                <td class="result3">0</td>
                                <td class="result4">0</td>
                                <td class="result5">0</td>
                                <td class="result6">0</td>
                                <td class="result7">0</td>
                                <td class="result8">0</td>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
                <?php
            } else
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد حسابات
</div>';

            ?>

        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script>


        document.addEventListener("DOMContentLoaded", function (event) {
            call();
        });


        function call() {
            var fauxTable = document.getElementById("faux-table");
            var mainTable = document.getElementById("main-table");
            var clonedElement = mainTable.cloneNode(true);
            var clonedElement2 = mainTable.cloneNode(true);
            clonedElement.id = "";
            clonedElement2.id = "";
            fauxTable.appendChild(clonedElement);
            fauxTable.appendChild(clonedElement2);


        }


    </script>


    <script>

        var cls1 = $(".result_table").find("td.countable1");
        var cls2 = $(".result_table").find("td.countable2");
        var cls3 = $(".result_table").find("td.countable3");
        var cls4 = $(".result_table").find("td.countable4");
        var cls5 = $(".result_table").find("td.countable5");
        var cls6 = $(".result_table").find("td.countable6");
        var cls7 = $(".result_table").find("td.countable7");
        var cls8 = $(".result_table").find("td.countable8");


        var sum1 = 0;
        var sum2 = 0;
        var sum3 = 0;
        var sum4 = 0;
        var sum5 = 0;
        var sum6 = 0;
        var sum7 = 0;
        var sum8 = 0;

        for (var i = 0; i < cls1.length; i++) {
            if (cls1[i].className == "countable1") {
                sum1 += isNaN(cls1[i].innerHTML) ? 0 : parseInt(cls1[i].innerHTML);
            }

        }

        for (var i = 0; i < cls2.length; i++) {
            if (cls2[i].className == "countable2") {
                sum2 += isNaN(cls2[i].innerHTML) ? 0 : parseInt(cls2[i].innerHTML);
            }
        }
        for (var i = 0; i < cls3.length; i++) {
            if (cls3[i].className == "countable3") {
                sum3 += isNaN(cls3[i].innerHTML) ? 0 : parseInt(cls3[i].innerHTML);
            }
        }

        for (var i = 0; i < cls4.length; i++) {
            if (cls4[i].className == "countable4") {
                sum4 += isNaN(cls4[i].innerHTML) ? 0 : parseInt(cls4[i].innerHTML);
            }
        }
        for (var i = 0; i < cls5.length; i++) {
            if (cls5[i].className == "countable5") {

                cls5[i].innerHTML =(parseInt(cls1[i].innerHTML) + parseInt(cls3[i].innerHTML))
                sum5 += isNaN(cls5[i].innerHTML) ? 0 : parseInt(cls5[i].innerHTML);
            }
        }
        for (var i = 0; i < cls6.length; i++) {
            if (cls6[i].className == "countable6") {

                cls6[i].innerHTML =(parseInt(cls2[i].innerHTML) + parseInt(cls4[i].innerHTML))
                sum6 += isNaN(cls6[i].innerHTML) ? 0 : parseInt(cls6[i].innerHTML);
            }
        }
        for (var i = 0; i < cls7.length; i++) {
            if (cls7[i].className == "countable7") {
                sum7 += isNaN(cls7[i].innerHTML) ? 0 : parseInt(cls7[i].innerHTML);
            }
        }
        for (var i = 0; i < cls8.length; i++) {
            if (cls8[i].className == "countable8") {
                sum8 += isNaN(cls8[i].innerHTML) ? 0 : parseInt(cls8[i].innerHTML);
            }
        }
 //alert(sum5);
 //alert(sum6);
        $(".result1").text(sum1);
        $(".result2").text(sum2);
        $(".result3").text(sum3);
        $(".result4").text(sum4);
        $(".result5").text(sum5);
        $(".result6").text(sum6);
        $(".result7").text(sum7);
        $(".result8").text(sum8);

    </script>


    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>



