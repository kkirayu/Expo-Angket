<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Jawaban;
use App\Models\Role;
use App\Models\Soal;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function angketForm($acaraId)
    {
        // Dapatkan soal yang terkait dengan acara_id
        $soal = Soal::where('acara_id', $acaraId)->get();

        // Dapatkan informasi acara
        $acara = Acara::findOrFail($acaraId);
        $roles = Role::where('acara_id', $acaraId)->where('status',1)->get();

        // $soal = Soal::where('acara_id', $acara->id)->where('role', $userRole)->get();

        return view('angketForm', compact('soal', 'acara', 'roles'));
    }

    public function jawabanAcara($slug)
    {
        $getAcaraId = Acara::where('slug', $slug)->first();
        $jawabans = Jawaban::where('acara_id', $getAcaraId->id)->orderBy('role_id', 'asc')->get();
        $judul = $getAcaraId->nama_acara;
        return view('Admin.jawaban.jawaban-index', compact('getAcaraId', 'jawabans', 'judul'));
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function angketStore(Request $request)
    {
        // Uncomment this line for debugging
        // dd($request->all());

        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'instansi' => 'required|string',
            'jawaban.*' => 'required|integer',
        ]);


        $jawabanData = $request->input('jawaban');


        // Harusnya di bikinkan di frontend
        // if ($hasil <= 25) {
        //     $ket = 'Sangat Kurang Baik';
        // } elseif ($hasil > 25 && $hasil <= 50){
        //     $ket = 'Kurang Baik';
        // } elseif ($hasil > 50 && $hasil <= 75){
        //     $ket = 'Baik';
        // } elseif ($hasil > 75){
        //     $ket = 'Sangat Baik';
        // }
        // Sampai sini



        // dd('skor: '.round($hasil), 'ket: '.$ket);

        // Check if $jawabanData is not null before iterating
        if ($jawabanData !== null) {
            // $totalNilai = array_sum($jawabanData);

            $jumlahPilihan = array_count_values($jawabanData);
            $jumlahSoal = array_sum($jumlahPilihan);

            $pengali = 100 / ($jumlahSoal * 4);

            $hasil = array_sum($jawabanData) * $pengali;


            Jawaban::create([
                'jawaban' => $hasil,
                'acara_id' => $request->input('acaraId'),
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'role_id' => $request->input('instansi'),
            ]);

            return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
        }

        return redirect()->back()->with('error', 'Tidak ada jawaban yang disubmit.');
    }



    public function pertanyaanByRole(Request $request, $id)
    {

        $questions = Soal::whereJsonContains('role_id', $id)->where('status',1)->get();
        // return response()->json($questions);
        return response()->json([
            'data' => $questions,
            'message' => 'Show Pengunjung',
            'success' => true
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(jawaban $jawaban)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jawaban $jawaban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jawaban $jawaban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jawaban $jawaban)
    {
        //
    }
}
