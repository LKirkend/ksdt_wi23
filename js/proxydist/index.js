const express = require('express'),
    bodyParser = require('body-parser'),
    fetch = require("node-fetch"),
    app = express();

app.use(bodyParser.json({}));

app.all('*', function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "http://localhost");
    res.header("Access-Control-Allow-Methods", "GET");
    res.header("Access-Control-Allow-Headers", req.header('access-control-request-headers'));

    if (req.method === 'OPTIONS') {
        // CORS Preflight
        res.send();
    } else {
        var targetURL = req.header('Target-URL'); 
        if (!targetURL) {
            res.send(500, { error: 'There is no Target-Endpoint header in the request' });
            return;
        }
        fetch(targetURL + req.url, { method: 'GET' }).then(res => res.text()).then(txt => res.send(txt));
    }
});

app.set('port', process.env.PORT || 8080);

app.listen(app.get('port'), "127.0.0.1", function () {
    console.log('Proxy server listening on port ' + app.get('port'));
});