@extends('layouts.layout')
@section('content')
<div class="card">
    <h2 class="card-header">
        Lista de Libros
        <div class="btn btn-link">
            <a href="{{ route('book.create') }}" class="btn btn-info" >Añadir Libro</a>
        </div>
    </h2>
    <div class="card-body">
        <div class="table-container">
            <table id="mytable" class="table">
                <thead class="thead-black">
                    <th>Nombre</th>
                    <th>Resumen</th>
                    <th>Autor</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
            
                <tbody>
                @if($books->count())  
                @foreach($books as $libro)  
                    <tr>
                        <td>{{$libro->nombre}}</td>
                        <td>{{$libro->resumen}}</td>
                        <td>{{$libro->autor}}</td>
                        <td>{{$libro->precio}}</td>
                        <td><a class="btn btn-warning" href="{{action('BookController@edit', $libro->id)}}" ><i class="far fa-edit"></i></a></td>
                        <td>
                        <form action="{{action('BookController@destroy', $libro->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-eraser"></i></button>
                        </td>
                    </tr>
                @endforeach 
                @else
                    <tr>
                        <td colspan="12" class="text-center">No hay libros registrados</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
      {{ $books->links() }}
    </div>
</div>
@endsection