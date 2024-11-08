<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "Session Username: Not set";
    exit;
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo "User ID from session: " . $user_id . "<br>";
} else {
    echo "User ID not set in session.";
    exit;
}

echo "Session Username: " . $username . "<br>";
echo "Logged In: " . (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : 'Not set') . "<br>";
echo "Testimonial Text: " . (isset($_POST['review']) ? $_POST['review'] : 'Not set') . "<br>";
echo "Image: " . (isset($_FILES['photo']) ? $_FILES['photo']['name'] : 'Not set') . "<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $review = $_POST['review'] ?? null;
    $image = $_FILES['photo'] ?? null;

    if (!$username || !$review || !$image) {
        echo "Incomplete data provided.";
        exit();
    }

    $target_dir = "";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($image["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($image["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $conn = new mysqli("localhost", "root", "", "cad");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO testimoni (user_id, username, review, photo) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("isss", $user_id, $username, $review, $target_file);
                if ($stmt->execute()) {
                    header("Location: ../testimoni.php");
                    exit();
                } else {
                    echo "Error executing query: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Failed to prepare statement: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Unauthorized access.";
}
?>
