var confimationDeleteIsClicked = false;

function href(e){
    if(confimationDeleteIsClicked){
        e.preventDefault();
    }else{
        location.href = e.dataset.href;
    }
}

function confimationDelete(title, msg, id){
    confimationDeleteIsClicked = true;
    
    $("body").append("<div class='cDialogBox'><header>"+title+"</header><div class='cDialogBoxBody'>"+msg+"</div><div class='cDialogBoxFooter'><span class='okBtn' onclick='proceedDelete("+id+")'>OK</span><span class='cancelBtn' onclick='close_cDialogBox()'>Annuler</span></div></div>");
    $("body").append("<div class='cbackdrop' onclick='close_cDialogBox()'></div>");
}

function proceedDelete(id){
    confimationDeleteIsClicked = false;
    jQuery("#cbd_"+id).trigger('click');
}

function close_cDialogBox(){
    confimationDeleteIsClicked = false;

    $(".cDialogBox").remove();
    $(".cbackdrop").remove();
}

function previous(){
    window.history.back();
}