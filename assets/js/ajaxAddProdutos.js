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
                    window.location.href = 'products.html';
                } else {
                    alert('Erro, ao salvar');
                }
            }
        });

        return false;
    });

    buscar();

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

function buscar() {

    var url_string = window.location.href;
    var url = new URL(url_string);
    var id = url.searchParams.get("id");

    //Setar o valor no id
    $("#id").val(id);

    $.ajax({
        type: "POST",
        url: "../../util/redirect.php",
        data: { "id": id, "acao": "buscar", "nome": "Produtos" },
        success: function (data) {
            
            var dados = JSON.parse(data);

            $("#sku").val(dados[0].sku_produtos);
            $("#name").val(dados[0].nome_produtos);
            $("#price").val(dados[0].preco_produtos);
            $("#description").val(dados[0].descricao_produtos);
            $("#quantity").val(dados[0].quantidade_produtos);
            

            var categoria = [];
            dados.forEach(Element => {
                categoria.push(Element.categoria_id_categoria);
            });

            $("#category").val(categoria).trigger('change');
            
        }
    });

}
