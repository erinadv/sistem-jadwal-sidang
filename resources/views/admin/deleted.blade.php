<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Klasifikasi Perkara Terhapus</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('perkara') }}">Home</a></li>
                                <li class="breadcrumb-item active">Klasifikasi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Klasifikasi Perkara</h3>


                                    <div class="card-tools">
                                        {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Jenis Perkara</th>
                                                <th>Action</th>
                                                <th class="project-actions text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dtKlasifikasi as $item)
                                            <tr>

                                                <td><a>{{ $item->id}}</a></td>
                                                <td><a>{{ $item->klasifikasi_perkara}}</a></td>
                                                <td class="project-actions ">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('klasifikasi-restore', $item->id) }}">
                                                        <i class="fas fa-recycle">
                                                        </i>
                                                        Restore
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ url('/force-klasifikasi/'.$item->id) }}">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Hard Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <!-- ./card-header -->

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            @include('layout.footer')
        </footer>

        {{--
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar --> --}}
    </div>
    <!-- ./wrapper -->

    @include('layout.script')
</body>

</html>
