<?php

class EnvListener extends \PHPUnit\Framework\BaseTestListener
{
    public function startTestSuite(\PHPUnit\Framework\TestSuite $suite)
    {
        if (strpos($suite->getName(),"Integration") !== false ) {
            $env = new \Dotenv\Dotenv(__DIR__ . '/Integration/');
            $env->load();
        }

        if (strpos($suite->getName(),"Unit") !== false ) {
            $env = new \Dotenv\Dotenv(__DIR__ . '/Unit/');
            $env->load();
        }
    }
}