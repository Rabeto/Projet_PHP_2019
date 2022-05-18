var button = document.getElementById('inscrire');

    button.addEventListener('click', function(e) {
       var tab1 = document.querySelector("table");
       var tbody = tab1.querySelectorAll("tbody");
       var derniertbody = tbody[tbody.length - 1];

       if(derniertbody.children[0].children[0].innerHTML == "Données Vides!" ) {
            document.getElementById("num_site").setAttribute("value", "S00001");
       }else {
        
           var num  = derniertbody.children[0].children[0].innerHTML;
           var nbr = num.slice(1,num.length);
            var nbrs;
           nbrs = ++nbr;
           if( nbrs <= 9 ) {
            var numv = "S0000".concat(nbrs);
            var doc = document.getElementById("num_site").setAttribute("value", numv);
            var e;
            e = doc;
            console.log(e);
           }else if( (10 <= nbrs) && (nbrs <= 99) ) {
            
            var numv = "S000"+nbrs;
            var doc = document.getElementById("num_site").setAttribute("value", numv);
            var e;
            e = doc;
           }else if( (100 <= nbrs) && (999 >= nbrs) ){
            
            var numv = "S00"+nbrs;
            var doc = document.getElementById("num_site").setAttribute("value", numv);
            var e;
            e = doc;
           }else if ( (1000 <= nbrs) && (9999 >= nbrs)) {

            var numv = "S0"+nbrs;
            var doc = document.getElementById("num_site").setAttribute("value", numv);
            var e;
            e = doc;
           }else{
            
            var numv = "S"+nbrs;
            var doc = document.getElementById("num_site").setAttribute("value", numv);
            var e;
            e = doc;
           }
        }
    });
