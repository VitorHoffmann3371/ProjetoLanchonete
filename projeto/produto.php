<?php session_start(); ?>
<?php if ( isset($_SESSION["nome_usuario"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-primary text-white">
    <div class="container">
        <form action="cadastrar_produto.php" method="POST">
        <h2>Produto</h2><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;
        <a href="cliente.php" type="submit" class="btn btn-dark">Clientes</a>
            <div class="form-group">
                <label for="nome_produto"> Nome do produto: </label>
                <input type="text" required class="form-control" id="nome_produto" name="nome_produto" placeholder="Digite o produto">                
            </div>
            <div class="form-group">
                <label for="categoria_produto"> Categoria: </label>
                <input type="text" required class="form-control" id="categoria_produto" name="categoria_produto">                
            </div>
            <div class="form-group">
                <label for="valor_produto"> Valor unitário: </label>
                <input type="number" step=".01" required class="form-control" id="valor_produto" name="valor_produto">                
            </div>
            <div class="form-group">
                <label for="foto_produto"> Foto: </label>
                <input type="file" class="form-control" id="foto_produto" name="foto_produto">                
            </div>
            <div class="form-group">
                <label for="info_produto"> Informações Adicionais: </label>
                <textarea class="form-control" id="info_produto" name="info_produto" rows="4" cols="50"></textarea>               
            </div>
            <button type="submit" class="btn btn-success">Adicionar Produto</button>  
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="pedido.php" type="submit" class="btn btn-dark">Fazer Pedido</a>  
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
            <h4>Produtos Cadastrados</h4>
            <br><br>

            <?php include("selecionar_produto.php"); ?>               
            <table class="table">
                <tr>
                    <th>Codigo</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Valor</th>
                    <th>Info Adicional</th>
                    <th>Data/Hora</th>
                    <th scope="col" colspan="1">Funções</th>
                </tr>
                <?php foreach($produtos as $p): ?>
                <tr>
                    <td class="align-middle"><?= $p["codigo"]; ?></td>
                    <td class="align-middle"><img src='foto/<?php echo $p["foto"]?>'></td>
                    <td class="align-middle"><?= $p["nome"]; ?></td>
                    <td class="align-middle"><?= $p["categoria"]; ?></td>
                    <td class="align-middle"><?php echo "R$ {$p["valor"]}"; ?></td>
                    <td class="align-middle"><?= $p["info_adicional"]; ?></td>
                    <td class="align-middle"><?= $p["data_hora"]; ?></td>
                    <td class="align-middle">
                        <a class="btn btn-outline-warning btn-sm" href="form_alterar_produto.php?cod_prod=<?=$p['codigo']?>">Alterar</a>
                        <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Remover <?= $p['nome']; ?>');" href="remover_produto.php?cod_prod=<?=$p['codigo']?>">Remover</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
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