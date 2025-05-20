<?php

require 'db_connection.php';

$query = "
    SELECT 
        crops.id,
        crops.crop_name AS crop_name,
        crops.season,
        crops.weight,
        crops.image,
        crops.starting_price,
        auctions.start_date,
        auctions.end_date,
        auctions.status AS auction_status
    FROM crops
    JOIN auctions ON crops.id = auctions.crop_id
    WHERE auctions.status = 'active'
    ORDER BY auctions.start_date DESC
";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($crop = $result->fetch_assoc()) {
        ?>
        <div class="col-mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($crop['image']) ?: 'default_crop.jpg' ?>" class="card-img-top" alt="Crop Image">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($crop['crop_name']) ?></h5>
                    <p class="card-text"><strong>Season:</strong> <?= htmlspecialchars($crop['season']) ?></p>
                    <p class="card-text"><strong>Weight:</strong> <?= htmlspecialchars($crop['weight']) ?> kg</p>
                    <p class="card-text"><strong>Starting Price:</strong> ₹<?= htmlspecialchars($crop['starting_price']) ?></p>
                    <p class="card-text"><strong>Auction Starts:</strong> <?= date("d M Y, h:i A", strtotime($crop['start_date'])) ?></p>
                    <p class="card-text"><strong>Auction Ends:</strong> <?= date("d M Y, h:i A", strtotime($crop['end_date'])) ?></p>
                    <form action="place_bid.php" method="POST">
                        <input type="hidden" name="crop_id" value="<?= $crop['id'] ?>">
                        <div class="mb-2">
                            <input type="number" step="0.01" name="amount" class="form-control" placeholder="Enter your bid (₹)" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Place Bid</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p class='text-muted text-center'>No crops available at the moment.</p>";
}
?>
