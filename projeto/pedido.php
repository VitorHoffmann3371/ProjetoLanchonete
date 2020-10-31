<?php session_start(); ?>
<?php if ( isset($_SESSION["nome_usuario"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">   
    
</head>
<body class="p-3 mb-2 bg-primary text-white">
    <div class="container">
        <form action="cadastrar_pedido.php" method="POST">
        <?php 
            $sql = "SELECT nome FROM produto WHERE situacao='HABILITADO'";
            $sql2 = "SELECT codigo FROM cliente WHERE situacao='HABILITADO'";
            try
            {
                include("conexao.php");
                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $results=$stmt->fetchAll();

                $stmt2=$conn->prepare($sql2);
                $stmt2->execute();
                $results2=$stmt2->fetchAll();
            }
            catch(Exception $ex)
            {
                echo($ex -> getMessage());
            }
        ?>
        <center><h6>Olá, <?= $_SESSION["nome_usuario"]; ?>!</center><br><br>
        <h2>Escolha de itens do pedido</h2><br>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;
        <a href="cliente.php" type="submit" class="btn btn-dark">Clientes</a>
            <div class="form-group">
                <label for="nome_produto"> Nome do produto: </label>
                <select name="nome_produto" class="custom-select">  
                <option disabled selected>Selecione um produto</option>                     
                    <?php foreach ($results as $output) {?>
                    <option> <?php echo $output["nome"];?></option>
                    <?php } ?>
                </select>                
            </div>
            <div class="form-group">
                <label for="qtd_produto"> Quantidade: </label>
                <input type="number" required class="form-control" id="qtd_produto" name="qtd_produto">                
            </div>
            <div class="form-group">
                <label for="obs_produto"> Observação: </label>
                <input type="text" class="form-control" id="obs_produto" name="obs_produto">                
            </div>
            <div class="form-group">
                <label for="preco_produto"> Preço unitário: </label>
                <input type="number" step=".01" readonly required class="form-control" id="preco_produto" name="preco_produto">                
            </div>
            <div class="form-group">
                <label for="cod_cliente"> Cliente: </label>
                <select name="cod_cliente" class="custom-select">                       
                    <?php foreach ($results2 as $output) {?>
                    <option> <?php echo $output["codigo"];?></option>
                    <?php } ?>
                </select>                
            </div>
            <button type="submit" name="submit" class="btn btn-success">Finalizar Pedido</button>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="produto.php" type="submit" class="btn btn-dark">Produtos</a>  
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
        <br><br><br><br><br><br><br><br><br>
        <div class="p-3 mb-2 bg-dark text-white""> 
            <h4>Pedidos Feitos</h4>
            <br><br>

            <?php include("selecionar_pedido.php"); ?>               
            <table class="table">
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Observação</th>
                    <th>Cod_Usuario</th>
                    <th>Cod_Cliente</th>
                    <th>Data/Hora</th>
                    <th scope="col" colspan="1">Funções</th>
                </tr>
                <?php foreach($produtos as $p): ?>
                <tr>
                    <td><?= $p["codigo"]; ?></td>
                    <td><?= $p["nome_produto"]; ?></td>
                    <td><?= $p["quantidade"]; ?></td>
                    <?php $total = $p["quantidade"] * $p["preco_und"];?>
                    <?php $nombre_format_francais = number_format($total, 2, ',', ' '); ?>
                    <td><?php echo "R$ {$nombre_format_francais}"; ?></td>
                    <td><?= $p["observacao"]; ?></td>
                    <td><?= $p["cod_usuario"]; ?></td>
                    <td><?= $p["cod_cliente"]; ?></td>
                    <td><?= $p["data_hora"]; ?></td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm" href="form_alterar_pedido.php?cod_pedido=<?=$p['codigo']?>">Alterar</a>
                        <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Remover <?= $p['nome_produto']; ?>');" href="remover_pedido.php?cod_pedido=<?=$p['codigo']?>">Remover</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="personalizado.js"></script> 
</body>
<script src="https://code.jsql.com/jsql-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>

<?php else: ?>
    <div class="alert alert-danger">
        Você precisa fazer o login
    </div> 
<?php endif; ?>

