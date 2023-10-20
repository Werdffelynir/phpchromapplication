<?php

namespace Pa;

class PhpApplication
{
    protected array $statedata = [];
    protected array $statecallbacks = [];
    public function __construct()
    {
        header('PHPApp: 0.1');
    }

    public function set_data(string $key, $value)
    {
        $this->statedata[$key] = $value;
    }

    public function get_data(string $key)
    {
        return empty($this->statedata[$key]) ? '' : $this->statedata[$key];
    }

    public function get_data_all()
    {
        return $this->statedata;
    }

    public function set_func(string $key, $value)
    {
        $this->statecallbacks[$key] = $value;
    }

    public function get_func(string $key)
    {
        return $this->statecallbacks[$key];
    }
}

