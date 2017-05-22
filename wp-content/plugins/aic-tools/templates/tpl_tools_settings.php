<?php
/* Post type settings page */
function aic_tools_settings(){
	?>
	<div class="container-fluid content">
		<div class="row">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#post_type">Post Type</a></li>
					<li><a href="#taxonomy">Taxonomy</a></li>
					<li><a href="#widget">Widget</a></li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="tab-content">
					<div id="post_type" class="tab-pane fade in active">
						<h2 class="form-signin-heading">Post Type Area</h2><hr />
						<button class="btn btn-info" type="button" id="btn-add-post-type"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; Add post type</button>
						<button class="btn btn-info" type="button" id="btn-deleteAll-post-types"> <span class="glyphicon glyphicon-pencil"></span> &nbsp; Delete all post types</button>
						<button class="btn btn-info" type="button" id="btn-view-post-type"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; View post types</button>
						<hr />
						<div class="content-loader">
							<table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
								<thead>
									<tr>
										<th width="2%">No.</th>
										<th width="10%">Name</th>
										<th width="10%">Singular name</th>
										<th width="10%">Slug</th>
										<th width="10%">Date</th>
										<th width="5%">Edit</th>
										<th width="5%">Delete</th>
										<th width="48%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									global $wpdb;
									$post_types = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."aic_post_types ORDER BY id DESC");
									$no = 1;
									foreach($post_types as $post_type){
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $post_type->name; ?></td>
											<td><?php echo $post_type->singular_name; ?></td>
											<td><?php echo $post_type->slug; ?></td>
											<td><?php echo date("Y-m-d H:i:s", $post_type->date_made); ?></td>
											<td>
												<a id="<?php echo $post_type->id; ?>" class="edit-link" href="#" title="Edit">
													<img src="<?php echo get_aic_plugin_address(); ?>assets/images/edit.png" width="20px" />
												</a>
											</td>
											<td>
												<a id="<?php echo $post_type->id; ?>" class="delete-link" href="#" title="Delete">
													<img src="<?php echo get_aic_plugin_address(); ?>assets/images/delete.png" width="20px" />
												</a>
											</td>
											<td></td>
										</tr>
										<?php
										$no++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div id="taxonomy" class="tab-pane fade">

					</div>

					<div id="widget" class="tab-pane fade">

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
}
