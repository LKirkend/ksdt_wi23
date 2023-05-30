## Example use
```js
const url = 'http://localhost:8080/services/schedule_txt.ashx?schedule=372';
const options = {
    method: 'GET',
    headers: {
        'Target-Url': 'https://ucsdtritons.com'
    }
}
fetch(url, options).then(res => res.text()).then(txt => console.log(txt)); // ...
```

cd into this directory and run:\
npm install\
node index.js

