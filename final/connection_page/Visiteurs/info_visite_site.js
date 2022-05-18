function search_visite_site(){
    var annee = $("#myInput").val();
    annee = annee.trim();
    var site = $("#site").val();
    site = site.trim();
    var mois = $("#sel1").val();
    mois = mois.trim();
    var date1 = $("#date1").val();
    date1 = date1.trim();
    var date2 = $("#date2").val();
    date2 = date2.trim();

    if(site == "" && annee == "" && mois == "" && date1 == "" && date2 == ""){
        swal("Veuillez les infos nécéssaire le plus possible !","","warning");
    }else{
      if(site != "" && annee != "" && mois == ""){
        search_by_year();
      }else if(site != "" && annee == "" && mois != "" && date1 == "" && date2 == ""){
        search_by_month();
      }else if(site != "" && annee != "" && mois != ""){
        search_global();
      }else if(site != "" && annee == "" && mois == "" && date1 != "" && date2 != ""){
        search_by_date();
      }else{
          readsearch_visite_site();
      }
    }
}

var btn = document.getElementById("btn_refresh");
btn.addEventListener('click', function(){
  swal("Actualisation terminer !","","success");
  $("#myInput").val("");
  $("#date1").val("");
  $("#date2").val("");
  ReadSearch_visite_search();
});

function ReadSearch_visite_search() {
    $.get("info_visite_site_search.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function readsearch_visite_site()
{
    $.ajax({
        method: "GET",
        url: "info_visite_site_v2.php",
        data: {site:$("#site").val(),annee:$("#myInput").val(),mois:$("#sel1").val(),date1:$("#date1").val(),date2:$("#date2").val()},
        dataType: "text",
        success: function(data){
            $(".records_content").html(data);
        }
    });
}

function search_by_year()
{
    $.ajax({
        method: "GET",
        url: "info_visite_site_v2_year.php",
        data: {site:$("#site").val(),annee:$("#myInput").val()},
        dataType: "text",
        success: function(data){
            $(".records_content").html(data);
        }
    });
}

function search_by_date()
{
    $.ajax({
        method: "GET",
        url: "info_visite_site_v2_date.php",
        data: {site:$("#site").val(),date1:$("#date1").val(),date2:$("#date2").val()},
        dataType: "text",
        success: function(data){
            $(".records_content").html(data);
        }
    });
}

function search_global()
{
    $.ajax({
        method: "GET",
        url: "info_visite_site_v2_global.php",
        data: {site:$("#site").val(),annee:$("#myInput").val(),mois:$("#sel1").val()},
        dataType: "text",
        success: function(data){
            $(".records_content").html(data);
        }
    });
}

function search_by_month()
{
    $.ajax({
        method: "GET",
        url: "info_visite_site_v2_month.php",
        data: {site:$("#site").val(),mois:$("#sel1").val()},
        dataType: "text",
        success: function(data){
            $(".records_content").html(data);
        }
    });
}

function save()
{
  window.print();
}

$(document).ready(function () {
    // READ records on page load
    ReadSearch_visite_search(); // calling function

  });

  console.log();
