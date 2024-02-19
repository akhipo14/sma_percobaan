<!DOCTYPE html>
<html>

<head>
    <title>Form Tanggal</title>
</head>

<body>
    <form method="post" action="/process">
        @csrf
        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
