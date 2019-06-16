<?php


/**
 * MicoshLog class
 * @author Mateusz Mikos https://github.com/mateuszmikos
 */


class MicoshLogs
{
    /**
     * Date for log
     *
     * @var string
     */

    private $date;
    /**
     * Name for log
     *
     * @var string
     */
    private $log_name;

    /**
     * Dir for logs
     *
     * @var string
     */
    private $dir; // Ścieżka

    /**
     * Constructor for MicoshLogs Class
     *
     * @param string $dir - Dir for logs, like my_logs for my_logs/log_name.txt
     * @param string $type - Log type for other log names like cron_log_Y_m_d.txt for type = 'cron'
     */
    public function __construct($dir = 'logs', $type = 'none')
    {
        $this->date = date('Y_m_d');
        $this->log_name = 'log_'.$this->date.'.txt';
        if ($type != 'none') {
            $this->log_name = $type.'_log_'.$this->date.'.txt';
        }
        $this->dir = $dir;
        $this->stworzFolderLog();
    }

    /**
     * Method stworzFolderLog creates dir for logs if it doesn't exist.
     *
     * @return void
     */
    public function stworzFolderLog()
    {
        if (!is_dir($this->dir)) {
            mkdir($this->dir);
        }
    }

    /**
     * Method shorthand to saveToLog
     * 
     * @param string $text - Text to save as log
     * @param mixed $notice - additional information in []
     * @return void
     */
    public function l($text, $notice = false)
    {
        $this->saveToLog($text, $notice);
    }

    /**
     * Method saves info to log
     * E.g.:
     * $logs->l('This is example', 'DANGER');
     * Outputs:
     * [2020-01-01 01:02:03] [DANGER] This is example
     *
     * @param string $text
     * @param mixed $notice
     * @return void
     */
    public function saveToLog($text, $notice)
    {
        $file = $this->dir.'/'.$this->log_name;

        $content = '['.date("Y-m-d H:i:s").'] ';
        if ($notice) {
            $content.= '['.$notice.'] ';
        }
        $content.= $text."\n";

        file_put_contents(
            $file,
            $content,
            FILE_APPEND
        );
    }
}