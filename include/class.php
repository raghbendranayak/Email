<?php  
/**
 * Travel
 * @package		Dashboard index 
 * @author		SIPL Dev Team (Devendra Jain)
 * @Modify by 	
 */
?>

<?php
class Travel
{
	function insert($title,$category_description,$content,$created_date,$path)
	{
			 $sql= "insert into tbl_category(category_name,category_description,category_content,created_date,category_image) values('".$title."','".$category_description."','".$content."','".date('Y-m-d')."','".$path."')";
			
			 $rs=mysql_query($sql);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	
	/*function insertPage($title,$category_id,$content,$page_image)
	{
			 $sql= "insert into tbl_pages(category_id,page_title,page_content,created_date,page_image) values('".$title."','".$category."','".$content."','".date('Y-m-d')."','".$page_image."')";
			
			 $rs=mysql_query($sql);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	*/
	function select_category($tbl_name)
	{
			$sql= "select * from ".$tbl_name."";
			if(!$rs = mysql_query($sql))
			{
				die('Error in'.$tbl_name.' '.mysql_error());
			}
			
			return $rs;
		
	}
		function category_status($category_id,$is_active)
	{
	  if($is_active == '1')
	  {
		  $sql="update tbl_category set is_active='0' where category_id='".$category_id."'"; 
		  if(!mysql_query($sql))
		  {
		 	die('Error in Updating category List:'.mysql_error());
		  }
	  }
	  else
	  {
		  $sql="update tbl_category set is_active='1' where category_id='".$category_id."'"; 
		  if(!mysql_query($sql))
		  {
		 	die('Error in Updating category List:'.mysql_error());
		  }
	  }
	  
	}
	
				###########################################Delete Catagory with pages Start(H)############################################
		function delete_category($category_id,$table_name)
	{
		$querySelectPage="select * from tbl_pages where category_id='".$category_id."'";
		
		if(!$dataSet=mysql_query($querySelectPage))
		{
			die('Error:'.mysql_error());
		}
		if(mysql_num_rows($dataSet))
		{  
			$message="Please First Delete The pages of This Catagory";
		    return $message;
		}
		
		
        $query = "delete from ".$table_name." where category_id = '".$category_id."'";
		//echo $query; exit();
		$rs = mysql_query($query) or die(mysql_error());
	}
		

	
	
	function delete_page($id)
	{
		$queryDeletePages="delete from tbl_pages where page_id='$id'";
		if(!$deleteDataset=mysql_query($queryDeletePages))
		{
		  die('Error in deletion of pages'.mysql_error());
		}

	}
	
	
	
	#########################################################Delete Catagory with pages End####################################################################################
	
	
	function editPage($page_id,$table_name)
	{
		$queryEditPage="SELECT * from ".$table_name." where page_id = '".$page_id."'"; 
		if(!$dataSetEdit =mysql_query($queryEditPage))
		{
		  die('Error in Edit page:'.mysql_error());
		}
		$recordSet=mysql_fetch_array($dataSetEdit);
		return($recordSet);
		
	}
	
	function updatePage($title,$page_description,$content,$adult_price,$child_price,$catagoryId,$pageId,$image)
	{
	  $queryUpdatePage="update tbl_pages set page_title='$title',page_description='$page_description',page_content='$content',adult_price='$adult_price',child_price='$child_price',category_id='$catagoryId',page_image='$image' where page_id='$pageId'";
	if(!mysql_query($queryUpdatePage))
	 {
	  die('Error in updation of tbl_pages:'.mysql_error());
	 }
		return "succes";
	}
	

	function select_edit($category_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where category_id = '".$category_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['category_id'];
		return($row);
		}
		
	}
	function update_category($category_name,$category_description,$category_content,$category_id,$category_image)
	{
		$sql="update tbl_category set category_name='$category_name',category_description='$category_description',category_content='$category_content',category_image='$category_image' where category_id='".$category_id."'";
		$rs = mysql_query($sql);
	}
	
	
	
	
	
	############################################################Functions for Create Page start(H)#############################################################################
												
