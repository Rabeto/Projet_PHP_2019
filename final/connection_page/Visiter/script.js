// Add Record
function addRecord() {
  // get values
  var num_visiteur = $("#num_visiteur").val();
  num_visiteur = num_visiteur.trim();

  var num_site = $("#num_site").val();
  num_site = num_site.trim();

  var nbjrs = $("#nbjrs").val();
  nbjrs = nbjrs.trim();
  var date_visite = $("#date_visite").val();
  date_visite = date_visite.trim();

  if (num_visiteur == "") {
      swal("Le champ N° Visiteur est à remplir !","","warning");
  }
  else if (num_site == "") {
      swal("Le champ N° Site est à remplir !","","warning");
  }
  else if (nbjrs == "") {
      swal("Le Nombre de jour est à remplir !","","warning");
  }
  else if (date_visite == "") {
      swal("La date de visite est à remplir !","","warning");
  }
  else {
      // Add record
      $.post("create.php", {
          num_visiteur: num_visiteur,
          num_site: num_site,
          nbjrs: nbjrs,
          date_visite: date_visite
      }, function (data, status) {
          // close the popup
          $("#add_new_record_modal").modal("hide");

          // read records again
          readRecords();
          swal("Ajout effectuer avec Succès","","success");

          // clear fields from the popup
          $("#num_visiteur").val("");
          $("#num_site").val("");
          $("#nbjrs").val("");
          $("#date_visite").val("");
      });
  }
}

// READ records
function readRecords() {
  $.get("read.php", {}, function (data, status) {
      $(".records_content").html(data);
  });
}

function GetUserDetails(id_visiter) {
  // Add User ID to the hidden field
  $("#hidden_user_id").val(id_visiter);
  $.post("details.php", {
          id_visiter: id_visiter
      },
      function (data, status) {
          // PARSE json data
          var user = JSON.parse(data);
          // Assign existing values to the modal popup fields
          $("#update_num_visiteur").val(user.num_visiteur);
          $("#update_num_site").val(user.num_site);
          $("#update_nbjrs").val(user.nbjrs);
          $("#update_date_visite").val(user.date_visite);
      }
  );
  // Open modal popup
  $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
  // get values
  var num_visiteur = $("#update_num_visiteur").val();
  num_visiteur = num_visiteur.trim();
  var num_site = $("#update_num_site").val();
  num_site = num_site.trim();
  var nbjrs = $("#update_nbjrs").val();
  nbjrs = nbjrs.trim();
  var date_visite = $("#update_date_visite").val();
  date_visite = date_visite.trim();

  if (num_visiteur == "") {
      swal("Le N° Visiteur est  à remplir !","","warning");
  }
  else if (num_site == "") {
      swal("Le N° Site est à remplir !","","warning");
  }
  else if (nbjrs == "") {
      swal("Le Nombre de jour est à remplir !","","warning");
  }
  else if (date_visite == "") {
    swal("La date de visite est à remplir !","","warning");
  }
  else {
      // get hidden field value
      var id_visiter = $("#hidden_user_id").val();

      // Update the details by requesting to the server using ajax
      $.post("update.php", {
              id_visiter: id_visiter,
              num_visiteur: num_visiteur,
              num_site: num_site,
              nbjrs: nbjrs,
              date_visite: date_visite
          },
          function (data, status) {
              // hide modal popup
              $("#update_user_modal").modal("hide");
              // reload Users by using readRecords();
              readRecords();
              swal("Modification effectuer avec Succès","","success");
          }
      );
  }
}

function DeleteUser(id_visiter) {
    swal({
        title: "Etes-vous sûr de vouloir supprimer cette information ?",
        text: "Vous pouvez revenir en arrière",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Oui, je suis sûr ",
        cancelButtonText: "Non, je suis pas sûr",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
            $.post("delete.php", {
                id_visiter: id_visiter
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
          swal("Suppression effectuer avec succès !","", "success");
        } else {
          swal("Suppression annuler ","", "error");
        }
      });
}

function Affiche_num_v(){
    $.get("affiche_num_v.php",{}, function(data,status){
        $(".num_v").html(data);
    });
}

function Affiche_num_s(){
    $.get("affiche_num_s.php",{}, function(data,status){
        $(".num_s").html(data);
    });
}

function Affiche_num_v_mod(){
    $.get("affiche_num_v_mod.php",{}, function(data,status){
        $(".num_v_mod").html(data);
    });
}

function Affiche_num_s_mod(){
    $.get("affiche_num_s_mod.php",{}, function(data,status){
        $(".num_s_mod").html(data);
    });
}

$(document).ready(function () {
  // READ records on page load
  readRecords(); // calling function
  Affiche_num_v();
  Affiche_num_s();
  Affiche_num_v_mod();
  Affiche_num_s_mod();
});

