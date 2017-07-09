<?php

final class Session {
    public static final function begin() {
        session_start();
    }

    public static final function end() {
        self::clean();
        session_destroy();
    }

    public static final function clean() {
        $_SESSION = [];
    }

    public static final function isValid(string $keyName) {
        return preg_match('/^[a-z][a-z0-9_]*$/', $keyName);
    }

    public static final function  exists(string $keyName) {
        if (self::isValid($keyName)) {
            return isset($_SESSION[$keyName]);
        } else {
            return false;
        }
    }

    public static final function set(string $keyName, $value) {
        if (self::isValid($keyName)) {
            $_SESSION[$keyName] = $value;
        }
    }

    public static final function get(string $keyName, $default = '') {
        if (self::isValid($keyName) and self::exists($keyName)) {
            return $_SESSION[$keyName];
        } else {
            return $default;
        }
    }

    public static final function delete(string $keyName) {
        if (self::isValid($keyName) and self::exists($keyName)) {
            unset($_SESSION[$keyName]);
        }
    }
}
