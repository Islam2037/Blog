<?php 
require_once 'inc/header.php';
if(empty($_SESSION['userid']))
{

  header("location:Login.php");

}
else
{
  ?>

  <!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>Edit Post</h4>
          <h2>edit your personal post</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container w-50 ">
  <div class="d-flex justify-content-center">
    <h3 class="my-5">edit Post</h3>
  </div>
  <?php
  
  if (!empty($_GET['id'])) {
  ?>
    <form method="POST" action="handle/editPost.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php  if(!empty($_SESSION['oldtitle'])){ echo $_SESSION['oldtitle']; }?>">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" id="body" name="body" rows="5" ><?php  if(!empty($_SESSION['olddesc'])){ echo $_SESSION['olddesc']; } ?></textarea>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">image</label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <img src="./assets/images/postImage/" alt=""  width="100px" srcset="" component={}>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  <?php
  }
  ?>

</div>


<?php require_once 'inc/footer.php' ?>


  <?php
}

?>
