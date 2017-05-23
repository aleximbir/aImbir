jQuery( document ).ready( function( $ ){
	// BOOTSTRAP //
	$( ".nav-tabs a" ).click(function(){
		$(this).tab( 'show' );
	});

	// POST TYPE //
	/* Open Form */
	$("#btn-add-post-type").click(function(){
		$(".content-loader").fadeOut('slow', function(){
			$(".content-loader").fadeIn('slow');
			$(".content-loader").load(main.plugin_address + 'templates/add/form_register_post_type.php');
			$("#btn-add-post-type").hide();
			$("#btn-view-post-type").show();
		});
	});

	/* Save Data */
	$(document).on('submit', '#save-post-type-form', function() {
		$.post(main.plugin_address + 'templates/save/new_post_type.php', $(this).serialize())
		.done(function(data){
			$("#dis").fadeOut();
			$("#dis").fadeIn('slow', function(){
				 $("#dis").html('<div class="alert alert-info">'+data+'</div>');
				 $("#save-post-type-form")[0].reset();
			 });
		 });
		 return false;
	});

	/* View Data */
	$("#btn-view-post-type").click(function(){

		$("body").fadeOut('slow', function()
		{
			$("body").load(main.plugin_menu);
			$("body").fadeIn('slow');
		});
	});

	/* Edit Data */

	/* Delete Data */
	$(".delete-post-type").click(function()
	{
		var id = $(this).attr("id");
		var del_id = id;
		var parent = $(this).parent("td").parent("tr");
		if(confirm('Sure to Delete user post type ID no = ' +del_id+'?'))
		{
			$.post(main.plugin_address + 'templates/delete/post_type_delete.php', {'del_id':del_id}, function(data)
			{
				parent.fadeOut('slow');
			});
		}
		return false;
	});
});
