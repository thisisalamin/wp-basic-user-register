<?php
   if(isset($_POST['register'])){
    global $wpdb;
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_text_field($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $confirm_password = sanitize_text_field($_POST['confirm_password']);

    if ($password == $confirm_password){
        $results = wp_create_user($username, $password, $email);
        if (!is_wp_error($results)){
            add_user_meta($results, 'type', 'Faculty');
            echo "User Created Successfully";
        }else{
            echo $results->get_error_message();
        }
    }

   }
?>
<div class="container-fluid">
    <div class="register-form">
        <h2>Register Here</h2>


        <form id="wpaud-register-form" action="<?php echo get_the_permalink();?>" method="post">
        <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>

            <div class="form-group">
                <input type="submit" name="register" id="register" class="btn btn-primary" value="Register">
            </div>
        </form>
    </div>

    <p>Alredy Registered ? <a href="<?php echo site_url('login');?>">Login Here</a></p>

</div>