	function insertPageInfo($category_id,$title,$page_description,$content,$adult_price,$child_price,$created_date,$page_images)
	{
			 $createdDate=date('Y-m-d');
			 $queryInsertPageInfo= "insert into tbl_pages(category_id,page_title,page_description,page_content,adult_price,child_price,created_date,	page_image)values('$category_id','$title','$page_description','$content','$adult_price','$child_price','$createdDate','$page_images')";
			
			 if(!mysql_query($queryInsertPageInfo))
			 {
				die('Error In page Creation');
			 }
			
			 return mysql_insert_id();
		
	}
	############################################################Functions for Create Page End##################################################################################
	
	
	
	
	
	
	##################################################Function for display catagory with pages Start(H)########################################################################
	function showCatagaresWithPages()
	{
		$queryShowRecords="SELECT  tbl_category.category_name,count(tbl_pages.page_title),tbl_pages.page_id,tbl_pages.category_id,tbl_pages.created_date FROM `tbl_category` INNER JOIN `tbl_pages` on tbl_pages.category_id = tbl_category.category_id group by tbl_pages.category_id" ;  
		
		//$queryShowRecords="SELECT  tbl_category.category_name,tbl_pages.page_title ,tbl_pages.page_id,tbl_pages.created_date FROM `tbl_category` INNER JOIN `tbl_pages` on tbl_pages.category_id = tbl_category.category_id" ;  
		if(!$dataset=mysql_query($queryShowRecords))
		{
			die('Error'.mysql_error);
		}
		return $dataset;
	}
	
	##################################################Function for display catagory with pages End############################################################################
	
	
	
	
	
	##################################################Function for display Page Titles start(H)##############################################################################
	function showPageTites($id)
	{ 
		 $queryPagesTitle = "SELECT * FROM tbl_pages where category_id =".$id;
		 if(!$dataPagesTitle= mysql_query($queryPagesTitle))
		 {
			
			die('Error on selection of Pages:'.mysql_error());
		 }
		return 	$dataPagesTitle;
	
	}
	##################################################Function for display Page Titles End#################################################################################
	
	
	
	
	
	
	##################################################Function for display PageInformation start(H)#######################################################################
	function showPageInfo($id)
	{
	 //echo "dsfsdfs".$id;
		 $queryPagesInfo = "SELECT * FROM tbl_pages where page_id =".$id;
		 if(!$dataPagesInfo= mysql_query($queryPagesInfo))
		 {
			
			die('Error on selection of Pages:'.mysql_error());
		 }
		return 	$dataPagesInfo;
	
	}
	##################################################Function for display PageInformation End#########################################################################
	
	
	
	
	
	
	
	
	##################################################Function for display Catagory Information start(H)###############################################################
	function showCatagoryDescription($id)
	{
	 //echo "dsfsdfs".$id;
		 $queryPagesInfo = "SELECT * FROM  tbl_category where category_id =".$id;
		 if(!$dataPagesInfo= mysql_query($queryPagesInfo))
		 {
			
			die('Error on selection of Pages:'.mysql_error());
		 }
		return 	$dataPagesInfo;
	
	}
	##################################################Function for display PageInformation End#########################################################################
	
	
	
	
	
	
	##########################################******Functions for Create News****###############################
	
	function insertNews($news_title,$news_content,$created_date)
	  {
			 $query = "insert into tbl_news(news_title,news_content,created_date)values('".$news_title."','".$news_content."','".date('Y-m-d')."')";
			
			 $rs=mysql_query($query);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	
	function delete_news($news_id,$table_name)
	{
		$query="delete from ".$table_name." where news_id = '".$news_id."'";
		$sql=mysql_query($query); 	
	}
	function editNews($news_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where news_id = '".$news_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['news_id'];
		return($row);
		}	
	}
	function update_news($news_title,$news_content,$news_id)
	{
		$sql="update tbl_news set news_title='$news_title',news_content='$news_content' where news_id='".$news_id."'"; 
		$rs = mysql_query($sql);
	}
	####################################****END*****##############################
	
	####################################***Function for How to Book*****##############################
		function insertBook($book_content,$created_date)
	  {
			 $query = "insert into tbl_book(book_content,created_date)values('".$book_content."','".date('Y-m-d')."')";			
			 $rs=mysql_query($query);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	function editBook($book_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where book_id = '".$book_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['book_id'];
		return($row);
		}	
	}
	function update_book($book_content,$book_id)
	{
	    $sql_book="update tbl_book set book_content='$book_content' where book_id='".$book_id."'";
		$rs = mysql_query($sql_book);
	}
	
		####################################****END*****##############################
		
