<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <div class="container">
    <br><br><br><br><br><br>
    <center>
    <div class="border border-secondary col-md-3 p-3 bg-primary text-white">    
    <h2>Efetuar Login</h2>
    <form id="form_login" action="login.php" method="POST">
        <?php if(isset($resultado) && $resultado["cod"] == 0): ?>
        <div class="alert alert-danger">
            <?php echo $resultado["msg"]; ?>
        </div>
        <?php endif; ?>
        <input class="border border-danger" type="email" id="email" name="email" placeholder="Digite seu email"/> <br><br>
        <input class="border border-danger" type="password" id="senha" name="senha" placeholder="Digite sua senha"/> <br><br>
        <input type="submit" id="submeter" value="Entrar" class="btn btn-success"/>
    </form>
    </div>
    </center>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>