<?php
global $tariffsCollection;
$tariffsCount = count($tariffsCollection);
?>
<div class="chk-logo">
    <div class="container">
        <img src="<?php echo get_image_url('v2/logo.png') ?>" class="cp-logo">
    </div>
</div>

<div class="top-fix-bar">
    <div class="top-strip">
        <div class="container">
            <div class="strp-left">
                <p class="strp-txt1">ONLY <span>$1.25 PER WEEK!</span></p>
                <p class="strp-txt2">This offer is valid for:</p>
            </div>
            <div class="timer-sec">
                <div id="firstTimer"></div>
            </div>
        </div>
    </div>
</div>

<div class="chk-benfit-sec">
    <div class="container">
        <p class="chk-sec-hdng">Get an APP that takes your weight loss seriously</p>
        <div class="chk-bnft-list">
            <ul class="left">
                <li>A personalized Keto meal plan</li>
                <li>Keto snacks and desserts</li>
                <li>Easy-to-follow recipes</li>
            </ul>
            <ul class="right">
                <li>Simple ingredients from any store</li>
                <li>24/7 nutritionist support</li>
                <li>A complete Keto diet guide for beginners</li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-sec1">
    <div class="container">
        <p class="chk-txt1">Step 1</p>
        <p class="chk-sec-hdng">Choose your plan</p>

        <div class="clearall"></div>
        <div class="select-col">
            <?php foreach ($tariffsCollection as $key => $tariff): ?>
                <div class="pkg-bx <?php if ($tariffsCount == $key + 1) {
                    echo 'pkg-bxrgt';
                } ?>">
                    <label class="buyOpt-row <?php if ($tariff['default']) {
                        echo 'active';
                    } ?>"
                           data-tariff="<?php echo $tariff['id'] ?>"
                           data-sale="<?php echo $tariff['price_full'] ?>"
                           data-price="<?php echo $tariff['price_full_without_sale'] ?>"
                           id="pop<?php echo $key + 1 ?>">
                        <div class="packageOpt">
                            <input type="radio" name="packOpt">
                            <span></span>
                            <p><?php echo $tariff['name'] ?> </p>
                        </div>

                        <div class="pkgPrice">
                            <p class="reglr-prc"><span>$<?php echo $tariff['price_week'] ?></span> Per week</p>
                            <div class="rtlprc">
                                <p><span class="strikeout">$<?php echo $tariff['price_full_without_sale'] ?></span>
                                    $<?php echo $tariff['price_full'] ?> will be charged every <?php echo $tariff['period'] ?> months</p>
                            </div>
                            <?php if ($tariff['sale_text']): ?>
                                <p class="spcl-ofr"><?php echo $tariff['sale_text'] ?></p>
                            <?php endif; ?>
                        </div>
                    </label>
                    <div class="important-not" <?php if (!$tariff['default']): ?>style="display:none;"<?php endif; ?>><span>Important!</span><br>You
                        can save the most with the Annual plan
                    </div>
                </div>
            <?php endforeach; ?>

            <p class="agree-txt">All prices are in <strong>US dollars</strong> unless indicated otherwise</p>
        </div>
    </div>
</div>

<div class="checkout-sec2">
    <div class="container">
        <p class="chk-txt1">Step 2</p>
        <p class="chk-sec-hdng">Create an account</p>
        <div class="mail-fld"><input type="email" id="email_input" placeholder="Enter Your Email Address"></div>
        <p class="result-txt"></p>
        <p class="agree-txt">We will not share your information or send spam</p>
    </div>
</div>

<div class="checkout-sec3">
    <div class="container">
        <form id="form-checkout" name="checkout" method="post" class="checkout woocommerce-checkout"
              action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
            <input type="hidden" name="billing_email" id="billing_email">
            <input type="hidden" value="plan" name="order_type">
            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>
        </form>
    </div>
</div>


<div class="checkout-sec4">
    <div class="container">
        <p class="chk-sec-hdng">Hear success stories <br class="forMob">from our clients</p>
        <p class="stry-txt1">Nothing inspires more than seeing other people succeed, right? So, read these amazing
            stories and get <br class="forDesk">ready to start your own. A few months from now you could be one of them!
        </p>
        <div class="story-box">
            <div class="story-col">
                <img src="<?php echo get_image_url('v2/story-img1.png') ?>" class="story-img1">
                <p class="t-lb-txt">160lb <img src="<?php echo get_image_url('v2/story-arw.png') ?>"> 140lb</p>
                <p class="t-para">A great plan for nutrition if you want to lose weight and keep your weight off. The
                    recipes are yummy, flavourful and fun to eat. I always thought that to lose weight you need to cut
                    fat and stop eating the foods I love but :Keto diet and KetoCycle changed this misconception.
                    Definitely recommend.</p>
                <p class="t-name"><span><strong>Christine T .</strong></span><br>Lost 20 lbs in first 28 days .</p>
            </div>
            <div class="story-col">
                <img src="<?php echo get_image_url('v2/story-img1.png') ?>" class="story-img1">
                <p class="t-lb-txt">160lb <img src="<?php echo get_image_url('v2/story-arw.png') ?>"> 140lb</p>
                <p class="t-para">A great plan for nutrition if you want to lose weight and keep your weight off. The
                    recipes are yummy, flavourful and fun to eat. I always thought that to lose weight you need to cut
                    fat and stop eating the foods I love but :Keto diet and KetoCycle changed this misconception.
                    Definitely recommend.</p>
                <p class="t-name"><span><strong>Christine T .</strong></span><br>Lost 20 lbs in first 28 days .</p>
            </div>
            <div class="story-col">
                <img src="<?php echo get_image_url('v2/story-img1.png') ?>" class="story-img1">
                <p class="t-lb-txt">160lb <img src="<?php echo get_image_url('v2/story-arw.png') ?>"> 140lb</p>
                <p class="t-para">A great plan for nutrition if you want to lose weight and keep your weight off. The
                    recipes are yummy, flavourful and fun to eat. I always thought that to lose weight you need to cut
                    fat and stop eating the foods I love but :Keto diet and KetoCycle changed this misconception.
                    Definitely recommend.</p>
                <p class="t-name"><span><strong>Christine T .</strong></span><br>Lost 20 lbs in first 28 days .</p>
            </div>
        </div>
    </div>
</div>

<div class="checkout-sec5">
    <div class="container">
        <p class="chk-sec-hdng">Who should use this app?</p>
        <div class="chk-s5-list">
            <ul class="left">
                <li>People who are fed up with inflective weight loss books & apps that are made for the masses</li>
                <li>People who want to lose more weight in the least stressful way</li>
                <li>People who want a life-long weight loss results</li>
            </ul>
            <ul class="right">
                <li>People who don’t want to spend another dime on useless weight loss books & diets</li>
                <li>People who want a unique and personalized assistant that will help them maintain a healthy lifestyle
                    in every aspect of life, for the rest of their life
                </li>
                <li>People who have lost faith in other methods and who don’t believe that another way for them to lose
                    weight exists
                </li>
            </ul>
        </div>
        <button class="cta-btn">Get Your Plan</button>
    </div>
</div>