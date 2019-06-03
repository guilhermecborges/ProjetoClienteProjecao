<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terminar cadastro</title>
    <!-- Main css -->
    <link rel="stylesheet" href="../../public/css/cadastro.css">
</head>
<?php 
    require_once ("../../service/loginService.php");
	error_reporting(0);
	session_start();
					if($_SESSION["USUARIO_LOGADO"] == NULL){
						header("Location: ../login/login.html?error=1");
					}
                    $conecta = LoginService::iniciaConexao();
					if($_GET['id'] != null){
						$id = $_GET['id'];
						$sql = $conecta->query("SELECT ID_CLIENTE,NOME_COMPLETO,NOME_USUARIO,RG,EMAIL,ENDERECO FROM cliente where ID_CLIENTE =". $id);
						$cliente = $sql->fetch_assoc();
					}	
					if (array_key_exists('Sair', $_POST)) {
						$_SESSION["USUARIO_LOGADO"] = NULL;
						header("Location: ../login/login.html?error=1");
					}
			
?>
<body>

    <div class="main">
        <div class="container" ">

            <div class="signup-content">
                
                <div class="signup-form">
				
				<form name="sair" method="POST" >
					<input type="submit" value="Sair" name="Sair" style="
						margin-left: 89%;
						margin-top: 0px;
						color: green;
						border-radius: 4px;
						font-size: 19px;
						background-color: greenyellow;
						width: 77px;
						">
				</form>
                    <a href="../consulta/consulta.php"><input type="button" name="voltar" value="Voltar" class="submit" style="
    float: left;
    margin-top: -45px;
"></a>
                    <form method="POST" class="register-form" action="../../controller/cliente.php" id="register-form">
					<input type="hidden" name="idCliente" value="<?php echo $cliente['ID_CLIENTE'] ?>"/>
                        <h2>Terminar cadastro</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nome completo :</label>
                                <input type="text" value="<?php echo $cliente['NOME_COMPLETO'] ?>" name="nameCompleto" id="name" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nome de usuário:</label>
                                <input type="text" value="<?php echo $cliente['NOME_USUARIO'] ?>" name="nameUsuario" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label >RG:</label>
                                <input type="number" value="<?php echo $cliente['RG'] ?>" name="rg" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" value="<?php echo $cliente['EMAIL'] ?>" name="email" id="email" />
                        </div>  
                        <div class="form-group">
                            <label for="address">Endereço:</label>
                            <input type="text" value="<?php echo $cliente['ENDERECO'] ?>" name="address" id="address" required/>
                        </div>
                        <br/>
                        <div class="form-submit">
                            <input type="submit" value="Terminar Cadastro" class="submit" name="submit" id="submit" />
                        </div>
                        <br/>
                        <div class="signup-img" >
                            <iframe
                                width="600"
                                height="500"
                                frameborder="50" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDL9JpHPFK1M1tYREhDjNgpgUzFTgkDYtQ
                                &q=Brasilia+DF" allowfullscreen>
                            </iframe>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="../../public/js/main.js"></script>
</body>
</html>
