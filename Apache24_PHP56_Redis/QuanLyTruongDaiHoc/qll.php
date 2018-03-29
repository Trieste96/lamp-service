<title>Quản lý lớp</title>
	<div class="line">
		<div class="title">
			<p>Quản lý lớp</p>
		</div>
	</div>
	<div class="table">
		<table cellpadding=5 border=1  cellspacing=5>
			<tr cellspacing=1>
				<th color=blue>
					Mã lớp
				</th>
				<th>
					Mã GV
				</th>
				<th>
					Họ tên GV
				</th>
			</tr>
			<?php
				$sql="select MaLop, l.MaGV as MaGV, concat(Ho,' ',Ten) as HoTenGV from lop l left join giang_vien gv on (l.MaGV=gv.MaGV) order by MaLop asc";
				$result = mysqli_query($checkconnect,$sql);
				while($row=mysql_fetch_assoc($result) )
				{
					echo "<tr cellspacing=1>";
					echo "	<td>";
					echo "	<a href=''>".$row['MaLop']."</a>";
					echo "	</td>";
					echo "	<td>";
					echo 		$row['MaGV'];
					echo "	</td>";
					echo "	<td>";
					echo 		$row['HoTenGV'];
					echo "	</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	<div class="buttonlist">
		<form action="#" method="post" id='lop'>
        <input type="submit" value="Thêm Lớp" name="themlop" />
        <input type="submit" value="Xoá Lớp" name="xoalop" />
		<input type="submit" value="Sửa Lớp" name="sualop" />
        <br />
        <table>
        <tr>
        <td> Mã lớp: <input type="text" name="malop" require maxlength="20" /><br /></td>
		<td>Tên GV 
			<select name='magv' form='lop'>
				<?php
					$result=mysqli_query("select distinct MaGV, concat(Ho,' ',Ten) as HoTen from giang_vien");
					echo "<option value='null'></option>";
					while($row=mysql_fetch_assoc($result))
					{
						echo "<option value=".$row['MaGV'].">".$row['HoTen']."</option>";
					}
				?>
			</select>
		</td>
        </tr>
        </table>
        </form>
        <?php
        // Nút thêm lớp
	if(isset($_POST['themlop']))
{	
	$magv = $_POST['magv'];
	$malop = $_POST['malop'];
	$sql="insert into `lop`(`MaLop`,`MaGV`) values('$malop',$magv)";
	echo $kq=mysqli_query($sql);
	if(!$kq) die ("Lỗi : không thêm lớp được");
	echo "Đã thêm lớp mới <br>";
	$URL="index.php?page=qll&user=$user";
	header("location:$URL");
}
	// Cấu hình nút xóa lớp
	if(isset($_POST['xoalop'])){
	$magv = $_POST['magv'];
	$malop = $_POST['malop'];
	$set0="set foregin_key_checks=0";
	$sql="update sinh_vien set MaLop='null' where MaLop='$malop'";
	$sql1="delete from lop where MaLop='$malop'";
	$set1="set foregin_key_checks=1";
	mysqli_query($set0);
	mysqli_query($sql);
	mysqli_query($sql1);
	mysqli_query($set1);
	if(!mysqli_query($sql1)) 
		die ("Không xoá được");
	echo"Đã xoá";
	$URL="index.php?page=qll&user=$user";
	header("location:$URL");
	}
// Cấu hình nút sửa lớp
	if(isset($_POST['sualop']))
{
	$magv = $_POST['magv'];
	$malop=$_POST['malop'];
	$set0="set foregin_key_checks=0";
	$sql="update lop set MaLop='$malop', MaGV='$magv' where MaLop='$malop'";
	$set1="set foregin_key_checks=1";
	mysqli_query($set0);
	mysqli_query($sql);
	mysqli_query($set1);
	if(!mysqli_query($sql)) 
		die ("Không update được");
	echo"Đã update";
	$URL="index.php?page=qll&user=$user";
	header("location:$URL");
}
		
	?>

	</div>
