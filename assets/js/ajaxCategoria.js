$(document).ready(function () {

    //Listar 
    $.ajax({
        type: "POST",
        url: "../../util/redirect.php",
        data: { nome: 'Categoria', acao: "listar" },
        success: function (data) {

            $('#tdbodyId').empty("");
            $('#tdbodyId').append(data);
        }
    });

});

//Editar
function edit(id) {
    location.href = 'addCategory.html?id=' + id;
}


//Delete
function deleteId(id) {

    var x = 0;
    var r=confirm("Deseja Deletar essa categoria?");
    if (r==true)
    {
        $.ajax({
            type: "POST",
            url: "../../util/redirect.php",
            data: { nome: 'Categoria', acao: "delete" , id: id},
            success: function (data) {
                if (data == 1) {
                    alert('Salvo com Sucesso');
                    window.location.href = 'categories.html';
                } else {
                    alert('Erro, ao salvar');
                }
            }
        });
    }
    
    document.getElementById("demo").innerHTML=x;


}




