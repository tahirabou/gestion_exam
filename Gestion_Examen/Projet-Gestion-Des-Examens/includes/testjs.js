$("#first-choice").change(function() {
  $("#second-choice").load("getter.php?choice=" + $("#first-choice").val());
});
