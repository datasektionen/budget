<?php

namespace App\Helpers;

use Collective\Html\FormFacade;

class AuroraForm extends FormFacade {
    public static function open($options = []) {
        return parent::open($options) . '<div class="form">';
    }

    private static function surround($element, $label = null, $id = null) {
        return '<div class="form-entry">' .
                    ($label !== null ?
                    '<span class="description">' . 
                        '<label for="' . ($id === null ? '' : $id) . '">' . $label . ':</label>' . 
                    '</span>' 
                    : '') .
                    '<div class="input">' . 
                        $element . 
                    '</div>' .
                    '<div class="clear"></div>' .
                '</div>';
    }

    public static function text($id, $label, $default = null) {
        return self::surround(parent::text($id, $default, ['id' => $id]), $label, $id);
    }

    public static function textarea($id, $label, $default = null) {
        return self::surround(parent::textarea($id, $default, ['id' => $id]), $label, $id);
    }

    public static function datetime($id, $label, $default = null) {
        return self::surround('<input type="datetime-local" name="' . $id . '" id="' . $id . '" value="' . date('Y-m-d\TH:i') . '" />', $label, $id);
    }

    public static function file($id, $label, $default = null) {
        return '<div class="form-entry">' .
                    ($label !== null ?
                    '<span class="description">' . 
                        $label .
                    '</span>' 
                    : '') .
                    '<div class="input file">' . 
                        parent::file($id, ['id' => $id]) .
                        '<label for="' . $id . '">Välj fil</label>' . 
                        '<span id="file-' . $id . '"></span>' .
                    '</div>' .
                    '<div class="clear"></div>' .
                '</div>' .
                '<script type="text/javascript">
                $("#' . $id . '").bind("change", function() { 
                    var fileName = $(this).val()
                    if (fileName.match(/fakepath/)) {
                        fileName = fileName.replace(/.*fakepath(\\\\|\/)/i, \'\');
                    }
                    $("#file-' . $id . '").html(fileName)
                })
                </script>';
    }

    public static function submit($label) {
        return self::surround(parent::submit($label));
    }

    public static function close() {
        return '</div>' . parent::close();
    }
}
