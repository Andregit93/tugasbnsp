@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-7">
        <div class="card my-5">
            <h4 class="card-header">Daftar Beasiswa</h4>
            <div class="card-body mt-4">
                <form action="/hasil" method="POST">
                    @csrf
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="name" class="col-4 col-form-label text-start">Masukkan Nama</label>
                        <div class="col-7">
                            <input name="name" type="text" class="form-control" required id="name" autocomplete="on">
                        </div>
                    </div>
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="staticEmail" class="col-4 col-form-label text-start">Masukkan Email</label>
                        <div class="col-7">
                            <input name="email" type="email" class="form-control" required id="staticEmail">
                        </div>
                    </div>
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="phonenumber" class="col-4 col-form-label text-start">Nomor HP</label>
                        <div class="col-7">
                            <input name="phoneNumber" type="number" class="form-control" required id="phonenumber" min="12">
                        </div>
                    </div>
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="semester" class="col-4 col-form-label text-start">Semester Saat ini</label>
                        <div class="col-7">
                            <select class="form-select" id="semester" name="semester" required>
                                <option value="">Pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="lastGPA" class="col-4 col-form-label text-start">IPK Terakhir</label>
                        <div class="col-7">
                            <input name="ipk" type="text" class="form-control" required id="ipk" value="{{ $ipk }}"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="beasiswa" class="col-4 col-form-label text-start">Pilihan Beasiswa</label>
                        <div class="col-7">
                            <select class="form-select" id="beasiswa" name="beasiswa" required>
                                <option value="">Pilih</option>
                                @foreach($beasiswa as $beasiswaItem)
                                <option value="{{ $beasiswaItem->name }}">{{ $beasiswaItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row px-1 justify-content-center">
                        <label for="berkas" class="col-4 col-form-label text-start">Uploud Berkas Syarat</label>
                        <div class="col-7">
                            <input name="berkas" type="file" class="form-control" required id="berkas">
                        </div>
                    </div>
                    <div class="text-center my-4">
                        <button type="submit" class="btn btn-primary mx-4 px-5 btn-md fw-medium"
                            id="daftarButton">Daftar</button>
                        <button type="reset" class="btn btn-primary mx-4 px-5 btn-md fw-medium">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ipkInput = document.getElementById("ipk");
        const beasiswaSelect = document.getElementById("beasiswa");
        const berkasInput = document.getElementById("berkas");
        const daftarButton = document.getElementById("daftarButton");

        function disableElements() {
            beasiswaSelect.disabled = true;
            berkasInput.disabled = true;
            daftarButton.disabled = true;
        }

        function enableElements() {
            beasiswaSelect.disabled = false;
            berkasInput.disabled = false;
            daftarButton.disabled = false;
        }

        function checkIPK() {
            const ipkValue = parseFloat(ipkInput.value.replace(",", "."));
            if (ipkValue < 3) {
                disableElements();
            } else {
                enableElements();
            }
        }

        checkIPK();

        ipkInput.addEventListener("change", checkIPK);
    });

</script>

@endsection
