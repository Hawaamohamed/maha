<?php
include("session.php");
$query=mysqli_query("select * from setting");
$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>my page</title>
		<link rel="stylesheet" href="css.css">
	</head>
	<body>
		<div class="head_block"> <h1>اعدادات الموقع</h1> </div>
		<div class="body_block">
		<?php
			if($_POST['seve_s'])
			{
				$post_name=$_POST['name'];
				$post_link=$_POST['link'];
				$post_mess=$_POST['mess'];
				$post_descr=$_POST['descr'];
				$post_keywo=$_POST['keywo'];
				$post_activ=$_POST['activ'];
				if($post_name!=" ")
				{
					$update=mysqli_query("update setting set 'name'='$post_name' , 'link'='$post_link' , 'active'='$post_activ' , 'massage'='$post_mess' , 'description'='$post_descr' , 'keyword'='$post_keywo' where id=1");
					if($update)
					{
						echo "<div class='ok_send'>تم عملية الحفظ بنجاح</div>";
						echo '<meta http-equiv="refresh" content="1;url=setting.php"/>';
						exit;
					}
				}
			}
		?>
			<form method="post" action="">
				<table border="0" align="center">
					<tr>
						<td>اسم الموقع</td>
						<td><input type="text" name="name" value="<?php  echo $row['name'] ?>"></td>
					</tr>
					
					<tr>
						<td>عنوان الموقع</td>
						<td><input type="text" name="link" value="<?php  echo $row['link'] ?>"></td>
					</tr>
					
					<tr>
						<td>حالة الموقع</td>
						<td><select name="activ">
							<?php
								if($row['active']==1)
								{
									echo' 
								            	<option value="1">يعمل</option>
							                    <option value="2">مغلق</option>
									';
								}
								else
								{
									echo' 
									            <option value="2">مغلق</option>
								            	<option value="1">يعمل</option>
									';
									
								}
							?>
						</select></td>
					</tr>
					
					<tr>
						<td>رسالة الاغلاق</td>
						<td><textarea name="mess" cols="30" rows="5">
							<?php
								echo $row['massage'];
							?>
						</textarea></td>
					</tr>
					
					<tr>
						<td>وصف الموقع</td>
						<td><textarea name="descr" cols="30" rows="5">
							<?php
								echo $row['description'];
							?>
						</textarea></td>
					</tr>
					
					<tr>
						<td>مفتاح الموقع</td>
						<td><textarea name="keywor" cols="30" rows="5">
							<?php
								echo $row['keyword'];
							?>
						</textarea></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" name="seve_s" value="حفظ التعديل"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>