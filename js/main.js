function get() {

    var myHeaders = new Headers();
    myHeaders.append('Content-Type', 'application/json');

    var myInit = {
        method: 'GET',
        headers: myHeaders,
        mode: 'cors',
        cache: 'default'
    };

    var myRequest = new Request('api.php');

    fetch(myRequest).then(function(response) {
        var contentType = response.headers.get("content-type");
        if(contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function(json) {
                // console.log(json);
                document.getElementById('idelement').innerHTML = '';
                json.forEach(
                    function(item) {
                        document.getElementById('idelement').innerHTML += item;
                    }
                );
            });
        } else {
            console.log("Oops, nous n'avons pas du JSON!");
            document.getElementById('idelement').innerHTML = "Not found !";
        }
    });

    setTimeout(get, 1000);

}

get();