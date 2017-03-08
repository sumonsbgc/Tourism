<?php include_once"header.php"; 
use App\Model\Page\Page;
$page = new Page();
$singleData = $page->prepare($_GET)->selectById();
?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <form method="post" class="form-group" action="pageUpdate.php" enctype="multipart/form-data">
                    <div class="col-lg-8">
                      <label for="title">Title</label>
                      <input value="<?php echo $singleData->title; ?>" type="text" name="title" class="form-control" id="title">
                      <input value="<?php echo $singleData->id; ?>" type="hidden" name="id" class="form-control" id="title">
                    </div>
                    <div class="col-lg-8">
                    <label for=""> </label>
                      <textarea name="content" class="form-control" id="" cols="30" rows="10">
                        <?php echo $singleData->content; ?>
                      </textarea>
                    </div>
                    <div class="col-lg-8">
                      <label for="thumb">Thumbnail</label>
                      <input type="file" class="form-control" name="img_name" id="thumb">
                      <div class="thumbnail">
                        <img src="../Resources/images/<?php echo $singleData->img_name; ?>" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <br>
                      <label for=""></label>
                      <input type="submit" value="Save" class="btn btn-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include_once"footer.php"; ?>