function GetForms() {

    
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("formButtons").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","retrieveFormsNumber.php",true);
        xmlhttp.send();
    }


    