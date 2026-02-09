<?php
require "db.php"; // ตรวจสอบว่าไฟล์ connect db ชื่อนี้ถูกต้องไหม

$youtube_url = isset($_POST['youtube_url']) ? $_POST['youtube_url'] : '';
$quality = isset($_POST['quality']) ? $_POST['quality'] : '360p';

// ฟังก์ชันดึง ID ขั้นเทพ (รองรับทั้ง youtu.be, ?si=, &feature=)
function getYoutubeId($url) {
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
    if (preg_match($pattern, $url, $matches)) {
        return $matches[1]; // ส่งคืนเฉพาะ ID 11 ตัว
    }
    return false;
}

$videoId = getYoutubeId($youtube_url);

if ($videoId) {
    // กำหนดสถานะ
    $status = "completed"; // สมมติว่าเสร็จเลยเพื่อให้เห็นผล (ปกติอาจเป็น pending)
    
    // บันทึกลงฐานข้อมูล
    // ** ตรวจสอบชื่อตาราง (conversions หรือ videos) ให้ตรงกับ DB ของคุณ **
    $sql = "INSERT INTO conversions (youtube_id, quality, status, created_at) 
            VALUES ('$videoId', '$quality', '$status', NOW())";

    if ($conn->query($sql) === TRUE) {
        // ส่งข้อความกลับไปบอก JS
        echo "success:เพิ่มรายการเรียบร้อย";
    } else {
        echo "error:Database Error: " . $conn->error;
    }
    
} else {
    echo "error:ลิงก์ YouTube ไม่ถูกต้อง (หา ID ไม่เจอ)";
}
?>