<?php
include_once"header.php";
use App\Model\Message\Message;
use App\Model\Contact\Contact;
use App\Model\Utility\Utility;
$contactList = new Contact();

if(array_key_exists('itemPerPage',$_SESSION)) {
    if (array_key_exists('itemPerPage', $_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
}else{
    $_SESSION['itemPerPage']=5;
}

$itemPerPage=$_SESSION['itemPerPage'];
$totalItem=$contactList->count();
$totalPage = ceil($totalItem/$itemPerPage);

$pagination = "";

if(array_key_exists('pageNumber',$_GET)){
    $pageNumber = $_GET['pageNumber'];
}else{
    $pageNumber = 1;
}

for($i=1; $i<=$totalPage; $i++){
    $class = ($i==$pageNumber)? "active" : "";
    $pagination.="<li class='$class'><a href='contact.php?pageNumber=$i'>$i</a></li>";
}
$pageStartFrom = $itemPerPage*($pageNumber-1);
$contact = $contactList->paginator($pageStartFrom,$itemPerPage);

?>
<div class="right_col" role="main">
         <div class="container">
             <div class="row">
                 <div class="col-lg-2 col-md-2">
                     <div class="form-group">
                         <form role="form" action="">
                             <label for="sel1">Select list:</label>
                             <select class="form-control" id="sel1" name="itemPerPage">
                                 <option <?php if($itemPerPage == 5){echo "selected"; } ?>>5</option>
                                 <option <?php if($itemPerPage == 10 ){ echo "selected"; } ?>>10</option>
                                 <option <?php if($itemPerPage == 15){echo "selected"; } ?>>15</option>
                                 <option <?php if($itemPerPage==20){echo "selected"; } ?>>20</option>
                             </select>
                             <input class="btn btn-info" type="submit" value="Submit" name="submit">
                         </form>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12 col-md-12">
                     <div class="table-responsive">
                         <table class="table table-bordered table-striped">
                             <thead>
                             <tr>
                                 <th>SL#</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone No</th>
                                 <th>Subject</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php
                             $sl=0;
                             foreach($contact as $cont){
                                 $sl++?>
                                 <tr>
                                     <th scope="row"><?php echo $sl+$pageStartFrom; ?></th>
                                     <th scope="row"><?php echo $cont->name; ?></th>
                                     <td><?php echo $cont->email; ?></td>
                                     <td><?php echo $cont->phone_no; ?></td>
                                     <td><?php echo $cont->subject; ?></td>
                                     <td>
                                         <a href="contactDelete.php?id=<?php echo $cont->id; ?>" class="btn btn-default" role="button">Delete</a>
                                         <a href="trash.php.?id=<?php echo $cont->id; ?>" class="btn btn-danger" role="button">Trash</a>
                                     </td>
                                 </tr>
                             <?php }?>
                             </tbody>
                         </table>
                     </div>
                     <ul class="pagination">
                         <?php if( $pageNumber > 1 ): ?>
                             <li><a href="contact.php?pageNumber=<?php $prev = $pageNumber-1; echo $prev; ?>">Prev</a></li>
                         <?php endif; ?>

                         <?php echo $pagination; ?>

                         <?php  if( $pageNumber < $totalPage ): ?>
                             <li><a href="contact.php?pageNumber=<?php $prev = $pageNumber+1; echo $prev;?>">Next</a></li>
                         <?php endif; ?>
                     </ul>
                 </div>
             </div>
         </div>
    </div>
</div>
<?php include_once"footer.php"; ?>