		####################################***Function for My Excursions*****##############################
		function insertExcursions($excursions_content,$created_date)
	  {
			 $query = "insert into tbl_excursions(excursions_content,created_date)values('".$excursions_content."','".date('Y-m-d')."')";			
			 $rs=mysql_query($query);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	function editExcursions($excursions_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where excursions_id = '".$excursions_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['excursions_id'];
		return($row);
		}	
	}
	function updateExcursions($excursions_content,$excursions_id)
	{
	    $sql_excursions="update tbl_excursions set excursions_content='$excursions_content' where excursions_id='".$excursions_id."'";
		$rs = mysql_query($sql_excursions);
	}
	
####################################****END*****##############################

####################################***Function for AboutUs*****##############################
		function insertAboutus($aboutus_content,$created_date)
	  {
			 $query = "insert into tbl_aboutus(aboutus_content,created_date)values('".$aboutus_content."','".date('Y-m-d')."')";			
			 $rs=mysql_query($query);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	function editAboutus($aboutus_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where aboutus_id = '".$aboutus_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['aboutus_id'];
		return($row);
		}	
	}
	function updateAboutus($aboutus_content,$aboutus_id)
	{
	    $sql_aboutus="update tbl_aboutus set aboutus_content='$aboutus_content' where aboutus_id='".$aboutus_id."'";
		$rs = mysql_query($sql_aboutus);
	}
	
####################################****END*****##############################


####################################***Function for Terms and Conditions*****##############################
		function insertTerms($terms_content,$created_date)
	  {
			 $query = "insert into tbl_terms(terms_content,created_date)values('".$terms_content."','".date('Y-m-d')."')";			
			 $rs=mysql_query($query);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	function editTerms($terms_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where terms_id = '".$terms_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['terms_id'];
		return($row);
		}	
	}
	function updateTerms($terms_content,$terms_id)
	{
	    $sql_terms="update tbl_terms set terms_content='$terms_content' where terms_id='".$terms_id."'";
		$rs = mysql_query($sql_terms);
	}
	
####################################****END*****##############################

		
##########################################******Functions for Create Articles****###############################
	
	function insertArticle($article_title,$article_content,$created_date)
	  {
			 $query = "insert into tbl_article(article_title,article_content,created_date)values('".$article_title."','".$article_content."','".date('Y-m-d')."')";
			
			 $rs=mysql_query($query);
			 if($rs)
			 {
				return $rs;
			 }
			 else
			 {
				return 0;
			 } 
	}
	
	function delete_article($article_id,$table_name)
	{
		$query="delete from ".$table_name." where article_id = '".$article_id."'";
		$sql=mysql_query($query); 	
	}
	function editArticle($article_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where article_id = '".$article_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['article_id'];
		return($row);
		}	
	}
	function update_article($article_title,$article_content,$article_id)
	{
		$sql="update tbl_article set article_title='$article_title',article_content='$article_content' where article_id='".$article_id."'"; 
		$rs = mysql_query($sql);
	}
