<?php
$userId = get_current_user_id();
$user = new WP_User($userId);

$name = $user->display_name;
$email = $user->user_email;

?>


<form class="form" method="POST" action="<?php echo get_current_url() ?>">
    <input type="hidden" name="form" value="params">

    <div class="form-col col-50">
        <div class="form-item">
            <label class="label">Your Name</label>
            <input class="input" type="text" />
        </div>
    </div>
    <div class="form-col col-50">
        <div class="form-item">
            <label class="label">Email</label>
            <input class="input" type="email" />
        </div>
    </div>
    <div class="form-col col-50">
        <div class="form-item">
            <label class="label">Password</label>
            <input class="input" type="password" />
        </div>
    </div>
    <div class="form-col col-50">
        <div class="form-item">
            <label class="label">Repeat password</label>
            <input class="input" type="password" />
        </div>
    </div>
    <div class="form-col col-100">
        <div class="form-row">
            <div class="form-item">
                <button type="submit" class="btn btn-primary btn-solid btn-large">Update</button>
            </div>
        </div>
    </div>
</form>