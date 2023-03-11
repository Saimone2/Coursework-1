<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="uk" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Залізничні квитки. Купити квитки на поїзд онлайн | railroad</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <header>
    <div class="head">
      <div class="header-top">
        <a class="right1_5">Шукайте нас в соціальних мережах</a>
        <a class="icon-animation" href="https://web.telegram.org/" target="_blank"><img class="header-img" src="../images/telegram.png" alt="Facebook"></a>
        <a class="icon-animation" href="https://www.instagram.com/" target="_blank"><img class="header-img" src="../images/instagram.png" alt="Instagram"></a>
        <a class="icon-animation" href="https://www.facebook.com/" target="_blank"><img class="header-img" src="../images/facebook.png" alt="Facebook"></a>
        <a class="icon-animation" href="https://www.youtube.com/" target="_blank"><img class="header-img" src="../images/youtube.jpg" alt="Youtube"></a>
        <a class="icon-animation" href="https://www.viber.com/" target="_blank"><img class="header-img" src="../images/viber.png" alt="Viber"></a>
        <span>Жд квитки на потяги «Укрзалізниці»</span>
      </div>
      <a href="index.php"><img class="logo" src="../images/logo-top.png" alt="railroad.ua"></a>
      <nav class="menu">
        <div class="item">
          <a href="index.php">Головна</a>
        </div>
        <div class="item">
          <a href="news_1.php">Новини</a>
        </div>
        <div class="item">
          <a href="passengers-help.php">Пасажирам</a>
        </div>
        <div class="item">
          <a href="about-us.php">Про проєкт</a>
        </div>
        <div class="auth">
          <button id="dropdtnid" onclick="myFunction()" class="dropbtn">
            <?php
            if($_SESSION['ent-message'] == 'Адмін авторизація')
            {
              echo 'Admin';
            }
            else
            {
              echo 'Авторизація';
            }
            ?>
          </button>
          <div id="myDropdown" class="dropdown-content">
            <div class="menu-auth">
              <?php
              if($_SESSION['ent-message'] == 'Успішна авторизація')
              {
                echo '<div class="regis">
                  <a href="profile.php?id=' . $_SESSION['user']['id'] . '">Профіль</a>
                </div>
                <div class="regis">
                  <a href="shopping_cart.php">Мої квитки</a>
                </div>
                <div class="regis">
                  <a href="../validation-form/exit.php">Вийти</a>
                </div>';
              }
              else if ($_SESSION['ent-message'] == 'Адмін авторизація')
              {
                echo '<div class="regis">
                  <a href="profile.php?id=' . $_SESSION['user']['id'] . '">Профіль</a>
                </div>
                <div class="regis">
                  <a href="admin.php">Адмін</a>
                </div>
                <div class="regis">
                  <a href="../validation-form/exit.php">Вийти</a>
                </div>';
              }
              else
              {
              ?>
              <form action="../validation-form/signin.php" method="post" novalidate>
                <?php
                  if($_SESSION['ent-message'] == 'Невірний логін або пароль')
                  {
                    echo '<div class="not-found-msg"> ' . $_SESSION['ent-message'] . '</div>';
                  }
                  unset($_SESSION['ent-message']);
                ?>
                <input type="email" name="ent-email" placeholder="E-mail" id="enter-email">
                <div class="span-enter-email"></div>
                <div class="password">
                  <input type="password" name="ent-password" placeholder="Пароль" id="enter-password">
                  <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                </div>
                <div class="span-enter-password"></div>
                <div class="reset-pass">
                  <a href="reset.php">Забули пароль?</a>
                </div>
                <div class="submit">
                  <button class="btn btn-success" type="submit">Увійти</button>
                </div>
                <div class="regis">
                  <a href="registration.php">Зареєструватися</a>
                </div>
              </form>
              <?php
               }
              ?>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="main">
    <div id="admin-block">

      <?php
      require '../localhost/config/connect_to_trains.php';
      $product_id = $_GET['id'];
      $product = mysqli_query($connect, "SELECT * FROM `trains-info` WHERE `id` = '$product_id'");
      $product = mysqli_fetch_assoc($product);
      if($product_id == '')
      {
      ?>
      <div class="create-train">
      <h2>Інформація про новий поїзд</h2>
      <form method="post" action="../vendor/create.php">
        <div class="part1">
          <p>Номер потягу</p>
          <input type="text" name="number" autocomplete="off">
          <p>Назва потягу</p>
          <input type="text" name="name" autocomplete="off">
          <p>Відправляється зі станції</p>
          <input type="text" name="going_from" list="list-language3" id="id-language3" autocomplete="off">
          <div list="list-language3">
            <?php
              foreach($stations as $station)
              {
                ?>
            <span><?= $station[1] ?></span>
            <?php
          }
        ?>
      </div>
          <p>Прибуває до станції</p>
          <input type="text" name="going_to" list="list-language4" id="id-language4" autocomplete="off">
          <div list="list-language4">
            <?php
              foreach($stations as $station)
              {
                ?>
            <span><?= $station[1] ?></span>
            <?php
          }
        ?>
      </div>
          <p>День відправлення</p>
          <input type="text" name="date_from" autocomplete="off" id="datesample">
          <p>День прибуття</p>
          <input type="text" name="date_to" autocomplete="off" id="datesample1">
          </div>
          <div class="part2">
          <p>Час відправлення</p>
          <input type="text" name="time_from" autocomplete="off">
          <p>Час прибуття</p>
          <input type="text" name="time_to" autocomplete="off">
          <p>Тривалість</p>
          <input type="text" name="duration" autocomplete="off">
          <p>1 клас - кількість місць, ціна</p>
          <div class="inlineclass">
          <input type="text" name="class1-seat" autocomplete="off">
          </div>
          <div class="inlineclass">
          <input type="text" name="class1-price" autocomplete="off">
          </div>
          <p>2 клас - кількість місць, ціна</p>
          <div class="inlineclass">
          <input type="text" name="class2-seat" autocomplete="off">
          </div>
          <div class="inlineclass">
          <input type="text" name="class2-price" autocomplete="off">
          </div>
        </div>
        <br>
        <button class="btn third" type="submit">Додати потяг</button>
      </form>
    </div>
    <?php
    }
    if($product_id != '')
    {
    ?>
      <div class="create-train">
      <h2>Зміна інформації</h2>
      <form method="post" action="../vendor/update.php">
          <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="part1">
          <p>Номер потягу</p>
          <input type="text" name="number" value="<?= $product['number'] ?>" autocomplete="off">
          <p>Назва потягу</p>
          <input type="text" name="name" value="<?= $product['name'] ?>" autocomplete="off">
          <p>Відправляється зі станції</p>
          <input type="text" name="going_from" value="<?= $product['going_from'] ?>" list="list-language5" id="id-language5" autocomplete="off">
          <div list="list-language5">
            <?php
              foreach($stations as $station)
              {
                ?>
            <span><?= $station[1] ?></span>
            <?php
          }
        ?>
      </div>
          <p>Прибуває до станції</p>
          <input type="text" name="going_to" value="<?= $product['going_to'] ?>" list="list-language6" id="id-language6" autocomplete="off">
          <div list="list-language6">
            <?php
              foreach($stations as $station)
              {
                ?>
            <span><?= $station[1] ?></span>
            <?php
          }
        ?>
      </div>
          <p>День відправлення</p>
          <input type="text" name="date_from" value="<?= $product['date_from'] ?>" autocomplete="off" id="datesample">
          <p>День прибуття</p>
          <input type="text" name="date_to" value="<?= $product['date_to'] ?>" autocomplete="off" id="datesample1">
        </div>
        <div class="part2">
          <p>Час відправлення</p>
          <input type="text" name="time_from" value="<?= $product['time_from'] ?>" autocomplete="off">
          <p>Час прибуття</p>
          <input type="text" name="time_to" value="<?= $product['time_to'] ?>" autocomplete="off">
          <p>Тривалість</p>
          <input type="text" name="duration" value="<?= $product['duration'] ?>" autocomplete="off">
          <p>1 клас - кількість місць, ціна</p>
          <div class="inlineclass">
          <input type="text" name="class1-seat" value="<?= $product['seat1'] ?>" autocomplete="off">
          </div>
          <div class="inlineclass">
          <input type="text" name="class1-price" value="<?= $product['price1'] ?>" autocomplete="off">
          </div>
          <p>2 клас - кількість місць, ціна</p>
          <div class="inlineclass">
          <input type="text" name="class2-seat" value="<?= $product['seat2'] ?>" autocomplete="off">
          </div>
          <div class="inlineclass">
          <input type="text" name="class2-price" value="<?= $product['price2'] ?>" autocomplete="off">
          </div>
        </div>
        <br>
        <button class="btn third" type="submit">Змінити інформацію о потягу</button>
      </form>
    </div>
    <?php
      }
    ?>

    <table class="admin-table">
      <tr>
        <th>ID</th>
        <th>Номер потягу</th>
        <th>Назва потягу</th>
        <th>Відправляється зі станції</th>
        <th>Прибуває до станції</th>
        <th>День відправлення</th>
        <th>День прибуття</th>
        <th>Час відправлення</th>
        <th>Час прибуття</th>
        <th style="border-top-right-radius: 10px;">Тривалість</th>
        <th style="border-top-left-radius: 10px; background: #02c082;" colspan="2"><a class="create-new-train" href="admin.php">Створити новий</a></th>
      </tr>

      <?php
        $details = mysqli_query($connect, "SELECT * FROM `trains-info`");
        $details = mysqli_fetch_all($details);
        foreach($details as $detail)
        {
          ?>
          <tr>
            <td><?= $detail[0] ?></td>
            <td><?= $detail[1] ?></td>
            <td><?= $detail[2] ?></td>
            <td><?= $detail[3] ?></td>
            <td><?= $detail[4] ?></td>
            <td><?= $detail[5] ?></td>
            <td><?= $detail[6] ?></td>
            <td><?= $detail[7] ?></td>
            <td><?= $detail[8] ?></td>
            <td><?= $detail[9] ?></td>
            <td><a href="admin.php?id=<?= $detail[0] ?>"><img src="../images/edit.png" alt="Змінити"></a></td>
            <td><a href="../vendor/delete.php?id=<?= $detail[0] ?>"><img src="../images/trash.png" alt="Видалити"></a></td>
          </tr>
          <?php
        }
      ?>
    </table>



    <div class="create-train">
    <h2>Інформація про нову станцію</h2>
    <form method="post" action="../vendor/stcreate.php">
      <div class="part1">
        <p>Назва станції</p>
        <input type="text" name="stname" autocomplete="off">
      </div>
      <br>
      <button class="btn third" type="submit">Додати станцію</button>
    </form>
    </div>

    <div class="forstations">
    <table class="admin-table">
      <tr>
        <th>ID</th>
        <th>Назва станції</th>
      </tr>

      <?php
        require '../localhost/config/connect_to_stations.php';
        $stations = mysqli_query($connect, "SELECT * FROM `stations-list`");
        $stations = mysqli_fetch_all($stations);
        foreach($stations as $station)
        {
          ?>
          <tr>
            <td><?= $station[0] ?></td>
            <td><?= $station[1] ?></td>
            <td><a href="../vendor/stdelete.php?id=<?= $station[0] ?>"><img src="../images/trash.png" alt="Видалити"></a></td>
          </tr>
          <?php
        }
      ?>
    </table>
    </div>
    </div>
  </div>
  <footer>
    <div class="footer">
      <div class="info">
        <div class="footer-logo">
          <a href="index.php"><img src="../images/footer-logo.png" alt="railroad.ua"></a>
        </div>
        <nav class="cl-effect-21">
          <ul class="site-links">
            <li class="site-link">
              <a href="index.php">НА ГОЛОВНУ</a>
            </li>
            <li class="site-link">
              <a href="news_1.php">НОВИНИ</a>
            </li>
            <li class="site-link">
              <a href="passengers-help.php">ПАСАЖИРАМ</a>
            </li>
            <li class="site-link">
              <a href="contacts.php">ЗВОРОТНІЙ ЗВ'ЯЗОК</a>
            </li>
          </ul>
          <p class="license">© 2022 – 2022 railroad.ua
            <img class="correct" style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Правильний CSS!"/>
          </p>
        </nav>
        <div class="contacts">
          <div class="phone-container">
            <a class="footer-phone" href="tel:(044)000-00-00">(044)<span class="contacts-phone">000-00-00</span>
            </a>
          </div>
          <div class="mail-container">
            <a class="footer-mail" href="mailto:1railroad.ua@gmail.com">1railroad.ua@gmail.com</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>

