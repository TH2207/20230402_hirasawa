function inputUpdate() {
  const table = document.getElementById('confirm-tbl');
  table.rows[1].cells[1].innerHTML = document.getElementById("date").value;
  table.rows[2].cells[1].innerHTML = document.getElementById("time").value;
  table.rows[3].cells[1].innerHTML = document.getElementById("person").value + '人';
}

document.addEventListener('DOMContentLoaded', function () {
  inputUpdate();
});

document.addEventListener('change', function () {
  inputUpdate();
});