<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $conecta = new mysqli($servidor,$usuario,$senha);
            if($conecta->connect_error){
                die("Falha na conexão");
            }
            echo "Sucesso na conexão";
            $conecta->close();
        ?>
    </body>
</html>
