<?php
try {
    $user = "phpmyadmin";
    $pass = "root";
    $dbh = new PDO('mysql:host=localhost;dbname=earth', $user, $pass);
    $dbh -> exec("set names utf8");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$eid = $_GET['eid'];
$tb = $_GET['tb'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ระบบทะเบียนพนักงาน</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> หน้าแรก </a></li>
                  <li><a><i class="fa fa-edit"></i> ข้อมูลพนักงาน <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contacts_senang.php">โรงสีข้าวเสนางค์</a></li>
                      <li><a href="contacts_pongchai.php">โรงสีพงษ์ชัยธัญญาพืช</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> คำนวณเงินเดือน <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">โรงสีข้าวเสนางค์</a></li>
                      <li><a href="#">โรงสีพงษ์ชัยธัญญาพืช</a></li>
                    </ul>
                  </li>
               </ul>
              </div>
             
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

             </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>คำนวณเงินเดือน</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <span class="input-group-btn">
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">

<?php
$sth = $dbh->prepare('SELECT * from '.$tb.' where eid = '.$eid);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$Name=$result[NAME];
$salary=$result[salary];
$Dept=$result[DEPT];
$id=$result[eid];   
?>   

                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/<?php echo $eid.'.jpg'?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      
                      <h3><?php echo $Name;?></h3>

                      <ul class="list-unstyled user_data">
                        <li>
                         <h4> ตำแหน่ง <i class="fa fa-briefcase user-profile-icon"></i> : <?php echo $Dept;?></h4>
                        </li>

                        <li class="m-top-xs">
                         <h4> เงินเดือน <i class="fa fa-money user-profile-icon"></i> : 
                          <?php echo $salary;?></h4>
                        </li>
                      </ul>

                      

                    </div>
                    
 <?php
if($_GET["Action"]=="Time")
{

	$alltime = array();
	$catch = array();
	foreach($dbh->query("SELECT checktype,CHECKTIME from payroll_senang where eid = 102 and CHECKTIME BETWEEN '".$_POST["dateFrom"]." 00:00:00' AND '".$_POST["dateTo"]." 23:59:59';") as $row) {
	  if($row[checktype] == "Check In"){
	    array_push($catch,$row[CHECKTIME]);
	  }else if($row[checktype] == "Check Out"){
	    array_push($catch,$row[CHECKTIME]);
	    array_push($alltime,$catch);
	    $catch = array();
	  }
	}
	$arrlength = count($alltime);
	$datefrom = date($_POST["dateFrom"]);
	$dateto = date($_POST["dateTo"]);
	}
else{
	$datefrom = date('Y-m-d');
	$dateto = date('Y-m-d');
}
?>                    
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>เลือกช่วงเวลา</h2>
                        </div>

 <form name="selectTime" method="POST" <?php echo "action='profile.php?eid=".$eid."&tb=".$tb."&Action=Time"."'"?>">
<div class="row">
    <div class="col-md-3">From:</div>
    <div class="col-md-4"><input type="date" name="dateFrom" value="<?php echo $datefrom; ?>" /></div>
</div>
<div class="row">
    <div class="col-md-3">To:</div>
    <div class="col-md-4"><input type="date" name="dateTo" value="<?php echo $dateto; ?>" /></div>
</div>
    <input type="submit" name="submit" value="submit"/>
</form>
                        </div>
                      </div>
                    </br>
                      <div class="x_content">
			<table class="table table-bordered">
			<thead>
			<tr>
			  <th>#</th>
			  <th>เข้า</th>
			  <th>ออก</th>
			  <th>วันทำงาน</th>
			  <th>OT</th>
			</tr>
			</thead>
			<tbody>
<?php
$count = 1;
	foreach ($alltime as &$time) {
	  $timeFirst  = strtotime($time[0]);
	  $timeSecond = strtotime($time[1]);
	  $difs = $timeSecond - $timeFirst;
	  $difm = $difs/60;
	  $difh = $difm/60;
	  $mm = $difm%60;
	  if($mm>=30){
	    $difh+=1;
	  }
	  $ot = 0;
	  if($difh>9){
	    $ot = $difh%9;
  	    $difh = 9;
	  }
	  
?>
			  <tr>
			    <th scope="row"><?php echo $count; $count++;?></th>
			    <td><?php echo $time[0];?></td>
			    <td><?php echo $time[1];?></td>
			    <td><?php echo $difh;?></td>
			    <td><?php echo $ot;?>
			      <div class="btn-group pull-right">
			      <button type="button" class="btn btn-success" data-method="" title="">
			        <span class="docs-tooltip" data-toggle="" title="">
			          <span class="fa fa-check"></span>
				</span>
			      </button>
			      <button type="button" class="btn btn-danger" data-method="clear" title="Clear">
			        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;clear&quot;)">
			           <span class="fa fa-remove"></span>
			        </span>
			      </button>
			    </td>
			  </tr>
<?php
}
?>
			</tbody>
			</table>
			</div>
						  

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>อื่นๆ</h2>
                        </div>
                          </div>
                        <br>
                          <div class="row">
                          <div class="col-md-4">
                          
                          <div class="form-group">
                                                 <div class="">
                           <label class="control-label col-md-4">ประกันสังคม</label>
                            <label>
                              <input type="checkbox" class="js-switch" checked />
                            </label>
                          </div>
                        </div>
                     


                          </div>
                          
                          <div class="col-md-4">
                          
                          <div class="form-group">
                                                 <div class="">
                           <label class="control-label col-md-4">ส่งคนงาน</label>
                            <label>
                              <input type="checkbox" class="js-switch" checked />
                            </label>
                          </div>
                        </div>
                     


                          </div>
                          <div class="col-md-4">
                          
                         <div class="form-group">
                          <div class="">
                          <label class="control-label col-md-4 col-sm-4 ">ล้างห้องน้ำ</label>
                            <label>
                            
                              <input type="checkbox" class="js-switch" checked /> 
                            </label>
                          </div>
                         </div>
                         
                          </div>
                          </div>
                          <div class="profile_title">
                        <div class="col-md-6">
                          <h2>คำนวณเงินเดือน</h2>
                          
                          
                        </div>
                          </div>
                        <br>
                        วันทำงาน: 12</br>
                          เงินเดือน: 9000</br>
                          OT: 4ชั่วโมง</br>
                          พิเศษ:</br>
                          รวมจ่าย:6000
                          
                        </div>
                       
                       
                       
                          
                        </div>
                      </div>


                          </div>
                          </div>
                         
                      </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
