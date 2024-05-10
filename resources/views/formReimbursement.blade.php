<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Formulir Reimbursement</title>

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
                        <a href="/staff" class="active-menu waves-effect waves-dark"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		    <div class="header">
                <h1 class="page-header">
                    Formulir Reimbursement
                </h1>
		    </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="col-12"><br>
                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="nama" type="text" name="nama_reimbursement" maxlength="25" required>
                                                <label for="nama">Nama Reimbursement</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="" type="datetime-local" name="tanggal" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="textarea1" name="deskripsi" class="materialize-textarea" style="height: 10px;"></textarea>
                                                <label for="textarea1">Deskripsi</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <p for="">Pilih File</p>
                                                <input id="file_reimbursement" name="files" type="file" name="file_reimbursement" accept=".jpg, .jpeg, .png, .gif, .pdf">
                                                {{-- <label for="file_reimbursement">Pilih File</label> --}}
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
        </div>

    <script src="{{asset('js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('materialize/js/materialize.min.js')}}"></script>
    <script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables/dataTables.bootstrap.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
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
