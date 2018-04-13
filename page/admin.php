<?php

require "./../php/get_session.php";

require_once("../php/db_config.php");
require "./../php/get_post_data.php"; 
$sql = "SELECT * FROM dasom_account";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ladbrokes Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">ladbrokes Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>

      <!--<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> 키발급</div>
         <div class="card-body">
        <form method='post' action='./CreateKey.php'>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter name" name="name">
              </div>
              <div class="col-md-5">
                <label for="exampleInputLastName">Key</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Press Button" name="key">
              </div>
              <div class="col-md-1">
                <label for="exampleInputLastName"> Key Create</label>
                <input type="button" id = 'exampleInputLastName' class="btn btn-danger btn-block form-control"  aria-describedby="nameHelp" value="Create" onclick='createkey()'>
              </div>
              <div class="col-md-3">
                <!--
                <label for="type">Type</label>
                <input class="form-control" id="type" type="text" aria-describedby="nameHelp" placeholder="Enter Type" name="type">
                
                <label for="type">　Type</label>
                <div class="container" id ="type">
                  <select class="form-control" id='selecttype' name = 'type' value='1' onchange="select()"> 
                    <option>SPORTS_FOOTBALL</option>
                    <option>SPORTS_BASKETBALL</option>
                    <option>SPORTS_BASEBALL</option>
                    <option>SPORTS_BOXING</option>
                    <option>SPORTS_HANDBALL</option>
                    <option>SPORTS_ICEHOCKEY</option>
                    <option>SPORTS_TENNIS</option>
                    <option>SPORTS_UFC</option>
                    <option>SPORTS_VOLLEYBALL</option>
                    <option>INPLAY_FOOTBALL</option>
                    <option>INPLAY_BASKETBALL</option>
                    <option>INPLAY_BASEBALL</option>
                    <option>INPLAY_ICEHOCKEY</option>
                    <option>INPLAY_TENNIS</option>
                    <option>INPLAY_VOLLEYBALL</option>
                    <option>VIRTURE_HORSE</option> 
                    <option>VIRTURE_GREYHOUNDS</option> 
                    <option>VIRTURE_MOTORRACING</option> 
                    <option>VIRTURE_SPEEDWAY</option> 
                    <option>VIRTURE_CYCLING</option> 
                    <option>VIRTURE_JUMPHORSE</option> 
                    <option>VIRTURE_FOOTBALL</option> 
                    <option>RESULT_VIRTURE</option>
                    <option>RESULT_SPORTS</option>
                  </select> 
                </div>

              </div>
              
            </div>
          </div>
          <button type='submit' class="btn btn-primary btn-block" href="login.html">Register</button>
        </form>
      </div>
      </div>-->
      
      <!-- Example DataTables Card-->

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> User Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th>E-mail</th>
                  <th>Number</th>
                  <th>Position</th>
                  <th>Admission</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th>E-mail</th>
                  <th>Number</th>
                  <th>Position</th>
                  <th>Admission</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                while ( $row=$result->fetch_assoc())
                {
                  if(!strcmp($row['position'], 'admin'))
                  {
                    continue;
                  }
                  echo'
                  <tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['year'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['number'].'</td>
                  <td>'.$row['position'].'</td>
                  <td>'.echo_ad($row['id']).'</td>
                  </tr>
                  ';
                }
                ?>
                
              
                
              </tbody>
            </table>
          </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script type="text/javascript">
      function createkey(){
       var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 30;
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum,rnum+1);
        }
        document.getElementById('exampleInputLastName').value= randomstring;
      }
      function select(){
        var sel = document.getElementById("selecttype");
        var val = sel.options[sel.selectedIndex].text;
        document.getElementById("selecttype").value = val;
      }
      function del(key) {
        window.open("../DB/del.php?key="+key, "_blank", "left=300,width=10,height=10");
        confirm("삭제되었습니다.");
        location.reload();
      }
      function bancancle(key){
       window.open("../DB/ban.php?key="+key, "_blank", "left=300,width=10,height=10");
        confirm("해제되었습니다.");
        location.reload(); 
        
      }
    </script>
  </div>
</body>

</html>
