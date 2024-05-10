<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Karyawan</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}" media="screen,projection" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/custom-styles.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons">track_changes</i> <strong>Reimbursement</strong></a>

		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li><a class="dropdown-button waves-effect waves-dark" href="{{ route('logout')}}" data-activates="dropdown1"><i class="fa fa-sign-out"></i> <b>Logout</b></a></li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="/direktur" class="waves-effect waves-dark"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="/direktur/listKaryawan" class="active-menu waves-effect waves-dark"><i class="fa fa-user"></i> Data Karyawan</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		    <div class="header">
                <h1 class="page-header">
                    Tambah Karyawan
                </h1>
		    </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12"><br>
                        <div class="card">
                            <div class="card-content">
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="nip" type="text" name="nip" class="validate" required>
                                            <label for="nip">NIP</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="" type="text" name="nama" class="validate" required>
                                            <label for="first_name">Nama Karyawan</label>
                                        </div>
                                    </div>
                                    <div class="row" style="display: flex">
                                        <p>Pilih Jabatan:</p>&nbsp;&nbsp;&nbsp;
                                        <p>
                                            <input name="jabatan" type="radio" id="test1" value="Staff"/>
                                            <label for="test1">Staff</label>
                                        </p>&nbsp;&nbsp;
                                        <p>
                                            <input name="jabatan" type="radio" id="test2" value="Finance"/>
                                            <label for="test2">Finance</label>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password" type="password" name="password" class="validate" required>
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="konfirmasiPassword" type="password" name="konfirmasiPassword" class="validate" required>
                                            <label for="konfirmasiPassword">Konfirmasi Password</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-primary" style="float: right" type="submit">Submit</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{asset('js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('materialize/js/materialize.min.js')}}"></script>
    <script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
       <script>
           Swal.fire({
               title: "Success!",
               text: "{{ session('success') }}",
               icon: "success"
           });
    </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Failed!",
                text: "{{ $errors->first('error') }}",
                icon: "error"
            });
        </script>
    @endif
    <script src="{{asset('js/custom-scripts.js')}}"></script>
</body>
</html>
