

function addTask() {
  var li = document.createElement("li");
  var taskContent = document.getElementById("taskinput").value;
  var t = document.createTextNode(taskContent);
  li.appendChild(t);
  document.getElementById("lst").appendChild(li);
  document.getElementById("taskinput").value = "";
  var myNodelist = document.getElementsByTagName("LI");
  for (var i = 0; i < myNodelist.length; i++) {
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("delete");
    span.className = "close";
    span.appendChild(txt);
    myNodelist[i].appendChild(span);
  }

  var deletetask = document.getElementsByClassName("close");
  var i;
  for (i = 0; i < deletetask.length; i++) {
    deletetask[i].onclick = function () {
      //alert("delete");
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
  var myNodelist = document.getElementsByTagName("LI");

  var mylist = document.getElementsByTagName("LI");
  var i;
  for (i = 0; i < myNodelist.length; i++) {
    var span = document.createElement("SPAN");
    var dn = document.createTextNode("done");
    span.className = "done";
    span.appendChild(dn);
    mylist[i].appendChild(span);
  }

  var doneTask = document.getElementsByClassName("done")
  var i;
  for (i = 0; i < doneTask.length; i++) {
    doneTask[i].onclick = function () {
      var d = this.parentElement;
      d.className = "checked";
    }
  }

}
