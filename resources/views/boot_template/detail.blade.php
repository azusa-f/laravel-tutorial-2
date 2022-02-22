<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>詳細</title>

    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Font Awesome5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light navbar-dark bg-dark">
        <a class="navbar-brand" href="#!">詳細</a>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5 p-lg-5 bg-light">
        <!--フォーム-->
        <form action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="name" value="{{$student->name}}">
            <input type="hidden" name="email" value="{{$student->email}}">
            <input type="hidden" name="tel" value="{{$student->tel}}">
            <input type="hidden" name="message" value="{{$student->message}}">

            <!--お名前-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">お名前</label>
                <div class="col-sm-10">{{$student->name}}</div>
            </div>
            <!--/お名前-->

            <!--メールアドレス-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">メールアドレス</label>
                <div class="col-sm-10">{{$student->email}}</div>
            </div>
            <!--/メールアドレス-->

            <!--電話番号-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">電話番号</label>
                <div class="col-sm-10">{{$student->tel}}</div>
            </div>
            <!--/電話番号-->

            <!--メッセージ-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">メッセージ</label>
                <div class="col-sm-10">{!! nl2br(e( $student->message )) !!}</div>
            </div>
            <!--/メッセージ-->

            <!--ボタンブロック-->
            <div class="form-group row mt-5">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary btn-block" onClick='history.back();'>戻る</button>
                </div>
            </div>
            <!--/ボタンブロック-->

        </form>
        <!--/フォーム-->