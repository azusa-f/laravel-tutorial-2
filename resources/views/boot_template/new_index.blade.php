<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新規登録</title>

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Font Awesome5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!--自作CSS -->
    <style type="text/css">
        <!--
        /*ここに調整CSS記述*/
        -->
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light navbar-dark bg-dark">
    <a class="navbar-brand" href="#!">新規登録</a>
</nav>

<!-- Page Content -->
<div class="container mt-5 p-lg-5 bg-light">

<!--フォーム-->
<form action="/boot_template/new" method="post" class="needs-validation" novalidate>
{{ csrf_field() }}
{{ method_field('patch') }}


/* old():バリデーションでリダイレクトされても入力した文字が消えないようにする */
<!--お名前-->
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">お名前</label>
    <div class="col-sm-10">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" id="inputName" placeholder="山田　太郎" required>
        @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
</div>
<!--/お名前-->

<!--メールアドレス-->
<div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">メールアドレス</label>
    <div class="col-sm-10">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" id="inputEmail" placeholder="yamada@laraweb.net" required>
        @if($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
</div>
<!--/メールアドレス-->

<!--電話番号-->
<div class="form-group row">
    <label for="inputTel" class="col-sm-2 col-form-label">電話番号</label>
    <div class="col-sm-10">
        <input type="tel" name="tel" value="{{ old('tel') }}" class="form-control @if($errors->has('tel')) is-invalid @endif" id="inputTel" placeholder="080-1111-2222" required>
        @if($errors->has('tel'))
            <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
        @else
            <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
        @endif
    </div>
</div>
<!--/電話番号-->


<!--メッセージ-->
<div class="form-group pb-3">
    <label for="Textarea">メッセージ</label>
    <textarea name="message" class="form-control @if($errors->has('message')) is-invalid @endif" id="Textarea" rows="3" placeholder="その他、質問などありましたら" required>{{ old('message') }}</textarea>
    @if($errors->has('message'))
        <div class="invalid-feedback">{{ $errors->first('message') }}</div>
    @else
        <div class="invalid-feedback">必須項目です</div><!--HTMLバリデーション-->
    @endif
</div>
<!--/メッセージ-->

<!--ボタンブロック-->
<div class="form-group row mt-5">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary btn-block">確認</button>
    </div>
</div>
<!--/ボタンブロック-->

</form>
<!--/フォーム-->




</div><!-- /container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>
