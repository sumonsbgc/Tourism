<?php include_once"header.php"; 
use App\Model\Post\Post;
$page = new Post();
$singleData = $page->prepare($_GET)->selectById();
?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <form role="form" action="postStore.php" method="post" enctype="multipart/form-data">
                    <div class="col-lg-8 form-group">
                      <label for="title">Title:</label>
                      <input value="<?php echo $singleData->title; ?>" type="text" name="title" class="form-control" id="title" placeholder="title">
                      <input value="<?php echo $singleData->id?>" type="hidden" name="id" class="form-control" id="title" placeholder="title">
                    </div>
                    <div class="col-lg-8 form-group">
                      <textarea class="form-control" rows="5" name="content">
                          <?php echo $singleData->content; ?>
                      </textarea>
                    </div>
                    <div class="col-lg-8 form-group">
                      <input type="file" class="form-control" name="img_post">
                      <div class="thumbnail">
                        <img src="../Resources/images/<?php echo $singleData->img_post; ?>" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 form-group">
                        <label for="category">Category:</label>
                        <input value="<?php echo $singleData->category; ?>" type="text" name="category" class="form-control" id="category">
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