<?php
require "db.php";

// ดึงข้อมูลจากตารางเดียว (ไม่ต้อง JOIN แล้ว)
$sql = "SELECT * FROM conversions ORDER BY id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<thead>
            <tr>
                <th width='5%'>#</th>
                <th width='40%'>Video</th>
                <th width='15%'>Quality</th>
                <th width='15%'>Status</th>
                <th width='25%'>Date</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        $thumbUrl = "https://img.youtube.com/vi/" . $row['youtube_id'] . "/mqdefault.jpg";
        $ytUrl = "https://youtube.com/watch?v=" . $row['youtube_id'];

        $statusClass = 'status-pending';
        $statusLabel = $row['status'];
        
        if ($row['status'] == 'completed' || $row['status'] == 'finished') {
            $statusClass = 'status-success';
            $statusLabel = 'Completed';
        } elseif ($row['status'] == 'failed' || $row['status'] == 'error') {
            $statusClass = 'status-error';
        }

        $date = date("d M Y, H:i", strtotime($row['created_at']));

        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>
                <div class='video-cell'>
                    <img src='{$thumbUrl}' alt='thumb' onerror=\"this.src='https://via.placeholder.com/80x45?text=No+Img'\">
                    <a href='{$ytUrl}' target='_blank'>
                        <i class='fab fa-youtube'></i> Watch
                    </a>
                </div>
              </td>";
        echo "<td><span class='quality-tag'>{$row['quality']}</span></td>";
        echo "<td><span class='status-badge {$statusClass}'>{$statusLabel}</span></td>";
        echo "<td class='date-cell'>{$date}</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div class='empty-state'>
            <i class='fas fa-folder-open'></i>
            <p>ยังไม่มีประวัติการแปลงไฟล์</p>
          </div>";
}
?>