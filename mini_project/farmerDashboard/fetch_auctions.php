<?php
require 'db_connection.php'; // Include database connection

$response = [
    'ongoing' => [],
    'closed' => []
];

// Fetch ongoing auctions (where status is 'ongoing')
$ongoingQuery = "SELECT id, crop_name, starting_price, created_at, image 
                 FROM auctions 
                 WHERE status = 'ongoing' 
                 ORDER BY created_at ASC";

$ongoingResult = mysqli_query($conn, $ongoingQuery);

while ($row = mysqli_fetch_assoc($ongoingResult)) {
    // Default image if not provided
    $image = (!empty($row['image'])) ? $row['image'] : "uploads/default.jpg";

    $response['ongoing'][] = [
        'id' => $row['id'],
        'crop_name' => $row['crop_name'],
        'price' => "₹" . number_format(floatval($row['starting_price']), 2),
        'image' => $image
    ];
}

// Fetch closed auctions (where status is 'closed')
$closedQuery = "SELECT id, crop_name, starting_price, created_at, image 
                FROM auctions 
                WHERE status = 'closed' 
                ORDER BY created_at DESC";

$closedResult = mysqli_query($conn, $closedQuery);

while ($row = mysqli_fetch_assoc($closedResult)) {
    // Default image if not provided
    $image = (!empty($row['image'])) ? $row['image'] : "uploads/default.jpg";

    $response['closed'][] = [
        'id' => $row['id'],
        'crop_name' => $row['crop_name'],
        'price' => "₹" . number_format(floatval($row['starting_price']), 2),
        'closed_date' => date("d M Y", strtotime($row['created_at'])),
        'image' => $image
    ];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>