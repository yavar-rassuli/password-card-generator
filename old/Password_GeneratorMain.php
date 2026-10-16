<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator Mainpage</title>
    <style type = "text/css">
        html
        {
            min-height: 100%;
        }
        main 
        {
            background-color: #98F5FF;
	        background-repeat: no-repeat;
            min-height: 100%; 
            width: 800px; 
            padding: 60px;
            margin-left: 370px;
            margin-right: 250px;
        }

        body 
        {
            background-image: url('pass_body.jpg');
        }

        header {
        background-image: url('pass s.jpg');
        width: 840px;
        text-align: center;
        line-height: header;
        padding: 40px;
        margin-left: -60px;
        margin-right: 300px;
      
        }
        .btn1 {
            width: 30%;
          background-color: rgb(76, 91, 175);
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }
        .btn1:hover {
            background-color: #4577a0;
        }

        .xUy {
            width: 55%;
            background-color: #85C1E9;
            border: 1px  solid gray;
            padding: 10px;
        }
    
    </style>
</head>
<body>
    <main>
        <header>
            <h1>Willkommen zum Passwort Generator.</h1>
        </header>
    
    <?php
        
        echo"<h3>Hier können Sie eine Passwortkarte für ein sicheres Passwort generieren lassen.</h3>";
        echo"<h3>Sie können die Grösse der Karte selber bestimmen.</h3>";
        echo"<h3>Geben Sie hierfür Ihre Wunschgrösse in das Formular ein.</h3>";
        echo"<h3>Ohne Eingabe wird die Standardgrösse verwendet.</h3>";
    ?>
        <form name=Achsenabfrage action="Password_Generator_Card.php" method="POST">
        <div class="xUy"> <label>Sie Können 'A' bis 'Z' eingeben: </label>
        <input type="text" name="X-Achse" placeholder="Grösse X-Achse"><br/><br/>
        <label>Sie Können '1' bis '25' eingeben: </label>
        <input type="text" name="Y-Achse" placeholder="Grösse Y-Achse"></div>

    <?php
        echo'<h3>Klicken Sie auf den "Passwortkarte generieren" Knopf um eine Karte generieren zu lassen.</h3>';
    ?>    
        
            <!-- Platz für Koordinatensystem Längenauswahl -->
        <input type="submit" name="submit" value="Passwortkarte generieren" class="btn1">
    </main>




        
</body>
</html>