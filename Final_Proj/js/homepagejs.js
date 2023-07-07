window.onscroll = function(){
    scroll();
};

function scroll(){
    if(document.body.scrollTop>100 || document.documentElement.scrollTop>100){
        document.getElementById("Sticky").style.top = "0";
    }
    else{
        document.getElementById("Sticky").style.top = "-100px";
    }
}