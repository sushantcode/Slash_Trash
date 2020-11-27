var btn = [];
btn.push(
    document.getElementById("cust_btn"),
    document.getElementById("EA_btn"),
    document.getElementById("Est_btn"),
    document.getElementById("order_btn"),
    document.getElementById("item_btn"),
    document.getElementById("visit_btn"),
    document.getElementById("update_cust_btn"),
    document.getElementById("update_EA_btn"),
    document.getElementById("update_Est_btn"),
    document.getElementById("update_order_btn"),
    document.getElementById("update_item_btn")
    );
var popup = [];
popup.push(
    document.getElementById("cust_popup"),
    document.getElementById("EA_popup"),
    document.getElementById("Est_popup"),
    document.getElementById("order_popup"),
    document.getElementById("item_popup"),
    document.getElementById("visit_popup"),
    document.getElementById("update_cust_popup"),
    document.getElementById("update_EA_popup"),
    document.getElementById("update_Est_popup"),
    document.getElementById("update_order_popup"),
    document.getElementById("update_item_popup")
    );
var span = [];
span.push(
    document.getElementsByClassName("cust_close")[0],
    document.getElementsByClassName("EA_close")[0],
    document.getElementsByClassName("Est_close")[0],
    document.getElementsByClassName("order_close")[0],
    document.getElementsByClassName("item_close")[0],
    document.getElementsByClassName("visit_close")[0],
    document.getElementsByClassName("update_cust_close")[0],
    document.getElementsByClassName("update_EA_close")[0],
    document.getElementsByClassName("update_Est_close")[0],
    document.getElementsByClassName("update_order_close")[0],
    document.getElementsByClassName("update_item_close")[0]
    );

btn[0].onclick = function() {
    popup[0].style.display = "block";
}
span[0].onclick = function() {
    popup[0].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[0]) {
        popup[0].style.display = "none";
    }
}

btn[1].onclick = function() {
    popup[1].style.display = "block";
}
span[1].onclick = function() {
    popup[1].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[1]) {
        popup[1].style.display = "none";
    }
}

btn[2].onclick = function() {
    popup[2].style.display = "block";
}
span[2].onclick = function() {
    popup[2].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[2]) {
        popup[2].style.display = "none";
    }
}

btn[3].onclick = function() {
    popup[3].style.display = "block";
}
span[3].onclick = function() {
    popup[3].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[3]) {
        popup[3].style.display = "none";
    }
}

btn[4].onclick = function() {
    popup[4].style.display = "block";
}
span[4].onclick = function() {
    popup[4].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[4]) {
        popup[4].style.display = "none";
    }
}

btn[5].onclick = function() {
    popup[5].style.display = "block";
}
span[5].onclick = function() {
    popup[5].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[5]) {
        popup[5].style.display = "none";
    }
}

btn[6].onclick = function() {
    popup[6].style.display = "block";
}
span[6].onclick = function() {
    popup[6].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[6]) {
        popup[6].style.display = "none";
    }
}

btn[7].onclick = function() {
    popup[7].style.display = "block";
}
span[7].onclick = function() {
    popup[7].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[7]) {
        popup[7].style.display = "none";
    }
}

btn[8].onclick = function() {
    popup[8].style.display = "block";
}
span[8].onclick = function() {
    popup[8].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[8]) {
        popup[8].style.display = "none";
    }
}

btn[9].onclick = function() {
    popup[9].style.display = "block";
}
span[9].onclick = function() {
    popup[9].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[9]) {
        popup[9].style.display = "none";
    }
}

btn[10].onclick = function() {
    popup[10].style.display = "block";
}
span[10].onclick = function() {
    popup[10].style.display = "none";
}
window.onclick = function(event) {
    if (event.target == popup[10]) {
        popup[10].style.display = "none";
    }
}