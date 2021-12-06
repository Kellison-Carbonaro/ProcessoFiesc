$(document).ready(function () {
    $("#pessoa").change(function() {
        if ($("#pessoa").val() != "") {
            $("#pessoa").addClass("success-input")
        }
     });
    $("#conta").change(function() {
        if ($("#conta").val() != "") {
            $("#conta").addClass("success-input")
        }
      });
    $('#conta').keyup(validateMaxLength);
    $(".btn-cadastrar").click(function (e) {
        e.preventDefault();
        let pessoa = $("#pessoa  option:selected").val();
        let conta = $("#conta").val();
        let acao = "cadastrar";
        let validFields = validarCampos()
        if(validFields){
            $.ajax({
                method: 'POST',
                url: "../controller/conta.php",
                ContentType: "json",
                data: { acao: acao,
                    pessoa: pessoa,
                    conta: conta,
            },
            }).done(function (result) {
                console.log(result);
            });
        }
    });
    $('#myTable').DataTable();
});

function validateMaxLength()
{
        var text = $(this).val();
        var maxlength = $(this).data('maxlength');

        if(maxlength > 0)  
        {
                $(this).val(text.substr(0, maxlength)); 
        }
}

function validarCampos(){
    if ($("#pessoa").val() == "") {
        $("#pessoa").addClass("erro-input")
    }
    if ($("#conta").val() == "") {
        $("#conta").addClass("erro-input")
    }
    if($("#pessoa").val() == "" || $("#conta").val() == ""){
        return false;
    }
    return true
}