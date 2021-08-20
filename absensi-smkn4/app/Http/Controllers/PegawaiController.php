<?php
if (!function_exists('sg_load')) {
    $__v = phpversion();
    $__x = explode('.', $__v);
    $__v2 = $__x[0] . '.' . (int)$__x[1];
    $__u = strtolower(substr(php_uname(), 0, 3));
    $__ts = (@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE') ? 'ts' : '');
    $__f = $__f0 = 'ixed.' . $__v2 . $__ts . '.' . $__u;
    $__ff = $__ff0 = 'ixed.' . $__v2 . '.' . (int)$__x[2] . $__ts . '.' . $__u;
    $__ed = @ini_get('extension_dir');
    $__e = $__e0 = @realpath($__ed);
    $__dl = function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');
    if ($__dl && $__e && version_compare($__v, '5.2.5', '<') && function_exists('getcwd') && function_exists('dirname')) {
        $__d = $__d0 = getcwd();
        if (@$__d[1] == ':') {
            $__d = str_replace('\\', '/', substr($__d, 2));
            $__e = str_replace('\\', '/', substr($__e, 2));
        }
        $__e .= ($__h = str_repeat('/..', substr_count($__e, '/')));
        $__f = '/ixed/' . $__f0;
        $__ff = '/ixed/' . $__ff0;
        while (!file_exists($__e . $__d . $__ff) && !file_exists($__e . $__d . $__f) && strlen($__d) > 1) {
            $__d = dirname($__d);
        }
        if (file_exists($__e . $__d . $__ff)) dl($__h . $__d . $__ff);
        else if (file_exists($__e . $__d . $__f)) dl($__h . $__d . $__f);
    }
    if (!function_exists('sg_load') && $__dl && $__e0) {
        if (file_exists($__e0 . '/' . $__ff0)) dl($__ff0);
        else if (file_exists($__e0 . '/' . $__f0)) dl($__f0);
    }
    if (!function_exists('sg_load')) {
        $__ixedurl = 'http://www.sourceguardian.com/loaders/download.php?php_v=' . urlencode($__v) . '&php_ts=' . ($__ts ? '1' : '0') . '&php_is=' . @constant('PHP_INT_SIZE') . '&os_s=' . urlencode(php_uname('s')) . '&os_r=' . urlencode(php_uname('r')) . '&os_m=' . urlencode(php_uname('m'));
        $__sapi = php_sapi_name();
        if (!$__e0) $__e0 = $__ed;
        if (function_exists('php_ini_loaded_file')) $__ini = php_ini_loaded_file();
        else $__ini = 'php.ini';
        if ((substr($__sapi, 0, 3) == 'cgi') || ($__sapi == 'cli') || ($__sapi == 'embed')) {
            $__msg = "\nPHP script '" . __FILE__ . "' is protected by SourceGuardian and requires a SourceGuardian loader '" . $__f0 . "' to be installed.\n\n1) Download the required loader '" . $__f0 . "' from the SourceGuardian site: " . $__ixedurl . "\n2) Install the loader to ";
            if (isset($__d0)) {
                $__msg .= $__d0 . DIRECTORY_SEPARATOR . 'ixed';
            } else {
                $__msg .= $__e0;
                if (!$__dl) {
                    $__msg .= "\n3) Edit " . $__ini . " and add 'extension=" . $__f0 . "' directive";
                }
            }
            $__msg .= "\n\n";
        } else {
            $__msg = "<html><body>PHP script '" . __FILE__ . "' is protected by <a href=\"http://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '" . $__f0 . "' to be installed.<br><br>1) <a href=\"" . $__ixedurl . "\" target=\"_blank\">Click here</a> to download the required '" . $__f0 . "' loader from the SourceGuardian site<br>2) Install the loader to ";
            if (isset($__d0)) {
                $__msg .= $__d0 . DIRECTORY_SEPARATOR . 'ixed';
            } else {
                $__msg .= $__e0;
                if (!$__dl) {
                    $__msg .= "<br>3) Edit " . $__ini . " and add 'extension=" . $__f0 . "' directive<br>4) Restart the web server";
                }
            }
            $__msg .= "</body></html>";
        }
        die($__msg);
        exit();
    }
}
return sg_load('0FE09B764756B6DCAAQAAAAXAAAABIAAAACABAAAAAAAAAD/qUZJKrwbK/bqC4PsJ0jGAGqrzWXfp6eiJjsOWqm6SuvuZLyOtsVkBdHIHDKj+Nx8dNGT2lJB5jG5rqWkt3jZHrLJJaIPXe8bkxjJY0Igaxq65KLPgOaT23dGf0BcLjj2fXNtgjphnib3nX+jShiZJHnuBW9j4GfHW6YqRwKzImYIAAAAUBIAAAa+tTg86orDmcYvSQDLJGvm8SE/JqIt2ML08TwAL1h2BjqvHxQRy4k+Ld+r5C34KDNOmlVMjI9mP27LRKJ027bIVJS971cT6F7f6YPtVEbdOL3c/kxAJrPfxlaFk5UriqNbsoV8asY8iuL7PnQwfHq5N21gY3lOix9Zgk+2JWM9TCu02MtlHy4Ozq1UmlNbPko96WMZZzU44A3ZBAWujAF/bgFrqOj5aRDMGQVysLcVBc1roZ44wAerrGIhrk7YEIct7hGuxghWfobDZBdKH53SMz3OftOkczXpc32QAd4UPMNfcWRLrszFomziGQxpw9ZR/XInmVyCeziQ0HzjcIgQjRzl9dEfM3K4GpHkoN+8D+FulpibZJu+qznSq43FPvH6zXw8KoTwXNEgwHsuBe1KzD4F2bRqZeK31NvhayIxLpF2XQMU3gP3TvtHP3Vb5NaJKk346lbv1jasNwrDuQVdlhT/28YCmwBNQ7N6duOToKTcrNQ5wwPosy0GLcgP0B8/t1FuFPIkqVwBeLcftV/c6MQxs6DwLmFzdsg5RwuuxHEfMffgs5WbzH5lHYfLExhn9DSMjoALrBDSf6WrgbbFVUEJ6Nxv/4vJ7ohyd1EYXqd9goI+n2zh9ccyydtoQFG8ARdFSMvEluAoM0mYREAVjatdMaNOPqDtm+CHgqYm8PZK8Rm92wLL8mcZDVaCTlonDl5OUJ+eL7ZQrzYkcJPZl2KZaxCDgWZtYfqmCxun/0cgL6OTyxojTzasuItUsfV8ND8m+lvv+agRowe9wiB9CJEaVvIN69NkPPeV3TsQbjXQwHpGBL3m4oAeDhA4sW9mfSlt/9Orv2uX7gb+FQ48+wadIVh7nlzLVe3OgSkCpHjas1HL8TOeU3rl4AB0OMOBj263TiOy3dZ3+qirTl2cdcx0uih15MvqGZhJNIZZS6F8RKLqhqxSPLD6bLEIUAYtePhEzydYnRlKLpj2Fuz0vk8ocdHem1yXa+xgRnAc5cWy6WGZJjFxKqDCllGijXt+M+D6wBxLEyVYHK6HpnSkI8q1/kU/NB6SuoWJqE9Pdljyq1p4jQN77KWH1Js8vP0BKXjykcNxRr0vPb3PzGCKm/k622vEPYAkh1pJ90TxeqxWBlDF2HI0R1ChVRZaWO+6BifRqva0Ed57pUIRhYxCFwGGpbuxM7MBOIoP7UoBIvj1+qSNDKCxxIOWoEirsWSL6mcNMxFIGODsB4f7How1Bse5F/+CmrhEk6j0A+uRa31VJVAZiBGSFY1ztt6jN+3bPnmtSq0GeqNJfnj8T9OqK3E/xIS9S53+am3A0Xmxuhefsm/P3kMrnwL53PvYHE0gFay8IvLfj6MmTO8YuyhDkpPqlN8KdVD5701LHHuwBkiIOlFuDBS3J+2YhEOAnGSFYzrZrTI7ynlk4nC5P1Ekc4Ia4rkEEyoJS8SejoGoMRg673uNmkRx3uVTo3hVrgd3I4aThAyp42tFmjNsiqMF27dpakA6xXm8IGiMseXkaCMYu8T4LQa74Umwdk18gn6RNIhQkjLzXvz+OVtdRhHICt3reSdsS5xAHzOTGCK/r4cyuvobE9TJcv49mKhJxshtQnBWogeX/VcA0eJOBYethHjcciva3FBCRcwC2Vhh1FJ+Gi/itcJPW+7yl/qldM4QZfXoXaDwqER3vM2+oIAhHO7zm/EuKBCsiIRy1O2LKNc58zqldWLCDZsAPw3GkMQfXK8uJ177lD0FS5xPjNAWNTKdP8D+VqRcLU+Z/I/o9qiC83sMH29pUrRBWqd6IOP95mNArXHSJ3UzBc2rBv2KppYDGCon/ktKnxm6fokH8MwBV5vJzBugoAMd8ILKeHP+mQaVRMruauCHtZWVle6Ep18++gYx+ZL4gWwFAQQRUvJJ1XncRgknzp5P/2//3ZMSiDVK7tmFmnleB8f8Mc2iTSwb/fW7kZPrKEzr9GemU5DniAJ4BvrCW7BYUdVHu+TVQhu8fST+yC8VzprARYeXr4D2Rbl11L4L78SldjbfNTH37HVz1CLanYU5YZQO5F6hmDRmq8Z++957E94eZeDdKs628CaHVtOjs+VfecFFn7qtTgbPLvxF8z0PP2no0j8Pl62FzLYS6ztf9fswls0qbY5KiVaFWoZJ7RBZargqtLiensUYke/veaEZ7swzX52hKgM9NdoZ589qtCwE6nbAihhBIDkCcWb9cqU3lbhgspeIgzG/SkV42Tp/RiquVlwPTLBkn07vQ7lEdl2D/gtJijvkOadbEItJDVOprBWNSSWec3wQ15/nt4HXyxktF3qreZ5iKCVv5lW6Ho3pBLaHDpCplMkjst0vnke3/tUZJOgfNvFQBrczityVXrNKd0TvdnNM8lfD0OCjZk8qTuZLenjI4Ft5JSogktLTKm1/BxN9lG11/TAokmEcY6iXkEMIQDc+En4rR4OYrU0+41rICz7u548rRS2Z9ovxCLhCe+IynEg/i0DrmVEU8FW+Sw2zrXkLCi/VuBDhz9Lw3BTBub8hm0ETWeC5naIVF+sKpU+rNMMG1UX6hDrvpwxxu6NXzfaE5d/QIl9UbV1SxxExbJwQXP9rKjDsBcEV7MlgV6Pri3UZ1/5KC5tVjZuQf7xL21Ex3XWChOqFNHEPaRxuDC9BpFNrdyCLkWAHoI+DysOZE9XZgyYdafR+erivu5Sx1PEy7u1CzQiFhgVs9WTKledMwVM0CYubKa/ihL15F9/I6hTZinwaZXVvSZR3+Za7U8zOeYb8BZ/BxS8Amklh750ZKd1DTV2/ZmqfPlVVziozlwWb9AZVtzKaX3I9GsGnQaEj3y2m9Djuo6TRQa0+yeYEdc7KJUUuAag7fv5GrCqEDyTzFmDTQ98LHWTGQ2v/Dw9D4RqbPcYgoL/y4DEmFhG+QXdfAHArvsAGGOEU3SoDUhhpinv2RBP1P5Y0ZQ2WQKH26EJNw09X/XfJH8dWgkyg3fVX646WPM31i2Cm+9whq2IqCqTc9erCQZ+TSddazLFiyazd2xmjYF2zChvMderBxPciMyhG+gGiteWNeBSc+rhFd6/tr18gIiF5DAKWHy8FIBEX1xhK94jkjQbw6mmFEqbMN9DfegmD8fbusEKxr1p8bMslIrTxcv7EsXCuD9NpUB+wXgecyKjzQZMLpPPsZiH0XHa2DqtQEaJXnXHygW0kzs4d1vHqtJ6XvQjc7RxuYei4Q0IjCjcD6ZnWdcxXIn/GzoQaefD7MIGAFWEwKfOZoUlgDDEw4qCGXFyAmFeOtiFvZNipqDqAaT5xyIDPQKkz4AAle1u9xq2WnFMuytNwIp8FmSVgQNe7dyVo8TBVSZXAWyWAmnEDQEXIZsUDbNsu7VUE+5bpT9UBwaHw38z09uHE6dp88VDhUUf5A3YWBqHdLZNQGnjrR3zDOHC0/vtU40cUBzXokd10byUHReMoG+lPqCQ6HqRgKC9V0cIXfNHn3TDrEGZ/kAjOon+Z6M3oGwG2Z0NLph7IfsarMT3p07PN5kUKwIpDp15ZfTWzDNtZRn9HDNVuZTuEeFXUWKLbaSb69xeoLGEMxcvwfNfsU9xNYcQYMPnYRJy3ZVoC0u8Twzncck/K+xHXjy3rLiPluu0Iafosa6LuDCn+uk7+dWReL4aeqqJBUxQq5RtxPLOOkUy6PE58KMBV82QIz1UkTyAb3ST61Ro/YAyiZEBOv4U7RRmCOuKi3FNPwGazT2+OkTWqeVjpVgP70Xd8sHxN4w3v/RxDqhhRdoxXkqNFfM81C6x58qE45sBeu4G/FelGzOo1ia+sUjHmcaHLokQzsriMAm9Xi4stmGzqUmebgqPD/nh2kMbAjIMKSW2gk6ItMgJ7wMaoxeMcKCL/JaCuhITtS2SmPy3fNLBW2hxJaz2oh22xLVaoDSNryedC/c5FLPIm3p8cSaIECQTH3ArhkIfj2fpZf6Eto3WcknaCkmVEVFG1Gw1m97I7CP7orPO64H2cUtRsBjy7Qjr1wsbKA3l/UUN7Xit7OEJNGm+gd7UGd4M6IXDJAZe4LOplMexqnaGCuP4rLA0eA+snfB2Pi89LpPm/gyQS51zRSJs0vNSM6a7B8s3HsR4d0za+SCvRqy9HtqmMjs1cbZ8V9plj93TLmPVarP32gjWJrS/1iB/bIGwR9c2lcG8/h6xoJoZ8DvNLNYcGV7C/13je4dIomskUlXmV3FMHGX+IbmYA9LxbX16k3lHsfjzuaBwxLoqvwc/IqKKIE5PBETYPOn8tpTA44J3wx5v3zhAZmyDpZWupigqmpYudUeCCzNY83pN1XrtOl4plAWtQtEgb8ZuyXwhdV2D2fgWmKnb47m1JpWOkD5CrVVRKZo7rTVwbj/y997+QA1/W+1kOdm6ihCIGdgUt2uIcJoxUQFtA/tqwso8hIpCIeZ1CnWDwKX/0L8HwcaZSMH0CKYAMcaq+ktfWY27aYlv90/mq6Rcjs/jqEg/RwJmXWvA0qHzfgO/N7GTWTZG+WPyKDywDwcNEJTc7PAfm40ApCCJJC62kPyJ4LlS2dJSLy1C1vB8lcCeXQe2t7uYaQRbTWXIcpTNP9QfPPsbDdY3F4fWgCoJne7QPrR5vkiQBaO/mVZB1jRqpFiRcTqFK5DNVm02GvHevRI3PX843Ndge3fAo0IaWWNyvElMlaFmSGXZjFH3mAVbi3glPaDBkRuWBUJcK/lYV+8tHKb8QaroHjTXhOb2xhe6vf/j0T8QWSz0Rk5q8baaIDfeyaRjGAJ65IqCW+jTGu5JVytNq73/Y3xrwPbK3eajekobFMZmTzMiKA+l2rqgITKBWi/3613z+yo0IvjllEQE2fn8NmfbHE24+J9VQm6thPdVp7+2jJVkgBGu5F7W5sOdxH5t/PgKYYHHWZCIhvg1KT4kf44JIx7Fo5vG4QnUaZKLYum5BNIPXeOb2VWBKORpkqoyWOrVplUs1LCeTf951lA2j2r8TMtTJGwpUr5K5IHUby4em2bNGgXxFK0pya14EFl1Dcx5pZK3rqMIJPVfywYvaKrX/24W8rqToOKsnQbBZ3RDG65lFMa8NtFsmV5ccyD13PLvBu44oI5xUBR5ol6cnyopgoLjQzrG43S9r9CMvGnNzaVdTVwCAonmPtT9/5H53q9d2QgD+G/tWS8OkbRB+IGKEjurKGf3Z2NMxf3FDxe146ZZM3io53ZjEfVEC2p7nB5VE2k6UsULeUvUrQMhF/m4JWgJHg28TykYN+afsR21hk8wJNOz2yzSXHkfKDqw59R+U2o1Ky4Ky1AxpOA1GGdHwRiNkcTzxoAD4lXulybxi2p5kzNXn/g1Q1G7+6LQVT2kqw2iB/jjCPOvSIE2cI9nHBEmqfJRpF85FnQRVsDa53eo1fuz6IZxd/6lzpFSVxWcLreNKuI/kR6tguygEgK0BqZcVuOL08C6XeZRPf08N2PJ47EIb9cYIIqrWyv5XIz6uY9Bzm3SMCcrIMIFwI7Hi3f9SUugQrKhyzWNH+4vu27D3mH+f1lB5kiCasfhd8BPrNqGGWpSYsPOc+8SlT0Dcqvi/AihlDUDyX3w3jVrxIfhhnPhAk5KveDW7GJGYhqD/TwID8SFM9rwlGYdQkVXseNCpHSaQomvY67jmJtNnovsMbAa51k5S6ZdX8jwK1Ly0AE0r8Fpr5eZn8jCiRBpXsqfl5tcL5wfl1onEXDsYJnUBCn7BuFYomofgPlCcwcee+MToK2EmBGPnndG8C39CXnjlW1dc7kQPLAsx8b1c2JPLIRDOh0UgMCya5RnkGas8qkpMpiRbjrb0OtT23ahfLJP0lRWLvuI2c0f3g1oR6B5bKpyTYgL5oZqRo7d30oTbYir3HGWu0cQLQkapwkIyg4+EHT4ydm4l4BZV1z7TRirhW0xc3piiq3ZFi54vvYwU0KIFFkegSmwH+/4BiiI0QLYWIQzirU0w8NizIfv5umV05hUvAOg+zO0L34tWwH59tkuk6v7uZGvFtCEYNJDMiKJnNNHpNyAzo+yUf8hRmvDqsEDYaXPac6C39JrMZwCYO4RXiaChX0YfJNna6DzPD2s0v0H0w2pICvFOVmhkZflnUCGKL5R95mvS9XM4x7dmBGzlWWc6haWhMwFXsCA1/Z212ehG1pR6oLxbn471u6xKoBLHxf+CSpvmtckinl5cvx3TGCG4gZKiux/4z9DgrwraRjY3w9DXNrwHOkHJfCueuvhHA9GqzcXdkRzorjuVra/LhVW4/oO5xDH89NfVLuX5AAAAAA==');
