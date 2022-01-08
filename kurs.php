<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Mata Uang</title>
</head>
<body>
    <h1>Kurs</h1>
<br>
    <div class="container">
        <div class="form-group">
            <select class="form-control" id="kategori">
                <option value="" selected disabled>pilih kategori :</option>
                <option value="sell">SELL</option>
                <option value="buy">BUY</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <input type="text" id="idr" class="form-control" value="IDR" readonly>
        </div>
        <div class="form-group">
            <input type="number" id="input" class="form-control" >
        </div>
        <div class="form-group">
            <select class="form-control" id="mata_uang">
                <option value="" selected disabled>pilih mata uang:</option>
                <option value="usd">USD</option>
                <option value="sgd">SGD</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" id="output" class="form-control" readonly>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="proses">Proses</button>
    </div>

    <script>
        $(document).ready(function(){
            

            $('#proses').on('click', function(){
                let idr = $('#idr').val()
                let mata_uang = $('#mata_uang').find(":selected").val()
                let kategori = $('#kategori').find(":selected").val()
                let input = $('#input').val()
                // console.log(idr)
                if(kategori == '' || input == ''){
                    alert('Pilih kategori terlebih dahulu !')
                } else {
                    $.ajax({
                    url: "https://api.kurs.web.id/api/v1?token=EKJeQTRtomKGn0VlexasL8wAoh3j8g7R9avVRsk2&bank="+idr+"&matauang="+mata_uang,
                    type: "get",
                    success: function(data){

                        if(kategori == "buy"){
                            let input = $('#input').val()
                            let result = parseInt(input) / data.beli;
                            $('#output').val(mata_uang.toUpperCase() + " " +result)
                        } else {
                            let input = $('#input').val()
                            let result = parseInt(input) / data.jual;
                            $('#output').val(mata_uang.toUpperCase() + " " +result)
                        }
                    },
                    error: function(data){
                        console.log(data)
                    }
                })
                }
            })
        })
    </script>

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>