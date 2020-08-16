<?php 
include ('../header.php');
include_once "../../conn.php";
?>

<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">SỬA DANH MỤC CHA</h3>  
		<div  class="mb-5">  
			<?php 
				    $id = $_REQUEST["edit"];
					if(isset($_GET['edit'])){

						$madanhmuccha = $_GET['edit']; 

						$query = "SELECT * FROM danhmuccha WHERE madanhmuccha='$madanhmuccha'";

						$rs = mysqli_query($con,$query); 

						while ($row=mysqli_fetch_array($rs)){
				            $madanhmuccha = $row['madanhmuccha']; 
				            $tendanhmuccha = $row['tendanhmuccha'];
					}

				}


				?>
		<form method="POST" action="edit.php?edit=<?php echo $id ?>"  enctype="multipart/form-data">
			<div class="row">
				<div class="form-group">
						<label>Tên danh mục cha</label>
						<input type="text" name="tendanhmuccha" placeholder="" class="form-control" required=""  value="<?php echo $tendanhmuccha ?>">
				</div>	
				</div>
			<button type="submit" class="btn btn-success" name="update">Sửa</button>&emsp;
			<a class="come-back" href="index.php">QUAY LẠI</a>
		</form>
	</div>
	</div>
</div>
<?php 
if(isset($_POST['update'])){
	 $id_update = $madanhmuccha; 
     $tendanhmuccha = $_POST['tendanhmuccha'];	
		$query="UPDATE danhmuccha set tendanhmuccha ='$tendanhmuccha' where madanhmuccha='$id_update'";
		
        if (mysqli_query($con,$query)) {
            echo "<script>alert('Cập nhật thành công!')</script>";
			
			echo "<script>window.open('index.php','_self')</script>";
        }	
        else{
            echo "<script>alert('Cập nhật lỗi lỗi!')</script>";
        }				
    }	
?> 
</html>