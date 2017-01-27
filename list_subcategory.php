<?php
	session_start();
	include 'head.php';
	include 'subcategory.php';
    include 'category.php';

	$subcategory = new SubCategory();
    $category = new Category();


?>
<div class='row'></div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-6'>
	<h2 class='col-md-12 text-primary'><i class='glyphicon glyphicon-list'></i>
		<i class='glyphicon glyphicon-list'></i> All SubCategories...</h2>
	 <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th> Category Name</th>
                        	<th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php
					  	$subcategories = $subcategory->list_subcategories(); 
					    foreach($subcategories as $subcategory) { 
					  ?>
                            <tr>
                                <td><?= $subcategory['id'] ?></td>
			                    <td><?= $subcategory['name'] ?></td>
                                <td><?= $subcategory['category_id'] ?></td>
                                
                                       
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="/store/edit_subcategory.php?subcat_id=<?= $subcategory['id'] ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="/store/submit_subcategory.php?subcat_id=<?= $subcategory['id']?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" name="delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
						    } 
						?>
                    </tbody>
                </table>
		
</div>
<div class='col-md-2'></div>
</div>
<?php
	include 'foot.php';
?>