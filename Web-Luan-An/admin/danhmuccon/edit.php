<?php 
include ('../header.php');
include_once "../../conn.php";
?>

<div class="container-fluid">
	<div class="box-content home-product">
		<h3 class="mt-5">SỬA DANH MỤC CON</h3>  
		<div  class="mb-5">  
			<?php 
				    $id = $_REQUEST["edit"];
					if(isset($_GET['edit'])){

						$madanhmuccon = $_GET['edit']; 

						$query = "SELECT * FROM danhmuccon WHERE madanhmuccon='$madanhmuccon'";

						$rs = mysqli_query($con,$query); 

						while ($row=mysqli_fetch_array($rs)){
				            $madanhmuccon = $row['madanhmuccon']; 
				            $tendanhmuccon = $row['tendanhmuccon'];
					}

				}


				?>
		<form method="POST" action="edit.php?edit=<?php echo $id ?>"  enctype="multipart/form-data">
			<div class="row">
				<div class="form-group">
						<label>Tên danh mục con</label>
						<input type="text" name="tendanhmuccon" placeholder="" class="form-control" required=""  value="<?php echo $tendanhmuccon ?>">
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
	 $id_update = $madanhmuccon; 
     $tendanhmuccon = $_POST['tendanhmuccon'];	
		$query="UPDATE danhmuccon set tendanhmuccon ='$tendanhmuccon' where madanhmuccon='$id_update'";
		
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