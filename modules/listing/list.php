<?php

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lost & Found - Item Listing</title>
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
        <h2>Reported Items</h2>

        <form method="GET" action="listing.php" class="search-form">
            <input
                type="text"
                name="search"
                id="searchBox"
                placeholder="Search by item name...."
            >

            <select name="category">
                <option value="">All Categories</option>
                <option value="Accessories">Accessories</option>
                <option value="Bags">Bags</option>
                <option value="Documents">Documents</option>
                <option value="Electronics">Electronics</option>
                <option value="Clothing">Clothing</option>
            </select>

            <select name="status">
                <option value="">All</option>
                <option value="lost">Lost</option>
                <option value="found">Found</option>
            </select>

            <button type="submit">Search</button>
        </form>

    
        <div class="item-grid">
            <?php foreach ($items as $item): ?>
                <div class="item-card">
                    <h3><?php echo htmlspecialchars($item["title"]); ?></h3>
                    <p class="status status-<?php echo $item["status"]; ?>">
                        <?php echo strtoupper($item["status"]); ?>
                    </p>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($item["category"]); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($item["location"]); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($item["date_reported"]); ?></p>

                   
                    <a href="details.php?id=<?php echo $item['id']; ?>" class="view-btn">
                        View Details
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 NUST Lost &amp; Found</p>
    </footer>


    <script>
       
        const searchBox = document.getElementById("searchBox");
        const cards = document.querySelectorAll(".item-card");


        searchBox.addEventListener("keyup", function () {
            const searchTerm = searchBox.value.toLowerCase();

           
            cards.forEach(function (card) {

                const title = card.querySelector("h3").textContent.toLowerCase();

                if (title.includes(searchTerm)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>


</body>
</html>
