<?php
/**
 * Template Name: Email V1
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ($_POST && $_POST['email']) {
    $res = save_email_to_session();
    if (!is_array($res) && $res) {
        wp_redirect(get_checkout_url());
        exit();
    }
}
get_header();

?>

<div class="email-section">
    <div class="container offset">
        <div class="section">
            <div class="page-title m-bottom-1">
                <div class="title-h3">Your Keto meal plan is ready</div>
            </div>
            <div class="page-text fl-centered m-bottom-1">
                <p>Enter The Email Address You Want To Receive Your Plan To:</p>
            </div>
            <?php if (isset($res) && is_array($res)): ?>
                <div class="fl-centered alert-danger" role="alert">
                    <span class="danger-color"><?php echo $res['message'] ?></span>
                </div>
            <?php endif; ?>
            <form id="emailPlan" action="<?php echo get_current_url() ?>" method="post">
                <div class="form">
                    <div class="form-col col-100">
                        <div class="form-item">
                            <label class="label">First name</label>
                            <input class="input" type="text" name="first_name">
                            <span class="error-msg">Enter valid name</span>
                        </div>
                    </div>
                    <div class="form-col col-100">
                        <div class="form-item">
                            <label class="label">Email</label>
                            <input class="input" type="email" name="email">
                            <span class="error-msg">Enter valid email</span>
                        </div>
                    </div>
                    <div class="form-col col-100">
                        <div class="form-item">
                            <button type="submit" class="btn btn-solid btn-primary btn-large">Get your plan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>
