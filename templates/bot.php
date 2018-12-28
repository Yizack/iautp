<?php
/***************************************
 * http://www.program-o.com
 * PROGRAM O
 * Version: 2.6.11
 * FILE: index.php
 * AUTHOR: Elizabeth Perreau and Dave Morton
 * DATE: FEB 01 2016
 * DETAILS: This is the interface for the Program O JSON API
 ***************************************/

$cookie_name = 'Program_O_JSON_GUI';
$botId = filter_input(INPUT_GET, 'bot_id');
$convoId = filter_input(INPUT_GET, 'convo_id');
$convo_id = (isset($_COOKIE[$cookie_name])) ? $_COOKIE[$cookie_name] : ($convoId !== false && $convoId !== null) ? $convoId : jq_get_convo_id();
if (empty($convo_id)) $convo_id = jq_get_convo_id();
$bot_id = (isset($_COOKIE['bot_id'])) ? $_COOKIE['bot_id'] : ($botId !== false && $botId !== null) ? $botId : 1;

if (is_nan($bot_id) || empty($bot_id))
{
    $bot_id = 1;
}

setcookie('bot_id', $bot_id);

// Experimental code
$HXFP  = (isset($_SERVER['HTTP_X_FORWARDED_PORT'])) ? $_SERVER['HTTP_X_FORWARDED_PORT'] : '';
$HSP   = (isset($_SERVER['SERVER_PORT'])) ? $_SERVER['SERVER_PORT'] : '';
$HTTPS = (isset($_SERVER['HTTPS'])) ? $_SERVER['HTTPS'] : '';
$HHOST = (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '';
$protocol = ((!empty($HTTPS) && $HTTPS != 'off') || $HSP == 443 || $HXFP == 443) ? "https://" : "http://";
$base_URL = $protocol . $HHOST;                                   // set domain name for the script
$this_path = str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)));  // The current location of this file, normalized to use forward slashes
$this_path = str_replace($_SERVER['DOCUMENT_ROOT'], $base_URL, $this_path);       // transform it from a file path to a URL
$url = str_replace('gui/jquery', 'chatbot/conversation_start.php', $this_path);   // and set it to the correct script location
/*
  Example URL's for use with the chatbot API
  $url = 'http://api.program-o.com/v2.3.1/chatbot/';
  $url = 'http://localhost/Program-O/Program-O/chatbot/conversation_start.php';
  $url = 'chat.php';
*/


#$display = '';

/**
 * Function jq_get_convo_id
 *
 *
 * @return string
 */
function jq_get_convo_id()
{
    global $cookie_name;

    session_name($cookie_name);
    session_start();
    $convo_id = session_id();
    session_destroy();
    setcookie($cookie_name, $convo_id);

    return $convo_id;
}

