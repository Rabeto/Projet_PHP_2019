// Add Record
function addRecord() {
  // get values
  var num_visiteur = $("#num_visiteur").val();
  num_visiteur = num_visiteur.trim();
  var nom = $("#nom").val();
  nom = nom.trim();
  var adresse = $("#adresse").val();
  adresse = adresse.trim();

  if (num_visiteur == "") {
      swal("Le champ N° Visiteur est à remplir !","","warning");
  }
  else if (nom == "") {
      swal("Le champ Nom est à remplir !","","warning");
  }
  else if (adresse == "") {
      swal("Le champ adresse est à remplir !","","warning");
  }
  else {
      // Add record
      $.post("create.php", {
          num_visiteur: num_visiteur,
          nom: nom,
          adresse: adresse
      }, function (data, status) {
          // close the popup
          $("#add_new_record_modal").modal("hide");

          // read records again
          readRecords();
        swal("Ajout effectuer avec Succès","","success");
          // clear fields from the popup
          // $("#num_visiteur").val("");
          $("#nom").val("");
          $("#adresse").val("");
      });
  }
}

// READ records
function readRecords() {
  $.get("read.php", {}, function (data, status) {
      $(".records_content").html(data);
  });
}

function GetUserDetails(id) {
  // Add User ID to the hidden field
  $("#hidden_user_id").val(id);
  $.post("details.php", {
          id: id
      },
      function (data, status) {
          // PARSE json data
          var user = JSON.parse(data);
          // Assign existing values to the modal popup fields
          $("#update_num_visiteur").val(user.num_visiteur);
          $("#update_nom").val(user.nom);
          $("#update_adresse").val(user.adresse);
      }
  );
  // Open modal popup
  $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
  // get values
  var num_visiteur = $("#update_num_visiteur").val();
  num_visiteur = num_visiteur.trim();
  var nom = $("#update_nom").val();
  nom = nom.trim();
  var adresse = $("#update_adresse").val();
  adresse = adresse.trim();

  if (num_visiteur == "") {
    swal("Le champ N° Visiteur est à remplir !","","warning");
  }
  else if (nom == "") {
    swal("Le champ Nom est à remplir !","","warning");
  }
  else if (adresse == "") {
    swal("Le champ adresse est à remplir !","","warning");
  }
  else {
      // get hidden field value
      var id = $("#hidden_user_id").val();

      // Update the details by requesting to the server using ajax
      $.post("update.php", {
              id: id,
              num_visiteur: num_visiteur,
              nom: nom,
              adresse: adresse
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

function DeleteUser(id) {
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
                id: id
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