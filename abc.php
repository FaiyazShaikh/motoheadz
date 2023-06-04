<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        width: 80%;
        height: 100vh;
        margin: auto;
        display: grid;
        place-items: center;
    }

    h1 {
        font-family: sans-serif;
    }

    input {
        padding: 10px;
        border-radius: 20px;
        border: 2px solid steelblue;
        font-size: 1.5rem;
        letter-spacing: 2px;
        outline: none;
    }
    </style>

<body>
    <h1>QR Code Generator</h1>
    <input type="text" spellcheck="false" id="text" value="https://google.com" />
    <div id="qrcode"></div>

</body>
<script>
const qrcode = document.getElementById("qrcode");
const textInput = document.getElementById("text");

const qr = new QRCode(qrcode);

textInput.oninput = (e) => {
    qr.makeCode(e.target.value.trim());
};

qr.makeCode(textInput.value.trim());
</script>
</head>

</html>