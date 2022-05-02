<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    {{-- dataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/r-2.2.9/datatables.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/r-2.2.9/datatables.min.js"></script>

    <!-- Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
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
                {{-- @role('Coordinador') --}}
                <a href="/registros/create" class="btn btn-xs btn-primary">Generar nuevo reporte</a>
                {{-- @endrole --}}
                {{-- @role('Administrador') --}}
				<div class="table-responsive mt-4">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
							<tr>
								<th>Id registro</th>
								<th>Fecha de firma</th>
								<th>Nombre</th>
								<th>Documento</th>
                                <th>Imagen</th>
                                <th>Actions</th>
							</tr>
						</thead>
                            <tbody>
                                @foreach ($registros as $registro)
                                <tr>
                                    <td>{{ $registro->id }}</td>
                                    <td>{{ $registro->date }}</td>
                                    <td>{{ $registro->name }}</td>
                                    <td>{{ $registro->document }}</td>
                                    <td>{{ $registro->image }}</td>
                                    <td>
                                        <a href="{{ route('registro.show', $registro) }}"
                                            class="btn btn-xs btn-primary"
                                            target="_blank">
                                            Ver
                                        </a>
                                        {{-- <a href=""
                                            class="btn btn-xs btn-info">
                                            Editar
                                        </a> --}}
                                        <form method="POST"
                                            action="{{ route('registro.destroy', $registro) }}"
                                            style="display: inline">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('¿Seguro que quieres eliminar este registro?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
					</table>
				</div>
                {{-- @endrole --}}
			</div>
		</div>
    </div>
</x-app-layout>
