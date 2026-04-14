document.getElementById('regForm').addEventListener('submit', function(e){
 let name=document.getElementById('name').value;
 let email=document.getElementById('email').value;
 if(name===''||email===''){
   alert('Please fill all required fields');
   e.preventDefault();
 }
});