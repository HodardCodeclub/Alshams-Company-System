

function calling() {

    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rdiv").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","../../Head_of_the_supplier_accounts/includes/DisplayAccountForHSView.php",true);
        xmlhttp.send();
    }

    function calling2() {


    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rdiv").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","../../Head_of_the_customer_accounts/includes/DisplayAccountForHCView.php",true);
        xmlhttp.send();
    }

function calling3() {

    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rdiv").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","../../Head_of_subcontract_accounts/includes/DisplayAccountForHSCView.php",true);
        xmlhttp.send();
    }