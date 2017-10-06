<?php

namespace App\Helpers;

use Collective\Html\FormFacade;

class AuroraForm extends FormFacade {
    public static function open($options = []) {
        return parent::open($options) . '<div class="form">';
    }

    private static function surround($element, $label = null, $id = null) {
        $vId = ($id === null ? '' : $id);

        $x = '<div class="form-entry">';
        
        if ($label !== null) {
            $x.= '<span class="description">';
            if (is_array($label)) {
                $x.= '<label for="' . $vId . '">' . $label['label'] . ':</label>'; 
                if (isset($label['description'])) {
                    $x.= '<span class="desc">' . $label['description'] . '</span>';
                }
            } else {
                $x.= '<label for="' . $vId . '">' . $label . ':</label>';
            }
            $x.= '</span>';
        }
        $x.=     '<div class="input">' . 
                     $element . 
                 '</div>' .
                 '<div class="clear"></div>' .
             '</div>';

        return $x;
    }

    public static function text($id, $label, $default = null) {
        return self::surround(parent::text($id, $default, ['id' => $id]), $label, $id);
    }

    public static function textarea($id, $label, $default = null) {
        return self::surround(parent::textarea($id, $default, ['id' => $id]), $label, $id);
    }

    public static function datetime($id, $label, $default = null) {
        if ($default === null) {
            $default = date('Y-m-d\TH:i');   
        }
        return self::surround('<input type="datetime-local" name="' . $id . '" id="' . $id . '" value="' . $default . '" />', $label, $id);
    }

    public static function select($id, $label, $options, $default = null) {
        return self::surround('<div class="select">' . parent::select($id, $options, $default, ['id' => $id]) . '</div>', $label, $id);
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
                '</div>';
    }

    public static function submit($label) {
        return self::surround(parent::submit($label));
    }

    public static function close() {
        return '</div>' . parent::close();
    }
}
