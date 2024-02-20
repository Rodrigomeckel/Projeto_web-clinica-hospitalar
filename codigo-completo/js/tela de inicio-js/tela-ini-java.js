var header = document.getElementById('header');
var navegadorheader = document.getElementById('navegador_header');
var content = document.getElementById('content');
var showSidebar = false

function toggleSidebar(){
    showSidebar = !showSidebar;
    if(showSidebar){
        navegadorheader.style.marginLeft = '-10vw';
        navegadorheader.style.animationName = 'showSidebar';
        content.style.filter = 'blur(2px)';
    }
    else
    {
        navegadorheader.style.marginLeft = '-100vw';
        navegadorheader.style.animationName = '';
        content.style.filter = '';
    }
}

function closesidebar(){
    if(showSidebar){
        toggleSidebar();
    }
}

window.addEventListener('resize', function(event){
    if(window.innerWidth > 768 && showSidebar){
        toggleSidebar();
    }
});

// Função que pode ser chamada no HTML
function iniciarCiclo() {
    $('#banner').cycle({
        fx: 'scrollLeft'
    });
}

// Chama a função quando o documento estiver pronto
window.onload = function() {
    iniciarCiclo();
};