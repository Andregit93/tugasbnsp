<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class BeasiswaController extends Controller
{
    public function hasil(Request $request)
    {
        if ($request->hasFile('berkas')) {
            $berkas = $request->file('berkas');
            $path = $berkas->store('uploads');
        } else {
            $berkas = null;
            $path = null;
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'semester' => $request->input('semester'),
            'ipk' => $request->input('ipk'),
            'beasiswa' => $request->input('beasiswa'),
            'berkas' => $path,
        ];

        // Kirim data ke halaman hasil
        return view('hasil', ['data' => $data]);
    }

    public function tambahBeasiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:beasiswas,name',
        ]);

        if ($validator->fails()) {
            return redirect('/beasiswa')
                ->withErrors($validator)
                ->withInput();
        }

        // Menggabungkan input dengan kata "Beasiswa"
        $nameWithPrefix = "Beasiswa " . $request->input('name');

        // Memeriksa apakah ada beasiswa dengan nama yang sama sebelumnya
        $existingBeasiswa = Beasiswa::where('name', $nameWithPrefix)->first();

        if ($existingBeasiswa) {
            return redirect('/beasiswa')
                ->withErrors(['name' => 'Beasiswa dengan nama yang sama sudah ada'])
                ->withInput();
        }

        Beasiswa::create([
            'name' => $nameWithPrefix,
            // Tambahkan variabel beasiswa lainnya sesuai kolom yang ada pada tabel 'beasiswas'
            // Contoh: 'field_name' => $request->input('field_name'),
        ]);

        return redirect('/beasiswa')->with('success', 'Beasiswa berhasil ditambahkan!');
    }
}
