@extends('layouts.main')

@section('container')

@if(session()->has('success'))
<script>
    alert('{{ session("success") }}')

</script>
@endif

<div class="row justify-content-center">
    <div class="col-7">
        <div class="card my-5">
            <h4 class="card-header">Tambah Beasiswa</h4>
            <div class="card-body mt-4">
                <table class="table table-striped table-lg mb-5">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Beasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beasiswa as $beasisiwaItem)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}.</td>
                            <td class="text-capitalize">{{ $beasisiwaItem->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="/beasiswa" method="POST">
                    @csrf
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="name" class="col-4 col-form-label text-start">Nama Beasiswa</label>
                        <div class="col-7">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" required id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>            
                    </div>
                    <div class="text-center my-4">
                        <button type="submit" class="btn btn-primary mx-4 px-5 btn-md fw-medium"
                            id="daftarButton">Tambah</button>
                        <button type="reset" class="btn btn-primary mx-4 px-5 btn-md fw-medium">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
