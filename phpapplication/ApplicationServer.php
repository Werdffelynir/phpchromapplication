<?php

namespace Pa;

trait ApplicationServer
{
    // todo: tmp
    static function app_close(): void
    {
        $command = "ps -ef | grep 'web init.php' | awk '{print $2 $8}'";
        exec($command, $output);
        $server_pid = str_contains($output[0], 'php') ? trim($output[0], 'php') : false;
        
        if (!$server_pid)
            throw new \ErrorException('PID of php local server NOT found!');

        exec("ps -ef | grep '\-\-app=' | awk '{print $2}'", $output_app_pid);
        $app_pid = $output_app_pid[0];
        $killres = exec("kill $app_pid && kill $server_pid", $killoutput);

        var_dump($killres, $killoutput);
    }
}
