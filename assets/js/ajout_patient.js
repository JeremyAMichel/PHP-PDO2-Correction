document.addEventListener('DOMContentLoaded', function() {
    let datepicker = document.querySelectorAll('.datepicker');
    let instancesDatepicker = M.Datepicker.init(datepicker, {
      format: "yyyy-mm-dd"
    });


    let selectRdv = document.querySelectorAll('select');
    let instancesSelectRdv = M.FormSelect.init(selectRdv, {});
  });


  