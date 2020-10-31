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
<body>
    <div class="container">
        <?php 
            $cod_prod = $_GET["cod_prod"];            
            include("selecionar_produto.php");             
        ?>    
        <form action="alterar_produto.php" method="POST">
        <h2>Alterar Produto</h2><br>
            <div class="form-group">
                <label for="nome_produto"> Codigo do produto: </label>
                <input type="text" required readonly value="<?= $produtos[0]['codigo']; ?>" class="form-control" id="cod_prod" name="cod_prod">                
            </div>
            <div class="form-group">
                <label for="nome_produto"> Nome do produto: </label>
                <input type="text" required value="<?= $produtos[0]['nome']; ?>" class="form-control" id="nome_produto" name="nome_produto" placeholder="Digite o produto">                
            </div>
            <div class="form-group">
                <label for="categoria_produto"> Categoria: </label>
                <input type="text" required value="<?= $produtos[0]['categoria']; ?>" class="form-control" id="categoria_produto" name="categoria_produto">                
            </div>
            <div class="form-group">
                <label for="valor_produto"> Valor unitário: </label>
                <input type="number" step=".01" required value="<?= $produtos[0]['valor']; ?>" class="form-control" id="valor_produto" name="valor_produto">                
            </div>
            <div class="form-group">
                <label for="foto_produto"> Foto: </label>
                <input type="file" class="form-control" id="foto_produto" name="foto_produto">                
            </div>
            <div class="form-group">
                <label for="info_produto"> Informações Adicionais: </label>
                <textarea class="form-control" id="info_produto" name="info_produto" rows="4" cols="50"><?= $produtos[0]['info_adicional']; ?></textarea>               
            </div>
            <button type="submit" class="btn btn-primary">Alterar Produto</button> 
            <a href="produto.php" type="submit" class="btn btn-primary">Cancelar</a>                   
        </form>         
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
        <br><br><br>
        
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