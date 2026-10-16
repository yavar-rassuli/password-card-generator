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
        body 
        {
            background-color: lightblue;
	        background-repeat: no-repeat;
            min-height: 100%;
	      
            
        }

        table
        {
            text-align:center;
            border: 5px black solid;
            border-collapse: collapse;
        }

        td 
        {
            border: 1px black solid;
        }

        th 
        {
            background-color : lightgreen;
            border: 1px black solid;
        }

        #t2
        {
            text-align: center;
            border: 0px white solid;
            margin: -600px 800px 100px 850px;
            

        }

        #td2
        {
            padding : 20px ;
            border: 0px white solid; 
        }

        hr
         {
            height:0; 
            border:0; 
            border-top:1px solid #083972; 
         }
         .btn3 
         {
            background-color: rgb(76, 91, 175);
            color: white;
            padding: 14px 14px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn3:hover 
        {
            background-color: #4577a0;
        }
        .btn
         {
            margin: -50px 800px 100px 10px;
         }
        
    
    </style>
</head>
<body>

    <?php
    $XAchse = $_POST["X-Achse"];
    $YAchse = $_POST["Y-Achse"];
    if($XAchse == Null){
        $XAchse = 'Z';
        
    }if ($YAchse < 1){
        $YAchse='25';
        
    }else{
         
     }    
        //Abfrage ob Eingabe Zahl oder String
        //Wenn String --> Standard Werte nehmen
        //Standard Werte = X: 'Z' Y: 25
   

   
    ?>

    <?php
       echo"<h1>Dies ist deine Passwortkarte</h1>";
       $Alphabet = array();
       $Anzahl = $XAchse; //'Z';
       for($i='A';$i<=$Anzahl;$i++)
       {
            $Alphabet[]=$i;
            if($i==$Anzahl)
            {break;}
       }
       $Size = sizeof($Alphabet);
       $Numbers = array();
       $Limit = $YAchse; //25;
       for($i=1;$i<=$Limit;$i++)
       {
           $Numbers[]=$i;

       }

       $Code = array();
       for($i=48;$i<=122;$i++)
       {
           $Code[]=$i;
       }
    
      // print_r($code);
       
       echo "<table width='50%', border='1'>";
       echo "<tr><th></th>";
       for($i=0;$i<$Size;$i++)
       {
           echo "<th>$Alphabet[$i]</th>";//Generiert X_Achse
       }
       echo "<tr>";
       
       for($i=0;$i<$Limit;$i++)
       {
           ?>
           <tr style= "background-color: lightgreen">
           <?php
           echo "<td><b>$Numbers[$i]</b></td>"; //Generiert Y_Achse
           for ($j=0;$j<$Size;$j++)
           {
               $Zufall = random_int(0,74);
              
               $asci = chr($Code[$Zufall]);
               ?>
                <td style = "background-color : #66CDAA">
                <?php
               echo "$asci</td>"; //Generiert Tabele Inhalt 
           }
           echo "</tr>";
       }
       echo "<tr>";
       ?>

        <td style = "background-color : lightgreen"></td>
       <?php
       for($i=0;$i<$Size;$i++)
       {
           ?>
            <td style = "background-color : lightgreen">
            <?php
           echo "<b>$Alphabet[$i]</b></td>"; //Generiert X_Achse Untere Tabele
       }
       echo "<tr>";
        echo "</table>";
        
    ?>

     <table class=ww id= t2 width=40% >
            
    
    <?php    
        for($i=0;$i<10;$i++) //Generiert Linien
        {
    ?>  
            <td class=wwe id= td2> 
    <?php
                echo "<hr></td>" ;
                echo "</tr>";
        }  
        
    ?>        
      </table>

      <div class="btn">
            <input type="submit" value="Drucken" name="submit" onclick="window.print()" class="btn3">
        </div>

       
    
</body>
</html>