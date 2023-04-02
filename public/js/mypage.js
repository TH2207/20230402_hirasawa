document.addEventListener('DOMContentLoaded', function () {
  var jikan = new Date();

  var year = jikan.getFullYear();
  var month = jikan.getMonth()+1;
  var date = jikan.getDate();
  var now = new Date(year + '-' + month + '-' + date);

  var mytable = document.getElementsByClassName("confirm-tbl");
  var changebtn = document.getElementsByClassName("mypage-reserve-change-btn");
  var evaluatebtn = document.getElementsByClassName("mypage-evaluate-btn");

  for (var i = 0; i < mytable.length; i++) {
    var date = new Date(mytable[i].rows[1].cells[1].innerHTML);
    if (date <= now) {
      changebtn[i].disabled = "disabled";
      changebtn[i].style.color = "black";
    }
    else {
      evaluatebtn[i].style.visibility = "hidden";
    }
  }
});
