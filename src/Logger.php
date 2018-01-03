<?php

/*
 * MIT License
 * 
 * Copyright (c) 2017 Richard Nahm
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace riwin\Logger;

/**
 * Description of Logger
 *
 * @author Nahms
 */
class Logger {

    const LEVEL_TRACE = 0;
    const LEVEL_DEBUG = 1;
    const LEVEL_INFO = 2;
    const LEVEL_WARN = 3;
    const LEVEL_ERROR = 4;
    const LEVEL_FATAL = 5;
    const LEVEL_WTF = 6;

    private static $log = [];
    private static $logLevel = 2;

    public static function setLogLevel($level) {
        static::$logLevel = $level;
    }

    public static function getLogLevel() {
        return static::$logLevel;
    }

    private static function log($level, $message) {
        $txtLevel = "";
        switch ($level) {
            case static::LEVEL_TRACE:
                $txtLevel = "TRACE";
                break;
            case static::LEVEL_DEBUG:
                $txtLevel = "DEBUG";
                break;
            case static::LEVEL_INFO:
                $txtLevel = "INFO";
                break;
            case static::LEVEL_WARN:
                $txtLevel = "WARN";
                break;
            case static::LEVEL_ERROR:
                $txtLevel = "ERROR";
                break;
            case static::LEVEL_FATAL:
                $txtLevel = "FATAL";
                break;
            case static::LEVEL_WTF:
                $txtLevel = "WTF";
                break;
            default:
                $txtLevel = "LOG";
                break;
        }
        if ($level >= static::getLogLevel()) {

            $log = "[" . $txtLevel . "]: " . $message;
            static::$log[count(static::$log)] = $log;
            return true;
        }
        return false;
    }
    
    public static function trace($message) {
        return static::log(static::LEVEL_TRACE, $message);
    }
    
    public static function debug($message) {
        return static::log(static::LEVEL_DEBUG, $message);
    }
    
    public static function info($message) {
        return static::log(static::LEVEL_INFO, $message);
    }
    
    public static function warn($message) {
        return static::log(static::LEVEL_WARN, $message);
    }
    
    public static function error($message) {
        return static::log(static::LEVEL_ERROR, $message);
    }
    
    public static function fatal($message) {
        return static::log(static::LEVEL_FATAL, $message);
    }
    
    public static function wtf($message) {
        return static::log(static::LEVEL_WTF, $message);
    }
    
    public static function get() {
        return static::$log;
    }

}
