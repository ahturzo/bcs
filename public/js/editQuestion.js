$(document).ready(function() {
  // for showing edit item popup

  $(document).on('click', "#edit-item", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#edit-modal').modal(options)
  })

  // on modal show
  $('#edit-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var question = row.children(".question").text();
    var opt_a = row.children(".opt_a").text();
    var opt_b = row.children(".opt_b").text();
    var opt_c = row.children(".opt_c").text();
    var opt_d = row.children(".opt_d").text();
    var correct_opt = row.children(".correct_opt").text();

    // fill the data in the input fields
    $("#modal-input-id").val(id);
    $("#modal-input-question").val(question);
    $("#modal-input-opt_a").val(opt_a);
    $("#modal-input-opt_b").val(opt_b);
    $("#modal-input-opt_c").val(opt_c);
    $("#modal-input-opt_d").val(opt_d);
    $("#modal-input-correct_opt").val(correct_opt);

  })

  // on modal hide
  $('#edit-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})