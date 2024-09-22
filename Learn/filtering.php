<?php
$books = [
    [
        "name" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "genre" => "Fiction",
        "publication_year" => 1960
    ],
    [
        "name" => "1984",
        "author" => "George Orwell",
        "genre" => "Dystopian Fiction",
        "publication_year" => 1949
    ],
    [
        "name" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "genre" => "Fiction",
        "publication_year" => 1925
    ],
    [
        "name" => "Pride and Prejudice",
        "author" => "Jane Austen",
        "genre" => "Fiction",
        "publication_year" => 1813
    ]
];

function filter($items, $criteria) {
    $filteredItems = [];
    foreach ($items as $item) {
        $match = true;
        foreach ($criteria as $key => $value) {
            if (!empty($value) && $item[$key] != $value) {
                $match = false;
                break;
            }
        }
        if ($match) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

$filteredBooks = $books; // Default to all books

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $criteria = [
        'name' => $_GET['name'] ?? '',
        'author' => $_GET['author'] ?? '',
        'genre' => $_GET['genre'] ?? '',
        'publication_year' => $_GET['pub_year'] ?? ''
    ];
    $filteredBooks = filter($books, $criteria);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Filter</title>
</head>
<body>
    <label for="">Filter</label>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <label for="name">Book Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_GET['name'] ?? ''); ?>">
        
        <label for="author">Author:</label>
        <select name="author" id="author">
            <option value=""></option>
            <?php foreach ($books as $book): ?>
                <option value="<?= htmlspecialchars($book['author']) ?>" <?= (isset($_GET['author']) && $_GET['author'] === $book['author']) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($book['author']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?php echo htmlspecialchars($_GET['genre'] ?? ''); ?>">
        
        <label for="pub_year">Publication Year:</label>
        <input type="text" name="pub_year" id="pub_year" value="<?php echo htmlspecialchars($_GET['pub_year'] ?? ''); ?>">
        
        <input type="submit" value="Filter">
    </form>
    
    <div>
        <ul>
        <?php foreach ($filteredBooks as $book): ?>
            <li>Name: <?= htmlspecialchars($book["name"]) ?></li>
            <li>Author: <?= htmlspecialchars($book["author"]) ?></li>
            <li>Genre: <?= htmlspecialchars($book["genre"]) ?></li>
            <li>Publication Year: <?= htmlspecialchars($book["publication_year"]) ?></li>
            <br>
        <?php endforeach; ?>
        </ul>
        
    </div>
</body>
</html>
