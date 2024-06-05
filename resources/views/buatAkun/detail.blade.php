@extends('master.main')
@section('title', 'Pengurus')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mb-4">Detail Anggota</h1>




        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">




                    <div class="card-body">

                        <form method="POST" action="{{ route('update-pengurus', $detail->id) }}" autocomplete="off">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="_method" value="PUT">


                            {{-- Form --}}
                            {{-- <div> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nama</label>
                                        <input class="form-control" value="{{ $detail->nama }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Nim</label>
                                        <input class="form-control" value="{{ $detail->nim }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Divisi 1</label>
                                        <input class="form-control" value="{{ $detail->divisi_1 }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Divisi 2</label>
                                        <input class="form-control" value="{{ $detail->divisi_2 }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Jabatan 1</label>
                                        <input class="form-control" value="{{ $detail->jabatan }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Jabatan 2</label>
                                        <select class="form-control" name="jabatan_2" aria-label="Default select example">
                                            <option selected>-- PILIH JABATAN --</option>
                                            <option value="Pengurus">Pengurus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- </div> --}}

                            <!-- Button -->
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->

    {{-- sweet alert --}}
    @include('sweetalert::alert')

@endsection
