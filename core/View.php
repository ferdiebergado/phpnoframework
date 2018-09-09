<?php
class View {
    private $view;
    public function __construct($view) {
        $this->view = $view;
    }
    public function render() {
        $file = VIEW_PATH . $this->view . '.php';
        if (file_exists($file)) {
            header("X-Frame-Options: SAMEORIGIN");
            header("X-Content-Type-Options: nosniff");
            header("X-XSS-Protection: 1; mode=block");
            require VIEW_PATH . 'sections/header.php';
            require $file;
            require VIEW_PATH . 'sections/footer.php';
        } else {
            throw new Exception("View not found.", 1);
        }
    }
}
