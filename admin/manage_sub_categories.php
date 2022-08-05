 <?php 
 require_once('top.inc.php');
 require_once('connection.inc.php');
 require_once('functions.inc.php');
 $msg = '';
 $categories = '';
 $sub_categories = '';
 if(isset($_GET['id']) && $_GET['id']!=''){
     $id = get_safe_value($con, $_GET['id']);
     $res =mysqli_query($con, "SELECT * FROM sub_categories WHERE id='$id'");
     $check = mysqli_num_rows($res);
     if($check > 0){
          $row = mysqli_fetch_assoc($res);
          $sub_categories = $row['sub_categories'];
          $categories = $row['categories_id'];
     }else{
         header('location:sub_categories.php');
         die();
     }
 }
 if(isset($_POST['submit'])){
  $categories = get_safe_value($con, $_POST['categories_id']);
  $sub_categories = get_safe_value($con, $_POST['sub_categories']);
  $res =mysqli_query($con, "SELECT * FROM sub_categories WHERE categories_id='$categories' AND sub_categories='$sub_categories'");
  $check = mysqli_num_rows($res);
  if($check > 0){
    if(isset($_GET['id']) && $_GET['id']!=''){
        $getData = mysqli_fetch_assoc($res);
        if($id ==$getData['id']){

        }else{
             $msg = "Sub Categories Already Exist!";
        }
    }else{

    $msg = "Sub Categories Already Exist!";
     }
  }
  if($msg == ''){
    if(isset($_GET['id']) && $_GET['id']!=''){
       mysqli_query($con, "UPDATE  sub_categories SET categories_id='$categories',
       sub_categories='$sub_categories' WHERE id='$id'");
    }else{
       mysqli_query($con, "INSERT INTO sub_categories (categories_id, sub_categories, status)VALUES('$categories', '$sub_categories','1')");
    }
    header('location:sub_categories.php');
    die();
  }
} 


 
  ?>
      <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Sub Categories</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
                            <div class="form-group"><label for="categories" class=" form-control-label">Categories</label>
                                <select class="form-control" name="categories_id" required>
                                    <option value="">Select Categories</option>
                                    <?php 
                                        $res =mysqli_query($con, "SELECT * FROM categories WHERE status='1'");
                                        while($row = mysqli_fetch_assoc($res)){
                                            if($row['id']==$categories){

                                echo "<option value=".$row['id']."  selected>".$row['categories']."</option>";

                                        }else{
                                          echo "<option value=".$row['id'].">".$row['categories']."</option>";  
                                        }
                                    } 
                                   ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Sub Categories</label>
                                <input class="form-control" type="text" name="sub_categories" placeholder="Enter Sub Categories"  value="<?php echo $sub_categories; ?>" required/>
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
<?php require_once('footer.inc.php'); ?>