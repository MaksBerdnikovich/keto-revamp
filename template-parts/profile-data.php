<?php
$userId = get_current_user_id();
$user = new WP_User($userId);
$email = $user->user_email;
$system = get_field('system', 'user_' . $userId);
$age = get_field('age', 'user_' . $userId);
$gender = get_field('gender', 'user_' . $userId);
$height = get_field('height', 'user_' . $userId);
$height_1 = get_field('height_1', 'user_' . $userId);
$height_2 = get_field('height_2', 'user_' . $userId);
$weight = get_field('weight', 'user_' . $userId);
$targetWeight = get_field('target_weight', 'user_' . $userId);

$activity = get_field('activity', 'user_' . $userId);
$motivation = get_field('motivation', 'user_' . $userId);
$preparationTime = get_field('preparation_time', 'user_' . $userId);

?>


<form class="form" method="POST" action="<?php echo get_current_url() ?>">
    <input type="hidden" name="form" value="params">

    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Email Address</label>
            <input class="input" disabled readonly value="<?php echo $email ?>" />
        </div>
    </div>

    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Age</label>
            <input class="input" type="number" required min="18" max="100" name="age" value="<?php echo $age ?>" />
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Gender</label>
            <div class="select">
                <select name="gender">
                    <option <?php if ($gender == 'w'): echo 'selected'; endif ?> value="w">FeMale</option>
                    <option <?php if ($gender == 'm'): echo 'selected'; endif ?> value="m">Male</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Unit system</label>
            <div class="select">
                <select name="system">
                    <option value="metric" <?php if ($system == 'metric'): echo 'selected'; endif ?> >Metric</option>
                    <option value="imperial" <?php if ($system == 'imperial'): echo 'selected'; endif ?> >Imperial</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Weight</label>
            <input class="input" name="weight" type="number" required value="<?php echo $weight ?>" />
        </div>
    </div>
    <div class="form-col col-25 metric-inputs">
        <div class="form-item">
            <label class="label">Height</label>
            <input class="input" name="height" type="number" required value="<?php echo $height ?>" />
        </div>
    </div>
    <div class="form-col col-25 imperial-inputs">
        <div class="form-item">
            <label class="label">Height (ft)</label>
            <input class="input" name="height_1" type="number" required value="<?php echo $height_1 ?>" />
        </div>
    </div>
    <div class="form-col col-25 imperial-inputs">
        <div class="form-item">
            <label class="label">Height (in)</label>
            <input class="input" name="height_2" type="number" required value="<?php echo $height_2 ?>" />
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Target weight</label>
            <input class="input" name="target_weight" type="number" required value="<?php echo $targetWeight ?>" />
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Physical activity level</label>
            <div class="select">
                <select name="activity">
                    <option name="newbie" <?php if ($activity == 'newbie'): echo 'selected'; endif ?> >A newbie (Just starting)</option>
                    <option name="light" <?php if ($activity == 'light'): echo 'selected'; endif ?> >Light-mode (1-2 workouts /week)</option>
                    <option name="hero" <?php if ($activity == 'hero'): echo 'selected'; endif ?> >Workout hero (3-5 workouts / week)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Motivation level</label>
            <div class="select">
                <select name="motivation">
                    <option value="0" <?php if ($motivation == '0'): echo 'selected'; endif ?> >I just want to try the Keto diet</option>
                    <option value="1" <?php if ($motivation == '1'): echo 'selected'; endif ?> >I want to try it and lose some weight</option>
                    <option value="2" <?php if ($motivation == '2'): echo 'selected'; endif ?> >I want to lose the maximum amount of weight</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-col col-25">
        <div class="form-item">
            <label class="label">Preparation time</label>
            <div class="select">
                <select name="preparation_time">
                    <option value="30" <?php if ($preparationTime == '30'): echo 'selected'; endif ?> >Up to 30 min.</option>
                    <option value="60" <?php if ($preparationTime == '60'): echo 'selected'; endif ?> >Up to 1 hour</option>
                    <option value="61" <?php if ($preparationTime == '61'): echo 'selected'; endif ?> >More than 1 hour</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-col col-100">
        <div class="form-row">
            <div class="form-item">
                <button type="submit" class="btn btn-primary btn-solid btn-large">Update my details</button>
            </div>
            <div class="form-item">
                <a class="btn btn-primary btn-outline btn-large" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
            </div>
        </div>
    </div>
</form>