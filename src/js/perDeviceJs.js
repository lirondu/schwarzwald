
// Add script function
function AddScriptTag(path) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = path;
    head.appendChild(script);
}


/*##### HANDLE DESKTOP OR MOBILE #####*/
var tabletAgents = /iPad|Android/i;
var phoneAgents = /Android.*Mobile|Mobile.*Android|BlackBerry|iPhone|iPod|Opera Mini|IEMobile/i;

if (navigator.userAgent.match(phoneAgents) || navigator.userAgent.match(tabletAgents)) {
    AddScriptTag('js/mobile.js');
}
else {
    AddScriptTag('js/desktop.js');
}