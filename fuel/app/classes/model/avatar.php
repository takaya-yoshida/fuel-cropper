<?php
// アバター：モデル
class Model_Avatar extends \Model
{
	// jsonデフォルト値
	public static $json = array(
		'state'   => 200,
		'message' => '',
		'result'  => '',
	);

	// アバター画像の作成
	public static function execute()
	{
		// 画像公開パス
		$img_dir = '/upload/';

		// アップロード設定
		$config = array(
			'path'          => DOCROOT.'upload',
			'randomize'     => true,
			'ext_whitelist' => array('jpg', 'gif', 'png'),
			'auto_process'  => false,
		);

		// アップロード実行
		\Upload::process($config);
		if ( ! \Upload::is_valid() )
		{
			self::$json['message'] = implode("\n", \Upload::get_errors());
			return self::$json;
		}
		\Upload::save();
		$file = \Upload::get_files(0);

		// 切り抜き
		$crop_config = json_decode(stripslashes($_POST['avatar_data']));
		if ( $crop_config )
		{
			$file_name = $file['saved_to'].$file['saved_as'];
			$x2 = $crop_config->x + $crop_config->width;
			$y2 = $crop_config->y + $crop_config->height;
			\Image::load($file_name)
				->crop($crop_config->x, $crop_config->y, $x2, $y2)
				->save($file_name);
		}

		// 画像URL
		self::$json['result'] = $img_dir.$file['saved_as'];

		return self::$json;
	}

}
