<?php 
   require('connection.inc.php');
   require('functions.inc.php');
   require('add_to_cart.inc.php');

   $cat_res = mysqli_query($con, "SELECT * FROM categories WHERE status = 1 ORDER BY categories ASC");
   $cat_arr = array();
   while($row = mysqli_fetch_assoc($cat_res)){
       $cat_arr[] = $row;
   }
   $obj = new add_to_cart();
   $totalProduct=$obj->totalProduct();

   if(isset($_SESSION['USER_LOGIN'])){
      $uid = $_SESSION['USER_ID'];

      if(isset($_GET['wishlist_id'])){
         $wid = get_safe_value($con, $_GET['wishlist_id']);
         mysqli_query($con, "DELETE from wishlist WHERE id ='$wid' AND user_id='$uid'");
     }
   
   $wishlist_count = mysqli_num_rows(mysqli_query($con, "SELECT product.name, product.image, product.price, product.mrp, wishlist.id from product, wishlist WHERE wishlist.product_id= product.id and wishlist.user_id='$uid'"));
   }

   $script_name = $_SERVER['SCRIPT_NAME'];
   $script_name_arr = explode('/', $script_name);
   $my_page = $script_name_arr[count($script_name_arr)-1];

   $meta_title = 'E-commerce';
   $meta_desc = 'E-commerce';
   $meta_keyword = 'E-commerce';
   if($my_page=='product.php'){
   $product_id = get_safe_value($con, $_GET['id']);
   $product_meta = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product WHERE id = '$product_id'"));
   $meta_title = $product_meta['meta_title'];
   $meta_desc = $product_meta['meta_desc'];
   $meta_keyword = $product_meta['meta_keyword'];
   }
   if($my_page=='contact.php'){
   $meta_title = 'Contact US';
   }
   if($my_page=='my_order.php'){
   $meta_title = 'My Order';
   }
   

   ?>
<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title><?php echo $meta_title; ?> </title>
      <meta name="description" content="<?php echo $meta_desc; ?>">
      <meta name="keyword" content="<?php echo $meta_keyword; ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
      <link rel="apple-touch-icon" href="apple-touch-icon.png">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/core.css">
      <link rel="stylesheet" href="css/shortcode/shortcodes.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="css/custom.css">
      <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   </head>
   <body>
      <div class="wrapper">
      <header id="htc__header" class="htc__header__area header--one">
         <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
               <div class="row">
                  <div class="menumenu__container clearfix">
                     <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                           <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                        </div>
                     </div>
                     <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                           <ul class="main__menu">
                              <li><a href="index.php">Home</a></li>
                              <?php 
                                 foreach($cat_arr as $list){
                              ?>
                              <li class="drop">
                              <a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories']; ?></a>

                              <?php 
                              $cat_id = $list['id'];

                              $sub_cat_res = mysqli_query($con, "SELECT * FROM sub_categories WHERE status='1' AND categories_id='$cat_id'");
                              if(mysqli_num_rows($sub_cat_res)>0){
                              ?>
                              <ul class="dropdown">
                                 <?php 
                              while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
                                 echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>';
                                 }
                                 ?>
                              </ul>
                           <?php } ?>
                              </li>
                              <?php 
                                 }
                                 ?>
                              <li><a href="contact.php">contact</a></li>
                           </ul>
                        </nav>
                        <div class="mobile-menu clearfix visible-xs visible-sm">
                           <nav id="mobile_dropdown">
                              <ul>
                                 <li><a href="index.php">Home</a></li>
                                 <?php 
                                    foreach($cat_arr as $list){
                                        ?>
                                 <li><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                                 <?php 
                                    }
                                    ?>
                              </ul>
                           </nav>
                        </div>
                     </div>

                     <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                           <?php 
                           $class = "mr15";
                           if(isset($_SESSION['USER_LOGIN'])){
                              $class = "";
                           }
                           ?>
                  <div class="header__search search search__open<?php echo $class?>">
                         <a href="#"><i class="icon-magnifier icons"></i></a>
                     </div>
            <div class="htc__shopping__cart">
                           <?php 

                              if(isset($_SESSION['USER_LOGIN'])){
                           ?>
                              <a  href="wishlist.php">
                              <i class="icon-heart icons"></i></a>';
                              <a href="wishlist.php"><span class="htc__qua"><?php echo $wishlist_count; ?></span></a>
                                    
                             <?php } ?>
                           
                           </div>&nbsp;&nbsp;&nbsp;
   <div class="header__account">
         <?php if(isset($_SESSION['USER_LOGIN'])){ ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:red;"><?php echo $_SESSION['USER_NAME']?>
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="my_order.php">Order</a>
               <a class="dropdown-item" href="profile.php">Profile</a>
               <div class="dropdown-divider"></div>
               <a class ="dropdown-item" href="logout_submit.php">Logout</a>
               </div>
            </li>
         </ul>
      </div>
    <?php                             
   } else {
   echo '<a href="login.php">Login/Register</a>';
   } 
   ?>                              
</div>


                           
                           
                           
                           <div class="htc__shopping__cart">
                              <a  href="cart.php"><i class="icon-handbag icons"></i></a>
                              <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mobile-menu-area"></div>
            </div>
         </div>
      </header>
      <div class="body__overlay"></div>
      <!-- Start Offset Wrapper -->
      <div class="offset__wrapper">
      <!-- Start Search Popap -->
      <div class="search__area">
         <div class="container" >
            <div class="row" >
               <div class="col-md-12" >
                  <div class="search__inner">
                     <form action="search.php" method="get">
                        <input placeholder="Search here... " type="text" name="str">
                        <button type="submit"></button>
                     </form>
                     <div class="search__close__btn">
                        <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>