<script>

$('#datesample').inputmask("2022-99-99");
$('#datesample1').inputmask("2022-99-99");

function myFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
	document.getElementById("dropdtnid").classList.toggle("active");
}

function show_hide_password(target) {
	var input = document.getElementById('enter-password');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}

let authinp1 = document.querySelector('#enter-email');
let authinp2 = document.querySelector('#enter-password');
let authspan1 = document.querySelector('.span-enter-email');
let authspan2 = document.querySelector('.span-enter-password');
let reg1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
let reg3 = /[A-Za-z0-9]{6,25}/;

document.querySelector('.btn.btn-success').onclick = function(e1) {
	if (document.getElementById("enter-email").value === '') {
		notValid(authinp1, authspan1, "Заповніть поле");
		e1.preventDefault();
	} else {
		if (!validate(reg1, authinp1.value)) {
			notValid(authinp1, authspan1, 'Введіть коректний email');
			e1.preventDefault();
		} else {
			valid(authinp1, authspan1, '');
		}
	}

	if (document.getElementById("enter-password").value === '') {
		notValid(authinp2, authspan2, "Заповніть поле");
		e1.preventDefault();
	} else {
		if (!validate(reg3, authinp2.value)) {
			notValid(authinp2, authspan2, 'Пароль містить мінімум 6 символів');
			e1.preventDefault();
		} else {
			valid(authinp2, authspan2, '');
		}
	}
};

