@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Jenis Layanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.jenis.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kode" value="{{ $jenis->kode }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Jenis Layanan</label>
                                    <input type="text" value="{{ $jenis->nama }}" name="nama" class="form-control" placeholder="Nama Kelas" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.jenis.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
