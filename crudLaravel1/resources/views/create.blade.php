@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($book))Editar @else Cadastrar @endif</h1>
    <hr>

    <div class="col-8 m-auto">
			@if(isset($errors) && count($errors) > 0)
				<div class="text-center mt-4 mb-4 p-2 alert alert-danger">
					@foreach($errors->all() as $erro)<br>
						{{ $erro }}
					@endforeach
				</div>
			@endif

			@if(isset($book))
				<form id="formEdit" name="formEdit" method="post" action="{{ url("books/$book->id") }}">
					@method('PUT')
			@else
				<form id="formCad" name="formCad" method="post" action="{{ url('books') }}">
			@endif

				@csrf
				<input class="form-control" type="text" name="title" id="title" placeholder="Título" value="{{ $book->title ??  ''}}">
				<select class="form-control" name="id_user" id="id_user" >
					<option value="{{ $book->relUsers->id ?? ''}}">{{ $book->relUsers->name ?? 'Autor'}}</option>
					@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
				<input class="form-control" type="text" name="pages" id="pages" placeholder="Páginas" value="{{ $book->pages ??  ''}}"">
				<input class="form-control" type="text" name="price" id="price" placeholder="Preço" value="{{ $book->price ??  ''}}"">
				<input class="btn btn-primary" type="submit" value="@if(isset($book))Editar @else Cadastrar @endif">
			</form>
		</div>
    
@endsection