const url = "http://localhost/Minichat-Fetch-Exemple/api/";

function RequestAPI(url, data) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let json = JSON.parse(xhr.responseText);
            switch (JSON.parse(data)["api"]) {
                case "getChat":
                    // console.log(json);
                    document.getElementById("chat_messages").innerHTML = "";
                    for (const [key, value] of Object.entries(json.content)) {
                        document.getElementById("chat_messages").innerHTML += `<p><span class="time">${value.time}</span> | <span class="username">${value.username}</span> : <span class="message">${value.message}</span></p>`;
                    }
                    break;

                default:
                    console.log(`Api rep doesn't exist. ${JSON.parse(data)["api"]}.`);
            }
        }
    };
    xhr.send(data);
}

function getChat() {
    let data = {};
    data["api"] = "getChat";

    RequestAPI(url, JSON.stringify(data));
}

function postAMessage() {
    let data = {};
    data["api"] = "postMessage";
    data["message"] = document.getElementById("message").value;
    data["username"] = document.getElementById("username").value;

    RequestAPI(url, JSON.stringify(data));
    
    document.getElementById("message").value = "";
}


setInterval(function () {getChat();},500);