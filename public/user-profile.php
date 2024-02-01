<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$user_id = get_current_user_id();
$user = get_userdata( get_current_user_id() );

if($user != false):
    echo "<pre>";
    print_r($user);
    echo "</pre>";

    $fname = $user->first_name;
    $lname = $user->last_name;
    $username = $user->user_nicename;

?>

<h1>Hi <?php echo "$fname $lname" ?> </h1>
<?php
endif;
?>