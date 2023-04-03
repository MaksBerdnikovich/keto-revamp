<?php
    global $res;
?>

<div class="page-title m-bottom-1">
    <div class="title-h3">Forgot Password?</div>
</div>
<div class="page-text fl-centered m-bottom-1">
    <p>Enter your email and we'll send you instructions to reset your password</p>
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
<form id="resetForm" method="POST" class="weight-form auth-form" action="<?php echo get_current_url() ?>">
    <div class="form">
        <div class="form-col col-100">
            <div class="form-item">
                <label class="label">Email</label>
                <input type="email" name="e" class="input" id="inputEmail" placeholder="Enter email">
                <span class="error-msg">Enter valid email</span>
            </div>
        </div>
        <div class="form-col col-100">
            <div class="form-item back">
                <a class="back-link" href="<?php echo home_url('login') ?>">
                    <i class="icon-next"></i> <span>Back to login</span>
                </a>

                <button type="submit" class="btn btn-solid btn-primary btn-large">Send reset link</button>
            </div>
        </div>
    </div>
</form>