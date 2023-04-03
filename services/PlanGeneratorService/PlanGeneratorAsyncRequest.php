<?php

class PlanGeneratorAsyncRequest extends WP_Background_Process
{
    /**
     * @var string
     */
    protected $action = 'plan_generator_process';

    protected function task($item)
    {
        get_user_plan(true, $item);
        update_field('current_plan_status', 1, 'user_'.$item);

        return false;
    }

}