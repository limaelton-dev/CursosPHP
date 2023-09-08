
    <form action="{{ $action }}" method="post">
        @csrf

        @if($update)
        @method('PUT')
        @endif
        <div class="mb-3">
            <label  class="form-label" for="nome">Nome:</label>
            <input  type="text" 
                    id="nome" 
                    name="nome" 
                    class="form-control" 
                    @isset($nome)value=" {{ $nome }}"@endisset>
        </div>
        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
