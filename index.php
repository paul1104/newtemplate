<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = '3mTkZrX0oPra46uMe0zaYhgZisp3K+iEMuh0nXCTXPG31lKTXcD7XWRYKZ3RwVQGYeY/UjHCZvH5WyXDKblWGlMLDeudwM2Zig6kChQSr92WfKEZRqL1jiwqSy6Yzn1liYzZvM84ye2dF+RnOC3ohAdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = 'ef937ac3033ada91ca7688f0c0633250';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi') {
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}
	if($pesan_datang=='Hai') {
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'this is a image carousel template',
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => 
    array (
      0 => 
      array (
        'imageUrl' => 'http://preview.ibb.co/bMcQco/Pics_Art_06_05_01_02_05.jpg',
        'action' => 
        array (
          'type' => 'postback',
          'label' => 'Buy',
          'data' => 'action=buy&itemid=111',
        ),
      ),
      1 => 
      array (
        'imageUrl' => 'http://preview.ibb.co/bMcQco/Pics_Art_06_05_01_02_05.jpg',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'Yes',
          'text' => 'yes',
        ),
      ),
      2 => 
      array (
        'imageUrl' => 'http://preview.ibb.co/bMcQco/Pics_Art_06_05_01_02_05.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/222',
        ),
      ),
    ),
  ),
)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
