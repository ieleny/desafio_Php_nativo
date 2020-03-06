
$(document).ready(function () {

    //Inserir
    $('form').submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "../../util/redirect.php",
            data: dados,
            success: function (data) {
                if (data == 1) {
                    alert('Salvo com Sucesso');
                } else {
                    alert('Erro, ao salvar');
                }
            }
        });

        return false;
    });

    buscar();
});



function buscar() {

    var url_string = window.location.href;
    var url = new URL(url_string);
    var id = url.searchParams.get("id");

    //Setar o valor no id
    $("id").val(id);

    $.ajax({
        type: "POST",
        url: "../../util/redirect.php",
        data: { "id": id, "acao": "buscar", "nome": "Categoria" },
        success: function (data) {

            var dados = JSON.parse(data);

            $("#category-name").val(dados.nome_categoria);
            $("#category-code").val(dados.codigo_categoria);
        }
    });

}

// https://tableless.com.br/psr-padrao-para-codigo-php/