var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?55775';
var s = document.createElement('script');
s.type = 'text/javascript';
s.async = true;
s.src = url;
var options = {
"enabled":true,
"chatButtonSetting":{
    "backgroundColor":"#4dc247",
    "ctaText":"",
    "borderRadius":"25",
    "marginLeft":"0",
    "marginBottom":"50",
    "marginRight":"50",
    "position":"right"
},
"brandSetting":{
    "brandName":"mh",
    "brandSubTitle":"Typically replies within a day",
    "brandImg":"https://cdn.clare.ai/wati/images/WATI_logo_square_2.png",
    "welcomeText":"Hi there!\nHow can I help you?",
    "messageText":"Hello, muhammad hidayaturrohman",
    "backgroundColor":"#00d640",
    "ctaText":"Start Chat",
    "borderRadius":"10",
    "autoShow":true,
    "phoneNumber":"6281382509259"
}
};
s.onload = function() {
    CreateWhatsappChatWidget(options);
};
var x = document.getElementsByTagName('script')[0];
x.parentNode.insertBefore(s, x);