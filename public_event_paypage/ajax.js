document.getElementById("redirect_cart_btn").onclick = function () {
    location.href = "cart/index.php";
};

var xmlHttp = createXmlHttpRequest();
function createXmlHttpRequest() {

    var xmlHttp;

    //IE5 or IE6
    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
            xmlHttp = false;
        }
    }
    else {
        try {
            xmlHttp = new XMLHttpRequest();
        }
        catch (e) {
            xmlHttp = false;
        }
    }

    if (!xmlHttp)
        alert("Error creating XMLRequest object.");
    else

        return xmlHttp;
}

function add_to_cart(price, eve_id, user_id, issue_t, qua) {

    var xmlhttp = new XMLHttpRequest();
    var quantity = qua;
    var issue_tickets = issue_t;
    if (quantity > issue_t) {
        xmlhttp.open("GET", "ajaxc.php?q=" + price + "&p=" + eve_id + "&r=" + user_id + "&t=" + issue_t + "&y=" + qua, true);
        xmlhttp.send();
    }
}