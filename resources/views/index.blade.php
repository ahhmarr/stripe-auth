<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>card reader</title>
</head>

<body>
    <input type="text" name="data" id="data" style="position: absolute;top:-1000px" autofocus>
    <input type="button" value="Enable Reader" id="enable-reader" />
    <form action="/auth-payment" method="POST">
        <table>
            <tr>
                <td>Amount</td>
                <td>
                   $  <input required type="text" name="amount" id="amount" value="{{$amount??30}}">
                </td>
            </tr>
            <tr>
                <td>Card No</td>
                <td>
                    <input required type="password" name="card-no" id="card-no">
                </td>
            </tr>
            <tr>
                <td>first name</td>
                <td>
                    <input required type="text" name="fname" id="fname">
                </td>
            </tr>
            <tr>
                <td>last name</td>
                <td>
                    <input required type="text" name="lname" id="lname">
                </td>
            </tr>
            <tr>
                <td>MM</td>
                <td>
                    <input required type="number" name="mm" id="mm">
                </td>
            </tr>
            <tr>
                <td>YY</td>
                <td>
                    <input required type="number" name="yy" id="yy">
                </td>
            </tr>
            <tr>
                <td>CVV</td>
                <td>
                    <input required type="number" maxlength="3" name="cvv" id="cvv">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input required type="email" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Authorize" >
                </td>   
            </tr>
        </table>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script>
    $(function () {
        $('#data').keyup(function () {
            const v = $(this).val();
            if(!v || !v.length){
                return;
            }
            const cc = v.match(/\^(.?)*\?/g).pop();
            let name = cc.match(/\^(.?)*\^/);
            name = name.shift().replace(/\^/g, '').replace(/\//g, ' ').split(',').shift();
            let fname = name.split(' ').pop();
            let lname = name.split(' ').shift() === fname ? '' : name.split(' ').shift();
            let cardNO = cc.match(/;(.?)*=/).shift().replace(/;/, '').replace('=', '');
            let exp = cc.match(/=[0-9]{4}/).shift().replace('=', '');
            let mm = exp.substr(2);
            let yy = exp.substr(0, 2);
            exp = exp.substr(2) + '/' + exp.substr(0, 2);
            $('#card-no').val(cardNO);
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#mm').val(mm);
            $('#yy').val(yy);
            $('#data').val('');
            $('#fname').focus();
        });
    })
    $(function(){
        $('#enable-reader').click();
        $('#enable-reader').click(()=>{
            $('#data').val('').focus();
        })
        $('input').focus(()=>{
            var isReading=$('#data').is(':focus');
            if(isReading){
                $('#enable-reader').val('reading ....');
            }else{
                $('#enable-reader').val('Enable Reader');
            }
        })
    })
    function parseData() {
        const val = document.querySelector('#data')
        var name = cc.match(/\^(.?)*\^/);
        name = name.replace(/\^/g, '').replace(/\//g, ' ').split(',').shift();
    }
    
</script>
@include('keyboard')

</html>