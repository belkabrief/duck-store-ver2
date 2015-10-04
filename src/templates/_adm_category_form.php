<?php
	if (isset($_GET['item_id'])){
		$id = $_GET['item_id'];
		$cat_info = \App\DB\Categories::get($id,$connection);	
	}
?>
<?php if (isset($_GET['item_id'])) {?>
<h2>Редактирование категории</h2>
<form class="edit-elem-form" name="edit-form" method="post" action="/admin/?to_do=edit_cat_tb&item_id=<?=$id ?>&item_act=edit">
	<input name="id_cat" type="hidden" value="<?=$cat_info['id'];?>"/>
	<label>
		<p>Title</p>
		<input name="t_title" type="text" value="<?=$cat_info['name'];?>" />
	</label>
	<label>
		<p>Description</p>
		<input name="t_descr" type="text" value="<?=$cat_info['description'];?>" />
	</label>
	<div class = "wr_subm">
		<input type="submit" value="Сохранить" />
	</div>
</form>
<?php } else {?>
<h2>Добавление раздела</h2>
<form class="edit-elem-form" name="edit-form" method="post" action="/admin/?to_do=edit_cat_tb&item_act=add">
	<label>
		<p>Title</p>
		<input name="t_title" type="text" value="" />
	</label>
	<label>
		<p>Description</p>
		<input name="t_descr" type="text" value="" />
	</label>
	<div class = "wr_subm">
		<input type="submit" value="Сохранить" />
	</div>
</form>
<?php } ?>