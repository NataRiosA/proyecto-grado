<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AlturasIntegrados</title>
        {{-- bootstrap --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        {{-- dataTables --}}

        <!-- Buttons -->

    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Reporte</li>
    </ol>
    <div id="app" class="container-fluid reports">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Reporte
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="date">Fecha de firma:</label>
                        <input type="date" name="date" value="{{ $registro->date }}" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" value="{{ $registro->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-12 m-auto">
                        <label for="document" class="m-auto">Documento</label>
                        {{-- local --}}
                        <img src="/file/documents/{{ $registro->document }}" alt="" class="m-auto">
                        {{-- server --}}
                        <img src="/public/file/documents/{{ $registro->document }}" alt="" class="m-auto">

                        {{-- local --}}
                        <iframe src="/file/documents/{{ $registro->document }}" type="application/pdf" width="100%" height="600px" /></iframe>
                        {{-- server --}}
                        <iframe src="/public/file/documents/{{ $registro->document }}" type="application/pdf" width="100%" height="600px" /></iframe>
                    </div>
                    <div class="form-group col-md-12 m-auto">
                        <label for="document" class="m-auto">Foto</label>
                        {{-- local --}}
                        <img src="/file/images/{{ $registro->image }}" alt="" class="m-auto">
                        {{-- server --}}
                        <img src="/public/file/images/{{ $registro->image }}" alt="" class="m-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
