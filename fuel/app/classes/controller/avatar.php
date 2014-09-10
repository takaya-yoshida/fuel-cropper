<?php
class Controller_Avatar extends Controller_Hybrid
{

	public $template = '';
	protected $format = 'json';

	// 入力画面
	public function action_index()
	{
		return Response::forge(View::forge('avatar/index'));
	}


	// アップロード
	public function post_upload()
	{
		$json = \Model_Avatar::$json;

		// エラーチェック
		if ( ! isset($_POST['avatar_data']) || ! isset($_FILES['avatar_file']) )
		{
			$json['message'] = 'データがセットされていません。';
			return $this->response($json);
		}

		// 画像のアップロード
		try
		{
			$json = \Model_Avatar::execute();
			if ( strlen($json['message']) > 0 )
			{
				return $this->response($json);
			}
		}
		catch (\Exception $e)
		{
			$json['message'] = 'アップロードエラーが発生しました。';
			return $this->response($json);
		}

		// json出力
		return $this->response($json);
	}
}
