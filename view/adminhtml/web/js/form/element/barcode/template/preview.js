/*
 * Copyright © 2020 Landofcoder. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'underscore',
    'jquery',
    'ko',
    'Magento_Ui/js/form/element/abstract',
    'mage/translate'
], function (_, $, ko, Abstract, Translate) {
    'use strict';

    return Abstract.extend({
        url: ko.observable(),
        content: ko.observable(),
        data: ko.observable(),
        defaultData: ko.observable(),
        initialize: function () {
            this._super();
        },
        initData: function(){
            var self = this;
            self.data(self.source.data);
            if(self.data()[self.index]){
                if(typeof self.data()[self.index] == "string"){
                    self.data()[self.index] = JSON.parse(self.data()[self.index]);
                }
            }else{
                self.data()[self.index] = {};
            }
        },
        afterRender: function(){
            var self = this;
            if($(".form-inline div[data-index='general'] select[name='format']").length > 0){
                $(".form-inline div[data-index='general'] select[name='format']").change(function(){
                    self.useDefault();
                });
            }
        },
        useDefault: function(){
            var self = this;
            self.fillDefaultData();
        },
        fillDefaultData: function(){
            var self = this;
            self.initData();
            var value = self.data()['format'];
            if(value){
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
            }
        },
        previewTemplate: function(callback){
            var self = this;
            self.initData();
            if(self.data()){
                var self = this;
                self.initData();
                var data = self.data();
                $.ajax({
                    url: "/lof_barcodelabel/label/generatelabel",
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    complete: function(response) {
                        var data = response.responseJSON.data1;
                        var print_window = window.open('', 'print', 'status=1,width=700,height=700');
                        if(print_window){
                            print_window.document.open();
                            print_window.document.write(data);
                            print_window.document.close();
                        }else{
                            console.log('Message: Your browser has blocked the automatic popup, please change your browser settings or print the receipt manually');
                        }
                    },
                    error: function (xhr, status, errorThrown) {
                        alert(Translate('Error happens. Please fill all forms then try again'));
                    }
                });
            }else{
                console.log('Error: '+Translate('Cannot find the data for ')+this.label);
            }
        },
        printTemplate: function(){
            var self = this;
            self.initData();
            var data = self.data();
            $.ajax({
                url: "/lof_barcodelabel/label/generatelabel",
                type: 'POST',
                dataType: 'json',
                data: data,
                complete: function(response) {
                    var data = response.responseJSON.data1;
                    var print_window = window.open('', 'print', 'status=1,width=700,height=700');
                    if(print_window){
                        print_window.document.open();
                        print_window.document.write(data);
                        print_window.document.close();
                        print_window.print();
                    }else{
                        console.log('Message: Your browser has blocked the automatic popup, please change your browser settings or print the receipt manually');
                    }
                },
                error: function (xhr, status, errorThrown) {
                    alert(Translate('Error happens. Please fill all forms then try again'));
                }
            });
        }
    });
});
