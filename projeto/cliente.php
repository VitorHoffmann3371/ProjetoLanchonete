<?php session_start(); ?>
<?php if ( isset($_SESSION["nome_usuario"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-primary text-white">
    <div class="container">
        <form action="cadastrar_cliente.php" method="POST">
        <h2>Cliente</h2><br>
            <div class="form-group">
                <label for="nome_produto"> Nome do Cliente: </label>
                <input type="text" required class="form-control" id="nome" name="nome" placeholder="Digite o produto">                
            </div>
            <div class="form-group">
                <label for="categoria_produto"> Endereço: </label>
                <input type="text" required class="form-control" id="endereco" name="endereco">                
            </div>
            <div class="form-group">
                <label for="valor_produto"> Número: </label>
                <input type="number" required class="form-control" id="numero" name="numero">                
            </div>            
            <button type="submit" class="btn btn-success">Cadastrar Cliente</button>  
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="pedido.php" type="submit" class="btn btn-dark">Tela de Pedidos</a>  
            <?php if(isset($resultado)): ?>
                <?php if($resultado["cod"] == 1): ?>
                <div class="alert alert-sucess">
                    <?php echo $resultado["msg"]; ?>
                </div>    
                <?php endif; ?> 
                <?php if($resultado["cod"] == 0): ?>
                <div class="alert alert-danger">
                    <?php echo $resultado["msg"]; ?>
                </div> 
                <?php endif; ?> 
            <?php endif; ?>      
        </form>
        <br><br><br>
        <div class="p-3 mb-2 bg-dark text-white"> 
            <h4>Clientes Cadastrados</h4>
            <br><br>

            <?php include("selecionar_cliente.php"); ?>               
            <table class="table">
                <tr>
                    <th>Codigo</th>                
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Número</th>                
                    <th scope="col" colspan="1">Funções</th>
                </tr>
                <?php foreach($produtos as $p): ?>
                <tr>
                    <td><?= $p["codigo"]; ?></td>                
                    <td><?= $p["nome"]; ?></td>
                    <td><?= $p["endereco"]; ?></td>
                    <td><?= $p["numero"]; ?></td>                
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="form_alterar_cliente.php?cod_cliente=<?=$p['codigo']?>">Alterar</a>
                        <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Remover <?= $p['nome']; ?>');" href="remover_cliente.php?cod_cliente=<?=$p['codigo']?>">Remover</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </div>    
        </table>
    </div>    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>

<?php else: ?>
    <div class="alert alert-danger">
        Você precisa fazer o login
    </div> 
<?php endif; ?>