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

        <title>Teacher Control</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() . 'assets/' ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
                    <a class="navbar-brand" href="#">Student Detail</a>
                </div>
                <!-- /.navbar-header -->

                
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Menu<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url() . 'index.php/TeacherController/'?>" >Show Student All</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() . 'index.php/LoginController/logout'?>">Logout</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
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
                                        <dd><?= $name . " " . $surname; ?></dd>

                                    </dl>
                                    <dl >
                                        <dt>Advisor</dt>
                                        <dd><?= $infoStudent[0]->Advisor ?> </dd>
                                        <dt>Thesis Title</dt>
                                        <dd><?= $infoStudent[0]->ThesisTitle ?></dd>
                                        <dt>Admission Date</dt>
                                        <dd><?= $semesterEntry . "/" . $EntryYear ?></dd>
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
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Work Load
                            </div>
                            <!-- .panel-heading -->
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">

                                    <?php
//                                print_r($semesterWork);
                                    foreach ($semesterWork as $row) {
                                        $semester = $row->semester;
                                        $year = $row->Year;
                                        ?>


                                        <div class="panel panel-default">
                                            <div class="panel-heading">

                                                <a data-toggle="collapse" data-parent="#accordion" href="#<?= $semester . "_" . $year; ?>" aria-expanded="false" class="collapsed"><?= $semester . "/" . $year; ?> <?php echo ($row->approve % 2 == 1 ? ' (Approved)' : ''); ?></a>

                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                            Actions
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                            <li><a href="#" onclick="approve('<?= $row->Year ?>', '<?= $row->semester ?>', '<?= $row->approve + 1 ?>')"> <?php echo ($row->approve % 2 == 0 ? 'Approve' : 'Disapprove'); ?></a>
                                                            <li><a href="#" onclick="saveDetail('<?= $row->Year . '_' . $row->semester . '-form' ?>', '<?= $row->Year ?>', '<?= $row->semester ?>')">Save Credit and semina Status</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div id="<?= $semester . "_" . $year; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <div class="col-lg-6">
                                                            <dl>
                                                                <dt>YEAR</dt> 
                                                                <dd><?= $row->Year; ?></dd>
                                                                <dt>SEMESTER</dt>
                                                                <dd><?= $row->semester; ?></dd>

                                                            </dl>
                                                            <dl >
                                                                <dt>CREDIT REGISTER</dt>
                                                                <dd><?= $row->core_credit; ?> </dd>
                                                                <dt>WORKLOAD</dt>
                                                                <dd><?= $row->workload; ?></dd>
                                                                <dt>JOURNAL</dt>
                                                                <?php foreach ($row->journal as $journalRow) { ?>
                                                                    <dd><?= $journalRow->TitleName . "[" . $journalRow->TypeJournal . "]"; ?></dd>
                                                                <?php } ?>
                                                            </dl>
                                                        </div>
                                                        <div class="col-lg-2">

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <form id="<?= $row->Year . '_' . $row->semester . '-form' ?>" name="<?= $row->Year . '_' . $row->semester . '-form' ?>">
                                                                <div class="row">

                                                                    <h1><p class="text-right">CREDIT PASS </p></h1>

                                                                    <h1>
                                                                        <div class="col-lg-8"></div>
                                                                        <div class="col-lg-4">
                                                                            <p class="text-right"> 
                                                                                <select class="form-control" name="credit" id="<?= $row->Year . '_' . $row->semester . '-credit' ?>" >

                                                                                    <?php
                                                                                    for ($i = 0; $i <= $row->core_credit; $i++) {
                                                                                        echo "<option value='" . $i . "' " . ($row->achived_credit == $i ? "selected='selected'" : " ") . ">" . $i . " </option>";
//                                                                                        echo "<option value='".$i."'".($row->achived_credit==$i)?"selected='selected'":" "."'>" . $i . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>



                                                                            </p>
                                                                        </div>
                                                                    </h1>

                                                                </div>

                                                                <div class="row" <?= ($row->semina=="" ? "hidden" : "") ?>>
                                                                    <h1><p class="text-right"><?= $row->semina ?></p></h1>

                                                                    <h1>
                                                                        <div class="col-lg-8"></div>
                                                                        <div class="col-lg-4">
                                                                            <p class="text-right">

                                                                                <select id="<?= $row->Year . '_' . $row->semester . '-semina' ?>" name="semina" class="form-control">
                                                                                    <option>-</option>
                                                                                    <option value='Passed' <?= ($row->semina_grade == "Passed" ? "selected='selected'" : " ") ?> >Passed</option>
                                                                                    <option value='Fail' <?= ($row->semina_grade == "Fail" ? "selected='selected'" : " ") ?> >Fail</option>
                                                                                </select>

                                                                            </p>
                                                                        </div>
                                                                    </h1>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                </div>
                <!-- /.panel -->
            </div>

            <!-- /#page-wrapper -->

        </div>




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

                                                            function saveDetail(semesterId, year, semester) {
                                                                var idform = "#" + semesterId;
                                                                console.log(idform);
                                                                var datastring = $(idform).serialize();
                                                                datastring = datastring + "&Student_Id=<?= $student_id; ?>";
                                                                datastring = datastring + "&Year=" + year;
                                                                datastring = datastring + "&semester=" + semester;
                                                                console.log(datastring);
                                                                var URL = "<?php echo base_url('index.php/TeacherController/saveCredit'); ?>";
                                                                $.ajax({type: "POST",
                                                                    url: URL,
                                                                    data: datastring,
                                                                    success: function (data) {
                                                                        // console.log(data);
                                                                        var data_json = jQuery.parseJSON(data);
                                                                        console.log(data_json)
                                                                        if (data_json["info"] == "ok") {
                                                                            window.location.replace("<?= base_url() . 'index.php/TeacherController/getDetailStudent/' . $student_id ?>");
                                                                        } else {
                                                                            alert("The system cannot save credit");
                                                                        }
                                                                    }
                                                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                                                    alert("Insert Work Load Fail");
                                                                });
                                                            }

                                                            function approve(year, semester, approve) {

                                                                var datastring = "Student_Id=<?= $student_id; ?>";
                                                                datastring = datastring + "&Year=" + year;
                                                                datastring = datastring + "&semester=" + semester;
                                                                datastring = datastring + "&approve=" + approve;
                                                                console.log(datastring);
                                                                var URL = "<?php echo base_url('index.php/TeacherController/approve'); ?>";
                                                                $.ajax({type: "POST",
                                                                    url: URL,
                                                                    data: datastring,
                                                                    success: function (data) {
                                                                        console.log(data);
                                                                        var data_json = jQuery.parseJSON(data);
                                                                        console.log(data_json)
                                                                        if (data_json["info"] == "ok") {
                                                                            window.location.replace("<?= base_url() . 'index.php/TeacherController/getDetailStudent/' . $student_id ?>");
                                                                        } else {
                                                                            alert("The system cannot approve student work");
                                                                        }
                                                                    }
                                                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                                                    alert("Insert Work Load Fail");
                                                                });
                                                            }
        </script>
    </body>

</html>

