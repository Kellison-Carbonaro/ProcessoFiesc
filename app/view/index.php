<?php 
require "../controller/pessoa.php";
require_once "../lib/Util.php";
$util = new Util();
$listagemPessoas = new PessoasCtl();
$pessoas = $listagemPessoas->mostrarPessoas();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" media="screen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/cadastro.js"></script>

	
    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    </head>
    <body>
        <a href="#">Pessoa | </a><a href="conta.php">Conta | </a> <a href="movimentacao.php">Movimentação</a>

        <div class="row">
        <div class=" col-2"></div>
        <div class="col col-8">
            <h2 class="titulo-1">Bem vindo(a): </h2>
            <h3 class="titulo-1">Cadastrar de pessoas</h3>
        </div>
        <div class="col-2"></div>
        </div>
        <div class="row">
            <div class=" col-4"></div>
            <div class="col col-4 formulario-cadastro">
                <form method="POST" class="formulario">
                <label class="label-formulario">Nome:*</label>
                <input type="text" class="input-formulario" id="nome" require="">
                <label class="label-formulario">CPF:*</label>
                <input type="text" class="input-formulario" id="cpf" require=""><br>
                <label class="label-formulario">Endereço:*</label>
                <input type="text" class="input-formulario" id="endereco" require=""><br>
                <button class="btn-cadastrar btn-outline-success col-4" id="btn" >Cadastrar</button>
                <input type="hidden" id="id" value = "">
                </form>
            </div>
            <div class="col-4"></div>
        </div>        
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($pessoas as $pessoa){ ?>
                        <tr>
                        <td><?php echo utf8_encode($pessoa['nome']) ?></td>
                        <td><?php echo $util->includeMaskCpf($pessoa['cpf'])?></td>
                        <td><?php echo utf8_encode($pessoa['endereco']) ?></td>
                        <td><button id="editar" data-id="<?php echo $pessoa['id'] ?>" data-nome="<?php echo $pessoa['nome'] ?>" data-cpf="<?php echo $pessoa['cpf'] ?>" data-endereco="<?php echo $pessoa['endereco'] ?>" class="btn-info btn btn-warning">Editar</button></td>
                        <td><button id="excluir" data-id="<?php echo $pessoa['id'] ?>" class="btn-excluir btn btn-danger">Excluir</button></td>  
                    </tr>
                   <?php }
                ?>
             </tbody>
        </table>
    <!--  dataTables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/pessoa.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />
    <!--  dataTables.buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />
    <!--  dataTables.select -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css" />
    <!--  dataTables.responsive -->
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <!--  dataTables.buttons -->
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <!--  dataTables.select -->
    <script src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
    <!--  dataTables.responsive -->
    <script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    
    </body>
</html>