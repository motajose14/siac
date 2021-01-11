
<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/Chat.php");

$chat = New Chat();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
	case 'get-upcm-chats':
		if (!isset($_SESSION['user_id'])) die(403);
		$columns = ['U.user_id', 'avatar', 'first_name', 'last_name', 'email', 'rol', 'telephone'];
		$results = $chat->get($_SESSION['user_id'], $_SESSION['upcm_id'] ,$columns, true);
		echo json_encode($results > 0 ? $results : []);
		break;

	case 'get-group-chats':
		if (!isset($_SESSION['user_id'])) die(403);
		$results = $chat->get_group_chats($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'get-external-upcm-chats':
		if (!isset($_SESSION['user_id'])) die(403);
		$columns = ['U.user_id', 'avatar', 'first_name', 'last_name', 'email', 'rol', 'telephone'];
		$results = $chat->get($_SESSION['user_id'], $_SESSION['upcm_id'], $columns, false);
		echo json_encode($results > 0 ? $results : []);
		break;

	case 'get-messages':
		if (!isset($data['sender']) || !isset($data['receiver'])) die(403);
		$results = $chat->get_messages($data['receiver'], $data['sender']);
		echo json_encode($results > 0 ? $results : []);
		break;	

	case 'send-message':
		if (empty($_POST)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data = $_POST;
		if (!isset($data['receiver']) || !isset($_SESSION['user_id'])) die(403);
		if (isset($_FILES["file"]) && $_FILES["file"]["error"] != 4) {
			$ext = explode(".", $_FILES['file']['name']);
			$suffix = 'document';
			if ($_FILES['file']['type'] == "image/jpg" || $_FILES['file']['type'] == "image/png") $suffix = 'image';
			$file_name = "siac_chat_${suffix}_" .time() . "." . end($ext);
			if(!move_uploaded_file($_FILES["file"]["tmp_name"], DIRECTORY . "/public/media/chat/" . $file_name)) $helper->response_message('Error', 'No se pudo guardar correctamente el archivo', 'error');
			$data['file'] = $file_name;
		}
		$data['sender'] = $_SESSION['user_id'];
		$columns = ['receiver', 'sender', 'message', 'file'];
		$result = $chat->create_message(sanitize($data), $columns);
		$helper->response_message('Éxito', 'Se envió el mensaje correctamente', 'success', $data['file']);
		break;	

	case 'delete':
		$id = intval($data['chat_id']);
		$image = $chat->get($id, ['image']);
		$image = $current_image[0]['image'];
		if(empty(!$image)) unlink(DIRECTORY . "/public/img/chats/covers/" . $image);
		$result = $chat->delete($id);
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el mensaje correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el mensaje correctamente');
		break;

}