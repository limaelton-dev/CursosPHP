@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1>
    <hr>

    <div class="col-8 m-auto">
			<form id="formCad" name="formCad" method="post" action="{{url('books')}}">
				@csrf
				<input class="form-control" type="text" name="title" id="title" placeholder="Título">
				<input class="form-control" type="text" name="pages" id="pages" placeholder="Páginas">
				<input class="form-control" type="text" name="price" id="price" placeholder="Preço">
				<input class="btn btn-primary" type="submit" value="Cadastrar">
			</form>
		</div>
    
@endsection