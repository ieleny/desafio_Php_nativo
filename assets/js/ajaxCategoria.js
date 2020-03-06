
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

    //Delete
    function deleteId(id) {


    }

    //https://www.devmedia.com.br/crud-com-php-pdo/28873
    //https://blog.psantos.dev/crud-em-html-com-javascript-e-jquery/
    //https://www.google.com/search?q=multiple+html+php&rlz=1C1GCEU_pt-BRBR828BR828&oq=multiple+html+php+&aqs=chrome..69i57j0l7.13599j0j7&sourceid=chrome&ie=UTF-8
});

//Editar
function edit(id) {
    location.href = 'addCategory.html?id=' + id;
}

