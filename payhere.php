<html>
    <head>
    <title>Reservation Form</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    </head>
    <body>
      <?php include 'temp/header.php';  ?>  
        
        <div id="payHere">
                  <table>  
                    <tr>
                        <td>
                        <form action="payhere.php" method="POST">
                          <div id="ida"></div>
                        </form>
                        </td>
                        <td>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post"><!--test paypal API URL-->

                          <!-- Identify your business so that you can collect the payments. -->
                          <input type="hidden" name="business" value="jayaratnefuneraldirectors@gmail.com"><!--Business email-->

                          <!-- Specify a Buy Now button. -->
                          <input type="hidden" name="cmd" value="_xclick">

                          <!-- Specify details about the item that buyers will purchase. -->
                          <input type="hidden" name="item_name" value="Package-fee">
                          <input type="hidden" name="amount" value=<total>
                          <input type="hidden" name="currency_code" value="USD">

                          <!-- Display the payment button. -->
                          <input type="image" name="submit" border="0"
                          src="https://www.surfaceskimmers.com/wp-content/uploads/2016/10/1431389879455.png" width="150" height="40"
                          alt="Buy Now">
                          <img alt="" border="0" width="0.5" height="0.5"
                          src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                        </form>
                        </td>
                    </tr>
                      <tr>
                     <td colspan="2">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancle" name="cancle">
                    </td>
                </tr>
                    </table>
                </div>
        
      <!-- include footer -->
    <?php include 'temp/footer.php';  ?>
    </body>
    
</html>