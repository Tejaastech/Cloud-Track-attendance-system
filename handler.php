<?php
// Show PHP errors (use only for debugging!)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Allow URL fopen
ini_set('allow_url_fopen', 1);

// Get the request path (excluding query string)
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Simple router
switch ($path) {
    case '/':
    case '/index':
    case '/index.php':
        require __DIR__ . '/index.php';
        break;

    case '/login':
    case '/login.php':
        require __DIR__ . '/login.php';
        break;

    case '/dashboard':
        require __DIR__ . '/dashboard.php';
        break;

    case '/logout':
        require __DIR__ . '/logout.php';
        break;

    case '/students':
        require __DIR__ . '/students.php';
        break;
    case '/Admin':
        case '/Admin/':
        case '/Admin/index':
        case '/Admin/index.php':
        require __DIR__ . '/Admin/index.php';
        break;
            

    // Add more cases for other routes as needed

    default:
        http_response_code(404);
        echo "404 Not Found: " . htmlspecialchars($path);
        break;
}
?>
