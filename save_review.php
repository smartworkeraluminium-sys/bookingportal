<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $star = $_POST['star'];
    $comment = $_POST['comment'];
    
    // ছবি আপলোডের ফোল্ডার
    $target_dir = "uploads/";
    $file_name = time() . "_" . basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $file_name;
    
    // ছবি ফোল্ডারে সেভ হলে রিভিউ লেখাটা HTML-এ সেভ হবে
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $stars = str_repeat("⭐", $star);
        
        $review_html = "
        <div style='border-bottom:1px solid #eee; padding:10px; font-family:sans-serif;'>
            <strong>$name</strong> <span style='color:orange;'>$stars</span><br>
            <p style='font-size:14px;'>$comment</p>
            <img src='$target_file' style='width:100%; border-radius:5px;'>
        </div>\n";
        
        file_put_contents('all_reviews.html', $review_html, FILE_APPEND);
        
        echo "<script>alert('ধন্যবাদ! আপনার রিভিউ সফলভাবে সেভ হয়েছে।'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('দুঃখিত, ছবি আপলোড হয়নি।'); window.location.href='index.html';</script>";
    }
}
?>
