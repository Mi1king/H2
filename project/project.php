<?php
define("PROJECT_NAME", "Health Hour");
/**
 * 跳转方法
 * @param $msg
 * @param null $path
 * @param null $parent
 */
function alertf($msg, $path = NULL, $parent = NULL)
{
    if ($parent === true) {
        $str = <<<str
        <script>alert('{$msg}');parent.location.href='{$path}'</script>
str;
    } else if (empty($path)) {
        $str = <<<str
        <script>alert('{$msg}');history.back()</script>
str;
    } else {
        $str = <<<str
        <script>alert('{$msg}');location.href='{$path}'</script>
str;
    };
    echo $str;
}
