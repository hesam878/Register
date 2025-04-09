<?php
session_start();
$db = mysqli_connect('localhost','root','','hesam-sql');
$ok = false;

// دریافت و فیلتر کردن داده‌ها
$book_name = mysqli_real_escape_string($db, $_POST['book_name'] ?? '');
$book_pages = intval($_POST['book_pages'] ?? 0);
$book_year = intval($_POST['book_year'] ?? 0);

// اعتبارسنجی داده‌ها
if(!empty($book_name) && $book_pages > 0 && $book_year > 0) {
    // استفاده از Prepared Statement برای امنیت
    $stmt = $db->prepare("INSERT INTO books(book_name, book_pages, book_year) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $book_name, $book_pages, $book_year);
    
    if ($stmt->execute()) {
        $ok = true;
    }
}

echo $ok ? '1' : '0';
?>