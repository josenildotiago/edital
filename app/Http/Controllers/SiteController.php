<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edital;
use App\Models\Estado;
use PDF;

class SiteController extends Controller
{
    public function index()
    {
        $editais = Edital::all();
        return view('welcome', ['editais' => $editais]);
    }
    public function pdf()
    {
        $pdf = PDF::loadView('gerarPdf2');
        return $pdf->setPaper('a4')->stream('gerado.pdf');
        // return view('gerarPdf');
    }

    public function formulario(Request $request)
    {
        // dd($request);
        // $data = $request->session()->all();
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $estados = Estado::all();
        return view('formulario', [
            'estados' => $estados,
        ]);
    }
    public function feito()
    {
        return view('feito');
    }
}