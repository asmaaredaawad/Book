<?php
	session_start();
	include 'head.php';
	include 'user.php';
	include 'category.php';
	include 'subcategory.php';

	$category = new Category();
	$subcategory = new SubCategory();

				// var_dump($category->get_subcategory());die();
	$cat = 1;
	$categories = $subcategory->getSubcategories($cat);
	echo "<ul>";
	foreach ($categories as $key => $value) {	
		echo "<li>";
		echo $value['name']; 
		echo "</li>";	
		}
		echo "</ul>";
	echo "<a href='logout.php'>Logout</a>";
	echo "<a href='add_category.php'>Add Category</a>";
	echo "<a href='add_subcategory.php'>Add Sub_Category</a>";
	echo "<a href='add_book.php'>AddBook</a>";

		if(isset($_SESSION['user_id'])) {
			echo "<a href='logout.php'>Logout</a>";
			echo "<a href='add_category.php'>Add Category</a>";
	echo "<a href='add_book.php'>AddBook</a>";


		}
	
?>

<?php 
	include 'foot.php';
?>
