<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<title>elFinder 2.1.x source version with PHP connector</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- Require JS (REQUIRED) -->
		<!-- Rename "main.default.js" to "main.js" and edit it if you need configure elFInder options or any things -->

		<script src="./js/elfinder.min.js"></script>
		<script src="../js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" charset="utf-8">

            // [追加] 
            // https://github.com/Studio-42/elFinder/wiki/Integration-with-TinyMCE-4.x を一部変更しています。
            var FileBrowserDialogue = {
                init: function() {
                    // 独自のonLoad処理が必要な場合ここにコードを記載
                },
                mySubmit: function (URL) {
					console.log(parent.tinymce.activeEditor);
                    // 選択されたファイルパスをTinyMCEに渡します。
                    parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

                    // TinyMCEダイアログに対して画像サイズの項目設定および更新を指示します。
                    var t = parent.tinymce.activeEditor.windowManager.windows[0];
                    t.find('#src').fire('change');

                    // ポップアップウィンドウを閉じます。
                    parent.tinymce.activeEditor.windowManager.close();
                }
            };

            // Documentation for client options:
            // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
            $(document).ready(function() {
                $('#elfinder').elfinder({
                    url : 'php/connector.minimal.php'  // connector URL (REQUIRED)
                    , lang: 'jp'                    // language (OPTIONAL)

                    // [追加]
                    , getFileCallback: function(file) {
                        FileBrowserDialogue.mySubmit(file.url); // 選択されたファイルパスをTinyMCEに渡します。
                    }
                });
            });
        </script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
