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
                            <h1>Perkara</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('perkara') }}">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Perkara</li>
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
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Perkara</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->


                                <form method="post" action="{{ route('update-perkara', $dtPerkara->id) }}">
                                {{-- <form action="{{ route('/update-perkara', $dtPerkara->id) }}" method="POST"> --}}
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>No. Perkara</label>
                                            <input type="text" class="form-control" id="no_perkara" name="no_perkara" value="{{ $dtPerkara->no_perkara }}"
                                                placeholder="No. Perkara">
                                        </div>
                                        <div class="form-group">
                                            <label>Terdakwa</label>
                                            <input type="text" class="form-control" id="terdakwa" name="terdakwa" value="{{ $dtPerkara->terdakwa }}"
                                                placeholder="Nama Terdakwa">
                                        </div>

                                        {{-- <div class="form-group">
                                            <label>Hakim</label>
                                            <select class="form-control select2" id="id_hakim" name="id_hakim" style="width: 100%">
                                                <option disabled value>Pilih Hakim</option>
                                                <option value="{{ $pkr->hakim_id }}">{{ $pkr->hakim->nama_hakim }}</option>
                                                @foreach ($hkm as $item )
                                                <option value="{{ $item->id }}">{{ $item->nama_hakim }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Sidang</label>
                                            <input type="datetime-local" class="form-control" id="tgl_sidang" name="tgl_sidang"
                                                value="{{ $pkr->tgl_sidang }}" placeholder="Tanggal Sidang">
                                        </div>
                                        <div class="form-group">
                                            <label>Ruang Sidang</label>
                                            <select class="form-control select2" id="id_ruang" name="id_ruang" style="width: 100%">
                                                <option disabled value>Pilih Ruangan</option>
                                                <option value="{{ $pkr->ruang_id }}">{{ $pkr->ruang->nama_ruang }}</option>
                                                @foreach ($rsd as $item )
                                                <option value="{{ $item->id }}">{{ $item->nama_ruang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Klasifikasi</label>
                                            <select class="form-control select2" id="id_klasifikasi" name="id_klasifikasi" style="width: 100%">
                                                <option disabled value>Pilih Jenis Klasifikasi</option>
                                                <option value="{{ $pkr->klasifikasi_id }}">{{ $pkr->klasifikasi->klasifikasi_perkara }}</option>
                                                @foreach ($klasi as $item )
                                                <option value="{{ $item->id }}">{{ $item->klasifikasi_perkara }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}


                                        {{-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div> --}}
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

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
