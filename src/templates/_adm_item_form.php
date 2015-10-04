<?php
	if (isset($_GET['item_id'])){
		$id = $_GET['item_id'];
		$pro_info = \App\DB\Products::get($id,$connection);	
	}
?>
<?php if (isset($_GET['item_id'])) {?>
<h2>Редактирование товара</h2>
<form class="edit-elem-form" name="edit-form" method="post" action="/admin/?to_do=edit_item_tb&item_id=<?=$id ?>&item_act=edit">
	<input name="tek_id" type="hidden" value="<?=$pro_info['id'];?>"/>
	<label>
		<p>Title</p>
		<input name="t_title" type="text" value="<?=$pro_info['name'];?>" />
	</label>
	<label>
		<p>Description</p>
		<input name="t_descr" type="text" value="<?=$pro_info['description'];?>" />
	</label>
	<label>
		<p>Price</p>
		<input name="t_price" type="text" value="<?=$pro_info['price'];?>" />
	</label>
	<label>
		<p>ID category</p>
		<input name="id_cat" type="text" value="<?=$pro_info['id_cat'];?>" />
	</label>
	<label>
		<p>Photo</p>
		<input name="t_photo" type="text" value="<?=$pro_info['photo'];?>" />
	</label>
	<div class = "wr_subm">
		<input type="submit" value="Сохранить" />
	</div>
</form>
<?php } else {?>
<h2>Добавление товара</h2>
<form class="edit-elem-form" name="edit-form" method="post" action="/admin/?to_do=edit_item_tb&item_act=add">
	<label>
		<p>Title</p>
		<input name="t_title" type="text" value="" />
	</label>
	<label>
		<p>Description</p>
		<input name="t_descr" type="text" value="" />
	</label>
	<label>
		<p>Price</p>
		<input name="t_price" type="text" value="" />
	</label>
	<label>
		<p>Category</p>
		<input name="t_category" type="text" value="" />
	</label>
	<div class = "wr_subm">
		<input type="submit" value="Сохранить" />
	</div>
</form>
<?php } ?>