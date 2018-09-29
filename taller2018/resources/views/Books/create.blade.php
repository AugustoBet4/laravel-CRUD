@extends('layouts.layout')
@section('content')

<div class="card">
    <h2 class="card-header">
        Agregar Libro Nuevo
    </h2>
    <div class="card-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
				    <li>{{ $error }}</li>
			    @endforeach
			</ul>
        </div>
    @endif
    @if(Session::has('success'))
		<div class="alert alert-info">
			{{ Session::get('success') }}
		</div>
	@endif

    <form method="POST" action="{{ route('book.store') }}"  role="form">
		{{ csrf_field() }}
        <div class="form row">
		    <div class="form-group col-md-6">
                <label for="nombre">Nombre del libro</label>
                <input type="text" name="nombre" class="form-control input-sm" id="nombre" placeholder="Nombre">
            </div>

            <div class="form-group col-md-6">
                <label for="autor">Autor</label>
                <input type="text" name="autor" class="form-control input-sm" id="autor" placeholder="Autor">
            </div>
        </div>

        <div class="form-group">
            <label for="resumen">Resumen del Libro</label>
            <textarea name="resumen" class="form-control input-sm" id="resumen" placeholder="Resumen"></textarea>
        </div>

        <div class="form row">
            <div class="form-group col-md-6">
                <label for="precio">Precio del Libro</label>
                <input type="number" step=".01" name="precio" id="precio" class="form-control input-sm"
                placeholder="Precio"
                pattern="^\d+(?:\.\d{1,2})?$">
            </div>

            <div class="form-group col-md-6">
                <label for="edicion">Nro. Edicion</label>
                <input type="number" name="edicion" id="edicion" class="form-control input-sm" placeholder="Edicion">
            </div>
        </div>

        <div class="form-group">
            <input type="submit" value="Guardar" class="btn btn-success">
            <a href="{{ route('book.index') }}" class="btn btn-link" >Volver al listado</a>
        </div>
	</form>
</div>

@endsection