<title>Quản lý sinh viên</title>
	<div class="line">
		<div class="title">
			<p>Quản lý sinh viên</p>
		</div>
	</div>
	<div class="table">
		<table cellpadding=5 border=1  cellspacing=5>
			<tr cellspacing=1>
				<th>
					Mã sinh viên
				</th>
				<th>
					Mã lớp
				</th>
				<th>
					Họ
				</th>
				<th>
					Tên
				</th>
				<th>
					Số điện thoại
				</th>
				<th>
					Quê quán
				</th>
			</tr>
			<?php
				$sql="select * from sinh_vien";
				$result = mysql_query($sql);
				while($row=mysql_fetch_assoc($result) )
				{
					echo "<tr cellspacing=1>";
					echo "	<td>";
					echo "	<a href=''>".$row['MaSV']."</a>";
					echo "	</td>";
					echo "	<td>";
					echo 		$row['MaLop'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['Ho'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['Ten'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['SoDT'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['QueQuan'];
					echo "	</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	<div class="buttonlist">
		<form action="#" method="post"id='sv'>
        <input type="submit" value="Thêm Sinh Viên" name="themsv" />
        <input type="submit" value="Sửa Sinh Viên" name="suasv" />
        <input type="submit" value="Xoá Sinh Viên" name="xoasv" />
        <br />
        <table>
        <tr>
        <td>Mã sinh viên:<input type="text" name="masv" required maxlength="20"></input><br></td>
		<td>Mã lớp
			<select name='malop' form='sv' required>
				<?php
					$result=mysql_query("select distinct MaLop from lop");
					echo "<option value='null'></option>";
					while($row=mysql_fetch_assoc($result))
					{
						echo "<option value=".$row['MaLop'].">".$row['MaLop']."</option>";
					}
				?>
			</select>
		</td>
        <td>Họ: <input type="text" name="ho" maxlength="10" /><br /></td>
        <td>Tên: <input type="text" name="ten" maxlength="20" /><br /></td>
        <td>Số Điện Thoại: <input type="text" name="sdt"  maxlength="20" /><br /></td>
        <td>Quê Quán: <input type="text" name="quequan"  maxlength="20" /><br /></td>
		</tr>
        </table>
        </form>
    </div>
    <?php
	// Nút thêm sv
	if(isset($_POST['themsv']))
{	
	$masv = $_POST['masv'];
	$malop=$_POST['malop'];
	$ho = $_POST['ho'];
	$ten = $_POST['ten'];
	$sodt = $_POST['sdt'];
	$quequan=$_POST['quequan'];
	$sql="insert into sinh_vien(MaSv,MaLop,Ho,Ten,Sodt,QueQuan) values ('$masv','$malop','$ho','$ten','$sodt','$quequan')";
	if(!mysql_query($sql)) die ("Lỗi : không thêm sinh viên được");
	echo "Đã thêm sinh viên mới <br>";
	$URL="index.php?page=qlsv&user=$user";
	header("location:$URL");
	
}
	// Cấu hình nút xóa sinh viên
	if(isset($_POST['xoasv'])){
	$masv = $_POST['masv'];
	$malop=$_POST['malop'];
	$sql="delete from sinh_vien where MaSV='$masv'";
	if(!mysql_query($sql)) die("Lỗi, không xóa được");
	echo"Đã xóa";
	$URL="index.php?page=qlsv&user=$user";
	header("location:$URL");
	}
// Cấu hình nút sửa sinh viên
	if(isset($_POST['suasv']))
{
	$masv = $_POST['masv'];
	$malop=$_POST['malop'];
	$ho = $_POST['ho'];
	$ten = $_POST['ten'];
	$sodt = $_POST['sdt'];
	$quequan=$_POST['quequan'];
	$sql="update sinh_vien set Ho='$ho', Ten='$ten', MaLop='$malop', Sodt='$sodt', QueQuan='$quequan' where MaSV='$masv'";
	if(!mysql_query($sql)) 
		die ("Không update được");
	echo"Đã update";
	$URL="index.php?page=qlsv&user=$user";
	header("location:$URL");
}

	?>

	</div>
