<?php include_once"header.php"; ?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
              <div class="heading-group">
                <h2><a href="createPage.php">Add New Page</a></h2>
              </div>
                <div class="form-group">
                  <form method="post" class="form-group" action="pageStore.php" enctype="multipart/form-data">
                    <div class="col-lg-8">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="col-lg-8">
                    <label for=""> </label>
                      <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-lg-8">
                      <label for="thumb">Thumbnail</label>
                      <input type="file" class="form-control" name="img_name" id="thumb">
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