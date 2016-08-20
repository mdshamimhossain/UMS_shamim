<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$stu_name=$_POST['sudenttxt'];
	$fa_name=$_POST['factxt'];
	$sub_name=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysqli_query($conn,"INSERT INTO stu_score_tbl 
						VALUES(
							NULL,
							'$stu_name',
							'$fa_name' ,
							'$sub_name',
							'$miderm',
							'$final',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$stu_id=$_POST['sudenttxt'];
	$faculties_id =$_POST['factxt'];
	$sub_id=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysqli_query($conn,"UPDATE stu_score_tbl SET
							stu_id='$stu_id' ,
							faculties_id='$faculties_id' ,
							sub_id='$sub_id' ,
							miderm='$miderm' ,	
							final='$final' ,
							note='$note' 
						WHERE ss_id=$id

					");
					
if($sql_update==true)
	header("location:?tag=view_scores");
else
	$msg="Update Fail!...";
	
	
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Bangladesh University of Business And Technology .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysqli_query($conn,"SELECT * FROM stu_score_tbl WHERE ss_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

	<div id="top_style">
        <div id="top_style_text">
      		Scores Update
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_scores"><input type="button" name="btn_view" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
        	<tr>
            	<td>Students's Name</td>
            	<td>
                	<select name="sudenttxt" id="textbox">
                    	<option>---- Students's Name -----</option>
                            <?php
                          		$student_name=mysql_query($conn,"SELECT * FROM stu_tbl");
								while($row=mysql_fetch_array($student_name)){
									 if($row['stu_id']==$rs_upd['stu_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['stu_id'];?>" <?php echo $iselect ;?> > <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Facuties's Name</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- Facuries's Name   ------</option>
                            <?php
                               $fac_name=mysqli_query($conn,"SELECT * FROM facuties_tbl");
							   while($row=mysqli_fetch_array($fac_name)){
								    if($row['faculties_id']==$rs_upd['faculties_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['faculties_id'];?>" <?php echo $iselect ;?> > <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Subjects's Name</td>
            	<td>
                	<select name="subjecttxt" id="textbox">
                    	<option>------------ Sujects -----------</option>
                            <?php
                               $subject=mysql_query($conn,"SELECT * FROM sub_tbl");
							   while($row=mysql_fetch_array($subject)){
								   if($row['sub_id']==$rs_upd['sub_id'])
								   		$iselect="selected";
									else
										$iselect="";
							?>
                            <option value="<?php echo $row['sub_id'];?>" <?php echo $iselect ;?> > <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Miderm</td>
            	<td>
                	<input type="text" name="midermtxt" id="textbox" value="<?php echo $rs_upd['miderm'];?> "/>
                </td>
            </tr>
            
            <tr>
            	<td>Final</td>
                <td>
                	<input type="text" name="finaltxt"  id="textbox" value="<?php echo $rs_upd['final'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in" title="Update"  />
                </td>
            </tr>
		</table>

   </div>
    </form>

</div><!-- end of style_informatios -->
<?php	
}
else
{
?>
	
    <div id="top_style">
        <div id="top_style_text">
      		Scores Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_scores"><input type="button" name="btn_view" value="View_Scores" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="5" cellspacing="0">
        	<tr>
            	<td>Students's Name</td>
            	<td>
                	<select name="sudenttxt" id="textbox">
                    	<option>---- Students's Name -----</option>
                            <?php
                          		$student_name=mysqli_query($conn,"SELECT * FROM stu_tbl");
								while($row=mysqli_fetch_array($student_name)){
								?>
                                <option value="<?php echo $row['stu_id'];?>"> <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
								<?php	
								}
                            ?>
                            
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Facuties's Name</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- Facuries's Name   ------</option>
                            <?php
                               $fac_name=mysqli_query($conn,"SELECT * FROM facuties_tbl");
							   while($row=mysqli_fetch_array($fac_name)){
								?>
                        		<option value="<?php echo $row['faculties_id'];?>"> <?php echo $row['faculties_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Subjects's Name</td>
            	<td>
                	<select name="subjecttxt" id="textbox">
                    	<option>------------ Sujects -----------</option>
                            <?php
                               $subject=mysqli_query("SELECT * FROM sub_tbl");
							   while($row=mysqli_fetch_array($subject)){
							?>
                            <option value="<?php echo $row['sub_id'];?>"> <?php echo $row['sub_name'];?> </option>
                            <?php	   
							   }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Miderm</td>
            	<td>
                	<input type="text" name="midermtxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Final</td>
                <td>
                	<input type="text" name="finaltxt"  id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="3"></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
                </td>
            </tr>
		</table>

   </div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>