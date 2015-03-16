function registerNewUser()
{
  var url = 'http://web.engr.oregonstate.edu/~gamblinr/CS290/Final_Project/registerCheck.php';
  var username = document.getElementsByName('username')[0].value;
  var password = document.getElementsByName('password')[0].value;
  var errorNode = document.getElementById('error');
  var checkReturn;
  var httpRequest;
  
  if ((username == '') || (password == ''))
    errorNode.textContent = "You need to enter both a username and a password";
  else {
    
    if (window.XMLHttpRequest)
    {
      httpRequest = new XMLHttpRequest();
    }
  
    else if (window.ActiveXObject)
    {
      httpRequest = new ActiveXObject('Microsoft.XMLHTTP');
    }
  
    httpRequest.open('POST', url, false);
    httpRequest.setRequestHeader(
      'Content-Type', 'application/x-www-form-urlencoded');
    httpRequest.send('username=' + username + "&password=" + password);
    
    if(httpRequest.responseText == 'nameTaken')
      errorNode.textContent = "That name is already taken, try again";
    else if(httpRequest.responseText == 'success')
      errorNode.textContent = 'Congratulations ' + username + ', you have successfully registered!';
    else 
      errorNode.textContent = httpRequest.responseText;
    
    
    
    
  }
}