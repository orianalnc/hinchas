<?php



//API PARA OBTENER LOS HINCHAS DE UN CLUB
  $ch = curl_init("http://api.apptorneofox.com/api/hinchas_club"); 
  $total_hinchas = 0;
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
  curl_setopt($ch, CURLOPT_POST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  $output = curl_exec($ch);   
  curl_close($ch);
  $data = json_decode($output)->data;
  //Ver el Resultado del API
    foreach ($data as $equipo ) {
      $total_hinchas += $equipo->hinchas;
    }
    //FIN DE API PARA OBTENER HINCHAS DE UN CLUB
    $hinchas_equipo_1 =  $data[0]->hinchas * 100 / $total_hinchas; 
    $hinchas_equipo_2 =  $data[1]->hinchas * 100 / $total_hinchas; 
    $hinchas_equipo_3 =  $data[2]->hinchas * 100 / $total_hinchas; 
    $hinchas_equipo_4 =  $data[3]->hinchas * 100 / $total_hinchas; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Hinchas</title>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<div class="container">
    <div class="bg">
        <div class="title">
        <h2 class="text-center uppercase " >LA HINCHADA MÁS GRANDE</h2>
        </div>
      <table>
        <tr>
          <td>
              <img style="width: 80px; height: 80px;"  src="<?php echo $data[0]->escudo ;?>" alt="">
          </td>
          <td>
              <div id="circulo_1" class="progress-pie-chart" data-percent="<?php echo (int)$hinchas_equipo_1 ;?>">
                  <div class="ppc-progress">
                      <div class="ppc-progress-fill blue progress_1"></div>
                  </div>
                  <div class="ppc-percents">
                      <div class="pcc-percents-wrapper">
                      <span><?php echo round($hinchas_equipo_1) ;?> %</span>
                      </div>
                  </div>
              </div>
          </td>

          <td>
            <img style="width: 80px; height: 80px;" src="<?php echo $data[1]->escudo ;?>" alt="">
          </td>

          <td>
              <div id="circulo_2" class="progress-pie-chart" data-percent="<?php echo (int)$hinchas_equipo_2 ;?>">
                  <div class="ppc-progress">
                      <div class="ppc-progress-fill red progress_2"></div>
                  </div>
                  <div class="ppc-percents">
                      <div class="pcc-percents-wrapper">
                      <span><?php echo round($hinchas_equipo_2) ;?> %</span>
                      </div>
                  </div>
              </div>
          </td>
        </tr>
        <tr>
        <td>
        <img style="width: 80px; height: 80px;" src="<?php echo $data[3]->escudo ;?>" alt="">
    </td>
    <td>
        <div id="circulo_3" class="progress-pie-chart" data-percent="<?php echo (int)$hinchas_equipo_4 ;?>">
            <div class="ppc-progress">
                <div class="ppc-progress-fill green"></div>
            </div>
            <div class="ppc-percents">
                <div class="pcc-percents-wrapper">
                <span><?php echo round($hinchas_equipo_4) ;?> %</span>
                </div>
            </div>
        </div>
    </td>
        <td>
            <img style="width: 80px; height: 80px;" src="<?php echo $data[2]->escudo ;?>" alt="">
        </td>
        <td>
            <div id="circulo_4" class="progress-pie-chart" data-percent="<?php echo (int)$hinchas_equipo_3 ;?>">
                <div class="ppc-progress">
                    <div class="ppc-progress-fill red"></div>
                </div>
                <div class="ppc-percents">
                    <div class="pcc-percents-wrapper">
                    <span><?php echo round($hinchas_equipo_3) ;?> %</span>
                    </div>
                </div>
            </div>
        </td>
    </tr>
      </table> 
    </div>

   



</div>


      <script>
        $(function(){
            var $ppc = $('#circulo_1'),
                percent = parseInt($ppc.data('percent'));
                console.log(percent);
                deg_1 = 360*percent/100;console.log(deg_4);
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill progress_1').css('transform','rotate('+ deg_1 +'deg)');
            $('.ppc-percents span ').html(percent+'%');
        });

        $(function(){
            var $ppc = $('#circulo_2'),
                percent = parseInt($ppc.data('percent'));console.log(percent);
                deg_2 = 360*percent/100;console.log(deg_4);
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill progress_2').css('transform','rotate('+ deg_2 +'deg)');
            $('.ppc-percents span').html(percent+'%');
        });

        $(function(){
            var $ppc = $('#circulo_3'),
                percent = parseInt($ppc.data('percent'));console.log(percent);
                deg_3 = 360*percent/100;console.log(deg_4);
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill').css('transform','rotate('+ deg_3 +'deg)');
            $('.ppc-percents span').html(percent+'%');
        });

        $(function(){
            var $ppc = $('#circulo_4'),
                percent = parseInt($ppc.data('percent'));
                console.log(percent);
                deg_4 = 360*percent/100;
                console.log(deg_4);
            if (percent > 50) {
                $ppc.addClass('gt-50');
            }
            $('.ppc-progress-fill').css('transform','rotate('+ deg_4 +'deg)');
            $('.ppc-percents span').html(percent+'%');
        });
      </script>
    
</body>
</html>