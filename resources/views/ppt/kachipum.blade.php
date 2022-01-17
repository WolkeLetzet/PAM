<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="juego container-fluid">
        <div class="row"><h1 >KA - CHI - PUM</h1></div>
        <div class="row">
            <div class="col" ><h3 id="playerScore">Player Score: 0</h3></div>
            <div class="col" ><h3 id="COMScore">COM Score: 0</h3> </div>
        </div>
        
        <div class="row">
            <div class="choice col">
            
            <span onclick="kachipum(0)">
                <img src="/pruebas/resources/img/piedra.png" alt="">
            </span>
        </div>
        <div class="choice col">
            <span onclick="kachipum(1)">
                <img src="/pruebas/resources/img/papel.png" alt="">
            </span>
        </div>

        <div class="choice col">
            <span onclick="kachipum(2)">
                <img src="/pruebas/resources/img/tijeras.png" alt="">
            </span>
        </div>
        </div>
        

        

    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>Player</td>
                    <td>COM</td>
                    <td>Ganador</td>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script async src="/pruebas/resources/js/kcp.js"></script>
</body>


<style>
    .juego{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
    }
    .choice{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 200px;
        margin: 10px;
    }
    .choice img{
        width: 200px;
    }
    table{
    
    }
    .choice:hover {
        transform: scale(1.2);
    }
    h1{
        text-align: center;
    }
</style>

</html>