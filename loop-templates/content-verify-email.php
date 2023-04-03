<?php
    global $res;
?>

<div class="page-title m-bottom-1">
    <div class="title-h3">Verify Your Email </div>
</div>
<div class="page-text fl-centered m-bottom-1">
    <p>
        We sent a verification email to <b>hello@pixinvent.com</b>.
        Please follow the instructions to confirm your account.
    </p>
</div>
<form method="POST" class="weight-form auth-form" action="<?php echo get_current_url() ?>">
    <div class="form">
        <div class="form-col col-100">
            <div class="form-item back">
                <a class="back-link" href="<?php echo home_url('reset-password') ?>">
                    <span>Didn't receive an email? <span class="resend primary-color">Resend</span></span>
                </a>

                <button type="submit" class="btn btn-solid btn-primary btn-large">Verify email</button>
            </div>
        </div>
    </div>
</form>
