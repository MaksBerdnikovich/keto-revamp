<?php if (! is_user_logged_in()): ?>
    <form method="POST" action="<?php echo get_current_url() ?>">
        <input name="action" type="hidden" value="save-quiz">
        <button type="submit" class="btn btn-solid btn-<?=$args['btn_size']?> btn-primary"><?=$args['btn_txt']?></button>
    </form>
<?php endif; ?>