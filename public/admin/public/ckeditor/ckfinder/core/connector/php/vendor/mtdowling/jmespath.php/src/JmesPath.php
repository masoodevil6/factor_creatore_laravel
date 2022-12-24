<?php
namespace JmesPath;

/**
 * Returns data from the input array that matches a JMESPath expression.
 *
 * @param string $expression Expression to categories.
 * @param mixed $data Data to categories.
 *
 * @return mixed|null
 */
if (!function_exists(__NAMESPACE__ . '\search')) {
    function search($expression, $data)
    {
        return Env::search($expression, $data);
    }
}
