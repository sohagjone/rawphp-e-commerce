 <?php 
 require_once('top.inc.php');
 require_once('connection.inc.php');
 require_once('functions.inc.php');

 $msg = '';
 $coupon_code = '';
 $coupon_type = '';
 $coupon_value = '';
 $cart_min_value = '';

 if(isset($_GET['id']) && $_GET['id']!=''){
     $id = get_safe_value($con, $_GET['id']);
     $res =mysqli_query($con, "SELECT * FROM coupon_master WHERE id='$id'");
     $check = mysqli_num_rows($res);
     if($check > 0){
          $row = mysqli_fetch_assoc($res);
          $coupon_code = $row['coupon_code'];
          $coupon_type = $row['coupon_type'];
          $coupon_value = $row['coupon_value'];
          $cart_min_value = $row['cart_min_value'];
     }else{
         header('location:coupon_master.php');
         die();
     }
 }
 if(isset($_POST['submit'])){
  
  $coupon_code = get_safe_value($con, $_POST['coupon_code']);
  $coupon_type = get_safe_value($con, $_POST['coupon_type']);
  $coupon_value = get_safe_value($con, $_POST['coupon_value']);
  $cart_min_value = get_safe_value($con, $_POST['cart_min_value']);
  $res =mysqli_query($con, "SELECT * FROM coupon_master WHERE coupon_code='$coupon_code'");
  $check = mysqli_num_rows($res);
  if($check > 0){
    if(isset($_GET['id']) && $_GET['id']!=''){
        $getData = mysqli_fetch_assoc($res);
        if($id ==$getData['id']){

        }else{
             $msg = "Coupon Code Already Exist!";
        }
    }else{

    $msg = "Coupon Code Already Exist!";
     }
  }
  
  if($msg == ''){
    if(isset($_GET['id']) && $_GET['id']!=''){
       $update_sql = "UPDATE coupon_master SET coupon_code ='$coupon_code', coupon_type ='$coupon_type', coupon_value='$coupon_value', cart_min_value ='$cart_min_value' WHERE id='$id'";
         mysqli_query($con,$update_sql);
      }else {
        mysqli_query($con, "INSERT INTO coupon_master (coupon_code, coupon_type, coupon_value, cart_min_value, status)VALUES('$coupon_code', '$coupon_type', '$coupon_value', '$cart_min_value', 1)");
      }   
     header('location:coupon_master.php');
     die();
    }
  }


 
  ?>
      <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Coupon</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post" enctype="multipart/form-data">
                            
                            <div class="form-group"><label for="categories" class=" form-control-label">Coupon Code</label><input type="text" name="coupon_code" placeholder="Enter product name" class="form-control" value="<?php echo $coupon_code; ?>"required>
                            </div>
        
                            

                            <div class="form-group">
                              <label for="coupon_type" class=" form-control-label">Coupon Type</label>
                              <select class="form-control" name="coupon_type" required>
                                <option value="">Select</option>
                            <?php 
                              if($coupon_type == 'Percentage'){
                              echo '<option value="Percentage" selected>Percentage</option>
                              <option value="Taka">Taka</option>';
                              }else if($coupon_type == 'Taka'){
                              echo '<option value="Percentage">Percentage</option>
                              <option value="Taka" selected>Taka</option>';
                              }else{
                                  echo '<option value="Percentage" >Percentage</option>
                                        <option value="Taka" >Taka</option>';
                                  }
                                ?>
                              </select>
                            </div>

                            <div class="form-group"><label for="categories" class=" form-control-label">Coupon Value</label><input type="text" name="coupon_value" placeholder="Enter Coupon Value" class="form-control" value="<?php echo $coupon_value; ?>"required>
                            </div>

                             <div class="form-group">
                              <label for="Product Quantity" class=" form-control-label">Cart Minimum Value</label><input type="text" name="cart_min_value"  placeholder="Enter Cart Minimum Amount" class="form-control" value="<?php echo $cart_min_value; ?>" required>
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
   
<?php 
require_once('footer.inc.php'); 

?>

