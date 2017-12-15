function sendFormName(fname) {

    
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
           
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("emptydiv").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","retrieveDynForms.php?name="+fname,true);
        xmlhttp.send();
    }


 