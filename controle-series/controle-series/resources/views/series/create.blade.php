<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label  class="form-label" for="nome">Nome:</label>
                <input  type="text"
                        autofocus 
                        id="nome" 
                        name="nome" 
                        class="form-control" 
                        value=" {{ old('nome') }}">
            </div>
            <div class="col-2">
                <label  class="form-label" for="seasonsQty">Nº Temporadas:</label>
                <input  type="text" 
                        id="seasonsQty" 
                        name="seasonsQty" 
                        class="form-control" 
                        value=" {{ old('seasonsQty') }}">
            </div>
            <div class="col-2">
                <label  class="form-label" for="episodesPerSeason">Eps / Temporada:</label>
                <input  type="text" 
                        id="episodesPerSeason" 
                        name="episodesPerSeason" 
                        class="form-control" 
                        value=" {{ old('episodesPerSeason') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>