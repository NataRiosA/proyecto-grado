<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RegistroDocumento;
use Illuminate\Support\Facades\File;

class RegistroDocumentoController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function generatePDF()
    // {
    //     $users = User::get();

    //     $data = [
    //         'title' => 'Welcome to ItSolutionStuff.com',
    //         'date' => date('m/d/Y'),
    //         'users' => $users
    //     ];

    //     $pdf = PDF::loadView('myPDF', $data);

    //     return $pdf->download('itsolutionstuff.pdf');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = RegistroDocumento::all();

        return view('dashboard', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registro = new RegistroDocumento();

        return view('create', compact('registro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new RegistroDocumento();

        $registro->date = Carbon::today()->format('Y-m-d');
        $registro->name = $request->name;

        if ($request->document)
            $random = rand(0, 999);
            $name = $random . $request->name . ($request->document)->getClientOriginalName();
            $request->document->move(public_path('file/documents'), $name);
            $registro->document = $name;
        if ($request->image)
            $random = rand(0, 999);
            $name = $random . $request->name . ($request->image)->getClientOriginalName();
            $request->image->move(public_path('file/images'), $name);
            $registro->image = $name;

        $registro->save();

        return redirect()->route('registro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroDocumento  $registroDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroDocumento $registro)
    {
        // dd($registro);
        return view('show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroDocumento  $registroDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroDocumento $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroDocumento  $registroDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroDocumento $registroDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroDocumento  $registroDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroDocumento $registro)
    {
        if (isset($registro->document) || $registro->document != '')
            File::delete(public_path('/file/documents/' . $registro->document));
        if (isset($registro->image) || $registro->image != '')
            File::delete(public_path('/file/images/' . $registro->image));

        $registro->delete();

        return redirect()->route('registro.index')->with('flash', 'Registro Eliminado!');
    }
}
