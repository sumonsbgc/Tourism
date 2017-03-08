<?php
include_once"header.php";
include_once "../vendor/autoload.php";
use App\Model\Post\Post;
$post = new Post();
$allPost = $post->selectAll();
?>
	<!-- /top navigation -->
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>SL#</th>
								<th>ID</th>
								<th>Title</th>
								<th>Content</th>
								<th style="width:250px">Image</th>
								<th style="width:250px;">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php $sl=0; foreach($allPost as $post){ $sl++;?>
								<tr>
									<td><?php echo $sl;?></td>
									<td><?php echo $post->id; ?></td>
									<td><?php echo $post->title; ?></td>
									<td><?php echo $post->content; ?></td>
									<td style="width:250px"><img src="../Resources/images/<?php echo $post->img_post; ?>" style="width:100px; height:100px;"/></td>
									<td style="width:250px;">
										<a class="btn btn-info" href="postEdit.php?id=<?php echo $post->post_id; ?>">Edit</a>
										<a class="btn btn-warning" href="postDelete.php?id=<?php echo $post->post_id; ?>">Delete</a>
										<a class="btn btn-default" href="postTrash.php?id=<?php echo $post->post_id; ?>">Trash</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /page content -->
<?php include_once"footer.php"; ?>