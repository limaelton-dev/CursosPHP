@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1>
    <hr>

    <div class="col-8 m-auto">
			@if(isset($errors) && count($errors) > 0)
				<div class="text-center mt-4 mb-4 p-2 alert alert-danger">
					@foreach($errors->all() as $erro)<br>
						{{ $erro }}
					@endforeach
				</div>
			@endif

			<form id="formCad" name="formCad" method="post" action="{{ url('books') }}">
				@csrf
				<input class="form-control" type="text" name="title" id="title" placeholder="Título" >
				<select class="form-control" name="id_user" id="id_user" >
					<option value="">Autor</option>
					@foreach($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
				<input class="form-control" type="text" name="pages" id="pages" placeholder="Páginas" >
				<input class="form-control" type="text" name="price" id="price" placeholder="Preço" >
				<input class="btn btn-primary" type="submit" value="Cadastrar">
			</form>
		</div>
    
@endsection