$(document).ready(function () {
    $("#nome").change(function() {
        if ($("#nome").val() != "") {
            $("#nome").addClass("success-input")
        }
     });
    $("#cpf").change(function() {
        if ($("#cpf").val() != "") {
            $("#cpf").addClass("success-input")
        }
      });
    $("#endereco").change(function() {
        if ($("#endereco").val() != "") {
            $("#endereco").addClass("success-input")
        }
      });
$('#cpf').mask('000.000.000-00', {reverse: true});
$("body").on("click", ".btn-cadastrar", function (e) {
        e.preventDefault();
        let nome = $("#nome").val();
        let cpf = $("#cpf").val();
        let endereco = $("#endereco").val();
        let acao = "cadastrar";
        let validFields = validarCampos()
        if(validFields){
            $.ajax({
                method: 'POST',
                url: "../controller/pessoa.php",
                ContentType: "json",
                data: { acao: acao,
                    nome: nome,
                    cpf: cpf,
                    endereco: endereco,
            },
            }).done(function (result) {
                $("#nome").val("");
                $("#cpf").val("");
                $("#endereco").val("");
            });
        }
    });

    $("body").on("click", ".btn-info", function (e) {
        var nome = $(this).data('nome');
        var cpf = $(this).data('cpf');
        var endereco = $(this).data('endereco');
        var id = $(this).data('id');
        
        $("#nome").val(nome);
        $("#cpf").val(cpf);
        $("#endereco").val(endereco);
        $("#id").val(id);
        $("#btn").addClass("btn-editar");
        $("#btn").removeClass("btn-cadastrar");
        $('#btn').text("editar");   
    });

    $("body").on("click", ".btn-excluir", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        let acao = "excluir";
            $.ajax({
                method: 'POST',
                url: "../controller/pessoa.php",
                ContentType: "json",
                data: { acao: acao,
                    id: id,
            },
            }).done(function () {
                location.reload();
            });
    });


    $('#myTable').DataTable();
});

$("body").on("click", ".btn-editar", function (e) {
    e.preventDefault();
    let nome = $("#nome").val();
    let cpf = $("#cpf").val();
    let endereco = $("#endereco").val();
    let id = $("#id").val();
    let acao = "editar";
    let validFields = validarCampos()
    if(validFields){
        $.ajax({
            method: 'POST',
            url: "../controller/pessoa.php",
            ContentType: "json",
            data: { acao: acao,
                nome: nome,
                cpf: cpf,
                endereco: endereco,
                id: id,
        },
        }).done(function (result) {
            location.reload();
        });
    }
});

function validarCampos(){
    if ($("#nome").val() == "") {
        $("#nome").addClass("erro-input")
    }
    if ($("#cpf").val() == "") {
        $("#cpf").addClass("erro-input")
    }
    if ($("#endereco").val() == "") {
        $("#endereco").addClass("erro-input")
    }
    if($("#name").val() == "" || $("#email").val() == "" || $("#subject").val() == ""){
        return false;
    }
    return true
}