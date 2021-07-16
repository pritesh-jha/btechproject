function randomInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
  function onRefreshPress(){
                            //variables
                            var Voltage = randomInteger(210, 231);
                            var Current = randomInteger(105, 120);
                            var Power = (Current*Voltage)/1000;
                            var today = new Date();
                            var Time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                            //table
                            var table = document.getElementById("table");
                            var row = table.insertRow();
                            var TimeCell = row.insertCell(0);
                            var VoltageCell = row.insertCell(1);
                            var CurrentCell = row.insertCell(2);
                            var PowerCell = row.insertCell(3);

                            TimeCell.innerHTML = Time;
                            VoltageCell.innerHTML = Voltage;
                            CurrentCell.innerHTML = Current;
                            PowerCell.innerHTML = Power;
                            //clear variables
                            var Time = "";
                            var Voltage = "";
                            var Current = "";
                            var Power = "";
                          }
setInterval(function(){ onRefreshPress(); }, 1000);
