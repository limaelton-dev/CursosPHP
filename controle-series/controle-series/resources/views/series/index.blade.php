<x-layout title="Séries">
    <!-- Fazendo um teste de commit -->
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso}}
    </div>
    @endisset
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->nome }}
            <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">
                    X
                </button>
            </form>
            <form action="{{ route('series.update', $serie->id) }}" method="update">
                @csrf
                <button class="btn btn-sm btn-primary">
                    Editar
                </button>
            </form>
            

        </li>
        @endforeach
        
    </ul>

    <div class="d-flex justify-content-between align-items-center mt-2">
        <!-- Espaço vazio para alinhar o botão à direita -->
        <div></div>
        <a class="btn btn-dark" href="{{ route('series.create') }}">Adicionar</a>
    </div>
</body>
</html>
</x-layout>