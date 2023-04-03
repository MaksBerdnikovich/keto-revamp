<?php

class PlanGeneratorBackgroundProcessing
{
    /**
     * @var PlanGeneratorAsyncRequest
     */
    protected $process;

    private static $instance;

    /**
     * Example_Background_Processing constructor.
     */
    protected function __construct()
    {
        $this->init();
    }

    /**
     * Init
     */
    private function init()
    {
        require_once dirname(__FILE__).'/PlanGeneratorAsyncRequest.php';

        $this->process = new PlanGeneratorAsyncRequest();
    }

    public static function getInstance(): PlanGeneratorBackgroundProcessing
    {
        if (! isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Handle single
     *
     * @param $userId
     */
    public function handle($userId)
    {
        $this->process->push_to_queue($userId);
        $this->process->save()->dispatch();
    }
}

function PlanGenerator()
{
    return PlanGeneratorBackgroundProcessing::getInstance();
}

PlanGenerator();