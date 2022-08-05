<?php 
require('top.php');

if(!isset($_GET['id']) && $_GET['id']!=''){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}

$cat_id = mysqli_real_escape_string($con, $_GET['id']);
$sub_categories = '';
if(isset($_GET['sub_categories'])){

    $sub_categories = mysqli_real_escape_string($con, $_GET['sub_categories']);

}


$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
    $sort=mysqli_real_escape_string($con,$_GET['sort']);
    if($sort=="price_high"){
        $sort_order=" order by product.price desc ";
        $price_high_selected="selected";    
    }if($sort=="price_low"){
        $sort_order=" order by product.price asc ";
        $price_low_selected="selected";
    }if($sort=="new"){
        $sort_order=" order by product.id desc ";
        $new_selected="selected";
    }if($sort=="old"){
        $sort_order=" order by product.id asc ";
        $old_selected="selected";
    }

}

/*$price_default_selected ="";
$price_high_selected = "";
$price_low_selected = "";
$new_selected = "";
$old_selected = "";
if(isset($_GET['sort'])){
    $sort = mysqli_real_escape_string($con, $_GET['sort']);

    if($sort == "price_default"){
        $sort_order = "order by product.name desc";
        $price_default_selected = "selected";
    }
    if($sort == "price_high"){
        $sort_order = "order by product.price desc";
        $price_high_selected = "selected";
    }
    if($sort == "price_low"){
        $sort_order = "order by product.price asc";
        $price_low_selected = "selected";
    }
    if($sort == "new"){
        $sort_order = "order by product.id desc";
        $new_selected = "selected";
    }
    if($sort == "old"){
        $sort_order = "order by product.id asc";
        $old_selected = "selected";
    }
}*/
if($cat_id>0){
$get_product = get_product($con, '',$cat_id, '', '', $sort_order, '', $sub_categories); 
}else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php 
}


?>  
<div class="body__overlay"></div>
      <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
      <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12  col-md-12  col-sm-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
           <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                                        <option value="">Default softing</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to hight</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by new first</option>
                                        <option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                            <?php if(count($get_product)>0) { ?>
                        <div class="shop__grid__view__wrap">
                        <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                            <!-- Start Single Product -->
                            <?php

                        foreach($get_product as $list){

                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                        <a href="product.php?id=<?php echo $list['id'];?>">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'];?>">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                    <ul class="product__action">
                                            <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php  echo $list['id'];?>', 'add')"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php  echo $list['id'];?>', 'add')"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                            <h4><a href="product.php?id=<?php echo $list['id'];?>"><?php echo $list['name'];?></a></h4>
                                    <ul class="fr__pro__prize">
            <li class="old__prize"><?php echo $list['mrp'];?></li>
                    <li>$<?php echo $list['price'];?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php   } ?>
                                <!-- End Single Product -->
                                        
                                        
                                       
    
                        </div>
                            <?php 
                            }else{
                            echo "<h1 align='center' style='color:red;'>Product Not Found!</h1>";
                            } 
                            ?>
                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                  
                     <?php

                    foreach($get_product as $list){

                      ?>
                        <div class="col-xs-12">
                    <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                        <div class="ht__list__product">
                            <div class="ht__list__thumb">
                    <a href="product.php?id=<?php echo $list['id'];?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'];?>" height="200px" width="150px"></a>
                                            </div>
                        <div class="htc__list__details">
                    <h2><a href="product.php?id=<?php echo $list['id'];?>"><?php echo $list['name'];?></a></h2>
                            <ul  class="pro__prize">
                    <li class="old__prize">$<?php echo $list['price'];?></li>
                    <li>$<?php echo $list['mrp'];?></li>
                        </ul>
                            <ul class="rating">
                    <li><i class="icon-star icons"></i></li>
                    <li><i class="icon-star icons"></i></li>
                        <li><i class="icon-star icons"></i></li>
            <li class="old"><i class="icon-star icons"></i></li>
                     <li class="old"><i class="icon-star icons"></i></li>
                                        </ul>
                    <p><?php echo $list['description'];?></p>
                            <div class="fr__list__btn">
                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php   } ?>
                                    <!-- End List Product -->
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End Product View -->

                        </div>
                        
                    </div>
                  
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
     
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->
<?php require('footer.php');?>