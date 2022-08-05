 <?php 
 require_once('top.inc.php');
 require_once('connection.inc.php');
 require_once('functions.inc.php');
 $msg = '';
 $categories_id = '';
 $name = '';
 $mrp = '';
 $price = '';
 $qty = '';
 $image = '';
 $short_desc = '';
 $description = '';
 $meta_title = '';
 $meta_desc = '';
 $meta_keyword = '';
 $best_seller = '';
 $sub_categories_id = '';
 $image_required = 'required';
 if(isset($_GET['id']) && $_GET['id']!=''){
     $image_required = '';
     $id = get_safe_value($con, $_GET['id']);
     $res =mysqli_query($con, "SELECT * FROM product WHERE id='$id'");
     $check = mysqli_num_rows($res);
     if($check > 0){
          $row = mysqli_fetch_assoc($res);
          $categories_id = $row['categories_id'];
          $sub_categories_id = $row['sub_categories_id'];
          $name = $row['name'];
          $mrp = $row['mrp'];
          $price = $row['price'];
          $qty = $row['qty'];
          $image = $row['image'];
          $short_desc = $row['short_desc'];
          $description = $row['description'];
          $meta_title = $row['meta_title'];
          $meta_desc = $row['meta_desc'];
          $meta_keyword = $row['meta_keyword'];
          $best_seller = $row['best_seller'];
     }else{
         header('location:product.php');
         die();
     }
 }
 if(isset($_POST['submit'])){
  $categories_id = get_safe_value($con, $_POST['categories_id']);
  $sub_categories_id = get_safe_value($con, $_POST['sub_categories_id']);
  $name = get_safe_value($con, $_POST['name']);
  $mrp = get_safe_value($con, $_POST['mrp']);
  $price = get_safe_value($con, $_POST['price']);
  $qty = get_safe_value($con, $_POST['qty']);
  //$image = get_safe_value($con, $_POST['image']);
  $short_desc = get_safe_value($con, $_POST['short_desc']);
  $description = get_safe_value($con, $_POST['description']);
  $meta_title = get_safe_value($con, $_POST['meta_title']);
  $meta_desc = get_safe_value($con, $_POST['meta_desc']);
  $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
  $best_seller = get_safe_value($con, $_POST['best_seller']);
  $res =mysqli_query($con, "SELECT * FROM product WHERE name='$name'");
  $check = mysqli_num_rows($res);
  if($check > 0){
    if(isset($_GET['id']) && $_GET['id']!=''){
        $getData = mysqli_fetch_assoc($res);
        if($id ==$getData['id']){

        }else{
             $msg = "product Already Exist!";
        }
    }else{

    $msg = "Product Already Exist!";
     }
  }
  
 if($_FILES['image']['type']!='' &&  ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] !='image/jpg' && $_FILES['image']['type']!= 'image/jpeg')){

 $msg = "Only allowed png, jpg format image";
 }
  if($msg == ''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      if($_FILES['image']['name']!=''){
        $image = rand(11111, 99999).''.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
        $update_sql = "UPDATE  product SET categories_id='$categories_id',name='$name', mrp='$mrp', price='$price', qty='$qty', short_desc='$short_desc',description='$description',  meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword' , best_seller='$best_seller',sub_categories_id = '$sub_categories_id', image = '$image'  WHERE id='$id'";
      }else {
        $update_sql = "UPDATE  product SET categories_id='$categories_id',name='$name', mrp='$mrp', price='$price', qty='$qty', short_desc='$short_desc',description='$description',  meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword', best_seller='$best_seller' , sub_categories_id = '$sub_categories_id' WHERE id='$id'";

      }
       mysqli_query($con, $update_sql);
     
    }else{
      $image = rand(11111, 99999).''.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH.$image);

       mysqli_query($con, "INSERT INTO product (categories_id, name, mrp, price, qty, image, short_desc, description, meta_title, meta_desc, meta_keyword, best_seller, sub_categories_id, status)VALUES('$categories_id', '$name', '$mrp', '$price', '$qty', '$image', '$short_desc', '$description', '$meta_title', '$meta_desc', '$meta_keyword', '$best_seller',  $sub_categories_id, 1)");
    }
    header('location:product.php');
    die();
  }
} 


 
  ?>
      <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post" enctype="multipart/form-data">
                            <div class="form-group"><label for="categories" class=" form-control-label">Categories</label>
                              <select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
                                  <option>Select Category</option>
                                  <?php 
                                  $res = mysqli_query($con, "SELECT id, categories FROM categories order by categories asc");
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                      if($row['id']==$categories_id){
                                        echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                      }else{
                                        echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                      }
                                      
                                    }
                                  ?>
                              </select>
                            </div>
                            <div class="form-group"><label for="categories" class=" form-control-label">Sub Categories</label>
                              <select class="form-control" name="sub_categories_id" id="sub_categories_id">
                                  <option>Select Sub Category</option>
                              </select>
                            </div>
                            <div class="form-group"><label for="categories" class=" form-control-label">Product Name</label><input type="text" name="name" placeholder="Enter product name" class="form-control" value="<?php echo $name; ?>"required>
                            </div>
        
                            <div class="form-group">
                              <label for="categories" class=" form-control-label">Best Seller</label>
                              <select class="form-control" name="best_seller" required>
                                <option value="">Select</option>
                            <?php 
                              if($best_seller == 1){
                              echo '<option value="1" selected>Yes</option>
                              <option value="0">No</option>';
                              }elseif($best_seller == 0){
                              echo '<option value="1">Yes</option>
                              <option value="0" selected>No</option>';
                              }else{
                                  echo '<option value="1" >Yes</option>
                                        <option value="0" >No</option>';
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="form-group"><label for="categories" class=" form-control-label">Product MRP</label><input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" value="<?php echo $mrp; ?>"required>
                            </div>

                              <div class="form-group"><label for="categories" class=" form-control-label">Product Price</label><input type="text" name="price" placeholder="Enter product price" class="form-control" value="<?php echo $price; ?>"required>
                            </div>

                             <div class="form-group"><label for="Product Quantity" class=" form-control-label">Product Quantity</label><input type="text" name="qty"  placeholder="Enter product Quantity" class="form-control" value="<?php echo $qty; ?>" required>
                            </div>
                              <div class="form-group"><label for="categories" class=" form-control-label">Product Image</label><input type="file" name="image"  class="form-control" <?php echo $image_required; ?>>
                            </div>
                              <div class="form-group">
                                <label for="categories" class=" form-control-label"> Short Description</label>
                                <textarea  name="short_desc" placeholder="Enter Short Description" class="form-control" required><?php echo $short_desc; ?></textarea> 
                            </div>
                              <div class="form-group">
                                <label for="description" class=" form-control-label"> Product Description</label>
                                <textarea  name="description" placeholder="Enter Product Description" class="form-control" required><?php echo $description; ?></textarea> 
                            </div>
                            <div class="form-group">
                                <label for="description" class=" form-control-label"> Meta Title</label>
                                <textarea  name="meta_title" placeholder="Enter Product Meta Title" class="form-control" ><?php echo $meta_title; ?></textarea> 
                            </div>
                            <div class="form-group">
                                <label for="description" class=" form-control-label"> Meta Description</label>
                                <textarea  name="meta_desc" placeholder="Enter Product Meta Description" class="form-control" ><?php echo $meta_desc; ?></textarea> 
                            </div>
                              <div class="form-group">
                                <label for="description" class=" form-control-label"> Meta Keyword</label>
                                <textarea  name="meta_keyword" placeholder="Enter Product Keyword" class="form-control"><?php echo $meta_keyword; ?></textarea> 
                            </div>
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           </form>
                          <div class="field_error"><?php echo $msg; ?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <script>
            function get_sub_cat(sub_cat_id){
                var categories_id = jQuery('#categories_id').val();
                jQuery.ajax({
                    url:'get_sub_cat.php',
                    type: 'post',
                    data : 'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
                    success:function(result){
                      jQuery('#sub_categories_id').html(result);
                    }

                });

            }

           
         </script>
<?php 
require_once('footer.inc.php'); 

?>

<script>
   <?php 

    if(isset($_GET['id'])){
      ?>
    get_sub_cat('<?php echo $sub_categories_id; ?>');
    
      <?php } ?>

</script>