####################################****END*****##############################

	
	
	function showPagesTitles()
	{
		$selectPages ="select  * from  tbl_pages";
		if(!$dataSet=mysql_query($selectPages))
		{
			die("Errorin in showPagesTitles:".mysql_error());
		}
	return $dataSet;
	}
	
   /*view package titles*/
	function showPackagesTitles()
	{
		$selectPackage ="SELECT  packages_id,packages_title FROM tbl_packages";
		if(!$dataSet=mysql_query($selectPackage))
		{
			die("Errorin in showPackagesTitles:".mysql_error());
		}
	return $dataSet;
	}
	
	/*view advanture titles*/
	function showAdvantureTitles()
	{
		$selectAdvanture ="SELECT  adventure_id,adventure_title FROM tbl_adventure";
		if(!$dataSet=mysql_query($selectAdvanture))
		{
			die("Errorin in showPagesTitles:".mysql_error());
		}
	return $dataSet;
	}
	
		/*view relaxection descrition*/
	function showRelaxTitles()
	{
		$selectAdvanture ="SELECT  relaxation_id,relaxation_title FROM tbl_relaxation";
		if(!$dataSet=mysql_query($selectAdvanture))
		{
			die("Errorin in showPagesTitles:".mysql_error());
		}
	return $dataSet;
	}
	
	/*view hotel titles*/
	function showHotelTitle()
	{
		$selectAdvanture ="SELECT  hotels_id ,hotels_title FROM tbl_hotels";
		if(!$dataSet=mysql_query($selectAdvanture))
		{
			die("Errorin in showHotelTitles:".mysql_error());
		}
	return $dataSet;
	}
	
		/*view Luxor titles*/
	function showLuxorTitle()
	{
		$selectLuxor ="SELECT  luxor_id ,luxor_title FROM tbl_luxor";
		if(!$dataSet=mysql_query($selectLuxor))
		{
			die("Errorin in showLuxorTitles:".mysql_error());
		}
	return $dataSet;
	}
	
		/*view Popular titles*/
	function showPopularTitles()
	{
		$selectPopular ="SELECT  popular_id,popular_title FROM tbl_popular";
		if(!$dataSet=mysql_query($selectPopular))
		{
			die("Errorin in showPopularTitles:".mysql_error());
		}
	return $dataSet;
	}
	
		/*view Cairo titles*/
	function showCairoTitles()
	{
		$selectCairo ="SELECT  cairo_id ,cairo_title FROM tbl_cairo";
		if(!$dataSet=mysql_query($selectCairo))
		{
			die("Errorin in showCairoTitles:".mysql_error());
		}
	return $dataSet;
	}

	function insertGallery($galleryName)
	{
		$queryCheckGallery="select *from tbl_gallery";
		if(!$dataSetcheck=mysql_query($queryCheckGallery))
		{
			die('Error:'.mysql_error());
		}
		
		while($resultCheck=mysql_fetch_array($dataSetcheck))
		{
			if(strcmp($resultCheck['gallery_name'],$galleryName)==0 )
			{  
				return "Gallery already exist";
			}
		}	
	
	     $insertGallery = "insert into tbl_gallery(gallery_name,created_date)values('".$galleryName."','".date('Y-m-d')."')";
		 if(!mysql_query($insertGallery))
		 {
		 	die('Error in insertion in Gallery:'.mysql_error());
		 }
		 //return mysql_insert_id();
	}
 	
		
	function showGallery()
	{
	  $querySelect="select *from  tbl_gallery";
	  if(!$galleryResult=mysql_query($querySelect))
	  {
	     die('Error in gallery:'.mysql_error());
	  }
	  return $galleryResult;
	}
	
	####################################**** Review Function *****##############################
	
	function insert_review($review)
	{
	      $insertReview = "insert into tbl_review(page_id,username,from_city, email,review,star_rating,add_info,created_date,status)values('".$review['r_page']."','".$review['r_name']."','".$review['r_from']."','".$review['r_email']."','".$review['review']."','".$review['rating']."','".$review['add_info']."','".$review['r_date']."','0')";
		 if(!mysql_query( $insertReview))
		 {
		 	die('Error in insertion in Review:'.mysql_error());
		 }
		 return true;
	}
	
	function select_review($review_id)
	{
	  $querySelect="select * from  tbl_review where review_id='".$review_id."'";
	  if(!$review=mysql_query($querySelect))
	  {
	     die('Error in review:'.mysql_error());
	  }
	  return $review;
	}
	
	function review_status($review_id,$status)
	{
	  if($status==1)
	  {
		   $sql="update tbl_review set status='0' where review_id='".$review_id."'"; 
	
		  if(!mysql_query($sql))
		  {
		 	die('Error in Updating Review List:'.mysql_error());
		  }
	  }
	  else
	  {
		  $sql="update tbl_review set status='1' where review_id='".$review_id."'"; 
		  if(!mysql_query($sql))
		  {
		 	die('Error in Updating Review List:'.mysql_error());
		  }
	  }
	  
	}
	
	function delete_review($review_id)
	{
		$query="delete from ".tbl_review." where review_id = '".$review_id."'";
		 if(!mysql_query($query))
		 {
		 	die('Error in Updating Review List:'.mysql_error());
		 }	
	}
	
	function update_review($review)
	{  
		$query = "update tbl_review set page_id='".$review['r_page']."',username='".$review['r_name']."',from_city='".$review['r_from']."',email='".$review['r_email']."',review='".$review['review']."',star_rating='".$review['rating']."',add_info='".$review['add_info']."' where review_id='".$review['review_id']."'"; 
		 if(!mysql_query($query))
		 {
		 	die('Error in Updating Review List:'.mysql_error());
		 }
		 return true;
	}
	####################################****  End *****##############################
	
	
	####################################**** Functions for Packages *****##############################
	function insertPackages($packages_title,$packages_description,$adult_price,$child_price,$packages_content,$created_date,$path){
			$sql= "insert into tbl_packages(packages_title,packages_description,adult_price,child_price,packages_content,created_date,packages_image) values('".$packages_title."','".$packages_description."','".$adult_price."','".$child_price."','".$packages_content."','".date('Y-m-d')."','".$path."')"; 
			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editPackages($packages_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where packages_id = '".$packages_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['packages_id'];
		return($row);
		}	
	}
   
   	function updatePackages($packages_title,$packages_description,$adult_price,$child_price,$packages_content,$packages_id,$packages_image)
	{
		$sql="update tbl_packages set packages_title='$packages_title',packages_description='$packages_description',adult_price='$adult_price',child_price='$child_price',packages_content='$packages_content',packages_image='$packages_image' where packages_id='".$packages_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End Packages*****##############################	
	
	####################################**** Functions for Adventure *****##############################
	function insertAdventure($adventure_title,$adventure_description,$adult_price,$child_price,$adventure_content,$created_date,$path){
			 $sql= "insert into tbl_adventure(adventure_title,adventure_description,adult_price,child_price,adventure_content,created_date,adventure_image) values('".$adventure_title."','".$adventure_description."','".$adult_price."','".$child_price."','".$adventure_content."','".date('Y-m-d')."','".$path."')";
			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editAdventure($adventure_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where adventure_id = '".$adventure_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['adventure_id'];
		return($row);
		}	
	}
   
   	function updateAdventure($adventure_title,$adventure_description,$adult_price,$child_price,$adventure_content,$adventure_id,$adventure_image)
	{
		$sql="update tbl_adventure set adventure_title='$adventure_title',adventure_description='$adventure_description',adult_price='$adult_price',child_price='$child_price',adventure_content='$adventure_content',adventure_image='$adventure_image' where adventure_id='".$adventure_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End Adventure*****##############################
	
	
	####################################**** Functions for FAQ *****##############################
/*	function insertAdventure($adventure_title,$adventure_description,$adult_price,$child_price,$adventure_content,$created_date,$path){
			 $sql= "insert into tbl_adventure(adventure_title,adventure_description,adult_price,child_price,adventure_content,created_date,adventure_image) values('".$adventure_title."','".$adventure_description."','".$adult_price."','".$child_price."','".$adventure_content."','".date('Y-m-d')."','".$path."')";
			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}*/
			
    function editFAQ($faq_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where faq_id = '".$faq_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['faq_id'];
		return($row);
		}	
	}
   
   	function updateFAQ($FAQ_id, $FAQ_answer)
	{
		$sql="update tbl_faq set faq_answer = '".$FAQ_answer."' WHERE faq_id = ".$FAQ_id; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End FAQ*****##############################
	
		####################################**** Functions for Relaxation *****##############################
	function insertRelaxation($relaxation_title,$relaxation_description,$adult_price,$child_price,$relaxation_content,$created_date,$path){
			 $sql= "insert into tbl_relaxation(relaxation_title,relaxation_description,adult_price,child_price,relaxation_content,created_date,relaxation_image) values('".$relaxation_title."','".$relaxation_description."','".$adult_price."','".$child_price."','".$relaxation_content."','".date('Y-m-d')."','".$path."')";
			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editRelaxation($relaxation_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where relaxation_id = '".$relaxation_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['relaxation_id'];
		return($row);
		}	
	}
   
   	function updateRelaxation($relaxation_title,$relaxation_description,$adult_price,$child_price,$relaxation_content,$relaxation_id,$relaxation_image)
	{
		$sql="update tbl_relaxation set relaxation_title='$relaxation_title',relaxation_description='$relaxation_description',adult_price='$adult_price',child_price='$child_price',relaxation_content='$relaxation_content',relaxation_image='$relaxation_image' where relaxation_id='".$relaxation_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End Relaxation*****##############################
	
	####################################**** Functions for Hotels *****##############################
	function insertHotels($hotels_title,$hotels_description,$adult_price,$child_price,$hotels_content,$created_date,$path){
			 $sql= "insert into tbl_hotels(hotels_title,hotels_description,adult_price,child_price,hotels_content,created_date,hotels_image) values('".$hotels_title."','".$hotels_description."','".$adult_price."','".$child_price."','".$hotels_content."','".date('Y-m-d')."','".$path."')";
			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editHotels($hotels_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where hotels_id = '".$hotels_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['hotels_id'];
		return($row);
		}	
	}
   
   	function updateHotels($hotels_title,$hotels_description,$adult_price,$child_price,$hotels_content,$hotels_id,$hotels_image)
	{
		$sql="update tbl_hotels set hotels_title='$hotels_title',hotels_description='$hotels_description',adult_price='$adult_price',child_price='$child_price',hotels_content='$hotels_content',hotels_image='$hotels_image' where hotels_id='".$hotels_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End Hotels*****##############################

	####################################**** Functions for Luxor Experience *****##############################
	function insertLuxor($luxor_title,$luxor_description,$adult_price,$child_price,$luxor_content,$created_date,$path){
			  $sql= "insert into tbl_luxor(luxor_title,luxor_description,adult_price,child_price,luxor_content,created_date,luxor_image) values('".$luxor_title."','".$luxor_description."','".$adult_price."','".$child_price."','".$luxor_content."','".date('Y-m-d')."','".$path."')";			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editLuxor($luxor_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where luxor_id = '".$luxor_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['luxor_id'];
		return($row);
		}	
	}
   
   	function updateLuxor($luxor_title,$luxor_description,$adult_price,$child_price,$luxor_content,$luxor_id,$luxor_image)
	{
		$sql="update tbl_luxor set luxor_title='$luxor_title',luxor_description='$luxor_description',adult_price='$adult_price',child_price='$child_price',luxor_content='$luxor_content',luxor_image='$luxor_image' where luxor_id='".$luxor_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End luxor*****##############################
	
	
####################################**** Functions for Popular Tour *****##############################
	function insertPopular($popular_title,$popular_description,$adult_price,$child_price,$popular_content,$created_date,$path){
			  $sql= "insert into tbl_popular(popular_title,popular_description,adult_price,child_price,popular_content,created_date,popular_image) values('".$popular_title."','".$popular_description."','".$adult_price."','".$child_price."','".$popular_content."','".date('Y-m-d')."','".$path."')";			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editPopular($popular_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where popular_id = '".$popular_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['popular_id'];
		return($row);
		}	
	}
   
   	function updatePopular($popular_title,$popular_description,$adult_price,$child_price,$popular_content,$popular_id,$popular_image)
	{
		$sql="update tbl_popular set popular_title='$popular_title',popular_description='$popular_description',adult_price='$adult_price',child_price='$child_price',popular_content='$popular_content',popular_image='$popular_image' where popular_id='".$popular_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End popular*****##############################
	
	
	####################################**** Functions for Cairo Experience *****##############################
	function insertCairo($cairo_title,$cairo_description,$adult_price,$child_price,$cairo_content,$created_date,$path){
			  $sql= "insert into tbl_cairo(cairo_title,cairo_description,adult_price,child_price,cairo_content,created_date,cairo_image) values('".$cairo_title."','".$cairo_description."','".$adult_price."','".$child_price."','".$cairo_content."','".date('Y-m-d')."','".$path."')";			
			 $rs=mysql_query($sql);
			 if($rs){
				return $rs;
			 }
			 else{
				return 0;
			 } 
			}
			
    function editCairo($cairo_id,$table_name)
	{
		$query="SELECT * from ".$table_name." where cairo_id = '".$cairo_id."'"; 
		$sql=mysql_query($query); 
		
		if($sql)
		{
		$row= mysql_fetch_array($sql);
		$id1=$row['cairo_id'];
		return($row);
		}	
	}
   
   	function updateCairo($cairo_title,$cairo_description,$adult_price,$child_price,$cairo_content,$cairo_id,$cairo_image)
	{
		$sql="update tbl_cairo set cairo_title='$cairo_title',cairo_description='$cairo_description',adult_price='$adult_price',child_price='$child_price',cairo_content='$cairo_content',cairo_image='$cairo_image' where cairo_id='".$cairo_id."'"; 
		$rs = mysql_query($sql);
	}
	
	####################################**** End cairo*****##############################

		
	####################################**** Image Upload into the database for Gallery *****##############################
	function uploadFilesIntoDatabase($id,$fileName)
	{ 
	  
	  $queryInsertFile="insert into tbl_image(gallery_id,image_name)values('$id','$fileName')";
	  if(!mysql_query($queryInsertFile))
	  {
		   die('Inertion Error in Image Table'.mysql_error());
	  }
	 	return 1;
	}
	
	 function deleteGallery($id,$field,$table_name)
	{
		  $query = "delete from ".$table_name." where ".$field." = '".$id."'";
		  mysql_query($query) or die(mysql_error());
		  
		  $queryDeleteImages="delete from tbl_image where gallery_id='$id'";
		  mysql_query($queryDeleteImages) or die('Error in deletion of Images:'.mysql_error());
		   
	}
  	function editAll($id,$ifield,$cfield,$table_name,$value)  
  	{
	  $updateQuery="update ".$table_name." set ".$cfield."='".$value."' where ".$ifield."='".$id."'";
	  mysql_query($updateQuery) or die('Error in updation of query:'.mysql_error());
	  
		
  	}
	/* create slider */
	function createSlider($slider)
	{
	     $insertGallery = "insert into tbl_slider(slider_name,created_date)values('".$slider."','".date('Y-m-d')."')";
		 if(!mysql_query($insertGallery))
		 {
		 	die('Error in insertion in Gallery:'.mysql_error());
		 }
		 return mysql_insert_id();
	}
	function showslider()
	{
	  $selectSlider="select *from tbl_slider";
	  $dataSetSlider=mysql_query($selectSlider) or die('Error:'.mysql_error());
	  return $dataSetSlider;
	}
	function uploadSliderImages($sliderId,$imageUrl,$image_description)
	{
		 $queryInsert="insert into tbl_slider_images(image_url,slider_id,image_description)values('$imageUrl','$sliderId','$image_description')";
		 mysql_query($queryInsert) or die('Error:'.mysql_error());
	}
	
	function edit_slider($value,$id)	
	{
		$updateSlider="update tbl_slider set slider_name='$value' where slider_id='$id'";
		mysql_query($updateSlider) or die('Error:'.mysql_error());
		
	}
	
	function addDate($pageId,$calenderDate,$day)
	{
	   $query="insert into tbl_calender(page_id,calender_date,is_active,week_day)values('$pageId','$calenderDate','1','$day')";
	   if(!mysql_query($query))
	   {
	     die('Error:'.mysql_error());
	   }
	  		 return mysql_insert_id();
	}
	
	function tourConfiarm($id)
	{
	
		/*$query_select_tour="SELECT booking_name,email_address ,tour_date,arivle_date   FROM `tbl_booking` WHERE tour_id='".$id."'";
		if(!$data_set_tour=mysql_query($query_select_tour))
		{
			die('Error:'.mysql_error());
		}
		$result_tour=mysql_fetch_array($data_set_tour);
		
		$to		 = $result_tour['email_address'];
		$subject = "Toure Informatin Accepted";
		$txt	 = "Hello ".$result_tour['booking_name']." ,\r\n\t  Your tour Confirmed  \n\n Toure date:".$result_tour['tour_date'];
		$headers = "From: harishankar.malviya@systematixindia.com\r\n" ."CC: harishankar.malviya@systematixindia.com";
		mail($to,$subject,$txt,$headers);*/
	}
/*	function insertPrice($post)
	{
		$i=0;
	   foreach ($post as $key=>$value)
	   {
	   
		   if($key=='submit'){break;}
		
		if(!empty($value))
		 {	
		   if($i==0)
		   {
			  $keys=$key;
			  $values="'$value'";
			  $i++;
		   }
		   else
		   {  
				   $keys.=",".$key;
				   $values.=","."'$value'";	     
		   }
		 }
		   
	  }   

	  $queryInsertPrice="insert into tbl_price($keys)values($values)";
	 //die('');
	   if(!mysql_query($queryInsertPrice))
	   {
	   		die('Error:'.mysql_error());
	   }
	   return mysql_insert_id();
	}*/
	
	function update_price($post,$id)
	{      
			 $query="update tbl_price set adult_price='$post[adult_price]',child_price='$post[child_price]' where price_id='$id'";
			 if(!mysql_query($query))
			 {
			   die('Error:'.mysql_error());
			 }
   }
	
}

?>

