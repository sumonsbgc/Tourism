<?php include_once"header.php";
include_once "../vendor/autoload.php";
use App\Model\Post\Post;
$post = new Post();
$postCat = $post->selectByCategory();
?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-group">
                  <h2><a href="createPost.php">Add New Post</a></h2>
                </div>
                <div class="form-group">
                  <form role="form" action="postStore.php" method="post" enctype="multipart/form-data">
                    <div class="col-lg-8 form-group">
                      <label for="title">Title:</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="title">
                    </div>
                    <div class="col-lg-8 form-group">
                      <textarea class="form-control" rows="5" name="content"></textarea>
                    </div>
                    <div class="col-lg-8 form-group">
                      <input type="file" class="form-control" name="img_post">
                    </div>
                    <div class="col-lg-8 form-group">
                        <label for="category">Category:</label>
                        <input type="text" name="category" class="form-control" id="category">
                    </div>
                    <div class="col-lg-8 form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include_once"footer.php"; ?>