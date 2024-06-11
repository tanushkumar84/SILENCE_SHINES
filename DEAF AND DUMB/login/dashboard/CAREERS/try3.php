<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the CSV file path
    $csvFilePath = 'applications.csv';

    // Extract form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $resume = $_FILES['resume']['name'];
    $message = $_POST['message'];

    // Prepare data to be written to CSV
    $data = array($name, $email, $resume, $message);

    // Open the CSV file in append mode
    $file = fopen($csvFilePath, 'a');

    // Write data to CSV
    fputcsv($file, $data);

    // Close the file
    fclose($file);

    // Display success message
      echo "<script>alert('Meeting scheduled successfully.')</script>";
    echo "<script>window.location.href = 'index.html';</script>";
    exit();
}
?>
