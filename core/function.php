<?php
use core\Response;
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition)
        abort($status);
}
function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}


function base_path($path)
{
    return BASE_PATH . $path;
}
function view($path, $xtraAttr = [])
{
    // dd($path);
    extract($xtraAttr);
    require base_path('views/' . $path);
}

function login($user)
{
    $_SESSION["user"] = [
        "email" => $user["email"],
    ];
    session_regenerate_id(true);
}

function logout()
{

    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 20, $params["path"], $params["domain"]);

}

?>