/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/terms
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_BarcodeLabel
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */

define([
    'jquery',
    'ko',
    'underscore',
    'Magento_Ui/js/form/element/text',
    'mage/translate'
], function ($, ko, _, Text, Translate) {
    'use strict';

    return Text.extend({
        qty: ko.observable(),
        setQty: function(el, event){
            this.qty(event.tatget.value);
        },
        getData: function(){
            var data = {};
            if(this.source && this.source.data && this.source.data[this.index]){
                var datasource = JSON.parse(this.source.data[this.index]);
                data.params = datasource.params;
                data.params.qty = this.qty();
                data.url = datasource.url;
                if(typeof this.source.data['type'] != 'undefined'){
                    data.params.type = this.source.data['type'];
                }
            }
            return data;
        },
        getHtml: function(){
            var data = this.getData();
            if(data.url){
                var params = data.params;
                var url = data.url;
                var self = this;
                $.ajax({
                    url: url,
                    data: params,
                    success: function(result){
                        self.processResponse(result);
                    },
                    error: function(error){
                    }
                });
            }else{
                console.log('Error: '+Translate('Cannot find the data for "')+this.title()+'"');
            }
        },
        processResponse: function(response){
            var self = this;
            if(response.success && response.html){
                self.print(response.html);
            }
            if(response.error && response.messages){
                console.log('Error: '+response.messages);
            }
        },
        print: function(html){
            var print_window = window.open('', 'print', 'status=1,width=500,height=500');
            if(print_window){
                print_window.document.open();
                print_window.document.write(html);
                print_window.document.close();
                print_window.addEventListener('load',function(){
                    print_window.print();
                });
            }else{
                console.log('Message: '+'Your browser has blocked the automatic popup, please change your browser settings or print the receipt manually');
            }
        }
    });
});
