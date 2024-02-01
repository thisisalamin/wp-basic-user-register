<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(isset($_POST['update'])){
    $user_id = sanitize_text_field($_POST['user_id']);
    $fname = sanitize_text_field($_POST['fname']);
    $lname = sanitize_text_field($_POST['lname']);

    $user_data = array(
        'ID' => $user_id,
        'first_name' => $fname,
        'last_name' => $lname
    );

    $user_id = wp_update_user($user_data);
    if(is_wp_error($user_id)){
        echo "Can not update profile" . $user_id->get_error_message();
    }else{
        $updated_text =  "Profile updated successfully";
    }
}

$user_id = get_current_user_id();
$user = get_userdata( get_current_user_id() );

if($user != false):
/*     echo "<pre>";
    print_r($user);
    echo "</pre>"; */

    $fname = $user->first_name;
    $lname = $user->last_name;
    $username = $user->user_nicename;

?>

<h1>Hi <?php echo "$fname $lname" ?> </h1>
<form action="<?php echo get_the_permalink() ?>" method="post">
    <?php if(isset($updated_text)): ?>
        <div class="alert alert-success">
            <?php echo $updated_text ?>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $fname ?>">
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lname ?>">
    </div>
    <div class="form-group">
        <input type="hidden" name="user_id"  value="<?php echo $user_id ?>">
    </div>
    <div class="form-group">
        <input type="submit" name="update" id="update" class="btn btn-primary" value="Update Profile">
    </div> 
</form>
<?php
endif;
?>