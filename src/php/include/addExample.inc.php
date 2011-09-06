<?php
$myExample= new Example();

// collect data if sent
if(isset($_POST['eloSaved']) && $_POST['eloSaved']=="1")
{
	// moving to mysql approach
	
	echo "<hr> Saving Example's posted data";

	//var_dump($_POST);
	print_r($_REQUEST);
	
	// add data to example object 
//		$myExample->addMetadata();
	
	//$myExample->save($elo_name, $elo_type_id, $content_type, $content_text, $media_path, $thumb_path, $username, $run_id);
	$myExample->save();
	
} // end elo collect data



// be sure that we know what entity is this ELO being attached to ...

// add the first shape of the ELO
	
?>
<?php 
// adding jquery event listeners
?>
<script>
    $("#example_type").change(function () {
          var str = "";
          $("select option:selected").each(function () {
                str += $(this).text() + " ";
              });
          $("#log").text(str);
        })
        .change();
</script>

<div id="log"></div>

<script type="text/javascript" src="include/ajaxfileuploader/uploader.js" ></script>
<h2>Add Example</h2>
<div id="home-columns">
	<div id="home-col1" style="float:left;">
		
		<div class="dashlet-box-simple">
			<div>
				<span class="item-label">Name: </span>
				<span class="item-input"><input type="text" name="name"/></span> 
			</div>
			<div>
				<span class="item-label">Type: </span>
				<span class="item-input">
				<?php 
				echo PlaceWeb::arrayToHtmlSelect($PLACEWEB_CONFIG['nodeTypes'],"", "example_type");
				?>
				</span> 
			</div>
		</div>
		
		<div class="dashlet-box-image">
			<div id="media_content"></div>
			<textarea rows="10" cols="10" name="html_content" id="html_content">
				<?php //<div><img id="eloimg" src="images/test.jpg" width="320px" height="240px" alt="image title" title="image title"></div>
				?>
			</textarea>
		</div>
		
		<div class="dashlet-box-simple" style="float:left;">
			<div class="dashlet-title">Upload File</div>
			<div id="traceUpload"></div>
				<?php
					$uploaderURL = "include/ajaxfileuploader/";
					//$uploaderURL = "";
					//$uploadDirectory="/var/www/mywebaps/PLACE.web/include/ajaxfileuploader/uploads";
					
					$uploadDirectory=$PLACEWEB_CONFIG['uploadDir'];
					
					require_once("include/ajaxfileuploader/AjaxFileUploader.inc.php");
					$ajaxFileUploader = new AjaxFileuploader($uploadDirectory);	
					echo $ajaxFileUploader->showFileUploader('id1',$uploaderURL);
					///ImageManager::generateThumb($PLACEWEB_CONFIG['uploadDir'], "001.png")
					// show files available in upload directory
					/*
					$myFiles = array();
					$myFiles = $ajaxFileUploader->getAllUploadedFiles(); 
					foreach ($myFiles as $fName)
					{
						echo $fName.'<br/>';
						
					}
					*/
				?>
		</div>
		
	</div><!-- /home-col1 -->

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=addExample" method="post" id="addExmple" name="addExmple">
	<div id="home-col2" style="float:left;">
col2
	</div><!-- /home-col2 -->
	
	<div id="home-col3" style="float:left;">
		<div class="dashlet-box-simple">
			<div class="dashlet-title">Tags</div>
			<div>
			<?php 
			echo PlaceWeb::arrayToHtmlCheckBoxList($PLACEWEB_CONFIG['fConcepts'], "concept_id_");
			?>
			</div>
		</div>
	</div><!-- /home-col3 -->
	
	<div class="clear"></div>
	
	<!-- second line container -->
	<div>
		<div class="dashlet-box-simple" style="float:left;">
			<div class="dashlet-title">Content</div>
			<div>
				<textarea rows="10" cols="10" name="post_text" id="post_text"></textarea>
				<div style="text-align:center; margin-top:25px;">
					<input type="submit" value="Add Node"> <input type="reset" value="Cancel">
				</div>   
			</div>
		</div>
	</div>
	<!-- /second line container -->
	
	<!-- some hidden fields, this may be placed here of in $_SESSION array -->

	<input type="text" id="media_path" name="media_path" value=""/>
	<input type="text" id="thumb_path" name="thumb_path" value=""/>
	<input type="hidden" id="eloSaved" name="eloSaved" value="1"/>
<br/>
<br/>


</form>		
</div>