<?php
session_start();
require 'category.php';
include 'subcategory.php';
$subcategory = new SubCategory();
if(isset($_GET['cat_id']))
	{
		if(!empty($_GET['cat_id']))
		{	
			$subcategory = new Subcategory();
			$response = $subcategory->getSubcategories($_GET['cat_id']);
			$response=json_encode($response);
			// var_dump($response);
		}
	}
	
	$errors = [];
	if(isset($_SESSION['user_id'])) {
		if(isset($_POST['addsubcat'])) { #add subcategory
			if(!isset($_POST['name']) || empty(trim($_POST['name']))){
				$errors[] = "Please, Enter a valid name";
			}
			if(!isset($_POST['category']) || empty(trim($_POST['category']))){
				$errors[] = "Please, Enter a valid category";
			}
			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
			} else {
				$subcategory = new SubCategory;
				$user_id = $_SESSION['user_id'];
				$subcategory->user_id = $user_id;
				$subcategory->name = $_POST['name'];
				$subcategory->category_id = $_POST['category'];

				$subcategory->insert();
				echo "<meta http-equiv='Refresh' content='0;url=list_subcategory.php' />"; 

				
			}

		}
		elseif (isset($_POST['edit'])) { #edit subcategory
			if(!isset($_POST['name']) || empty(trim($_POST['name']))){
				$errors[] = "Please, Enter a valid name";
			}
			$subcat_id=$_POST['id'];
			if(!empty($errors)) {
				$_SESSION['errors'] = $errors;
				echo "<meta http-equiv='Refresh' content='0;url=edit_subcategory.php?$subcat_id' />"; 
			} else {
				$subcategory = new SubCategory;

				$user_id = $_SESSION['user_id'];
				$subcategory->user_id = $user_id;
				$subcategory->name = $_POST['name'];
				$subcategory->category_id = $_POST['category'];
				$subcategory->updateWithId($subcat_id); #update subcategory
				
				echo "<meta http-equiv='Refresh' content='0;url=list_subcategory.php' />"; 

				
			}
		}
	
		elseif (isset($_POST['delete'])) { #delete categry
		$subcat_id=$_GET['subcat_id'];
		$subcategory = new SubCategory;
		$subcategory->delete($subcat_id);#delete category
		
		
		echo "<meta http-equiv='Refresh' content='0;url=list_subcategory.php' />"; 
		}
	}
	else{
		echo "<meta http-equiv='Refresh' content='0;url=login.php' />"; 
	}	
?>		 