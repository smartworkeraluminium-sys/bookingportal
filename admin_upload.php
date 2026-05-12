<?php
// এখানে আপনার পছন্দমতো পাসওয়ার্ড দিন (যেমন: smart786)
$correct_password = "আপনার_পছন্দের_পাসওয়ার্ড"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_password = $_POST['password'];

    if ($entered_password == $correct_password) {
        $target_dir = "uploads/";
        $file_name = time() . "_" . basename($_FILES["photo"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "<script>alert('সফল! ছবি সেভ হয়েছে।');</script>";
        } else {
            echo "<script>alert('দুঃখিত, আপলোড হয়নি।');</script>";
        }
    } else {
        echo "<script>alert('ভুল পাসওয়ার্ড! আপনি ছবি আপলোড করতে পারবেন না।');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>সাহেব ভাইয়ের গোপন আপলোড</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; background: #f4f4f4; }
        .box { background: white; padding: 20px; border-radius: 10px; display: inline-block; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { display: block; margin: 10px auto; padding: 10px; width: 80%; }
        button { background: green; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>📷 শুধুমাত্র সাহেব ভাইয়ের জন্য</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="password" name="password" placeholder="গোপন পাসওয়ার্ড দিন" required>
            <input type="file" name="photo" accept="image/*" required>
            <button type="submit">ওয়েবসাইটে ছবি তুলুন</button>
        </form>
    </div>
</body>
</html>
