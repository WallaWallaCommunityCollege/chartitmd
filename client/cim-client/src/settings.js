function applyChanges(){
    window.confirm("Text color: " + document.getElementById("TextColor").value);
    window.confirm("Background color: " + document.getElementById("BgColor").value);

    //Set variables in database to input.
    window.location.href = "patient.html";
}

function resetValues(){
    document.getElementById("TextColor").value = "#000000";
    document.getElementById("BgColor").value = "#FFFFFF";
    updatePreview();
}

function cancelChanges(){
    window.location.href = "index.html";
}

function loadPreset(value){
    switch(value){
        case "Default":
            document.getElementById("TextColor").value = "#000000";
            document.getElementById("BgColor").value = "#FFFFFF";
            break;
        case "Inverted":
            document.getElementById("TextColor").value = "#FFFFFF";
            document.getElementById("BgColor").value = "#000000";
            break;
        case "WWCC spirit":
            document.getElementById("TextColor").value = "#000000";
            document.getElementById("BgColor").value = "#F2EC06";
            break;
        default:
            document.getElementById("TextColor").value = "#000000";
            document.getElementById("BgColor").value = "#FFFFFF";
            break;
    }
    updatePreview();
}

function updatePreview(){
    document.getElementById("preview").style.color =
        document.getElementById("TextColor").value;
    document.getElementById("preview").style.backgroundColor =
        document.getElementById("BgColor").value;
}
//Presets
//document.getElementById("default").addEventListener("click", loadPreset);



//General
document.getElementById("ApplyChanges").addEventListener("click", applyChanges);
document.getElementById("RevertChanges").addEventListener("click", resetValues);
document.getElementById("cancel").addEventListener("click", cancelChanges);
document.getElementById("TextColor").addEventListener("change", updatePreview);
document.getElementById("BgColor").addEventListener("change", updatePreview);