<!-- 1. Place next code at the first line -->
<?php
	$FacebookPixel = $_GET['p'];
	$Ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	$http_lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
	$fd = fopen("../logs.txt", 'a+');
	$date = date('d.m.Y, H:i:s');
	$arr = $date.'|'.$_SERVER['HTTP_CF_IPCOUNTRY'].'|'.$http_lang.'|'.$_SERVER['HTTP_REFERER'].'|'.$_SERVER['HTTP_USER_AGENT'].'|'.$Ip."|land \r\n";
	fwrite($fd, $arr);
	fclose($fd);
	$gp = $_GET['gp'];
  $hs = $_GET['hs'];
  $page_lang = "ru";
	$QUERY=$_SERVER["QUERY_STRING"];
?>

<!-- 1.1 Place next instead of above if you don't have preland  -->

<?php
  $Ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  $http_lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
  $fd = fopen("logs.txt", 'a+');
  $date = date('d.m.Y, H:i:s');
  $arr = $date.'|'.$_SERVER['HTTP_CF_IPCOUNTRY'].'|'.$http_lang.'|'.$_SERVER['HTTP_REFERER'].'|'.$_SERVER['HTTP_USER_AGENT'].'|'.$Ip."|land \r\n";
  fwrite($fd, $arr);
  fclose($fd);
  if (isset($_GET['p']) OR isset($_GET['gp'])) {
    $FacebookPixel = $_GET['p'];
    $base = '<base href="funnel/">';
  } else {
    $Refferer = $_SERVER["HTTP_REFERER"];
    $Explode = explode("?", $Refferer)[1];
    $FacebookPixel = explode("=", $Explode)[1];
    $FacebookPixel = strtok($FacebookPixel,"&");
    $base = '';
  }
	$gp = $_GET['gp'];
  $hs = $_GET['hs'];
  $page_lang = "en";
	$QUERY=$_SERVER["QUERY_STRING"];
?>

<!-- ---------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<!-- lang have to be specified for arabian="ar", spanish ="es", russian ="ru", other countries = "en" -->
<html lang="<?php echo $page_lang; ?>">


<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Link form validation styles -->
  <link rel="stylesheet" href="https://usahomerelief.net/adict/intlTelInput.css">
  <link rel="stylesheet" href="https://usahomerelief.net/adict/adict.css">
  <!-- Add Yandex.metrika script -->
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(66724333, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
    });
  </script>
  <noscript><div><img src="https://mc.yandex.ru/watch/66724333" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <!--  -->
</head>

<body>

  <!--2. Form with hidden inputs example -->

  <form id="userPhoneForm"  class="contact-form " method="POST" name="application" action="https://usahomerelief.net/thx/index.php">
    <!-- example for action for whitepages. For all landing pages action must be set to thank you page -->

    <!-- Names for all inputs must be as same as in example -->

    <!-- Each input must be covered with div. -->
    <div>
      <input  name="f_name" placeholder="Your Name">
    </div>

    <div>
      <input name="l_name" placeholder="Last Name">
    </div>

    <div>
      <input type="email" name="email" placeholder="Your Email">
    </div>

    <div>
		<style>
                .iti__flag-container {
                  z-index: 50;
                }
                .iti-mobile .iti__country-list {
                  width: 85%;
                }
              </style>
      <input type="tel" name="phone" autocomplete="off" required>
      <input type="hidden" name="phone2" class="phone2" autocomplete="off" required>
      <!-- Use variable from gep parameter @ first line - from php code in top of file -->
      <input type="hidden" name="pixel_id" value="<?php echo $FacebookPixel?>">
				<input type="hidden" name="page_lang"	value="<?php echo $page_lang?>">
				<input type="hidden" name="query" value="<?php echo $QUERY?>" />
				<input type="hidden" name="gp_id" value="<?php echo $gp?>" />
				<input type="hidden" name="hs_id" value="<?php echo $hs?>" />
      <!-- change to actual name of Landing. Name with uppercased letters -->
      <input type="hidden" name="landing" value="NAME_OF_LANDING">
				<!-- Campain must be in every landing pages except Kazakhstan, Russian and Russian-speaking countries -->
      <input type="hidden" name="campaign" value="SG">
      <!-- for arabian landings set value of campaign GCC, if arabian landings in english - use AR -->
    </div>

    <button type="submit">Get Started Now</button>

  </form>

  <!-- -------------------------------------------------------------------------------------------------------------- -->
  <!-- Vanilla JS smooth scroll script. All links must leads to reg. form with smooth scroll. Without page reloading or web address changing-->
  <script>
    const smoothLinks = document.querySelectorAll(".goToForm");
    for (let smoothLink of smoothLinks) {
      smoothLink.addEventListener("click", function (e) {
        e.preventDefault();

        document.querySelector("#form").scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      });
    }
  </script>
  <!--  -->

  <!-- jQuery smooth scroll  -->
  <script>
    $(".goToForm").each(function () {
      $(this).click((e) => {
        e.preventDefault();
        $("html").animate(
          {
            scrollTop: $("#form").offset().top,
          },
          800
        );
      });
    });
  </script>
<!--  -->


  <!-- Vanilla JS countdown -->
  <script>
    // const timeInMinutes = 10;
    // const currentTime = Date.parse(new Date());
    // const deadline = new Date(currentTime + timeInMinutes * 60 * 1000);

    function getTimeRemaining(endtime) {
      const total = Date.parse(endtime) - Date.parse(new Date());
      const seconds = Math.floor((total / 1000) % 60);
      const minutes = Math.floor((total / 1000 / 60) % 60);
      const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
      const days = Math.floor(total / (1000 * 60 * 60 * 24));

      return {
        total,
        days,
        hours,
        minutes,
        seconds
      };
    }

    function initializeClock(id, endtime) {
      const clock = document.getElementById(id);
      const daysSpan = clock.querySelector('.days');
      const hoursSpan = clock.querySelector('.hours');
      const minutesSpan = clock.querySelector('.minutes');
      const secondsSpan = clock.querySelector('.seconds');

      function updateClock() {
        const t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      const timeinterval = setInterval(updateClock, 1000);
    }

    const timeInMinutes = 10;
    const currentTime = Date.parse(new Date());
    const deadline = new Date(currentTime + timeInMinutes * 60 * 1000);
    initializeClock('clockdiv', deadline);
  </script>

  <!--  -->
  <!-- Linked scripst for form validation. !!!!!jQuery also must be linked before this scripts!!!!! -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://usahomerelief.net/adict/intlTelInput.js"></script>
  <script src="https://usahomerelief.net/adict/adict.js"></script>
  <script src="https://usahomerelief.net/adict/utils.js"></script>
<!--add id="video" to the video tag before linking next script -->
	<script src="https://usahomerelief.net/video/video.js"></script>

</body>

</html>
