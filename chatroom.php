<!--creating a chatroom with a fake tutor to aid the user in studying for their quiz-->
<!--source: serverjs.io-->
<!DOCTYPE html>
<html>
  <head>
    <title>Chatroom Help</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="chat.css">
  </head>
  <body>

<main>
  <header>
    <div class="user-count">0</div>
    <h1>Chat with a Tutor!</h1>
  </header>

  <section class="chat">
    <p style = "font-weight: 3px;">Tutor: Feel free to ask any questions!</p>
    <p id = "message"></p>
  </section>

  <form method = "post" name = "chatForm">
    <input type="text" placeholder="Ask for help" name = "chat">
    <input type = "button" value = "Send" name = "submit" onclick="message()">
  </form>
    
    <script>
        function message(){
            let retUserInput = document.forms['chatForm']['chat'].value;
            if (retUserInput == "" || (retUserInput.includes("?") == false)){
                alert("Please input a question.");
            }
            else if (retUserInput.includes("?")){
                document.getElementById("message").innerHTML = "Tutor: Thank you for messaging us. We will get back to you shortly. We appreciate your patience.";
            }
        }
        
    </script>
</main>
  </body>
</html>