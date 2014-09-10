<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>アバターもえくぼ</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/cropper.min.css">
	<link rel="stylesheet" href="/assets/css/crop-avatar.css">
</head>
<body style="padding:10px;">
	<div class="container" id="crop-avatar">

		<div class="avatar-view" title="クリックでアバターを変更">
			<img src="/assets/img/picture.jpg" alt="アバター">
		</div>

		<div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form class="avatar-form" method="post" action="/avatar/upload.json" enctype="multipart/form-data">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="avatar-modal-label">アバターの変更</h4>
						</div>
						<div class="modal-body">
							<div class="avatar-body">

								<div class="avatar-upload">
									<input class="avatar-src" name="avatar_src" type="hidden">
									<input class="avatar-data" name="avatar_data" type="hidden">
									<label for="avatarInput">画像ファイル</label>
									<input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
								</div>

								<div class="row">
									<div class="col-md-9">
										<div class="avatar-wrapper"></div>
									</div>
									<div class="col-md-3">
										<div class="avatar-preview preview-lg"></div>
										<div class="avatar-preview preview-md"></div>
										<div class="avatar-preview preview-sm"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
							<button class="btn btn-primary avatar-save" type="submit">　保存　</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="loading" tabindex="-1" role="img" aria-label="Loading"></div>
	</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/assets/js/cropper.min.js"></script>
<script src="/assets/js/crop-avatar.js"></script>
</body>
</html>