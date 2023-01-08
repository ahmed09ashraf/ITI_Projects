var dayNum = (new Date()).getDay();

switch (dayNum) {
  case 0:
    day.innerHTML = "SUN";
    break;
  case 1:
    day.innerHTML = "MON";
    break;
  case 2:
    day.innerHTML = "TUE";
    break;
  case 3:
    day.innerHTML = "WED";
    break;
  case 4:
    day.innerHTML = "THR";
    break;
  case 5:
    day.innerHTML = "FRI";
    break;
  case 6:
    day.innerHTML = "SAT";
    break;
}

function updateWatch() {
  day
  watch.innerHTML = ((new Date()).toLocaleTimeString());
}
setInterval(updateWatch, 1000);

function btnFn() {
  document.getElementsByClassName("popup")[0].style.display = "block";
}

var start;
var period;

function startAlarm(){
  alert("Alarm - Ding Ding\nFrom: "+start+"\nTo: "+((new Date()).toLocaleTimeString())+"\nPeriod: "+period+"ms");
}

function setAlarm(){
  period = Number((Number(sec.value) + (Number(min.value)*60) + Number((hr.value*3600))) *1000);
  setTimeout(startAlarm,period);
  document.getElementsByClassName("popup")[0].style.display = "none";
  start = ((new Date()).toLocaleTimeString());
}
function clearAlarm(){
  sec.value = '0';
  min.value = '0';
  hr.value = '0';
  document.getElementsByClassName("popup")[0].style.display = "none";
}