function newMessage()
{
  var url = 'http://web.engr.oregonstate.edu/~gamblinr/CS290/Final_Project/messageCheck.php';
  var message = document.getElementsByName('message')[0].value;
  var errorNode = document.getElementById('error');
  var form = document.getElementById('messageForm');
  var checkReturn;
  var httpRequest;

  if (message == '')
    errorNode.textContent = 'You need to enter a message!';
  else {

    errorNode.textContent = '';

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
    httpRequest.send('message=' + message);

    errorNode.textContent = httpRequest.responseText;

    form.submit();


  }
}
