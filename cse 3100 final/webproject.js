function myFunction(something) {
    var input, filter, mb, div, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    mb = document.getElementById(something);
    div = mb.getElementsByClassName("product");
    for (i = 0; i < div.length; i++) {
        a = div[i].getElementsByTagName("h6")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            div[i].style.display = "";
        } else {
            div[i].style.display = "none";
        }
    }
}
function sortitem(something) {
    var list, i, j, switching, a, b, c, div, shouldSwitch, txtValue1, txtValue2, xx = "", yy = "", cnt = 0;
    list = document.getElementById(something);
    switching = true;
    while (switching) {
        switching = false;
        div = list.getElementsByClassName("product");
        for (i = 0; i < (div.length - 1); i++) {
            shouldSwitch = false;
            b = div[i].getElementsByTagName("h4")[0];
            c = div[i + 1].getElementsByTagName("h4")[0];
            txtValue1 = b.textContent || b.innerText;
            txtValue2 = c.textContent || c.innerText;
            xx = "";
            yy = "";
            for (j = 1; j < txtValue1.length; j++) {
                xx += txtValue1[j];
            }
            for (j = 1; j < txtValue2.length; j++) {
                yy += txtValue2[j];
            }
            if (parseInt(xx) > parseInt(yy)) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            div[i].parentNode.insertBefore(div[i + 1], div[i]);
            switching = true;
        }
    }
}