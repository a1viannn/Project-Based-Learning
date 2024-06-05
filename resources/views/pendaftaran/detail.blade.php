@extends('master.main')
@section('title', 'Pendaftaran')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mb-4">Detail Pendaftar</h1>




        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-5">
                        <tbody>

                            <tr>
                                <td>Nama</td>
                                <td>: {{ $detail->nama }}</td>
                                <td>CV</td>
                                <td>:
                                    @if ($detail->cv)
                                        <img src="data:image/png;base64, {{ $detail->cv }}" alt="Gambar dari Base64"
                                            style="max-width: 200px; max-height: 200px;">
                                    @else
                                        Tidak ada cv
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Nim</td>
                                <td>: {{ $detail->nim }}</td>
                            </tr>


                            <tr>
                                <td>Prodi</td>
                                <td>: {{ $detail->prodi }}</td>
                            </tr>

                            <tr>
                                <td>Semester</td>
                                <td>: {{ $detail->semester }}</td>
                            </tr>

                            <tr>
                                <td>No HP</td>
                                <td>: {{ $detail->no_telp }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>: {{ $detail->email }}</td>
                            </tr>

                            <tr>
                                <td>Divisi 1</td>
                                <td>: {{ $detail->divisi_1 }}</td>
                            </tr>

                            <tr>
                                <td>Divisi 2</td>
                                <td>:
                                    @if ($detail->divisi_2)
                                        {{ $detail->divisi_2 }}
                                    @else
                                        "tidak memilih"
                                    @endif
                                </td>
                            </tr>


                        </tbody>
                    </table>


                    <div class="text-right">
                        @if ($detail->status == 'menunggu')
                            <form action="{{ route('terima-pendaftaran', $detail->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success " onclick="return confirm('Apakah anda ingin menerima?')"><i
                                        class="fas fa-check-circle"></i> Terima</button>
                            </form>
                            <form action="{{ route('tolak-pendaftaran', $detail->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menolak?')"><i
                                        class="fas fa-times-circle"></i> Tolak</button>
                            </form>
                        @elseif ($detail->status == 'terima')
                            <form action="{{ route('tolak-pendaftaran', $detail->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menolak?')"><i
                                        class="fas fa-times-circle"></i> Tolak</button>
                            </form>
                        @elseif ($detail->status == 'tolak')
                            <form action="{{ route('terima-pendaftaran', $detail->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success " onclick="return confirm('Apakah anda ingin menerima?')"><i
                                        class="fas fa-check-circle"></i> Terima</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->

    {{-- sweet alert --}}
    @include('sweetalert::alert')

@endsection
