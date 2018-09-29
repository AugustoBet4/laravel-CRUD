@extends('layouts.layout')
@section('content')
<div class="card">
    <h2 class="card-header">
        Editar Libro
    </h2>
    <div class="card-body">
        @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
		@endif

        <form method="POST" action="{{ route('book.update',$books->id) }}"  role="form">
			{{ csrf_field() }}
			<input name="_method" type="hidden" value="PATCH">

            <div class="form row">
		        <div class="form-group col-md-6">
                    <label for="nombre">Nombre del libro</label>
                    <input type="text" name="nombre" class="form-control input-sm" id="nombre" placeholder="Nombre" value="{{$books->nombre}}">
                </div>

                <div class="form-group col-md-6">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-control input-sm" id="autor" placeholder="Autor" value="{{ $books->autor }}">
                </div>
            </div>

            <div class="form-group">
                <label for="resumen">Resumen del Libro</label>
                <textarea name="resumen" class="form-control input-sm" id="resumen" placeholder="Resumen">{{ $books->resumen }}</textarea>
            </div>

            <div class="form row">
                <div class="form-group col-md-6">
                    <label for="precio">Precio del Libro</label>
                    <input type="number" step=".01" name="precio" id="precio" class="form-control input-sm"
                    placeholder="Precio"
                    pattern="^\d+(?:\.\d{1,2})?$"
                    value="{{ $books->precio }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="edicion">Nro. Edicion</label>
                    <input type="number" name="edicion" id="edicion" class="form-control input-sm" placeholder="Edicion" value="{{ $books->edicion }}">
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Actualizar" class="btn btn-success">
                <a href="{{ route('book.index') }}" class="btn btn-link" >Volver al listado</a>
            </div>
		</form>
    </div>
</div>

@endsection