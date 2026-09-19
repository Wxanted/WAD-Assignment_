<?php
// ============================================
// SAME fake data as listing.php.
// Later this whole block gets replaced by ONE database query:
//   SELECT * FROM items WHERE id = $id
// ============================================
$items = [
    [
        "id" => 1,
        "title" => "Black Wallet",
        "category" => "Accessories",
        "status" => "found",
        "description" => "Found near the library entrance. Contains a student ID.",
        "location" => "NUST Library",
        "date_reported" => "2026-09-01",
        "contact_info" => "0811234567"
    ],
    [
        "id" => 2,
        "title" => "Blue Backpack",
        "category" => "Bags",
        "status" => "lost",
        "description" => "Lost somewhere between the cafeteria and Block C. Has a laptop inside.",
        "location" => "Cafeteria / Block C",
        "date_reported" => "2026-09-03",
        "contact_info" => "0817654321"
    ],
    [
        "id" => 3,
        "title" => "Student ID Card - J. Amutenya",
        "category" => "Documents",
        "status" => "found",
        "description" => "Found on the grass outside the Computing building.",
        "location" => "Faculty of Computing",
        "date_reported" => "2026-09-05",
        "contact_info" => "0825551234"
    ],
];

// ============================================
// STEP 1: GET THE ID FROM THE URL
// e.g. details.php?id=2   ->   $_GET['id'] = "2"
// ============================================
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// ============================================
// STEP 2: FIND THE MATCHING ITEM IN THE ARRAY
// (Later: this becomes a WHERE id = ? query instead of a loop)
// ============================================
$foundItem = null;
foreach ($items as $item) {
    if ($item['id'] === $id) {
        $foundItem = $item;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Lost &amp; Found</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="listing.php">Browse Items</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <main>
        <?php if ($foundItem): ?>
            <div class="details-card">
                <h2><?php echo htmlspecialchars($foundItem["title"]); ?></h2>
                <p class="status status-<?php echo $foundItem["status"]; ?>">
                    <?php echo strtoupper($foundItem["status"]); ?>
                </p>
                <p><strong>Category:</strong> <?php echo htmlspecialchars($foundItem["category"]); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($foundItem["location"]); ?></p>
                <p><strong>Date Reported:</strong> <?php echo htmlspecialchars($foundItem["date_reported"]); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($foundItem["description"]); ?></p>
                <p><strong>Contact:</strong> <?php echo htmlspecialchars($foundItem["contact_info"]); ?></p>

                <a href="listing.php" class="back-btn">&larr; Back to listing</a>
            </div>
        <?php else: ?>
            <p>Sorry, that item could not be found.</p>
            <a href="listing.php">&larr; Back to listing</a>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2026 NUST Lost &amp; Found</p>
    </footer>

</body>
</html>
