<?php
// Step 1: Retrieve data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meeting_time = $_POST["meeting-time"];

    // Step 2: Store data in a CSV file
    $file = 'meetings.csv';
    $data = array("Date", "Time"); // Headings for columns
    if (!file_exists($file)) {
        $fp = fopen($file, 'a'); // Open the file in append mode
        fputcsv($fp, $data); // Write headings to CSV
        fclose($fp); // Close the file
    }
    
    // Split the datetime into date and time
    $datetime = explode("T", $meeting_time);
    $date = $datetime[0];
    $time = $datetime[1];

    $data = array($date, $time); // Data for the new row

    // Append the meeting data to the CSV file
    $fp = fopen($file, 'a');
    fputcsv($fp, $data);
    fclose($fp);

    // Step 3: Print success message and redirect
    echo "<script>alert('Meeting scheduled successfully.')</script>";
    echo "<script>window.location.href = 'counseling2.html';</script>";
}
?>
