<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    if (isset($_POST['restaurant_id']) && isset($_POST['rating']) && isset($_POST['comment'])) {
        $restaurant_id = $_POST['restaurant_id'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO reviews (restaurant_id, rating, comment) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $restaurant_id, $rating, $comment);

        if ($stmt->execute()) {
            echo "Avaliação enviada com sucesso!";
        } else {
            echo "Erro ao enviar avaliação: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Erro: Dados incompletos recebidos do formulário.";
    }
}
?>
