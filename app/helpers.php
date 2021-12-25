<?php

// Global Helper Functions
//https://github.com/zhorton34/authorize-slim-4/blob/master/app/helpers.php

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (!function_exists('base_path')) {
    /**
     * @param $path
     * @return string to base path "./"
     */
    function base_path($path = '')
    {
        return __DIR__ . "/../{$path}";
    }
}

if (!function_exists('config_path')) {
    /**
     * @param $path
     * @return string to config path "./config"
     */
    function config_path($path = '')
    {
        return base_path("config/{$path}");
    }
}

if (!function_exists('resources_path')) {
    /**
     * @param $path
     * @return string to resources path "./resources"
     */
    function resources_path($path = '')
    {
        return base_path("resources/{$path}");
    }
}

if (!function_exists('public_path')) {
    /**
     * @param $path
     * @return string to public path "./public"
     */
    function public_path($path = '')
    {
        return base_path("public_path/{$path}");
    }
}

if (!function_exists('routes_path')) {
    /**
     * @param $path
     * @return string to routes path "./routes"
     */
    function routes_path($path = '')
    {
        return base_path("routes/{$path}");
    }
}

if (!function_exists('storage_path')) {
    /**
     * @param $path
     * @return string to storage path "./storage"
     */
    function storage_path($path = '')
    {
        return base_path("storage/{$path}");
    }
}

if (!function_exists('app_path')) {
    /**
     * @param $path
     * @return string to app path "./app"
     */
    function app_path($path = '')
    {
        return base_path("app/{$path}");
    }
}


if (!function_exists('dd')) {
    /**
     * die dump return var_dump die
     * @return void
     */
    function dd()
    {
        array_map(function ($content) {
            echo "<pre>";
            var_dump($content);
            echo "</pre>";
            echo "<hr>";
        }, func_get_args());

        die;
    }
}

if (!function_exists('throw_when')) {
    /**
     * to throw error message
     * @param bool $fails
     * @param string $message
     * @param string $exception
     * @return void
     */
    function throw_when(bool $fails, string $message, string $exception = Exception::class)
    {
        if (!$fails) {
            return;
        }

        throw new $exception($message);
    }
}

if (!function_exists('class_basename')) {
    /**
     * @param $class
     * @return string class name
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists('config')) {
    /**
     * allow you use data_set and data_get for your php file
     * @param $path
     * @return array|mixed
     */
    function config($path = null)
    {
        $config = [];
        $folder = scandir(config_path());
        $config_files = array_slice($folder, 2, count($folder));

        foreach ($config_files as $file) {
            throw_when(
                Str::after($file, '.') !== 'php',
                'Config files must be .php files'
            );


            data_set($config, Str::before($file, '.php'), require config_path($file));
        }

        return data_get($config, $path);
    }
}

if (!function_exists('data_get')) {
    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param mixed $target
     * @param string|array|int|null $key
     * @param mixed $default
     * @return mixed
     */
    function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (!is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (!is_array($target)) {
                    return value($default);
                }

                $result = [];

                foreach ($target as $item) {
                    $result[] = data_get($item, $key);
                }

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }

        return $target;
    }
}

if (!function_exists('data_set')) {
    /**
     * Set an item on an array or object using dot notation.
     *
     * @param mixed $target
     * @param string|array $key
     * @param mixed $value
     * @param bool $overwrite
     * @return mixed
     */
    function data_set(&$target, $key, $value, $overwrite = true)
    {
        $segments = is_array($key) ? $key : explode('.', $key);

        if (($segment = array_shift($segments)) === '*') {
            if (!Arr::accessible($target)) {
                $target = [];
            }

            if ($segments) {
                foreach ($target as &$inner) {
                    data_set($inner, $segments, $value, $overwrite);
                }
            } elseif ($overwrite) {
                foreach ($target as &$inner) {
                    $inner = $value;
                }
            }
        } elseif (Arr::accessible($target)) {
            if ($segments) {
                if (!Arr::exists($target, $segment)) {
                    $target[$segment] = [];
                }

                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite || !Arr::exists($target, $segment)) {
                $target[$segment] = $value;
            }
        } elseif (is_object($target)) {
            if ($segments) {
                if (!isset($target->{$segment})) {
                    $target->{$segment} = [];
                }

                data_set($target->{$segment}, $segments, $value, $overwrite);
            } elseif ($overwrite || !isset($target->{$segment})) {
                $target->{$segment} = $value;
            }
        } else {
            $target = [];

            if ($segments) {
                data_set($target[$segment], $segments, $value, $overwrite);
            } elseif ($overwrite) {
                $target[$segment] = $value;
            }
        }

        return $target;
    }
}
