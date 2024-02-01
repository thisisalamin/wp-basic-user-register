<div class="container">
    <div class="login-form">
        <h2>Login Here</h2>
        <form id="wpaud-register-form" action="<?php echo get_the_permalink();?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>

            <div class="form-group">
                <input type="submit" name="user_login" id="login" class="btn btn-primary" value="Login">
            </div>
        </form>

        <p>Don't have an account? <a href="<?php echo site_url('register');?>">Register Here</a></p>
    </div>
</div>