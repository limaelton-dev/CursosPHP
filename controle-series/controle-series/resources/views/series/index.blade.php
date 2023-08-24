<x-layout title="Séries">
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
        
    </ul>

    <div class="d-flex justify-content-between align-items-center mt-2">
        <!-- Espaço vazio para alinhar o botão à direita -->
        <div></div>
        <a class="btn btn-dark" href="/series/criar">Adicionar</a>
    </div>
</body>
</html>
</x-layout>