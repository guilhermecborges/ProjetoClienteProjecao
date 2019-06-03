<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Página de consulta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../public/css/consulta.css">
        <script type="text/javascript" src="../../public/js/consultaJq.js"></script>

    </head>
    <body>

        <div class="container">
            <h2>Tabela de Pesquisa</h2>
            <p>Pesquise por nome completo, nome de usuário, RG, E-MAIL ou Endereço: </p>  
            <input class="form-control" id="myInput" type="text" placeholder="Pesquisar..">
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome completo</th>
                        <th>Nome de usuário</th>
                        <th>RG</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    require_once ("../../service/loginService.php");
                    $conecta = LoginService::iniciaConexao();
                    if ($conecta->connect_error) {
                        echo "</tbody></table>";
                    } else {

                        $sql = $conecta->query("SELECT ID_CLIENTE,NOME_COMPLETO,NOME_USUARIO,RG,EMAIL,ENDERECO FROM cliente");
                        $i = 0;
// Estabelecer a variável de saída
                        $dyn_table = '';
                        while ($row = $sql->fetch_assoc()) {

                            $id = $row["ID_CLIENTE"];
                            $nome_completo = $row["NOME_COMPLETO"];
                            $nome_usuario = $row["NOME_USUARIO"];
                            $rg = $row["RG"];
                            $email = $row["EMAIL"];
                            $endereco = $row["ENDERECO"];

                            if ($i % 3 == 0) { // se $i é divisível pelo número target  (neste caso "3")
                                $dyn_table .= '<tr><td>' . $nome_completo . '</td>';
                                $dyn_table .= '<td>' . $nome_usuario . '</td>';
                                $dyn_table .= '<td>' . $rg . '</td>';
                                $dyn_table .= '<td>' . $email . '</td>';
                                $dyn_table .= '<td>' . $endereco . '</td>';
                                $dyn_table .= "<td><a href='../cadastro/cadastro.php?id=$id'><input type='submit' name='editar' value='Editar'></a>";
                                $dyn_table .= "<a href='../../controller/cliente.php?id=$id'><input type='submit' name='excluir' value='Excluir'></a></td></tr>";
                            } else {
                                $dyn_table .= '<tr><td>' . $nome_completo . '</td>';
                                $dyn_table .= '<td>' . $nome_usuario . '</td>';
                                $dyn_table .= '<td>' . $rg . '</td>';
                                $dyn_table .= '<td>' . $email . '</td>';
                                $dyn_table .= '<td>' . $endereco . '</td>';
                                $dyn_table .= "<td><a href='../cadastro/cadastro.php?id=$id'><input type='submit' name='editar' value='Editar'></a>";
                                $dyn_table .= "<a href='../../controller/cliente.php?id=$id'><input type='submit' name='excluir' value='Excluir'></a></td></tr>";
                            }
                            $i++;
                        }
                        $dyn_table .= '</tbody></table>';
                        echo $dyn_table;
                    }
                    ?>
                <a href="../cadastro/cadastro.html"><input type="button" value="Novo"></a>
        </div>

        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    </body>
</html>