function validate(regex, inp) {
	return regex.test(inp);
}

function notValid(inp, el, mess) {
	inp.classList.add('is-invalid');
	el.innerHTML = mess;
}

function valid(inp, el, mess) {
	inp.classList.remove('is-invalid');
	inp.classList.add('is-valid');
	el.innerHTML = mess;
}

</script>
<script>

$(document).on('dblclick', 'input[list]', function(event) {
	event.preventDefault();
	var str = $(this).val();
	$('div[list=' + $(this).attr('list') + '] span').each(function(k, obj) {
		if ($(this).html().toLowerCase().indexOf(str.toLowerCase()) < 0) {
			$(this).hide();
		}
	});
	$('div[list=' + $(this).attr('list') + ']').toggle(100);
	$(this).focus();
});

$(document).on('blur', 'input[list]', function(event) {
	event.preventDefault();
	var list = $(this).attr('list');
	setTimeout(function() {
		$('div[list=' + list + ']').hide(100);
	}, 100);
});

$(document).on('click', 'div[list] span', function(event) {
	event.preventDefault();
	var list = $(this).parent().attr('list');
	var item = $(this).html();
	$('input[list=' + list + ']').val(item);
	$('div[list=' + list + ']').hide(100);
});

$(document).on('keyup', 'input[list]', function(event) {
	event.preventDefault();
	var list = $(this).attr('list');
	var divList = $('div[list=' + $(this).attr('list') + ']');
	if (event.which == 27) { // esc
		$(divList).hide(200);
		$(this).focus();
	} else if (event.which == 13) { // enter
		if ($('div[list=' + list + '] span:visible').length == 1) {
			var str = $('div[list=' + list + '] span:visible').html();
			$('input[list=' + list + ']').val(str);
			$('div[list=' + list + ']').hide(100);
		}
	} else if (event.which == 9) { // tab
		$('div[list]').hide();
	} else {
		$('div[list=' + list + ']').show(100);
		var str1 = $(this).val();
		$('div[list=' + $(this).attr('list') + '] span').each(function() {
			if ($(this).html().toLowerCase().indexOf(str1.toLowerCase()) < 0) {
				$(this).hide(200);
			} else {
				$(this).show(200);
			}
		});
	}
});

