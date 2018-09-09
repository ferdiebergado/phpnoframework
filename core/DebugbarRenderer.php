<?php
use DebugBar\StandardDebugBar;
class DebugBarRenderer {
    public static function getInstance() {
        $debugbar = new StandardDebugBar();
        $debugbarRenderer = $debugbar->getJavascriptRenderer();
        $debugbarRenderer->setBaseUrl('/debugbar');
        return $debugbarRenderer;
    }
}
