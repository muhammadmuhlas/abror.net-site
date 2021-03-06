<?php

/**
 * The class handles the theme part in WP
 */
class SQ_DisplayController {

    private static $name;
    private static $cache;

    public function init() {
        /* Load the global CSS file */
        self::loadMedia('sq_global');
    }

    /**
     * echo the css link from theme css directory
     *
     * @param string $uri The name of the css file or the entire uri path of the css file
     * @param string $params : trigger, media
     *
     * @return string
     */
    public static function loadMedia($uri = '', $params = array('trigger' => true, 'media' => 'all')) {
        if (isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], '/admin-ajax.php') !== false)
            return;

        $css_uri = '';
        $js_uri = '';
        $local = true;
        if (!isset($params['media'])) {
            $params['media'] = 'all';
        }

        if (isset(self::$cache[$uri]))
            return;
        self::$cache[$uri] = true;

        /* if is a custom css file */
        if (strpos($uri, '/') === false) {
            $name = strtolower($uri);
            if (file_exists(_SQ_THEME_DIR_ . 'css/' . $name . '.css')) {
                $css_uri = _SQ_THEME_URL_ . 'css/' . $name . '.css?ver=' . SQ_VERSION_ID;
            }
            if (file_exists(_SQ_THEME_DIR_ . 'js/' . $name . '.js')) {
                $js_uri = _SQ_THEME_URL_ . 'js/' . $name . '.js?ver=' . SQ_VERSION_ID;
            }
        } else {
            $name = strtolower(basename($uri));
            if (strpos($uri, '.css') !== FALSE)
                $css_uri = $uri;
            elseif (strpos($uri, '.js') !== FALSE) {
                $js_uri = $uri;
            }
            $local = false;
        }



        if ($css_uri <> '') {
            if (!wp_style_is($name)) {
                wp_enqueue_style($name, $css_uri, null, SQ_VERSION_ID, $params['media']);
            }

            if (isset($params['trigger']) && $params['trigger'] === true) {
                wp_print_styles(array($name));
            }
        }

        if ($js_uri <> '') {
            if (!wp_script_is($name)) {
                wp_enqueue_script($name, $js_uri, null, SQ_VERSION_ID);
            }
            if (isset($params['trigger']) && $params['trigger'] === true) {
                wp_print_scripts(array($name));
            }
        }
    }

    public function setBlock($block) {
        self::$name = $block;
    }

    /**
     * echo the block content from theme directory
     *
     * @return string
     */
    public static function echoBlock($view) {
        global $post_ID;
        if (file_exists(_SQ_THEME_DIR_ . self::$name . '.php')) {
            ob_start();

            /* includes the block from theme directory */
            include(_SQ_THEME_DIR_ . self::$name . '.php');
            $block_content = ob_get_contents();
            ob_end_clean();

            return $block_content;
        }
    }

    /**
     * Called for any class to show the block content
     *
     * @param string $block the name of the block file in theme directory (class name by default)
     *
     * @return string of the current class view
     */
    public function output($block, $obj) {
        self::$name = $block;
        echo $this->echoBlock($obj);
    }

}
