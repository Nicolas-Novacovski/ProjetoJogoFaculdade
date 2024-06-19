<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Avaliações de Restaurantes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="divTitulo">
        <h1 class="titulo">Sistema de Avaliação de Padaria da Ana</h1>
    </div>
    <main class="fundo">
        <form class="formulario" action="submit_review.php" method="POST">
            <label for="restaurant_id">Restaurante:</label>
            <select class="caixaSelect" name="restaurant_id" id="restaurant_id">
                <option value="" disabled selected hidden>Selecione um restaurante</option>
                <!-- Popule dinamicamente com PHP -->
                <?php
                include 'db.php';
                $sql = "SELECT id, name FROM restaurants";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select><br>

            <label for="rating">Nota (1-5):</label>
            <div class="nota">
                <input placeholder="Digite uma nota de 0 a 5" class="caixaNota" type="number" name="rating" id="rating" min="1" max="5" required><br>
            </div>
            <label for="comment">Comentário:</label>
            <div class="texto">
                <textarea class="caixaComentario" rows="6" name="comment" id="comment" required ></textarea><br>
            </div>
            <div class="botao">
                <a href="http://localhost/meu_projeto/index.php"><button type="button" id="botaoAvs" class="botaoAvs"> Ir para a página de Avaliações </button></a>
                <button class="botaoEnviar" onclick="validarSelecao()" type="submit">Enviar Avaliação</button>
            </div>
        </form>
    </main>
</body>
</html>

    <script>
    function validarSelecao() {
        var rating = document.getElementById("rating").value;
        if (rating > 5) {
            alert("Por favor, selecione um número menor ou igual a 5.");
            document.getElementById("rating").value = ""; // Limpa a seleção
        }
    }
    </script>    
