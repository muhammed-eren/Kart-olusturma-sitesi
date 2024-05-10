<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1 !important;
        }
        .form-container {
            width: 75%;
            margin: 0 auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container input[type="color"] {
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container textarea {
            width: 100%;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        .output
        {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="row m-5">
        <div class="col output">
            <div style="display: flex; justify-content: center; align-items: center; overflow: auto; padding: <?=@$_POST['p'].'px'?>; width: <?=@$_POST['w'].'px'?>; height: <?=@$_POST['h'].'px'?>; background-color: <?=@$_POST['bgc']?>; color: <?=@$_POST['c']?>; border-radius: <?=@$_POST['b'].'px'?>; box-shadow: 0px 0px <?=@$_POST['sg'].'px'?> <?=@$_POST['sc']?>;"><?=@$_POST['y']?></div>   
        </div>
        <div class="col">
            <div class="form-container">
                <form action="" method="post">
                    <textarea class="form-control" name="y" id="" cols="30" rows="10" placeholder="Metni giriniz..."></textarea>
                    Arka Plan Rengi <input type="color" class="form-control" name="bgc" value="#ffffff">
                    Yazı Rengi <input type="color" class="form-control" name="c" value="#000000">
                    Gölge Rengi <input type="color" class="form-control" name="sc" value="#000000">
                    Gölge Genişlik (px) <input type="number" class="form-control" name="sg" value="10" placeholder="Gölge Genişlik">
                    Genişlik (px) <input type="number" class="form-control" name="w" value="200" placeholder="Genişlik">
                    Yükseklik (px) <input type="number" class="form-control" name="h" value="100" placeholder="Yükseklik">
                    İç Boşluk (px) <input type="number" class="form-control" name="p" value="10" placeholder="İç Boşluk">
                    Kenar Yarıçapı (px) <input type="number" class="form-control" name="b" value="5" placeholder="Kenar Yarıçapı">
                    <input type="submit" class="btn btn-secondary mt-3 w-100" value="Oluştur">
                </form>
                <div class="mt-2 bg-light p-2 rounded w-100">
                    <button class="btn" onclick="copyText()"><i id="v" class="fa-regular fa-paste"></i></button>
                    <hr>
                    <textarea readonly class="mt-2 bg-light p-2 w-100" style="border:none; outline: none; resize:none; height: 100px;" id="myTextarea" cols="30"><?php
                        $html_kod = trim('<div style="display: flex; justify-content: center; align-items: center; overflow: auto; width: ' . @$_POST['w'] . 'px; height: ' . @$_POST['h'] . 'px; background-color: ' . @$_POST['bgc'] . '; color: ' . @$_POST['c'] . '; border-radius: ' . @$_POST['b'] . 'px;">' . @$_POST['y'] . '</div>');
                    
                        echo htmlspecialchars($html_kod);
                    ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function copyText() {
            var copyText = document.getElementById("myTextarea");
            var v = document.getElementById("v");
            console.log(v);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            // swal({
            //     text: "Kopyalandı",
            //     icon: "success",
            //     button: "Tamam",
            // });
            v.classList.remove("fa-regular")
            v.classList.remove("fa-paste")
            v.classList.add("fa-solid")
            v.classList.add("fa-check")
            setTimeout(() => {
                v.classList.remove("fa-solid")
                v.classList.remove("fa-check")
                v.classList.add("fa-regular")
                v.classList.add("fa-paste") 
            }, 2000);
        }
    </script>
</body>
</html>