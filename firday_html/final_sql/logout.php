<?php
    session_start();

    // 清除所有的 session 變數
    $_SESSION = array();

    // 銷毀當前的 session
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    echo '你已經成功登出。';
?>