<style type="text/css">#dis{display:none;}</style>
<div id="dis"><!-- here message will be displayed --></div>
<form method='POST' id='save-post-type-form' name='save-post-type-form' action="#">
	<table class='table table-bordered'>
		<tr>
			<td>Name</td>
			<td><input type='text' name='aic_post_type_name' class='form-control' placeholder='Insert name name' required /></td>
		</tr>

		<tr>
			<td>Singular name</td>
			<td><input type='text' name='aic_post_type_singular_name' class='form-control' placeholder='Insert singular name' required></td>
		</tr>

		<tr>
			<td colspan="2">
				<button type="submit" class="btn btn-primary" name="btn-save-post-type" id="btn-save-post-type">
				  <span class="glyphicon glyphicon-plus"></span> Save this post type
				</button>
			</td>
		</tr>
	</table>
</form>
