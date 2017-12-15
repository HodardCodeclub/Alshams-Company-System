 // function getvalueinput() { 
 //        var name;
 //        name= document.getElementById('pname');

 //        showstage(name);
 //    }
   

 //  function showstage(str) {
 //    if (str == "") {
 //        document.getElementById("showResult").innerHTML = "";
 //        return;
 //    }else { 
 //        if (window.XMLHttpRequest) {
 //            // code for IE7+, Firefox, Chrome, Opera, Safari
 //            xmlhttp = new XMLHttpRequest();
 //        } else {
 //            // code for IE6, IE5
 //            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 //         }
 //   	xmlhttp.onreadystatechange = function() {
 //            if (this.readyState == 4 && this.status == 200) {
 //                document.getElementById("showResult").innerHTML = this.responseText;
 //             }
 //        };
 //        xmlhttp.open("GET","../includes/viewProjectState.php?Searchbar="+str,true);
 //        xmlhttp.send();
 //    }
 // }
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
                document.getElementById("result").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","../includes/getnotifications.php",true);
        xmlhttp.send();
    }