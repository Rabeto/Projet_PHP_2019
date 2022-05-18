// Add Record
function addRecord() {
  // get values
  var num_site = $("#num_site").val();
  num_site = num_site.trim();
  var nom = $("#nom").val();
  nom = nom.trim();
  var lieu = $("#lieu").val();
  lieu = lieu.trim();
  var tarif_jrs = $("#tarif_jrs").val();
  tarif_jrs = tarif_jrs.trim();

  if (num_site == "") {
      swal("Le champ N° Visiteur est à remplir !","","warning");
  }
  else if (nom == "") {
      swal("Le champ Nom est à remplir !","","warning");
  }
  else if (lieu == "") {
      swal("Le champ lieu est à remplir !","","warning");
  }
  else if (tarif_jrs == "") {
      swal("Le champ tarif journalier est à remplir !","","warning");
  }
  else {
      // Add record
      $.post("create.php", {
          num_site: num_site,
          nom: nom,
          lieu: lieu,
          tarif_jrs: tarif_jrs
      }, function (data, status) {
          // close the popup
          $("#add_new_record_modal").modal("hide");

          // read records again
          readRecords();
          swal("Ajout effectuer avec Succès","","success");

          // clear fields from the popup
          //$("#num_site").val("");
          $("#nom").val("");
          $("#lieu").val("");
          $("#tarif_jrs").val("");
      });
  }
}

// READ records
function readRecords() {
  $.get("read.php", {}, function (data, status) {
      $(".records_content").html(data);
  });
}

function GetUserDetails(id_site) {
  // Add User ID to the hidden field
  $("#hidden_user_id").val(id_site);
  $.post("details.php", {
          id_site: id_site
      },
      function (data, status) {
          // PARSE json data
          var user = JSON.parse(data);
          // Assign existing values to the modal popup fields
          $("#update_num_site").val(user.num_site);
          $("#update_nom").val(user.nom);
          $("#update_lieu").val(user.lieu);
          $("#update_tarif_jrs").val(user.tarif_jrs);
      }
  );
  // Open modal popup
  $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
  // get values
  var num_site = $("#update_num_site").val();
  num_site = num_site.trim();
  var nom = $("#update_nom").val();
  nom = nom.trim();
  var lieu = $("#update_lieu").val();
  lieu = lieu.trim();
  var tarif_jrs = $("#update_tarif_jrs").val();
  tarif_jrs = tarif_jrs.trim();

  if (num_site == "") {
      swal("Le champ N° Visiteur est  à remplir !","","warning");
  }
  else if (nom == "") {
      swal("Le Champ Nom est à remplir !","","warning");
  }
  else if (lieu == "") {
      swal("Le champ lieu est à remplir !","","warning");
  }
  else if (tarif_jrs == "") {
    swal("Le champ tarif journalier est à remplir !","","warning");
  }
  else {
      // get hidden field value
      var id_site = $("#hidden_user_id").val();

      // Update the details by requesting to the server using ajax
      $.post("update.php", {
              id_site: id_site,
              num_site: num_site,
              nom: nom,
              lieu: lieu,
              tarif_jrs: tarif_jrs
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

function DeleteUser(id_site) {
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
                id_site: id_site
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
          swal("Suppression effectuer avec succès !", "", "success");
        } else {
          swal("Suppression annuler ","", "error");
        }
      });
}

$(document).ready(function () {
  // READ records on page load
  readRecords(); // calling function
});