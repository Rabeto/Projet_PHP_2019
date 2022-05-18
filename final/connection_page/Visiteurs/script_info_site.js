function search(){
    var site = $("#myInput").val();
    site = site.trim();

    if(site != "" && date1 != "" && date2 != ""){
        readsearch();
    }else{
        swal("Veuillez remplir le site à rechercher et les 2 dates !","","warning");
        ReadSearch();
    }
}

function ReadSearch() {
    $.get("info_site_affiche.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function readsearch()
{
    $.ajax({
        method: "GET",
        url: "info_site_v2.php",
        data: {site:$("#myInput").val(),date1:$("#date1").val(),date2:$("#date2").val()},
        dataType: "text",
        success: function(data){
            $(".records_content").html(data);
        }
    });
}

function save(divname)
{
      var printContents = document.getElementById(divname).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      document.body.innerHTML.print();
      document.body.innerHTML = originalContents;
}


$(document).ready(function () {
    // READ records on page load
    ReadSearch(); // calling function
});

var btn = document.getElementById("btn_refresh");
btn.addEventListener('click', function(){
  swal("Actualisation terminer !","","success");
  $("#myInput").val("");
  $("#date1").val("");
  $("#date2").val("");
  ReadSearch();
});
