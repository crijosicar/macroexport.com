/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function () {
    (function ($) {
        "use strict";

        $('#form-search-products').submit(function (e) {
            e.preventDefault();
            var productName = $('#i-product-name').val();
            var currenturl = $(location).attr('href');

            if (getParameterByName('category') !== null) {
                if(getParameterByName('product') !== null){
                    var urln = replaceUrlParamByName('product', productName);
                    $(location).attr('href', urln);
                } else {
                    $(location).attr('href', currenturl + '&product=' + productName);
                }
            } else {
                $(location).attr('href', currenturl + '?product=' + productName);
            }
        });

    })(jQuery);
});


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function replaceUrlParamByName(paramName, paramValue, url){
    if (!url) url = window.location.href;
    if(paramValue == null)
        paramValue = '';
    var pattern = new RegExp('\\b('+paramName+'=).*?(&|$)')
    if(url.search(pattern)>=0){
        return url.replace(pattern,'$1' + paramValue + '$2');
    }
    url = url.replace(/\?$/,'');
    return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue; 
}


