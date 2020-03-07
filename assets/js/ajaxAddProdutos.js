$(document).ready(function () {

    //Listar
    listarCategoria();

    //Inserir
    $('form').submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../../util/redirect.php",
            data: dados,
            success: function (data) {
                console.log(data);
                if (data == 1) {
                    alert('Salvo com Sucesso');
                    window.location.href = 'categories.html';
                } else {
                    alert('Erro, ao salvar');
                }
            }
        });

        return false;
    });

});



function listarCategoria() {

    $.ajax({
        type: "POST",
        url: "../../util/redirect.php",
        data: { nome: 'Categoria', acao: "listarMultiplo" },
        success: function (data) {
            $('#category').empty("");
            $('#category').append(data);
        }
    });

}
