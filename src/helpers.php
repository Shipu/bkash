<?php

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return collect_value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }
}


if (! function_exists('collect_value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed $value
     * @param $params
     *
     * @return mixed
     */
    function collect_value( $value, ...$params)
    {
        if(count($params) == 1) {
            $params = $params[0];
        }

        return $value instanceof Closure ? $value($params) : $value;
    }
}
