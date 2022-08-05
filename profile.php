<?php 
require('top.php');

if(!isset($_SESSION['USER_LOGIN'])){
        ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php 
   }
//https://www.youtube.com/watch?v=F40HwcEGQds&list=PLWCLxMult9xfYlDRir2OGRZFK397f3Yeb&index=10
?>  
      <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
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
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Profile</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                            <h2 class="title__line--6">Change Profile</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                        <form id="login-form" action="#" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="name" id="name" placeholder="Your Name" style="width:100%"  value="<?php echo $_SESSION['USER_NAME']; ?>">

                                        </div>
                                     <span class="field_error" id="name_error"></span>
                                    </div>
                                    
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="update_profile()" id="btn_submit">Update Profile Name</button>
                                    </div>
                                </form>
                                <div class="form-output login_msg">
                                    <p class="form-messege field_error"></p>
                                </div>
                            </div>
                        </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="contact-title">
                            <h2 class="title__line--6">Change Password</h2>
                                </div>
                            </div>
                            <div class="col-xs-12">
                         <form action="#" method="post" id="frmPassword">

                                    <div class="single-contact-form">
                                <label class="password_label">Current Password:</label>
                                        <div class="contact-box name">
                                        <input type="password" name="current_password" id="current_password" style="width:100%" >
                                        </div>
                                     <span class="field_error" id="current_password_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                           <label class="password_label">New Password:</label>
                                        <div class="contact-box name">
                                         
                                        <input type="password" name="new_password" id="new_password" style="width:100%" >
                                        </div>
                                     <span class="field_error" id="new_password_error"></span>
                                    </div>
                                    <div class="single-contact-form">
                                         <label class="password_label">Confirm New Password:</label>
                                        <div class="contact-box name">
                                        <input type="password" name="confirm_new_password" id="confirm_new_password" style="width:100%" >
                                        </div>
                                     <span class="field_error" id="confirm_new_password_error"></span>
                                    </div>
                                    <div class="contact-btn">
                                        <button type="button" class="fv-btn" onclick="update_password()" id="btn_pass_submit">Update Profile Name</button>
                                    </div>
                                </form>
                                <div class="form-output login_msg">
                                    <p class="form-messege field_error"></p>
                                </div>
                            </div>
                        </div> 
                   </div>
                </div>
            </div>
        </section>
        
        <script>
            function update_profile(){
            jQuery('.field_error').html('');
            var name=jQuery('#name').val();
            if(name==''){
                jQuery('#name_error').html('Please Enter Your Name');
            }else{
                jQuery('#btn_submit').html('Please Wait....');
                jQuery('#btn_submit').attr('disabled', true);
                jQuery.ajax({
                    url:'update_profile.php',
                    type: 'post',
                    data : 'name='+name,
                    success:function(result){
                        jQuery('#name_error').html(result);
                        jQuery('#btn_submit').html('update');
                        jQuery('#btn_submit').html('disabled', false);
                    }
                })
            }
        }

         function update_password(){
            jQuery('.field_error').html('');
            var current_password=jQuery('#current_password').val();
            var new_password=jQuery('#new_password').val();
            var confirm_new_password=jQuery('#confirm_new_password').val();
            var is_error = '';
            if(current_password==''){
                jQuery('#current_password_error').html('Please Enter Your Password');
                is_error = 'yes';
            }
            if(new_password==''){
                jQuery('#new_password_error').html('Please Enter Your New Password');
                is_error = 'yes';
            }
            if(confirm_new_password==''){
                jQuery('#confirm_new_password_error').html('Please Enter Your Confrim New Password');
                is_error = 'yes';
            }

            if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
                jQuery('#confirm_new_password_error').html('Please Enter Same Password');
                is_error = 'yes';
            }
            if(is_error==''){
                jQuery('#btn_pass_submit').html('Please Wait....');
                jQuery('#btn_pass_submit').attr('disabled', true);
                jQuery.ajax({
                    url:'update_password.php',
                    type: 'post',
                    data : 'current_password='+current_password+'&new_password='+new_password,
                    success:function(result){
                        jQuery('#current_password_error').html(result);
                        jQuery('#btn_pass_submit').html('update');
                        jQuery('#btn_pass_submit').html('disabled', false);
                        jQuery('#frmPassword')[0].reset();
                    }
                })
            }
        }
         </script>
    

<?php require('footer.php');?>