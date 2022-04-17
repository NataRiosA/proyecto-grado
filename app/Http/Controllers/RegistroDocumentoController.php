<?php

namespace App\Http\Controllers;

use App\Models\RegistroDocumento;
use Illuminate\Http\Request;

class RegistroDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroDocumento  $registroDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroDocumento $registroDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroDocumento  $registroDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroDocumento $registroDocumento)
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
    public function destroy(RegistroDocumento $registroDocumento)
    {
        //
    }
}