$("#switch_butt").click(function() {
	var temp = $('#id-language1').val();
	$('#id-language1').val($('#id-language2').val());
	$('#id-language2').val(temp);
});

var now = new Date();
if(now.getMonth() + 1  < 10)
{
  if(now.getDate() < 10)
  {
    var date1 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + now.getDate();
    var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + (now.getDate() + 1);
    var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + (now.getDate() + 2);
  }
  else
  {
    var date1 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + now.getDate();
    var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 1);
    var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
  }
}
else
{
  if(now.getDate() < 10)
  {
    var date1 = now.getFullYear() + '-' + (now.getMonth() + 1) + '-0' + now.getDate();
    var date2 = now.getFullYear() + '-' + (now.getMonth() + 1) + '-0' + (now.getDate() + 1);
    var date3 = now.getFullYear() + '-' + (now.getMonth() + 1) + '-0' + (now.getDate() + 2);
  }
  else
  {
    var date1 = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
    var date2 = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + (now.getDate() + 1);
    var date3 = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
  }
}

$('#dateupdate').val(date1);

$("#datetoday").click(function() {
  $('#dateupdate').val(date1);
});

$("#datetomor").click(function() {
   $('#dateupdate').val(date2);
});

$("#aftertomor").click(function() {
   $('#dateupdate').val(date3);
});

</script>

</body>
</html>
