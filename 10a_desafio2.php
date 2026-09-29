<!-- Digite sua solução para o desafio (AQUI) -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos com Validação</title>
</head>

<body style="background-color: #f0f0f0;">
    <form action="" method="post">
        <h2>Cadastro de Produtos</h2>


        <label for="nome">Nome do Produto: </label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="number">Preço: </label><br>
        <input type="text" name="number" id="number"><br><br>

        <button type="submit">Enviar</button>

    </form>

    <?php
    //Verifica se o formulário foi enviado

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Recebe os valores enviados pelo formulário
        $produto = $_POST['nome'];
        $preco = $_POST['number'];

        if (empty($produto) || empty($preco) || !is_numeric($preco)) {
            echo "<p id='msg' style='color: red;'>Erro: Preencha Todos os campos corretamente.</p>";
        } elseif ($preco <= 0 && !empty($preco)) {
            echo "<p id='msg' style='color: red;'>Erro: O preço deve ser um número positivo.</p>";
        } else {
            //Conecta com o Banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "Senai@118";
            $dbname = "exercicio";

            $conn = new mysqli($servername, $username, $password, $dbname);


            //Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }


            // Insere o registro no BD
            $sql = "INSERT INTO produtos (nome, preco) VALUES ('$produto', '$preco')";

            if ($conn->query($sql) === TRUE) {
                echo "<p id='msg' style='color: Darkgreen;'>Produto cadastrado com sucesso!</p>";
            } else {
                echo "<p id='msg' style='color: red;'>Erro ao cadastrar o produto</p>";
            }

            // Oculta a mensagem após 5 segundos com a função setTimeout do Javascript
            echo "
        <script>
            setTimeout(function() {
                document.getElementById('msg').style.display = 'none';
            }, 5000)
        </script>
        ";

            // Fecha a conexão
            $conn->close();
        }
    }
    ?>
</body>

</html>