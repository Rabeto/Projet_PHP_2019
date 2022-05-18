var button = document.getElementById('btn_total');

    button.addEventListener('click', function(e) {
        if(document.getElementById("tab").rows[1].cells[4].innerHTML == "Données Vides!")
        {
            var e;
            var nb = 0;
            e = document.getElementById("total").setAttribute("value", nb+" Ar");
        }else{
            var i = 1;
            var j;
            var x = document.getElementById("tab").rows.length;
            var y;
            y = x - 1;
            var nbr = Number(document.getElementById("tab").rows[1].cells[4].innerHTML);

            while(i<y)
            {
                j = i + 1;
                var z = Number(document.getElementById("tab").rows[j].cells[4].innerHTML);
                nbr=nbr+z;
                i++;
                //console.log(nbr);
            }
            var e;
            e = document.getElementById("total").setAttribute("value", nbr+" Ar");
        }
        console.log(console.log(document.getElementById("tab").rows[1]));
    });
