<?php
include '../inc/dbconnect.php';

$vendor_id = "";
if (isset($_GET['vendorid'])) {
  $vendor_id = mysqli_real_escape_string($con, $_GET['vendorid']);
  $query = "SELECT * FROM vendor WHERE vendorID = {$vendor_id}";

  $resultset = mysqli_query($con, $query);

  if ($resultset) {
    if (mysqli_num_rows($resultset) == 1) {
      $result = mysqli_fetch_assoc($resultset);
      $VendorName = $result['vName'];
      $VendorMNumber = $result['vMNumber'];
      $VendorLNumber = $result['vLNumber'];
      $VendorEmail = $result['vEmail'];
      $VendorAddress = $result['vAddress'];
      $VendorCity = $result['vCity'];
      $VendorDistrict = $result['vDistrict'];
    } else {
      header('Location: VendorTable.php?UserNotFound');
    }
  } else {
    header('Location: VendorTable.php?SQLError');
  }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vendor Details</title>
  <!--Custom CSS-->
  <link rel="stylesheet" href="../dist/css/customCSS.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../form-validator/theme-default.min.css">
  <link rel="stylesheet" href="../sweetalert/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="Includes/Logout.inc.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;LogOut
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Nuwan Rice Mill</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/4.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="../index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../Order/OrderTable.php" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Order Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../Customer/CustomerTable.php" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>Customer Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../Vendor/VendorTable.php" class="nav-link active">
                <i class="nav-icon fas fa-handshake"></i>
                <p>Vendor Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>Billing</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>Stock Management</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck-loading"></i>
                <p>Transport Handling</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Transport/TransportActionTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Transport Action</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Transport/TransportHandlingTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Transport Handling</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>Expenses Tracking</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Expenses/ExpensesGroupTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Expense Group</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Expenses/ExpensesTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Expense Type</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Expenses/ExpenseTable.php" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Expenses Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-truck-moving"></i>
                <p>Vehicle Management
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Vehicle/VehicleTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>Vehicle Types</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Vehicle/VehicleTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>Vehicles</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Employee Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Employee/EmployeeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>Employee Details</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Employee/Leave/LeaveManagementTable.php" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>Employee Leave Details</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Employee/Leave/LeaveTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>Leave Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-angle-double-down"></i>
                <p>
                  Options
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Change-password.php" class="nav-link">
                    <i class="nav-icon fas fa-key"></i>
                    <p>Change Password</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Register.php" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Add User</p>
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
              <h1 class="m-0 text-dark">Vendor Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">


          <!--your conetent here-->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Vendor Details</h5>
                </div>
                <div class="card-body">

                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "emptyFields") : ?>
                    <div class="fieldsempty" data-fields="<?= $_GET['emptyFields']; ?>"></div>
                  <?php endif;  ?>

                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "invalidmobile") : ?>
                    <div class="invalidmobilenum" data-mobilenumberror="<?= $_GET['invalidmobile']; ?>"></div>
                  <?php endif;  ?>



                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "invalidland") : ?>
                    <div class="invalidlandnum" data-landnumberror="<?= $_GET['invalidland']; ?>"></div>
                  <?php endif;  ?>


                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "invalidEmail") : ?>
                    <div class="invalidmail" data-mailerror="<?= $_GET['invalidEmail']; ?>"></div>
                  <?php endif;  ?>



                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "SQLError") : ?>
                    <div class="sqlerror" data-sql="<?= $_GET['SQLError']; ?>"></div>
                  <?php endif;  ?>


                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "VendorTaken") : ?>
                    <div class="taken" data-vendorname="<?= $_GET['VendorTaken']; ?>"></div>
                  <?php endif;  ?>

                  <form action="../inc/updatevendor.php" method="POST">
                    <div class="form-group">
                      <label>Full Name<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <?php
                        if (isset($_GET['name'])) {
                          $name = $_GET['name'];
                          echo '<input type="text" class="form-control" data-validation=" length required" data-validation-length="min4" data-validation-error-msg="Please Enter Minimum 4 Characters" name="vname" value="' . $name . '">';
                        } else {
                          echo '<input type="text" class="form-control" data-validation=" length required" data-validation-length="min4" data-validation-error-msg="Please Enter Minimum 4 Characters" name="vname"  value="' . $VendorName . '"; >';
                        }
                        ?>

                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Phone (Mobile)<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['mobile'])) {
                            $mobile = $_GET['mobile'];
                            echo '<input type="text" class="form-control"  data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits" name="mnumber" value="' . $mobile . '">';
                          } else {
                            echo '<input type="text" class="form-control"  data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits" name="mnumber"  value="' . $VendorMNumber . '"; >';
                          }
                          ?>

                        </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Phone (Land)</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['land'])) {
                            $land = $_GET['land'];
                            echo '<input type="text" class="form-control" data-validation-optional="true" data-validation="number length" data-validation-length="10-10" data-validation-error-msg="The Land Number Must Be 10 Digits" name="lnumber" value="' . $land . '">';
                          } else {
                            echo '<input type="text" class="form-control" data-validation-optional="true" data-validation="number length" data-validation-length="10-10" data-validation-error-msg="The Land Number Must Be 10 Digits" name="lnumber" value="' . $VendorLNumber . '">';
                          }
                          ?>

                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['email'])) {
                            $mail = $_GET['email'];
                            echo '<input type="email" class="form-control" data-validation-optional="true" data-validation="email" name="email" value="' . $mail . '">';
                          } else {
                            echo '<input type="email" class="form-control" data-validation-optional="true" data-validation="email" name="email" value="' . $VendorEmail . '">';
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Address<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                        </div>
                        <?php
                        if (isset($_GET['address'])) {
                          $address = $_GET['address'];
                          echo '<input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Address of Vendor" name="address" value="' . $address . '">';
                        } else {
                          echo '<input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Address of Vendor" name="address" value="' . $VendorAddress . '">';
                        }
                        ?>

                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>City<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['city'])) {
                            $city = $_GET['city'];
                            echo '<input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the City of Customer" name="city" value="' . $city . '">';
                          } else {
                            echo '<input type="text" class="form-control" data-validation="required custom" data-validation-regexp="^([a-zA-Z]+)$" data-validation-error-msg="Please Fill the City of Vendor" name="city" value="' . $VendorCity . '">';
                          }
                          ?>

                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>District<span class="requiredIcon" style="color:red;">*</span></label>
                        <select name="District" class="form-control select2bs4" data-validation="required" data-validation-error-msg="Please Select District of vendor">
                          <?php
                          if (isset($_GET['district'])) {
                            $district = ($_GET['district']); ?>
                            <option value="<?php echo $district; ?>" selected><?php echo $district; ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $VendorDistrict; ?>" selected><?php echo $VendorDistrict; ?></option>
                          <?php } ?>

                          <option value="Ampara">Ampara</option>
                          <option value="Anuradhapura">Anuradhapura</option>
                          <option value="Badulla">Badulla</option>
                          <option value="Batticaloa">Batticaloa</option>
                          <option value="Colombo">Colombo</option>
                          <option value="Galle">Galle</option>
                          <option value="Gampaha">Gampaha</option>
                          <option value="Hambantota">Hambantota</option>
                          <option value="Jaffna">Jaffna</option>
                          <option value="Kalutara">Kalutara</option>
                          <option value="Kandy">Kandy</option>
                          <option value="Kegalle">Kegalle</option>
                          <option value="Kilinochchi">Kilinochchi</option>
                          <option value="Kurunegala">Kurunegala</option>
                          <option value="Mannar">Mannar</option>
                          <option value="Matale">Matale</option>
                          <option value="Matara">Matara</option>
                          <option value="Monaragala">Monaragala</option>
                          <option value="Mullaitivu">Mullaitivu</option>
                          <option value="Nuwara Eliya">Nuwara Eliya</option>
                          <option value="Polonnaruwa">Polonnaruwa</option>
                          <option value="Puttalam">Puttalam</option>
                          <option value="Ratnapura">Ratnapura</option>
                          <option value="Trincomalee">Trincomalee</option>
                          <option value="Vavuniya">Vavuniya</option>
                        </select>

                      </div>
                    </div>

                    <?php
                    if (isset($_GET['venid'])) {
                      $vendID = $_GET['venid'];
                      echo '<input type="hidden" name="vendorid" value="' . $vendID . '">';
                    } else {
                      echo '<input type="hidden" name="vendorid" value="' . $vendor_id . '">';
                    }
                    ?>
                    <button type="submit" id="addvendor" name="addvendor" class="btn btn-success">Update Vendor</button>
                    <button type="button" class="btn btn-warning" onclick="history.go(-1);" value="Back"><i class="fas fa-arrow-left"></i> Back</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <br><br>

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 Nuwan Rice Mill.</strong> All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Powered By</b> <img src="../dist/img/3.png" alt="User Image">
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->


  <!-- REQUIRED SCRIPTS -->
  <script src="../Loader/script.js"></script>
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="../dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="../dist/js/pages/dashboard2.js"></script>
  <script src="../form-validator/jquery.form-validator.min.js"></script>
  <script src="../form-validator/jquery.form-validator.js"></script>
  <script src="../sweetalert/sweetalert2.all.min.js"></script>
  <script>
    $.validate();
  </script>
  <script>
    //SweetAlert

    const vendorname = $('.taken').data('vendorname')
    if (vendorname) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Vendor Name Already Taken!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    sql = $('.sqlerror').data('sql')
    if (sql) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'SQL Error!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    mailerror = $('.invalidmail').data('mailerror')
    if (mailerror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Invalid Email!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    landnumberror = $('.invalidlandnum').data('land')
    if (land) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Invalid Land Number!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
    mobilenumberror = $('.invalidmobilenum').data('mobile')
    if (mobile) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Invalid Mobile Number!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
    fields = $('.fieldsempty').data('fields')
    if (fields) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Fields are Empty!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
  </script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>