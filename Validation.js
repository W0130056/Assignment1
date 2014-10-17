function highlight(elem) { document.getElementById(elem).style.background = "#ffff00";
    document.getElementById(elem).style.fontStyle="italic"; document.getElementById(elem).parentNode.style.textDecoration="underline"; }

function lowlight(elem) { document.getElementById(elem).style.background = "#ffffff";
    document.getElementById(elem).style.fontStyle="normal"; document.getElementById(elem).parentNode.style.textDecoration="none"; }

function validateForm() { var form_valid = true;

    //if empty turn red
    if(document.getElementById("first_name").value.length == 0)
    { document.getElementById("first_name").style.borderColor = "#ff0000"; form_valid = false; }
    else { document.getElementById("first_name").style.borderColor = "#00ff00";}

    if(document.getElementById("last_name").value.length == 0)
    { document.getElementById("last_name").style.borderColor = "#ff0000"; form_valid = false; }
    else { document.getElementById("last_name").style.borderColor = "#00ff00"; }

    if(document.getElementById("birth_date").value.length == 0)
    { document.getElementById("birth_date").style.borderColor = "#ff0000"; form_valid = false; }
    else { document.getElementById("birth_date").style.borderColor = "#00ff00"; }

    if(document.getElementById("gender").value.length == 0)
    { document.getElementById("gender").style.borderColor = "#ff0000"; form_valid = false; }
    else { document.getElementById("gender").style.borderColor = "#00ff00"; }

    if(document.getElementById("hire_date").value.length == 0)
    { document.getElementById("hire_date").style.borderColor = "#ff0000"; form_valid = false; }
    else { document.getElementById("hire_date").style.borderColor = "#00ff00"; }

    return form_valid;
}
