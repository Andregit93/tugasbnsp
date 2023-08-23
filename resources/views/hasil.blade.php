@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-5">
        <div class="card my-5">
            <h4 class="card-header">Hasil Pendaftaran Beasiswa</h4>
            <div class="card-body mt-3 mx-5">
                <p><strong>Nama:</strong> {{ $data['name'] }}</p>
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
                <p><strong>Nomor HP:</strong> {{ $data['phoneNumber'] }}</p>
                <p><strong>Semester Saat Ini:</strong> {{ $data['semester'] }}</p>
                <p><strong>IPK Terakhir:</strong> {{ $data['ipk'] }}</p>
                <p><strong>Pilihan Beasiswa:</strong> {{ $data['beasiswa'] }}</p>
                <p><strong>Berkas Syarat:</strong> <a href="">Preview</a></p>
                <p><strong>Status Ajuan:</strong> Belum di verifikasi</p>
            </div>
        </div>
    </div>
</div>
@endsection
