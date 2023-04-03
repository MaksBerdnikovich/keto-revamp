<div class="quiz__item quiz__item--step10">

    <div class="quiz__item-title">
        <b class="title-h3">Measurements</b>
    </div>

    <div class="quiz__switch">
        <div class="quiz__switch-item">
            <input id="imperial" class="quiz__switcher" type="radio" name="system" value="imperial" checked>
            <label for="imperial">Imperial</label>
        </div>
        <div class="quiz__switch-item">
            <input id="metric" class="quiz__switcher" type="radio" name="system" value="metric">
            <label for="metric">Metric</label>
        </div>
        <input id="system" type="hidden" name="system" value="imperial">
    </div>

    <div class="quiz__item-grid row-cols-1" >
        <div class="quiz__item-col">
            <div class="form quiz__item-form quiz__item-form--imperial" data-id="imperial">
                <div class="form-col col-100">
                    <div class="form-item">
                        <label class="label">Age</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="age_1">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Height, ft</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="height_1">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label" for="height_in">Height, in</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="height_2">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Weight, lb</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="weight_1">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Target weight, lb</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="target_weight_1">
                    </div>
                </div>
            </div>

            <div class="form quiz__item-form quiz__item-form--metric" data-id="metric" style="display: none;">
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Age</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="age">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Height, cm</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="height">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Weight, kg</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="weight">
                    </div>
                </div>
                <div class="form-col col-50">
                    <div class="form-item">
                        <label class="label">Target weight, kg</label>
                        <input class="input" type="number" pattern="[0-9]*" inputmode="numeric" name="target_weight">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>