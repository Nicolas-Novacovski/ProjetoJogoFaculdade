<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Avaliações</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body id="bodyAvs" style="background-image= url('fundoAvs.jpg')">
    <div class="divTitulo">
        <h1 class="titulo">Avaliações das Padarias</h1>
    </div>
        <?php
        include 'db.php';

        $sql = "SELECT r.name, rv.rating, rv.comment, rv.created_at 
                FROM reviews rv 
                JOIN restaurants r ON rv.restaurant_id = r.id 
                ORDER BY rv.created_at DESC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>Nota: " . $row['rating'] . "</p>";
            echo "<p>Comentário: " . $row['comment'] . "</p>";
            echo "<p>Data: " . $row['created_at'] . "</p>";
            echo "</div>";
        }

        $conn->close();
        ?>
</body>
</html>
