function showGraph()
{
    $.ajax({
      url: "chart.php",
      method: "GET",
      success: function(data) {
        $("#chart-countainer").html(data);
      }
    });
    console.log();
}

$(document).ready(function(){
    showGraph();
});
