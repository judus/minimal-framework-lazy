<?php namespace Maduser\Minimal\Database\Exceptions;

/**
 * Class ProtectedColumnException
 *
 * @package Maduser\Minimal\Database\Exceptions
 */
class ProtectedColumnException extends DatabaseException
{
    /**
     * @return mixed
     */
    public function getMyFile()
    {
        if ($this->isMessageObject()) {
            /** @noinspection PhpUndefinedMethodInspection */
            return $this->myMessage->getFile();
        }

        return debug_backtrace()[3]['file'];
    }

    /**
     * @return mixed
     */
    public function getMyLine()
    {
        if ($this->isMessageObject()) {
            /** @noinspection PhpUndefinedMethodInspection */
            return $this->myMessage->getLine();
        }

        return debug_backtrace()[3]['line'];
    }
}