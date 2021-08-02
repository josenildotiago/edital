@if (session('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Edital salvo com sucesso!</h4>
        <p>Editais salvos se encontram na tabela do menu Editais.</p>
        <hr>
        <p class="mb-0">Para mais detalhes.</p>

    </div>
@endif
@if (session('success_user'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Usuário criado com sucesso!</h4>

    </div>
@endif
@if (session('success_user_update_senha'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Senha alterada com sucesso!</h4>

    </div>
@endif
@if (session('error_senha_naoConfere'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Senha antiga não confere!</h4>

    </div>
@endif
@if (session('success_prod_excluido'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Produto excluído com sucesso!</h4>
        <p>Produtos salvos se encontram na tabela logo abaixo.</p>
        <hr>
        <p class="mb-0">Para mais detalhes.</p>

    </div>
@endif
@if (session('success_prod_edit'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Produto editado com sucesso!</h4>
        <p>Produtos salvos se encontram na tabela logo abaixo.</p>
        <hr>
        <p class="mb-0">Para mais detalhes.</p>

    </div>
@endif
@if (session('success_prod_edit_error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Erro ao editar!</h4>
        <p>Produtos salvos se encontram na tabela logo abaixo.</p>
        <hr>
        <p class="mb-0">Para mais detalhes.</p>

    </div>
@endif
@if (session('editItem'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
        <h4 class="alert-heading">Itens editado com sucesso!</h4>

    </div>
@endif
