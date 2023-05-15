<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sistem Inventory Sparepart 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        @role('admin')
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Admin
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
        @else
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          User
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
        @endrole
      </div>
      @role('admin')
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="/supplier">
              <i class="nc-icon nc-single-02"></i>
              <p>Master Supplier</p>
            </a>
          </li>
          {{-- <li>
            <a href="/sparepart">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Master Sparepart</p>
            </a>
          </li> --}}
          <li class="active">
            <a href="/monitoring">
              <i class="nc-icon nc-tile-56"></i>
              <p>Monitoring</p>
            </a>
          </li>
          <li>
            <a href="/transaksi">
              <i class="nc-icon nc-bell-55"></i>
              <p>Transaksi</p>
            </a>
          </li>
          <li>
            <a href="/pengembalian">
              <i class="nc-icon nc-simple-remove"></i>
              <p>pengembalian</p>
            </a>
          </li>
          <li>
            <a href="/pegawai">
              <i class="nc-icon nc-badge"></i>
              <p>Master Pegawai</p>
            </a>
          </li>
          <li>
            <a href="/abcmodel">
              <i class="nc-icon nc-money-coins"></i>
              <p>ABC Model</p>
            </a>
          </li>
        </ul>
      </div>
      @else
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  >
            <a href="/master_supplier">
              <i class="nc-icon nc-single-02"></i>
              <p>Master Supplier</p>
            </a>
          </li>
          <li class="active">
            <a href="/monitoring">
              <i class="nc-icon nc-tile-56"></i>
              <p>Monitoring</p>
            </a>
          </li>
          <li>
            <a href="/pengembalian">
              <i class="nc-icon nc-simple-remove"></i>
              <p>pengembalian</p>
            </a>
          </li>
        </ul>
      </div>
      @endrole
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Sistem Inventory Sparepart Mobil</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="btn btn-danger"> Log out </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-14">
            <div class="card" style="width:78rem">
              <div class="card-header">
                <h4 class="card-title"> Data Penerimaan Sparepart</h4>
                <a href="/penerimaan/create" class="btn btn-primary"> Tambah Data Penerimaan</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" table-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Nama Sparepart
                      </th>
                      <th>
                        Kode Sparepart
                      </th>
                      <th>
                        Merk Mobil
                      </th>
                      <th>
                        Nopol
                      </th>
                      <th>
                        Nama Penerima
                      </th>
                      <th>
                        Supplier
                      </th>
                      <th >
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($penerimaan as $key=>$x )
                          <td>
                            {{$key+1}}
                          </td>
                          <td>
                            {{$x->tanggal}}
                          </td>
                          <td>
                            {{$x->nama_sparepart}}
                          </td>
                          <td>
                            {{$x->kode_sparepart}}
                          </td>
                          <td>
                            {{$x->merk}}
                          </td>
                          <td>
                            {{$x->nopol}}
                          </td>
                          <td>
                            {{$x->nama_pegawai}}
                          </td>
                          <td>
                            {{$x->nama_supplier}}
                          </td>
                          <td>
                            <a href="/penerimaan/{{$x->id}}/edit/" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                              </svg>
                            </a>
                            <form action="{{ route('penerimaan.destroy', $x->id) }}" method="POST" class="inline-block">
                              {!! method_field('delete') . csrf_field() !!}
                              <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                              </button>
                            </form>
                          </td>
                         </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
