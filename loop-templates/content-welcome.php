<?php

$userId = get_current_user_id();
$nickname = get_field('nickname', 'user_' . $userId);

?>

<div class="dashboard">
    <div class="container">
        <div class="welcome-db">
            <div class="page-text m-bottom-1">
                <div class="title-h4 tx-capitalize">Hi, <?=$nickname?></div>
            </div>
            <div class="page-text tx-repeat m-bottom-2_5">
                <p>
                    Welcome to the Keto Revamp member's area and beginning of your weight loss journey!
                </p>
                <p>
                    You've made the right choice by choosing the keto diet. I'm still amazed at how many health benefits
                    my clients receive and how quickly their bodies change.
                </p>
                <p>
                    As you embark on your keto journey, I will help you every step of the way, and you will see results
                    quickly if you follow the plan.
                </p>
                <p>
                    Click on the Home icon to check out your home page. Click around and check out all of the other
                    resources that I’ve created to assist you in your weight loss journey.
                </p>
            </div>
            <div class="fl-centered">
                <div class="video">
                    <iframe src="//player.vimeo.com/video/662598539?title=0&byline=0&portrait=0&badge=0"
                            width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>