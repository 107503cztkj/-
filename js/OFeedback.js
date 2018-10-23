// JavaScript Document
function Check(chk){
    var chkbox=document.getElementsByName(chk);
    if(document.myform.Check_ctr.checked==true){
        for (i = 0; i < chkbox.length; i++){
            chkbox[i].checked = true ;}
    }else{
        for (i = 0; i < chkbox.length; i++){
            chkbox[i].checked = false ;}
    }
}

function star_all(chk){
    var chkbox=document.getElementsByName(chk);
    if(chkbox[i].checked = true){
        rating_all
    }else{
        for (i = 0; i < chkbox.length; i++){
            chkbox[i].checked = false ;}
    }
}