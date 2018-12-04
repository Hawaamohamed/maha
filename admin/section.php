<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>اقسام الموقع</title>
		<link rel="stylesheet" href="css.css">
	</head>
	<body>
		<div class="head_block"> <h1>اقسام الموقع</h1> </div>
		<div class="body_block">
		<div class="add"><h3><a href="?action=add">اضافة قسم</a></h3></div>
		<?php
		    if($_POST['ok_add'])
			{
				$post_name=$_POST['name'];
				$post_arra=$_POST['arra'];
				$post_link=$_POST['link'];
				if($post_name!=' ' || $post_link!=' ')
				{
					$insert=mysql_query("insert into section ('name' , 'link' , 'arrange') values('$post_name' , '$post_link' , '$post_arra')");
					if($insert)
					{
						echo "<div class='ok_send'>تم عملية الحفظ بنجاح</div>";
						echo '<meta http-equiv="refresh" content="1;url=section.php"/>';
						exit;
					}
				}
				else
				{
					echo '<div class="err">رجاء ادخال جميع الحقول</div>';
				}
			}
			if($_REQUEST['action']=='add')
			{
				echo '
				<form method="post" action="">
			    <table border="0" align="center">
				<tr>
					<td>اسم القسم</td>
					<td><input type="text" name="name"></td>
				</tr>
				
				<tr>
					<td>ترتيب</td>
					<td><input type="text" name="arra"></td>
				</tr>
				
				<tr>
					<td>صفحة القسم</td>
					<td><input type="text" name="link"></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" name="ok_add" value="حفظ البيانات"></td>
				</tr>
			   </table>
		    </form>
				';
			}
		?>
		
			<table border="0" align="center" width="90%">
				<tr>
					<th>رقم</th>
					<th>الاسم</th>
					<th>ترتيب</th>
					<th>تعديل</th>
					<th>حذف</th>
				</tr>
				<?
					$query_sec=mysql_query("select * from section");
					while($row=mysql_fetch_array($query_sec))
					{
						echo '
						<tr>
						<td>'.$row['id'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['arrange'].'</td>
						<td>تعديل</td>
						<td>حذف</td>
						</tr>
						';
					}
				?>
			</table>
		</div>
	</body>
</html>