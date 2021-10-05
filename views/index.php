<?php
session_start();

if( (!isset($_SESSION['logged']) || $_SESSION['logged'] != true ) ){
    header("location:../index.php");
    
}
include '../config.php';

function fetch_accounts($conn){
  $sql = "select * from account_numbers";
  $run =  mysqli_query($conn,$sql);
  return $run;
}

function fetch_list($conn){
  $sql = "select * from prepared_list";
  $run =  mysqli_query($conn,$sql);
  return $run;
}
if(isset($_SESSION['get_new_list']) && $_SESSION['get_new_list'] == 'show list'){
  $prepared_list =  fetch_list($conn);
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
     
    </ul>

   


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <a href="#" class="btn-lg bg-gradient-primary" data-toggle="modal" data-target="#pay-run">
            MAKE PAY RUN
            </a>
          
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="../fetch_accounts.php" class="btn-lg bg-gradient-primary" >
            BANK ACCOUNT
            </a>
         
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <a href="../end_pay_run_session.php" class="btn-lg bg-gradient-primary">
            END SESSION
            </a>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <button type="button" class="btn-lg bg-gradient-primary" data-toggle="modal" data-target="">
            TO DO
            </button>
     
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
         <!-- <div class="row my-5">
          <div class="col-lg-3 col-6">
          
           <a href="" class="btn-lg bg-gradient-primary">TO DO</a>
          </div>
         
          <div class="col-lg-3 col-6">
          
           <a href="" class="btn-lg bg-gradient-primary">MAKE PAY RUN</a>
          </div>
          
          <div class="col-lg-3 col-6">
           
           <a href="" class="btn-lg bg-gradient-primary">MAKE PAY RUN</a>
          </div>
         
          <div class="col-lg-3 col-6">
           
           <a href="" class="btn-lg bg-gradient-primary">MAKE PAY RUN</a>
          </div>
          
        </div> -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row my-5">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           
             
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat With Bot</h3>

                <div class="card-tools">
                 
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
               
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Auto Bot</span>
                      
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/download.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <?php
                    if(isset($_SESSION['file_name'])){
                    ?>
                    <div class="direct-chat-text">
                      Here is the pay run txt file... <a href="<?php echo "../".$_SESSION['file_name']; ?>" target="_blank">Download link</a>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <!-- <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                   
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                   
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                   
                  </div> -->
                  <!-- /.direct-chat-msg -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

    


        <!-- ModalS -->
        <!-- CREATE PAY RUN -->
<div class="modal fade" id="pay-run" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New CSV List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../make_csv_file.php" method="post" enctype="multipart/form-data">
            <input type="file" name="list"  id="">
            <button type="submit" name="go" class="btn bg-gradient-primary">Go</button>
        </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_SESSION['get_new_list'])){

?>
<div class="modal fade" id="edit-pay-run" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  id='update-alert'></div>
      <div class="modal-body">
        <form action="../edit_pay_run.php" id="send-to-edit" method="post">
          <div class="form-group">
            <label for="text">ID</label>
            <input type="text" name="id" class="form-control" id="text">
          </div>
          <div class="form-group">
            <label for="column">Colunm</label>
            <select name="column" id="">
              <option value="payee">Payee</option>
              <option value="bank_acc">Account No</option>
              <option value="open_balance">Amount</option>
              <option value="sort_code">Sort Code</option>
              <option value="ref_no">Refrence Number</option>
            </select>
          </div>
          <div class="form-group">
            <label for="new">New Value</label>
            <input type="text" name="new_value" class="form-control" id="new">
            <input type="hidden" name="tbl" value="prepared_list">
          </div>

       
          <button type="submit" class="btn btn-primary">Update</button>

        </form> 
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>

<!-- edit accounts -->
<?php
if(isset($_SESSION['get_account_number'])){

?>
<div class="modal fade" id="edit-account-numbers" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  id='update-alert'></div>
      <div class="modal-body">
        <form action="../edit_accounts_numbers.php" id="send-to-edit" method="post">
          <div class="form-group">
            <label for="text">ID</label>
            <input type="text" name="id" class="form-control" id="text">
          </div>
          <div class="form-group">
            <label for="column">Colunm</label>
            <select name="column" id="">
              <option value="supplier_name">Supplier Name</option>
              <option value="account_number">Account No</option>
              <option value="qbo_names">QBO Name</option>
              <option value="sort_code">Sort Code</option>
              
            </select>
          </div>
          <div class="form-group">
            <label for="new">New Value</label>
            <input type="hidden" name="tbl" value="account_numbers">
            <input type="text" name="new_value" class="form-control" id="new">
          </div>
       
          <button type="submit" class="btn btn-primary">Update</button>

        </form> 
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>

          </section>
          <!-- /.Left col -->

<section class="container">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <?php
              if(isset($_SESSION['get_new_list'])){
            ?>
            <div class="card">
              <div class="card-header">
              <?php
                        if(isset($_SESSION['get_new_list'])){
                          echo " <a href='#' class='card-title btn btn-primary' data-toggle='modal' data-target='#edit-pay-run'>Edit</a>";
                        }
                      ?>
             

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  

                    
                      <?php
                        if(isset($_SESSION['get_new_list'])){
                          echo "<a href='../create_pay_run.php' class='btn btn-primary'>Make File</a>";
                        }
                      ?>
                      

                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                     <?php
                      if(isset($_SESSION['tbl_header'])){
                        $count = count($_SESSION['tbl_header']);
                        for ($i=0; $i < $count; $i++) { 
                          echo "<th>" . $_SESSION['tbl_header'][$i] . "</th>" ;
                        }
                      }



                    ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if(isset($_SESSION['get_new_list'])){
                    $new_list = $prepared_list;
                    while ($line = mysqli_fetch_assoc($new_list)) {
                       echo "<tr>";
                       echo "<td> {$line['id']} </td>";
                       echo "<td> {$line['open_balance']} </td>";
                       echo "<td> {$line['payee']} </td>";
                       echo "<td> {$line['bank_acc']} </td>";
                       echo "<td> {$line['sort_code']} </td>";
                       echo "<td> {$line['ref_no']} </td>";
                       echo "</tr>";
                      }


                  }
                      

                  ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <?php
                }
            ?>

          <!-- ACCOUNTS TABLE -->
            <div class="col-12">
            <?php
              if(isset($_SESSION['get_account_number'])){
            ?>
            <div class="card">
              <div class="card-header">
              <?php
                        if(isset($_SESSION['get_account_number'])){
                          echo " <a href='#' class='card-title btn btn-primary' data-toggle='modal' data-target='#edit-account-numbers'>Edit</a>";
                        }
                      ?>
             

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                     <?php
                      if(isset($_SESSION['tbl_header'])){
                        $count = count($_SESSION['tbl_header']);
                        for ($i=0; $i < $count; $i++) { 
                          echo "<th>" . $_SESSION['tbl_header'][$i] . "</th>" ;
                        }
                      }



                    ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if(isset($_SESSION['get_account_number']) && $_SESSION['get_account_number'] == 'show accounts'){
                    $new_list = fetch_accounts($conn);
                    while ($line = mysqli_fetch_assoc($new_list)) {
                       echo "<tr>";
                       echo "<td> {$line['id']} </td>";
                       echo "<td> {$line['account_number']} </td>";
                       echo "<td> {$line['supplier_name']} </td>";
                       echo "<td> {$line['qbo_names']} </td>";
                       echo "<td> {$line['sort_code']} </td>";
                    
                       echo "</tr>";
                      }


                  }
                      

                  ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <?php
                }
            ?>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </section>
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/my_js/send_ajax_data.js"></script>
</body>
</html>
