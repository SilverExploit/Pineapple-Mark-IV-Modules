<style type="text/css">
.input_text {border-radius:5px; padding:2px; color:green; width:200px; border:1px solid green; margin:none;}
</style>
<?php
$save_file = $_POST['save_file'];
if ($save_file != '') {
$myFile = "$save_file";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $_POST['content'];
fwrite($fh, $stringData);


fclose($fh);
}
?>
<?php $term = $_POST['term']; $term = str_replace("|", " |grep ", $term);$content= $_POST['content']; $content=str_replace("<","&lt;",$content);$open_file=$_POST['open_file'];?>
<html>
<body style="background-color:#000;color:#FFF;">
<form method="post" action="tedit.php">
<input class="input_text" type="text" name="save_file" value="<?php echo $open_file ; if ($open_file == '') { echo $save_file; } ?>" />
<input type="submit" name="Save" value="Save As"/>



<textarea name="content" style="width:98%; height:50%; background-color:#f7f7f7;border-radius:5px;"><?php $file=file("$open_file");
for ($i=0;$i<=count($file);$i++){echo str_replace("<","&lt;",$file[$i]);} if ($open_file==''){echo $content; } ?></textarea>
                                                                                                               
</form>                                                                                                                     
<form method="post" action="tedit.php">                                                                                     
<input class="input_text"  type="text" name="open_file"/>                                                                                       
<input type="submit" name="Open" value="Open"/>                                                                             
</form>                                                                                                                     
<form method="post" action="tedit.php">                                                                                     
<input class="input_text"  type="text" name="term"/>                                                                                            
<input type="submit" name="Search" value="Search"/>                                                                         
</form>                                                                                                                     
                                                                                                                            
<p>Found files:</p>                                                                                              
<?php if ($term != '' ) {echo system("find * |grep  $term |sed 's/^/<br \/>/g'"); } ?>                           
</body>                                                                                                          
</html>