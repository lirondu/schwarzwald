
// Add css function
function AddCssLink(path) {
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = path;
    head.appendChild(link);
}


/*##### HANDLE DESKTOP OR MOBILE #####*/
var tabletAgents = /iPad|Android/i;
var phoneAgents = /Android.*Mobile|Mobile.*Android|BlackBerry|iPhone|iPod|Opera Mini|IEMobile/i;

if (navigator.userAgent.match(phoneAgents) || navigator.userAgent.match(tabletAgents)) {
    AddCssLink('css/phone.css');
}
else {
    AddCssLink('css/style.css');
}