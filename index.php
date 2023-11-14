
<?php require_once 'inc/header.php' ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <!-- <h4>Best Offer</h4> -->
            <!-- <h2>New Arrivals On Sale</h2> -->
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <!-- <h4>Flash Deals</h4> -->
            <!-- <h2>Get your best products</h2> -->
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <!-- <h4>Last Minute</h4> -->
            <!-- <h2>Grab last minute deals</h2> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    <?php
     require_once "./inc/conn.php";
    if(!empty($_SESSION['success']))
    {
      ?>
      <div class="alert alert-success my-5 text-center"><?php echo $_SESSION['success'] ; unset($_SESSION['success']); ?></div>
      <?php

    }
    ?>
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Posts</h2>
              <!-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> -->
            </div>
          </div>

          <?php
          if(isset($_GET['page']))
          {
            $page=$_GET['page'];

          }
          else
          {
            $page=1;
          }
          
          $limit=3;
          $offset=$limit*($page-1);

          $query="select count(id) as count from posts";
          $res= mysqli_query($conn,$query);
          if(mysqli_num_rows($res)==1)
          {
            $count=mysqli_fetch_assoc($res)['count'];
          }
          $numPage=ceil($count/$limit);
          if($page>$numPage)
          {
            header("location:index.php?page=$numPage");
          }
          if($page<1)
          {
            header("location:index.php?page=1");
            
          }


         
          $query="SELECT * FROM `posts` ORDER by id LIMIT $limit OFFSET $offset";
         $res= mysqli_query($conn,$query);
         if(mysqli_num_rows($res)>0)
         
         {
          $posts=mysqli_fetch_all($res,MYSQLI_ASSOC);
         }


         if(!empty($posts))
         {
          foreach($posts as $post)
          { 
            ?>
             <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="./assets/images/postImage/<?php echo $post['image'] ?>" alt=""></a>
              <div class="down-content">
                <a href="#"><h4><?php echo $post['title'] ?></h4></a>
                <h6><?php echo $post['createdAT'] ?></h6>
                <div class="d-flex justify-content-end">
                <a href="viewPost.php?id=<?php echo $post['id'] ?>" class="btn btn-info "> view</a>
                </div>
                
              </div>
            </div>
          </div>




            <?php 
         }
         }


           




          ?>

        </div>
      </div>
    </div>
<div class=" container d-flex justify-content-center">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="index.php?page=<?php echo $page-1 ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page ?>"> <?php echo $page . "of" . $numPage  ?></a></li>
  
    <li class="page-item">
      <a class="page-link" href="index.php?page=<?php echo $page+1 ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

  
</div>
    

 
    
<?php require_once 'inc/footer.php' ?>
