<?php
include_once "../conn.php";
if (isset($_GET['data']) && $_GET['data'] != "") {
  $key = trim($_GET['data']); // nhận giá trị từ ajax gửi qua để xử lý
  $query = "SELECT * from sanpham Where tensanpham like '%$key%' LIMIT 8";
  $result = $con->query($query);
  $str = "";
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $masanpham = $row["masanpham"];
    $anh = $row['anh'];
    if ($row["giakhuyenmai"] == null) {
      $gia = $row["giagoc"];
    } else {
      $gia = number_format($row["giakhuyenmai"]);
    }

    $str = "
          <div class='search_v'>
            <a class='search_va' href='product-details.php?msp=$masanpham'>
              <img class='search_vimg'src='img/$anh'> 
              <strong class='search_vst'>" . $row["tensanpham"] . "  ----   " . $gia . " VNĐ</strong>
            </br>
            </div> 
            </a>";
    echo $str;
  }
  mysqli_close($con);
}