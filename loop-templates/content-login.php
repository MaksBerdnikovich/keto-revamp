<?php
    global $res;
?>

<div class="page-title m-bottom-1">
    <div class="title-h3">Log In</div>
</div>
<?php if (isset($res) && !$res['success']): ?>
    <div class="fl-centered alert-danger" role="alert">
        <span class="danger-color"><?php echo $res['message'] ?></span>
    </div>
<?php endif ?>
<?php if (isset($res) && $res['success']): ?>
    <div class="fl-centered alert-danger" role="alert">
        <span class="success-color"><?php echo $res['message'] ?></span>
    </div>
<?php endif ?>
<form id="loginForm" method="POST" class="weight-form auth-form" action="<?php echo get_current_url() ?>">
    <div class="form">
        <div class="form-col col-100">
            <div class="form-item">
                <label class="label">Email</label>
                <input type="email" name="e" class="input" id="inputEmail">
                <span class="error-msg">Enter valid email</span>
            </div>
        </div>
        <div class="form-col col-100">
            <div class="form-item">
                <label class="label">Password</label>
                <input type="password" name="pass" class="input" id="inputPassword">
                <span class="error-msg">Enter valid password</span>

                <a class="forgot-pass" href="<?php echo home_url('reset-password') ?>">Forgot Password?</a>
            </div>
        </div>
        <div class="form-col col-100">
            <div class="form-item">
                <button type="submit" class="btn btn-solid btn-primary btn-large">Log In</button>
            </div>
        </div>
    </div>
</form>