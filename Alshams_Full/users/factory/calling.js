

function calling() {

    
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
           
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rdiv").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","retrieveforms.php",true);
        xmlhttp.send();
    }

    function calling2() {


    
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rdiv1").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","retrievepages.php",true);
        xmlhttp.send();
    }

function calling3() {

    
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rdiv2").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","retrievetypes.php",true);
        xmlhttp.send();
    }