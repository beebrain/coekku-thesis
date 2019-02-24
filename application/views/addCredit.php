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
    <link href="<?=base_url() . 'assets/'?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url() . 'assets/'?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url() . 'assets/'?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url() . 'assets/'?>/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url() . 'assets/'?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
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
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
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
      <th scope="col">StudentID</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">ADMIT ACADEMIC YEAR</th>

      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>

<?php
  foreach($getStudent->result() as $row){
				?>
                 <tr>
      <th scope="row"><?= $row->StudentID ?></th>
      <td><?= $row->Name ?></td>
      <td><?= $row->Surname ?></td>
      <td><?= $row->Semester."/".$row->EntryYear ?></td>
      <td><p class="fa fa-book"></p></td>
    </tr>
                
                
                
<?php

}

?>
   
    
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


	<!-- Modal --> <form role="form" action="<?php echo base_url('index.php/UserController/saveSemeter'); ?>" method = "post">
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
                                            <div class="col-lg-4">
                                                <label>(หน่วยกิต)</label>
                                                <input class="form-control" name="core_credit">
                                            </div>
                                            <div class="col-lg-4">
                                                <label>หมวดวิชาเลือก (หน่วยกิต)</label>
                                                <input class="form-control" name="selected_credit">
                                            </div>
                                            <div class="col-lg-4">
                                            <label>วิทยานิพนธ์/ การศึกษาอิสระ (หน่วยกิต)</label>
                                                <input class="form-control" name = "Thesis_credit">
                                            </div>
                                        </div>
                                        
                                            
                                        </div>
                                       
                                        <div class="form-group">
                                        <div class="row">
                                        <div class="col-lg-8">
                                            <label>ชื่อบทความ / ชื่องานประชุม</label>
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
                                            <button type="submit" class="btn btn-default">Submit</button>

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
    <script src="<?=base_url() . 'assets/'?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url() . 'assets/'?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url() . 'assets/'?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url() . 'assets/'?>/vendor/raphael/raphael.min.js"></script>
    <script src="<?=base_url() . 'assets/'?>/vendor/morrisjs/morris.min.js"></script>
    <script src="<?=base_url() . 'assets/'?>/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url() . 'assets/'?>/dist/js/sb-admin-2.js"></script>

</body>

</html>

