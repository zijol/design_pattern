<?php
abstract class Logger
{
    const INFO = '1';
    const DEBUG = '2';
    const ERROR = '3';

    protected $level = 1;

    protected $nextLogger = null;

    public function setNexLogger($nextLogger)
    {
        $this->nextLogger = $nextLogger;
    }

    public function loadMessage($message)
    {
        $this->write($message);

        if($this->nextLogger != null)
        {
            $this->nextLogger->loadMessage($message);
        }
    }

    /**
     * @return mixed
     * 写日志操作
     */
    abstract public function write($message);
}

class InfoLogger extends Logger
{
    public function write($message)
    {
        echo "InfoLogger write: This is an Info log- [{$message}].<br/>";
    }
}

class DebugLogger extends Logger
{
    public function write($message)
    {
        echo "DebugLogger write: This is an Debug log- [{$message}].<br/>";
    }
}

class ErrorLogger extends Logger
{

    public function write($message)
    {
        echo "ErrorLogger write: This is an Error log - [{$message}].<br/>";
    }
}

class ChainLogger
{
    public static function createChainLogger()
    {
        $loggerObject = func_get_args();

        $realLoggerObject = [];
        foreach ($loggerObject as $key => $object)
        {
            if( $object instanceof Logger ) {
                $realLoggerObject[] = $loggerObject[$key];

                if (isset($loggerObject[$key+1]) && $loggerObject[$key+1] instanceof Logger) {
                    $loggerObject[$key]->setNexLogger($loggerObject[$key+1]);
                } else {
                    break;
                }
            } else {
                break;
            }
        }
        return $realLoggerObject;
    }
}

$chain = ChainLogger::createChainLogger (new ErrorLogger(), new DebugLogger(), new InfoLogger());

foreach ($chain as $logger)
{
    $logger->loadMessage("这是一段用户输入的消息.");
}