<!DOCTYPE html>
<html>
<head>
    <title>会社情報の入力</title>
</head>
<body>
    <p>{{ $invite->member->name }}さん、</p>
    <p>以下のリンクから会社情報を入力してください：</p>
    <p><a href="{{ $url }}">{{ $url }}</a></p>
    <p>よろしくお願いします。</p>
</body>
</html>
