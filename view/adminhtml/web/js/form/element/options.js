define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select',
    'jquery',
    'jquery/ui',
    'mage/translate'
], function (_, uiRegistry, select, $, jUI, Translate) {
    'use strict';
    return select.extend({
        onUpdate: function (value) {
            var label_per_row = $('input[name="label_per_row"]');
            var label_width = $('input[name="label_width"]');
            var label_height = $('input[name="label_height"]');
            var margin_right = $('input[name="margin_right"]');
            var margin_left = $('input[name="margin_left"]');
            var margin_top = $('input[name="margin_top"]');
            var margin_bottom = $('input[name="margin_bottom"]');
            var font_size = $('input[name="font_size"]');
            var template_name = $('input[name="template_name"]');
            if(value == "standard") {
                label_per_row.val('3').trigger("change");
                label_height.val('200').trigger("change");
                label_width.val('200').trigger("change");
                margin_top.val('10').trigger("change");
                margin_bottom.val('10').trigger("change");
                margin_left.val('10').trigger("change");
                margin_right.val('10').trigger("change");
                font_size.val('16').trigger("change");
                template_name.val(Translate('Standard Barcode')).trigger("change");
            }
            else if (value == "a4") {
                label_per_row.val('4').trigger("change");
                label_height.val('150').trigger("change");
                label_width.val('150').trigger("change");
                margin_top.val('10').trigger("change");
                margin_bottom.val('10').trigger("change");
                margin_left.val('0').trigger("change");
                margin_right.val('10').trigger("change");
                font_size.val('14').trigger("change");
                template_name.val(Translate('A4 Barcode')).trigger("change");
            }
            else if (value == "jewelry") {
                label_per_row.val('1').trigger("change");
                label_height.val('300').trigger("change");
                label_width.val('300').trigger("change");
                margin_top.val('10').trigger("change");
                margin_bottom.val('10').trigger("change");
                margin_left.val('200').trigger("change");
                margin_right.val('200').trigger("change");
                font_size.val('16').trigger("change");
                template_name.val(Translate('Jewelry Barcode')).trigger("change");
            }
            return this._super();
        },
    });
});