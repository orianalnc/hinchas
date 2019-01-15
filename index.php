<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Hinchas</title>
</head>
<body>
<div class="container">
    <div class="bg">
        <div class="title">
        <h2 class="text-center uppercase " >LA HINCHADA MÁS GRANDE</h2>
        </div>
        
    
<?php



//API PARA OBTENER LOS HINCHAS DE UN CLUB
  $ch = curl_init("http://api.apptorneofox.com/api/hinchas_club"); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
  curl_setopt($ch, CURLOPT_POST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  $output = curl_exec($ch);   
  curl_close($ch);
  $data = json_decode($output);
  //Ver el Resultado del API
  /*
    foreach ($data->data as $equipo ) {
    ?>
    <div>
      
      <table>
          <tr>
              <td><img style="height:80px; weight:80px;"  src="<?php echo $equipo->escudo ;?>" alt=""></td>
              <td><?php  echo $equipo->hinchas ;?></td>
              <td>
                <div class="progress-pie-chart" data-percent="25">
                    <div class="ppc-progress">
                        <div class="ppc-progress-fill red"></div>
                    </div>
                    <div class="ppc-percents">
                        <div class="pcc-percents-wrapper">
                        <span>%</span>
                        </div>
                    </div>
                </div>
              </td>
          </tr>
      </table>
      <hr>
      </div>
     
      <td> 
      
    <?php
     
    }
    //FIN DE API PARA OBTENER HINCHAS DE UN CLUB
     return 1;
      */

     /* <table>
        <tr>
            <td>
                <img src="" alt="">
            </td>
            <td>
                <div class="progress-pie-chart" data-percent="25">
                    <div class="ppc-progress">
                        <div class="ppc-progress-fill blue"></div>
                    </div>
                    <div class="ppc-percents">
                        <div class="pcc-percents-wrapper">
                        <span>%</span>
                        </div>
                    </div>
                </div>
            </td>
            <td>
            <img src="" alt="">
        </td>
        <td>
            <div class="progress-pie-chart" data-percent="25">
                <div class="ppc-progress">
                    <div class="ppc-progress-fill red"></div>
                </div>
                <div class="ppc-percents">
                    <div class="pcc-percents-wrapper">
                    <span>%</span>
                    </div>
                </div>
            </div>
        </td>
        </tr>
        <tr>
        <td>
            <img src="" alt="">
        </td>
        <td>
            <div class="progress-pie-chart" data-percent="25">
                <div class="ppc-progress">
                    <div class="ppc-progress-fill green"></div>
                </div>
                <div class="ppc-percents">
                    <div class="pcc-percents-wrapper">
                    <span>%</span>
                    </div>
                </div>
            </div>
        </td>
        <td>
        <img src="" alt="">
    </td>
    <td>
        <div class="progress-pie-chart" data-percent="25">
            <div class="ppc-progress">
                <div class="ppc-progress-fill red"></div>
            </div>
            <div class="ppc-percents">
                <div class="pcc-percents-wrapper">
                <span>%</span>
                </div>
            </div>
        </div>
    </td>
    </tr>
      
      </table> */

      
?>
    </div>

   



</div>


      <script>
        $(function(){
            var $ppc = $('.progress-pie-chart'),
                percent = parseInt($ppc.data('percent')),
                deg = 360*percent/100;
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
            $('.ppc-percents span').html(percent+'%');
        });
      </script>
    
</body>
</html>