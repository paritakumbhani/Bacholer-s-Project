/*
 *oltre all'fn conflict per far convivere prototype e magento 
 *in questo file troverete alcuni file di utilità comodi in tutti gli ecommerce
*/
var jq = jQuery.noConflict();

function trackclick(code, event, note){
    _gaq.push(["_trackEvent",code, event,note]);
}