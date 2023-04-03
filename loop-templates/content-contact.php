<div class="dashboard">
    <div class="container">
        <div class="contact-db">
            <form id="contactForm" class="form" method="POST" action="<?php echo get_current_url() ?>">
                <input type="hidden" name="form" value="contact">

                <div class="form-col col-100">
                    <div class="form-item">
                        <label class="label">Message</label>
                        <textarea class="textarea" name="message"></textarea>
                        <span class="error-msg"><i class="icon-info-2"></i>Enter your message</span>
                    </div>
                </div>
                <div class="form-col col-100">
                    <div class="form-item">
                        <button type="submit" class="btn btn-primary btn-solid btn-large">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="contact-confirm" class="dashboard-modal home-db-filter-modal" style="display:none;">
    <div class="page-title m-bottom-2">
        <div class="title-h3">Your message<br/> has been sent successfully!</div>
    </div>

    <div class="filter-modal__icon m-bottom-2_5">
        <i class="icon-thumbs-up"></i>
    </div>

    <div class="filter-modal__btns">
        <button class="btn btn-solid btn-primary btn-large close">Ok</button>
    </div>
</div>