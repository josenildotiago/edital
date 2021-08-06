$(document).ready(function() {
    var cont = 1;
    var contagem = cont;
    //https://api.jquery.com/click/
    $('#add-campo').click(function() {
        cont++;
        contagem++;
        //https://api.jquery.com/append/
        var inserido =
        '<div id="campo' + cont + '">' +
            '<h1 hidden>Condutor ' + contagem + '</h1>' +
            '<div class="input-group" id="btn-apagar">' +
                '<input type="text" required placeholder="A 000000-0000" name="auto[]" class="form-control" aria-describedby="' + cont + ' ">' +
                '<button class="btn btn-outline-danger btn-apagar" type="button" id="' + cont + ' ">Excluir</button>' +
            '</div>' +
        '</div>';
        $('#formulario').append(inserido);
        console.log(cont);
    });
    $('form').on('click', '.btn-apagar', function() {
        var button_id = $(this).attr("id");
        console.log('#campo ' + button_id + '');
        cont--;
        contagem--;
        $('#campo' + button_id + '').remove();
        console.log(cont);
    });
    $("form").on('click', '.btn-apagar', function() {
        console.log("Clicou");
    });
});
