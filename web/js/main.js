

const root = document.getElementById('root');

const txtElem = document.createElement('p');
const txt = 'GTK, an abbreviation for GNOME Toolkit, is an open-source and feature-rich development toolkit used for creating GUI applications';
root.appendChild(txtElem);

let i = 0;
function printText(time = 100){
	txtElem.textContent += txt[i];
	i ++;
	setTimeout(()=>{
		if (txt.length > i) {
			printText();
		}
	}, time);
}
printText();


// let socket = new WebSocket("wss://");

// socket.onopen = function(e) {
//   alert("[open] Connection established");
//   alert("Sending to server");
//   socket.send("My name is John");
// };

// socket.onmessage = function(event) {
//   alert(`[message] Data received from server: ${event.data}`);
// };

// socket.onclose = function(event) {
//   if (event.wasClean) {
//     alert(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`);
//   } else {
//     // e.g. server process killed or network down
//     // event.code is usually 1006 in this case
//     alert('[close] Connection died');
//   }
// };

// socket.onerror = function(error) {
//   alert(`[error]`);
// };