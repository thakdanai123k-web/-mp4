<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube to MP4 Converter</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
            --bg-color: #f0f2f5;
            --card-bg: #ffffff;
            --text-color: #333;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Kanit', sans-serif;
            background: var(--bg-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-color);
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px;
            background: var(--card-bg);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            font-weight: 600;
            color: #ff4b2b;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        h2 i {
            margin-right: 10px;
        }

        /* Form Styling */
        form {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        input[type="text"] {
            flex: 3;
            padding: 15px 20px;
            font-size: 16px;
            border: 2px solid #e1e1e1;
            border-radius: 50px;
            outline: none;
            transition: border-color 0.3s;
            font-family: 'Kanit', sans-serif;
        }

        input[type="text"]:focus {
            border-color: #ff4b2b;
        }

        select {
            flex: 1;
            padding: 15px;
            font-size: 16px;
            border: 2px solid #e1e1e1;
            border-radius: 50px;
            outline: none;
            background: white;
            cursor: pointer;
            font-family: 'Kanit', sans-serif;
            min-width: 100px;
        }

        button {
            flex: 1;
            padding: 15px 25px;
            background: var(--primary-gradient);
            border: none;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(255, 75, 43, 0.4);
            transition: transform 0.2s, box-shadow 0.2s;
            white-space: nowrap;
            font-family: 'Kanit', sans-serif;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 75, 43, 0.6);
        }

        button:active {
            transform: translateY(0);
        }

        /* Result Text */
        #result {
            margin: 15px 0;
            text-align: center;
            font-weight: 500;
            min-height: 24px;
        }

        .success { color: #28a745; }
        .error { color: #dc3545; }

        hr {
            border: 0;
            height: 1px;
            background: #e1e1e1;
            margin: 30px 0;
        }

        h3 {
            font-weight: 500;
            margin-bottom: 20px;
            color: #555;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        table th {
            text-align: left;
            padding: 15px;
            color: #888;
            font-weight: 400;
            font-size: 0.9rem;
        }

        table td {
            background: #fff;
            padding: 15px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        
        table tr td:first-child {
            border-left: 1px solid #eee;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        table tr td:last-child {
            border-right: 1px solid #eee;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            text-align: center;
        }

        table tr {
            transition: transform 0.2s;
        }

        table tr:hover td {
            background: #fafafa;
            border-color: #ddd;
        }

        /* Link Styling */
        a {
            color: #ff4b2b;
            text-decoration: none;
            font-weight: 600;
            background: rgba(255, 75, 43, 0.1);
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.2s;
        }

        a:hover {
            background: #ff4b2b;
            color: white;
        }

        /* --- CSS เพิ่มเติมสำหรับ List ที่สวยงาม --- */
        .video-cell {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .video-cell img {
            width: 80px;
            height: 45px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
        }

        .status-success { background-color: #d4edda; color: #155724; }
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-error { background-color: #f8d7da; color: #721c24; }

        .quality-tag {
            background: #e9ecef;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 13px;
            color: #495057;
            font-weight: 500;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #adb5bd;
        }
        .empty-state i {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .date-cell {
            font-size: 14px;
            color: #888;
        }

        /* Mobile Responsive */
        @media (max-width: 600px) {
            .container { padding: 20px; margin: 10px; }
            form { flex-direction: column; }
            input[type="text"], select, button { width: 100%; box-sizing: border-box; }
            table { font-size: 14px; }
            table th, table td { padding: 10px; }
            .video-cell { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>

<body>

<div class="container">
    <h2><i class="fab fa-youtube"></i> YouTube to MP4</h2>

    <form id="videoForm">
        <input type="text" name="youtube_url" placeholder="วางลิงก์ YouTube ที่นี่..." required>
        <select name="quality">
            <option value="360p">360p (SD)</option>
            <option value="720p">720p (HD)</option>
            <option value="1080p">1080p (FHD)</option>
        </select>
        <button type="submit"><i class="fas fa-download"></i> แปลงไฟล์</button>
    </form>

    <div id="result"></div>

    <hr>

    <h3><i class="fas fa-list"></i> รายการที่แปลงแล้ว</h3>
    <div id="list">
        <p style="text-align:center; color:#999;">กำลังโหลดรายการ...</p>
    </div>

</div>

<script>
// ฟังก์ชันโหลดรายการ (เติมเวลาปัจจุบันเพื่อบังคับให้ไม่จำค่าเดิม)
function loadList(){
    fetch("list.php?t=" + new Date().getTime()) 
        .then(res => res.text())
        .then(data => {
            document.getElementById("list").innerHTML = data;
        });
}

// ส่วนรับค่าจากการกดปุ่ม (เหลือไว้แค่อันเดียวที่สมบูรณ์ที่สุด)
document.getElementById("videoForm").addEventListener("submit", function(e){
    e.preventDefault();
    
    let btn = this.querySelector('button');
    let originalText = btn.innerHTML; // จำข้อความเดิมไว้
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> กำลังทำงาน...';
    btn.disabled = true;

    let formData = new FormData(this);

    fetch("save_video.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        let resDiv = document.getElementById("result");
        
        // เช็คว่าสำเร็จไหม (ถ้า php ส่งมาว่า success:...)
        if (data.trim().startsWith("success")) {
            resDiv.innerHTML = data.replace("success:", "");
            resDiv.className = "success"; // สีเขียว
            
            loadList(); // สั่งให้โหลดตารางใหม่ทันที
            
            document.getElementById("videoForm").reset(); // ล้างช่องกรอก
        } else {
            resDiv.innerHTML = data.replace("error:", "");
            resDiv.className = "error"; // สีแดง
        }
    })
    .catch(err => {
        console.error(err);
        document.getElementById("result").innerHTML = "เกิดข้อผิดพลาดในการเชื่อมต่อ";
        document.getElementById("result").className = "error";
    })
    .finally(() => {
        // คืนค่าปุ่มให้กลับมาเหมือนเดิม
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
});

// เรียกโหลดรายการครั้งแรกเมื่อเข้าเว็บ
loadList();
</script>

</body>
</html>