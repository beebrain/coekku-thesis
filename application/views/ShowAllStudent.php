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

        <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

<!--                <ul class="nav navbar-top-links navbar-right">
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
                         /.dropdown-user 
                    </li>
                </ul>-->
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Menu <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
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
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> All Student
                               
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-area-chart">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Surname</th>
                                                <th scope="col">ADMIT ACADEMIC YEAR</th>
                                                <th scope="col">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($student_data->result() as $row) {
                                                $student_id = $row->StudentID;
                                                $name = $row->Name;
                                                $surname = $row->Surname;
                                                $entry_year= $row->EntryYear;
                                                $semester = $row->Semester;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><?= $student_id; ?></td>
                                                    <td><?= $name; ?></td>
                                                    <td><?= $surname; ?></td>
                                                    <td aling="right"><?= $entry_year."/".$semester; ?></td>
                                                    <td><button type="button" onclick="location.href='<?php echo base_url();?>index.php/TeacherController/getDetailStudent/<?=$student_id?>'" class="btn btn-neutral btn-info" >detail</button></td>
  
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
                  $("document").ready(function () {
                      // $("#myModalinfo").modal('show');
                  });
//                  function sendData(year, semester) {
//                      $("#message").show();
//                      var URL = "<?= base_url() . 'index.php/UserController/getdetailInfo' ?>";
//                      // console.log(URL)
//                      var datapayload = {student_ID: <?= $student_id ?>, year: year, semester: semester}
//                      // console.log(datapayload)
//                      $.get(URL, datapayload, function (data, textStatus, jqXHR) {
//                          // console.log(data);
//                          var data_json = jQuery.parseJSON(data);
//
//                          if (data_json["info"] == "ok") {
//                              console.log(data_json["payload"]);
//                              $("#infoYear").html(data_json["year"]);
//                              $("#infosemester").html(data_json["semester"]);
//                              $("#semina").html(data_json["semina"]);
//                              $("#core_credit").html(data_json["core_credit"]);
//                              $("#workload").html(data_json["workload"]);
//                              $("#info_pub").html(data_json["journal"]);
//                              $("#myModalinfo").modal('show');
//                              // alert("sellect");
//                          }
//                      }).fail(function (jqXHR, textStatus, errorThrown) {
//                          alert("fail");
//                      });
//                  }
        </script>
    </body>

</html>

