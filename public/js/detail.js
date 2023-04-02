function inputUpdate() {
  const table = document.getElementById('confirm-tbl');
  table.rows[1].cells[1].innerHTML = document.getElementById("date").value;
  table.rows[2].cells[1].innerHTML = document.getElementById("time").value;
  table.rows[3].cells[1].innerHTML = document.getElementById("person").value + '人';
}

document.addEventListener('DOMContentLoaded', function () {
  document.getElementById("time").value = showTime();
  function showTime() {
    var now = new Date();
    var nowhour = now.getHours().toString().padStart(2,"0");
    var nowminutes = now.getMinutes().toString().padStart(2,"0");
    var text = nowhour + ":" + nowminutes;
    return text;
  }
  inputUpdate();
});

document.addEventListener('change', function () {
  inputUpdate();
});