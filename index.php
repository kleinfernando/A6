<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>The Virtual Slot Machine</title>
        <link rel="stylesheet" href="css/css.css" />
       
    </head>
    <body>
        
        <div>
            <h1> The Virtual Slot Machine!</h1>
        <?php
        
        session_start();
        

             
        $cherry = "<img src=Images/cherry.png alt=cherry width=150px height=150px>";
        $apple = "<img src=Images/apple.png alt=apple width=150 height=150>";
        $grapes = "<img src=Images/grapes.png alt=grapes width=150 height=150>";
        $lemon = "<img src=Images/lemon.png alt=lemon width=150 height=150>";
        $orange = "<img src=Images/orange.png alt=orange width=150 height=150>";
        $pear = "<img src=Images/pear.png alt=pear width=150 height=150>";
        $watermelon = "<img src=Images/watermelon.png alt=watermelon width=150 height=150>";

        $images = array(
            $cherry, 
            $apple, 
            $grapes, 
            $lemon, 
            $orange, 
            $pear, 
            $watermelon,
                );
        
        function wheel($a){
            global $images;
            $a = $images[rand(0,6)];
            return $a;
        }
        
        $name = $_POST['name'];
        $credits = $_POST['credit'];
        $bet = $_POST['bet'];
        $bett;
       
        if(empty($credits)){
            $credits = 100;
        }
        if($_POST){
                
            if($bet <= 0 || $bet > $credits){
                $message = "You must input a valid bet!";
                
                echo $cherry;
                echo $cherry;
                echo $cherry;
            }
            else if($bet > 20){
                $message = "Maximum Bet is 20 credits.";
                
                echo $cherry;
                echo $cherry;
                echo $cherry;
            }
            else if($bet > 0 && $bet <= $credits){
                
                $result1 = $images[rand(0,6)];
                $result2 = $images[rand(0,6)];
                $result3 = $images[rand(0,6)];
                
                echo $result1;
                echo $result2;
                echo $result3;

                if($result1 == $result2 && $result2 == $result3){
                    $bett=$bet*10;
                    $credits += $bett;
                    $message="BIG JACKPOT! Win $bett credits.";                
                }
                else if($result1 == $result2 || $result1 == $result3 || $result2 == $result3){
                    $bett=$bet*5;
                    $credits+=$bett;
                    $message="JACKPOT! Win $bett credits.";
                }
                else{
                    $credits -= $bet;
                    $message="Best Luck Next Time! Lost $bet credits.";
                }
            }
                
        }
        if(!$_POST){echo $cherry; echo $cherry; echo $cherry;}
            
        ?>      

                <form action=index.php method=POST>
                    <p>Name: </p>
                    <input title=name type=text value="<?php echo $name; ?>" name=name></br>
                    <p>Your Bet: </p>
                    <input title=bet type=number name=bet>
                    <p>Credit: </p>
                    <input title=credit type=text name=credit value="<?php echo $credits; ?>" readonly=true size=3></br>
                    <input id="message" title="message" type="text" name=message value="<?php echo $message; ?>"readonly="true" size=30></br>
                    <input type=submit value=SPIN name=spin class="spin">                    
                </form>

        </div>
    </body>
</html>
