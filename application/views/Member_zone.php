<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Graduated Student Zone</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() . 'assets/' ?>/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url() . 'assets/' ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url() . 'assets/' ?>/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url() . 'assets/' ?>/vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() . 'assets/' ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Thesis</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="#" onclick="showInfo()" >Information</a>
                            </li>
                            <li>
                                <a href="#" onclick='showPass()'>Change Password</a>
                            </li>
                            <li>
                                <a href="<?= base_url() . 'index.php/LoginController/logout' ?>">Logout</a>
                            </li>


                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Action Member</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                Student Detail
                            </div>

                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <dl>
                                        <dt>Student ID</dt> 
                                        <dd><?= $student_id; ?></dd>
                                        <dt>Student Name</dt>
                                        <dd><?= $infoStudent[0]->Name . " " . $infoStudent[0]->Surname; ?></dd>

                                    </dl>
                                    <dl >
                                        <dt>Advisor</dt>
                                        <dd><?= $infoStudent[0]->Advisor ?></dd>
                                        <dt>Thesis Title</dt>
                                        <dd><?= $infoStudent[0]->ThesisTitle ?></dd>
                                        <dt>Admission Date</dt>
                                        <dd><?= $infoStudent[0]->Semester . "/" . $infoStudent[0]->EntryYear ?></dd>
                                    </dl></div>
                                <div class="col-lg-1">

                                </div>
                                <div class="col-lg-5">
                                    <h1><p class="text-right">CREDIT PASS </p></h1>
                                    <h1><p class="text-right"><?= $sumCredit->achived_credit; ?></p></h1>
                                </div>

                            </div>
                            <div class="panel-footer">

                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                Summary 
                            </div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    <div>
                                        <dl >
                                            <dt>Semina I</dt>
                                            <dd><?php echo ($semina1 == 0) ? 'Fail' : 'Pass'; ?></dd>
                                            <dt>Semina II</dt>
                                            <dd><?php echo ($semina2 == 0) ? 'Fail' : 'Pass'; ?></dd>
                                            <dt>Semina III</dt>
                                            <dd><?php echo ($semina3 == 0) ? 'Fail' : 'Pass'; ?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                Panel Footer
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                </div>





                <div class="row">


                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Work book
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>


                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#" data-toggle="modal" data-target="#myModal" >Add information</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-area-chart">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">Seminar</th>
                                                <th scope="col">Register credit</th>
                                                <th scope="col">Achieved credit</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($info_semester as $row) {
                                                $year = $row->Year;
                                                $semester = $row->semester;
                                                $semina = $row->semina;
                                                $semina_grade = $row->semina_grade;
                                                $core_credit = $row->core_credit;
                                                $achived_credit = $row->achived_credit;
                                                $approve = $row->approve;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><?= $year; ?></td>
                                                    <td><?= $semester; ?></td>
                                                    <td><?= ($semina==""?"":$semina . "(" . $semina_grade . ")") ?></td>
                                                    <td><?= $core_credit; ?></td>
                                                    <td><?= $achived_credit; ?></td>
                                                    <td><button type="button" onclick="sendData(<?= $year; ?>,<?= $semester; ?>)"class="btn btn-neutral btn-info" >detail</button></td>
                                                    <td><?php
                                                        if (!$approve) {
                                                            ?>
                                                            <button type="button" onclick="confirmDelete(<?= $year; ?>,<?= $semester; ?>)" class="btn btn-neutral btn-warning" >Delete</button>
                                                            <?php
                                                        } else {
                                                            print("");
                                                        }
                                                        ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->


                    </div>
                    <!-- /.col-lg-8 -->

                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->



            <div class="modal fade" id="myModalinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xs">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Description Lists
                            </div>
                            <div class="panel-body">
                                <dl class="dl-horizontal">
                                    <dt >Year</dt>
                                    <dd id='infoYear'>2018</dd>
                                    <dt>semester</dt>
                                    <dd id='infosemester'>1</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt >regist credit</dt>
                                    <dd id="core_credit">work33load</dd>
                                    <dt >semina</dt>
                                    <dd id="semina">semina</dd>
                                    <dt >Work load</dt>
                                    <dd id="workload">workload</dd>
                                    <dt>Publication</dt>
                                    <p id="info_pub">info pub</p>

                                </dl>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
            </div>



        </div>


        <!-- Modal --> 

        <!-- General Modal -->

        <div class="modal fade" id="Generalmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Info Message</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="informationMessage">


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="button" onclick="saveInformation()" class="btn btn-default">Submit</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



        <form role="form" id='workloadForm'>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Add Information Form</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Year</label>
                                        <select class="form-control" name="year">
                                            <option><?php echo date("Y"); ?></option>
                                            <option><?php echo date("Y") - 1; ?></option>
                                            <option><?php echo date("Y") - 2; ?></option>
                                            <option><?php echo date("Y") - 3; ?></option>
                                            <option><?php echo date("Y") - 4; ?></option>
                                            <option><?php echo date("Y") - 5; ?></option>
                                            <option><?php echo date("Y") - 6; ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Semester</label>
                                        <select class="form-control" name="semester">
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>วิทยานิพนธ์/ การศึกษาอิสระ ที่ลงในเทอมปัจจุบัน(หน่วยกิต)</label>
                                        <select class="form-control" name="core_credit">
                                            <option>  </option>
                                            <?php
                                            for ($i = 0; $i <= 20; $i++) {
                                                echo "<option>" . $i . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>สัมมนาที่ลงในเทอมปัจจุบัน</label>
                                        <select class="form-control" name="semina">
                                            <option>  </option>
                                            <option>Semina I</option>
                                            <option>Semina II</option>
                                            <option>Semina III</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label>ชื่อบทความ / ชื่องานประชุม ในเทอมปัจจุบัน</label>
                                        <input class="form-control" name="journalName1">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>ประเภทการนำเสนอ</label>
                                        <select class="form-control" name="typeJor1">
                                            <option>  </option>
                                            <option>Conf</option>
                                            <option>TCI</option>
                                            <option>SCOPUS</option>
                                            <option>ISI</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-8">

                                        <input class="form-control" name="journalName2">
                                    </div>
                                    <div class="col-lg-4">

                                        <select class="form-control" name="typeJor2">
                                            <option>  </option>
                                            <option>Conf</option>
                                            <option>TCI</option>
                                            <option>SCOPUS</option>
                                            <option>ISI</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-8">

                                        <input class="form-control" name="journalName3">
                                    </div>
                                    <div class="col-lg-4">

                                        <select class="form-control" name="typeJor3">
                                            <option>  </option>
                                            <option>Conf</option>
                                            <option>TCI</option>
                                            <option>SCOPUS</option>
                                            <option>ISI</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label>ผลงานที่ทำใน เทอมปัจจุบัน</label>
                                <textarea class="form-control" rows="3" id="workload" name="workload"></textarea>
                            </div>
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file">

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="button" onclick="saveWorkload()" class="btn btn-default" >Submit</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>

        <form role="form" id='InformationForm'  method = "post">
            <div class="modal fade" id="modalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Student Information Form</h4>
                        </div>
                        <div class="modal-body">


                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>ชื่อ</label>
                                        <input class="form-control" name="name" placeholder="นาย วิศวกรรม" value="<?= $infoStudent[0]->Name ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>นามสกุล</label>
                                        <input class="form-control" name="surname" placeholder="วิศวกรรมคอมพิวเตอร์" value="<?= $infoStudent[0]->Surname ?>">
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label>อาจารย์ที่ปรึกษา</label>
                                        <select class="form-control" name="avisor">
                                            <option>  </option>
                                            <option>รศ. ดร. กานดา (รุณนะพงศา) สายแก้ว</option>
                                            <option>ผศ. อนัตต์ เจ่าสกุล</option>
                                            <option>อ. ดร. วาธิส ลีลาภัทร</option>
                                            <option>ผศ. รุจชัย อึ้งอารุณยะวี</option>
                                            <option>ผศ. ดร. กรชวัล ชายผา</option>
                                            <option>รศ. วิโรจน์ ทวีปวรเดช</option>
                                            <option>ผศ. ดร. ธัชพงศ์ กตัญญูกุล</option>
                                            <option>อ. ดร. วสุ เชาว์พานนท์</option>
                                            <option>อ. ดร. นวภัค เอื้ออนันต์</option>
                                            <option>ผศ. ดร. ชัชชัย คุณบัว</option>
                                            <option>รศ. พิเชษฐ เชี่ยวธนะกุล</option>
                                            <option>รศ. ดร. วนิดา (เพ็ญสุวรรณ) แก่นอากาศ</option>
                                            <option>อ. ดร. กิตติ์ เธียรธโนปจัย</option>
                                            <option>อ. ภาณุพงษ์ วันจันทึก</option>
                                            <option>ผศ. ดร. ดารณี หอมดี</option>
                                            <option>ผศ. ดร. ภัทรวิทย์ พลพินิจ</option>
                                            <option>ผศ. ดร. วิชชา เพื่องจันทร์</option>
                                            <option>ผศ. ดร. จิระเดช พลสวัสดิ์</option>
                                            <option>อ. ดร. ชวิศ ศรีจันทร์</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label>ชื่อหัวข้อวิทยานิพนธ์/ดุษฏีนิพนธ์</label>
                                        <input class="form-control" name="thesisName" placeholder="-" value="<?= $infoStudent[0]->ThesisTitle ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label>Admission Year</label>
                                        <input class="form-control" name="admid" placeholder="2019" value="<?= $infoStudent[0]->EntryYear ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label>Admission Semester</label>
                                        <select class="form-control" name="semester" >
                                            <option>1 </option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="button" onclick="saveInformation()" class="btn btn-default">Submit</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>


        <form role="form" id='changePass'  method = "post">
            <div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Student Information Form</h4>
                        </div>
                        <div class="modal-body">


                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label> Current Password </label>
                                        <input class="form-control" placeholder="Password" name="currentPass"  id ="currentPass" type="password"  autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label> New Password </label>
                                        <input class="form-control" placeholder="Password" name="newPass" id="newPass" type="password"  autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label> New Password </label>
                                        <input class="form-control" placeholder="Password" name="renewPass" id = 'renewPass'type="password" value="">
                                    </div>

                                </fieldset>
                            </div>

                        </div>
                        <div class="panel-footer " ><p class="text-right" id="change_passInfo"></p></div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="button" onclick="changePass()" class="btn btn-default">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>


        <!-- jQuery -->
        <script src="<?= base_url() . 'assets/' ?>/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() . 'assets/' ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url() . 'assets/' ?>/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?= base_url() . 'assets/' ?>/vendor/raphael/raphael.min.js"></script>
        <script src="<?= base_url() . 'assets/' ?>/vendor/morrisjs/morris.min.js"></script>
        <script src="<?= base_url() . 'assets/' ?>/data/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url() . 'assets/' ?>/dist/js/sb-admin-2.js"></script>

        <script>
                                $("document").ready(function () {
                                    // $("#myModalinfo").modal('show');
                                });
                                function showInfo() {
                                    $("#modalInformation").modal('show');
                                }

                                function showPass() {
                                    $('#changePassModal').modal('show');

                                }
                                function changePass() {
                                    $('#change_passInfo').html('');
                                    var URL = "<?= base_url() . 'index.php/UserController/changePassword' ?>";
                                    // console.log(URL)

                                    var pass = $('#newPass').val();
                                    var pass2 = $('#renewPass').val();
                                    if (pass == pass2 || pass == "") {
                                        var datastring = $("#changePass").serialize();
//                                        console.log(datastring);
//                                    console.log(datapayload);
                                        $.ajax({type: "POST",
                                            url: URL,
                                            data: datastring,
                                            success: function (data) {
                                                // console.log(data);
                                                var data_json = jQuery.parseJSON(data);
//                                                console.log(data_json)
                                                if (data_json["status"] == "ok") {
                                                    alert(data_json['info']);
                                                    $('#change_passInfo').html(data_json['info']);
                                                } else {
                                                    alert(data_json['info']);
                                                    $('#change_passInfo').html(data_json['info']);

                                                }
                                            }
                                        }).fail(function (jqXHR, textStatus, errorThrown) {
                                            alert("Insert Work Load Fail");
                                        });
                                    } else {
                                        alert('the passwords didn\'t match! or newpassword is null');
                                        $('#change_passInfo').html('the passwords didn\'t match! or newpassword is null');
                                    }





                                }
                                function saveInformation() {
                                    var datastring = $("#InformationForm").serialize();
//                                    console.log(datastring);
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url('index.php/UserController/saveInformation'); ?>",
                                        data: datastring,
                                        success: function (data) {
                                            window.location.replace("<?= base_url() . 'index.php/UserController/' ?>");
                                            console.log("Success");
                                        }
                                    }).fail(function (jqXHR, textStatus, error) {
                                        console.log("Error")
                                    });
                                    ;
                                }

                                function saveWorkload() {
                                    var URL = "<?= base_url() . 'index.php/UserController/saveSemeter' ?>";
                                    // console.log(URL)
                                    var datapayload = $("#workloadForm").serialize();
                                    console.log(datapayload);
                                    $.ajax({type: "POST",
                                        url: URL,
                                        data: datapayload,
                                        success: function (data) {
                                            // console.log(data);
                                            var data_json = jQuery.parseJSON(data);
                                            console.log(data_json)
                                            if (data_json["info"] == "ok") {
                                                window.location.replace("<?= base_url() . 'index.php/UserController/' ?>");
                                            } else {
                                                alert("The system cannot save work load with same year and semester.");

                                            }
                                        }
                                    }).fail(function (jqXHR, textStatus, errorThrown) {
                                        alert("Insert Work Load Fail");
                                    });
                                }


                                function sendData(year, semester) {
                                    $("#message").show();
                                    var URL = "<?= base_url() . 'index.php/UserController/getdetailInfo' ?>";
                                    // console.log(URL)
                                    var datapayload = {student_ID: <?= $student_id ?>, year: year, semester: semester}
                                    // console.log(datapayload)
                                    $.get(URL, datapayload, function (data, textStatus, jqXHR) {
                                        // console.log(data);
                                        var data_json = jQuery.parseJSON(data);
                                        if (data_json["info"] == "ok") {
                                            console.log(data_json["payload"]);
                                            $("#infoYear").html(data_json["year"]);
                                            $("#infosemester").html(data_json["semester"]);
                                            $("#semina").html(data_json["semina"]);
                                            $("#core_credit").html(data_json["core_credit"]);
                                            $("#workload").html(data_json["workload"]);
                                            $("#info_pub").html(data_json["journal"]);
                                            $("#myModalinfo").modal('show');
                                            // alert("sellect");
                                        }
                                    }).fail(function (jqXHR, textStatus, errorThrown) {
                                        alert("fail");
                                    });
                                }

                                function confirmDelete(year, semester) {
                                    var r = confirm("Would you like to delete?");
                                    if (r == true) {
                                        $("#message").show();
                                        var URL = "<?= base_url() . 'index.php/UserController/deleteWorkLoad' ?>";
                                        // console.log(URL)
                                        var datapayload = {student_ID: <?= $student_id ?>, year: year, semester: semester}

                                        $.ajax({
                                            type: "POST",
                                            url: URL,
                                            data: datapayload,
                                            success: function (data) {

                                                window.location.replace("<?= base_url() . 'index.php/UserController/' ?>");
                                                console.log("Success");
                                            }
                                        }).fail(function (jqXHR, textStatus, error) {
                                            console.log(textStatus);
                                        });
                                    }
                                }
        </script>
    </body>

</html>

