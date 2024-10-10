<?php

declare(strict_types= 1);

/**
 * Digit Software Solutions..
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @category   Dss
 * @package    Dss_Core
 * @author     Extension Team
 * @copyright Copyright (c) 2024 Digit Software Solutions. ( https://digitsoftsol.com )
 */

namespace Dss\Core\Block\Adminhtml;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Color Picker Block
 */
class ColorPicker extends Field
{
    /**
     * Get Element Html.
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $value = $element->getData('value');

        $html .= '<script>
            require([
                "jquery",
                "jquery/colorpicker/js/colorpicker",
                "domReady!"
                ], function ($) {
                var el = $("#' . $element->getHtmlId() . '");

                el.css("background-color", "#' . $value . '");
                el.ColorPicker({
                    layout: "hex",
                    onChange: function (hsb, hex, rgb) {
                        el.css("background-color", "#"+hex);
                        el.val(hex);
                    }
                }).keyup(function() {
                    var value = el.val();
                    $(this).ColorPickerSetColor(value);
                    el.css("background-color", "#" + value);
                });
            });
            </script>';

        return $html;
    }
}
