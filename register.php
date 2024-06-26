<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke dalam tabel users
    $sql = "INSERT INTO users (username, password, plaintext_password) VALUES ('$username', '$hashed_password', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman sukses setelah berhasil registrasi
        header("Location: index2.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>
