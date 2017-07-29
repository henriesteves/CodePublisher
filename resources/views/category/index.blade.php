@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Nova Categoria</a>
        </div>
        
        <div class="row">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $categories->links() }}

        </div>
    </div>
@endsection