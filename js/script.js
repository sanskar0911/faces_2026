fetch('https://api.quotable.io/random')
.then(res=>res.json())
.then(data=>{
 document.getElementById('quote').innerHTML = `<h3>Quote:</h3><p>${data.content}</p>`;
});