?>
<!DOCTYPE html>
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AI - Sistema de Matrículas | Universidad Tecnológica de Panamá</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/198e53835f.js"></script>
		<link href="css/chat.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">
			var URL = '<?php echo $url ?>';
		</script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h3 class="text-center"><font color="white">Agente Inteligente para el soporte del Sistema de Matrículas de la Universidad Tecnológica de Panamá</font></h3> ​
                <div class="col-md-4 col-md-offset-4" style="margin-left: 0;width: 100%;">
                    <div id="chatPanel" class="panel panel-info">
                        <div class="panel-heading">
                            <strong><i class="fa fa-question-circle" aria-hidden="true"></i> Haz tus preguntas referente al sistema de matrícula! </strong>
                        </div>
                        <div class="panel-body fixed-panel">
                            <ul class="media-list">
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <form method="post" id="talkform" name="talkform" action="index.php">
                                <div class="input-group">
                                    <input autocomplete="off"  type="text" class="form-control" placeholder="Escribe un mensaje..." name="say" id="say" autofocus/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="submit" id="talkform-btn"><span id="btntext">Enviar </span><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                        <button class="btn btn-info" type="button" id="talkform-btn-clear"><span id="btntext">Limpiar </span><span class="glyphicon glyphicon-erase"></span></button>
                                    </span>
									<input type="hidden" name="convo_id" id="convo_id" value="<?php echo $convo_id; ?>"/>
									<input type="hidden" name="bot_id" id="bot_id" value="<?php echo $bot_id; ?>"/>
									<input type="hidden" name="format" id="format" value="json"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<footer>
	<div class="container">
		<div class="creadores">
		<font size="2">
			Chatbot creado por: 
			Eliézer Yizack Rangel
			<a href="https://facebook.com/YizackR" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			<a href="https://instagram.com/yizackr" target="_blank"><i="" class="fa fa-instagram" aria-hidden="true"></a><br/>
			Eliézer Ahmed Rangel
			<a href="https://facebook.com/AhmedRangelB" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			<a href="https://instagram.com/ahmedrangel" target="_blank" <i="" class="fa fa-instagram" aria-hidden="true"></a>
		</font>
		</div>
		<div class="copyright">
		<font size="2">
			<i class="fa fa-copyright" aria-hidden="true"></i> 2018 FISC.
		</font>
		</div>
	</div>
	</footer>
	
	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			// put all your jQuery goodness in here.
			$('#talkform').submit(function (e) {
				e.preventDefault();
				$('#urlwarning').empty();
				var user = $('#say').val();
				var message = user;
				// $('.usersay').text(user);
				if (message !== "") {
					$(".media-list").append('<li class="media" style="margin-top: 0px;"><div class="media-body"><div class="media"><div style = "text-align:right; color : #000;" class="media-body"><font color="#888" size="1"><i class="fa fa-user" aria-hidden="true"></i> TÚ<br/></font>' + message + ' <font color="#34b7f1" size="1"><i class="fa fa-check" aria-hidden="true"></i></font><hr style="margin-top: 5px;margin-bottom: 5px;"/></div></div></div></li>');
				}
				var formdata = $("#talkform").serialize();
				$('#say').val('');
				$('#say').focus();
				$.get(URL, formdata, function (data) {
					console.info('Data =', data);
					var b = data.botsay;
					if (b.indexOf('[img]') >= 0) {
						b = showImg(b);
					}
					if (b.indexOf('[link') >= 0) {
						b = makeLink(b);
					}
					var usersay = data.usersay;
					if (user != usersay) {
						$('.usersay').text(usersay);
					}
					var answer = b
					$(".media-list").append('<li class="media" style="margin-top: 0px;"><div class="media-body"><div class="media"><div style = "color : #681a5d;" class="media-body"><font color="#888" size="1">IA <i class="fa fa-user" aria-hidden="true"></i> <i class="fa fa-share" aria-hidden="true"></i><br/></font>' + answer + '<hr style="margin-top: 5px;margin-bottom: 5px;"/></div></div></div></li>');
                    $(".fixed-panel").stop().animate({ scrollTop: $(".fixed-panel")[0].scrollHeight}, 1000);
					// $('.botsay').html(b);
					$('#urlwarning').hide();
				}, 'json').fail(function (xhr, textStatus, errorThrown) {
					console.error('XHR =', xhr.responseText);
					$('#urlwarning').html("Something went wrong! Error = " + errorThrown).show();
				});
				return false;
			});
		});
		function showImg(input) {
			var regEx = /\[img\](.*?)\[\/img\]/;
			var repl = '<br><a href="$1" target="_blank"><img src="$1" alt="$1" width="150" /></a>';
			var out = input.replace(regEx, repl);
			console.log('out = ' + out);
			return out
		}
		function makeLink(input) {
			var regEx = /\[link=(.*?)\](.*?)\[\/link\]/;
			var repl = '<a href="$1" target="_blank">$2</a>';
			var out = input.replace(regEx, repl);
			console.log('out = ' + out);
			return out;
		}
	</script>
    </body>
</html>
