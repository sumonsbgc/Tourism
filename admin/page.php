<?php 

include_once"header.php"; 
include_once "../vendor/autoload.php";
use App\Model\Page\Page;
$page = new Page();
$allPage = $page->selectAll();

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
                                    <th>Image</th>
                                    <th style="width:250px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sl=0; foreach($allPage as $page){ $sl++;?>
                                <tr>
                                    <td><?php echo $sl;?></td>
                                    <td><?php echo $page->id; ?></td>
                                    <td><?php echo $page->title; ?></td>
                                    <td><?php echo $page->content; ?></td>
                                    <td><?php echo $page->img_name; ?></td>
                                    <td style="width:250px;">
                                        <a class="btn btn-info" href="pageEdite.php?id=<?php echo $page->id; ?>">Edit</a>
                                        <a class="btn btn-warning" href="pageDelete.php?id=<?php echo $page->id; ?>">Delete</a>
                                        <a class="btn btn-default" href="pageTrash.php?id=<?php echo $page->id; ?>">Trash</a>
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