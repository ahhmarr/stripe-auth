<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>card reader</title>
</head>

<body>
    {{--    --}}
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
   <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">


   <style>
       html, body, .container,#gif-wrapper {
            /* Height and width fallback for older browsers. */
            height: 100%;
            /* width: 100%; */

            /* Set the height to match that of the viewport. */
            height: 100vh;

            /* Set the width to match that of the viewport. */
            /* width: 100vw; */

            /* Remove any browser-default margins. */
            /* margin: 0; */
        }
        html {
            overflow: hidden;
        }
       .container{
           background-color:rgba(255, 255, 255, 0.3);
           width:415px;
       }
       p {
           
       }
       p{
           padding-top:10px;
           font-weight: bold;
           color:#00a7e8;
           text-shadow: 1px 1px #fff;
       }
       .form-control{
           border-radius: 0px!important;
           border: none;
           padding:15px;
           /* height:55px; */
           /* font-size:20px; */
           
       }
       #card-no{
           letter-spacing:20px;
           font-size:20px;
       }
       ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        letter-spacing: normal;
        font-size:13px;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            letter-spacing: normal;
            font-size:13px;
        }
        .fa-eye{
            color:#ccc;
            display: none;
        }
       .hidden-x{
           position: absolute;
           top:-10000px;
       }
       .hidden-xx{
           display: none;
       }
       [type="submit"]{
           margin-top:10px;
           padding:15px;
       }
       .heading{
           /* color:gray; */
       }
       video {
        /*  making the video fullscreen  */
        position: fixed;
        right: 0; 
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        width: auto; 
        height: auto;
        z-index: -100;
        }

   </style>
    <!--  Video is muted & autoplays, placed after major DOM elements for performance & has an image fallback  -->
    <video autoplay loop id="video-background" muted plays-inline>
    <source src="https://offsetmytrip.com/kiosktest/3671960.mp4" type="video/mp4">
    </video>
    {{-- <h3 class="text-center heading"> Swipe or manually input your payment information to finalize your tax-deductible donation. </h3> --}}
    <div class="container">
        <form action="/auth-payment" method="POST" class="">
            <input type="hidden" name="amount" value="{{$amount ?? 0.1}}">
            <div class="col-sm-12">
                <span class="pull-right" style="font-size:20px;padding:30px">
                    {{-- $ {{$amount ?? 0.1}} --}}
                </span>
            </div>
            <input autocomplete="off" type="text" name="data" id="data"   autofocus class="hidden-x">
            <input type="button" value="Enable Reader" id="enable-reader"   class="hidden-x"/>
            <div class="row">
                <div class="col-sm-12">
                    <p>Card Number</p>
                    <input required  class="form-control" type="password" name="card-no" id="card-no" placeholder="Card Number">
                    <i class="fa fa-eye fa-2x" style="position: absolute;right:-25px;margin-top:-35px"></i>
                    <i class="fa fa-eye-slash hidden-xx fa-2x" style="position: absolute;right:-25px;margin-top:-35px"></i>
                </div>
            </div>
            <div class="row">
                
                <div class="col-sm-6">
                    <p>First Name</p>
                    <input class="form-control" required autocomplete="off" type="text" name="fname" id="fname" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                    <p>Last Name</p>
                    <input  class="form-control" required autocomplete="off" type="text" name="lname" id="lname" placeholder="Last Name">
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-4">
                    <p>Month</p>
                    <input class="form-control" required autocomplete="off" type="text" name="mm" id="mm" placeholder="Month(mm)">
                </div>
                <div class="col-sm-4">
                    <p>Year</p>
                    <input class="form-control" required autocomplete="off" type="text" name="yy" id="yy" placeholder="Year(yy)">
                </div>
                 <div class="col-sm-4">
                    <p>CVV</p>
                    <input  class="form-control" required autocomplete="off" type="text" name="cvv" id="cvv" placeholder="CVV">
                </div>
            </div>
            <div class="row">
               
                <div class="col-sm-12">
                    <p>Email</p>
                    <input   class="form-control" required type="email" autocomplete="off" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div style="margin-top: 30px;">
                <input type="submit" class="btn btn-primary btn-block" value="Authorize" >
            </div>
        </form>
        

    </div>
    @include('slider-gif')
    <br>
    <br>
    <br>
    <br>
    <h5 class="text-center heading">   
        <div>
            Appalachian Offsets is a program of Green Built Alliance, <br>
            a recognized charitable organization under §501(c)3 of the Internal Revenue Code. <br>
            Contributions to Green Built Alliance are tax-deductible to the extent permitted by law.
        </div>
        <div>www.cutmycarbon.org | www.greenbuilt.org</div>
    </h5>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
@include('keyboard')
<script>
    $(function(){
        $('form').validate({
            rules : {
                cvv :{
                    number : true,
                    minlength : 3,
                    maxlength :3
                },
                mm : {
                    number : true,
                    min : 1,
                    max :12
                },
                yy : {
                    number : true,
                    min : 18,
                    max : 99
                }
            },
            submitHandler : function(form){
                form.submit();
            }
        })
    })
</script>
<script>
    $(function(){
        $('.fa-eye').click(function(){
            $('#card-no').attr('type','text');
            $(this).hide();
            $('.fa-eye-slash').show();
        })
        $('.fa-eye-slash').click(function(){
            $('#card-no').attr('type','password');
            $(this).hide();
            $('.fa-eye').show();
        })
    })
    $(function () {
        $('#data').keyup(function () {
            const v = $(this).val();
            if(!v || !v.length){
                return;
            }
           updateCardData(v);
        });
        $('body').on('keyup','.ui-widget-content',function(){
            let val=$(this).val();
            let name=$(this).attr('name');
            
            // debugger;
            let cardExpression=/^\%(.?)*\^(.?)*\/(.?)*\^(.?)*\?(.?)*;(.?)*=(.?)*\?$/g
            if(cardExpression.test(val)){
                console.log(`[name="${name}"]`);
                let kb=$(`[name="${name}"]`).getkeyboard();
                kb.accept();
            }
            
        });
        $('input').keyup(function(){
            // let cardExpression=/^\%(.?)*\^(.?)*\/(.?)*\^(.?)*\?(.?)*;(.?)*=(.?)*\?$/g
            // let val=$(this).val();
            // let id=$(this).attr('id');
            
            // if(cardExpression.test(val)){
            //     updateCardData(val);
            //     if(id==='email' || id==='cvv'){
            //         $(this).val('');
            //     }
            // }
        });
        $('input').change(function(){
            let cardExpression=/^\%(.?)*\^(.?)*\/(.?)*\^(.?)*\?(.?)*;(.?)*=(.?)*\?$/g
            let val=$(this).val();
            let id=$(this).attr('id');
            
            if(cardExpression.test(val)){
                updateCardData(val);
                if(id==='email' || id==='cvv'){
                    $(this).val('');
                }
            }
        });
    })
    function updateCardData(v){
        let cc = v.match(/\^(.?)*\?/g);
        if(!cc || !cc.length){
            return;
        }
        cc=cc.pop();
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
        // $('#fname').focus();
    }
    $(window).on('load',function(){
        $('#data').focus();
    })
    $(function(){
        $('#data').focus();
    })
    $(function(){
        
        // $('#enable-reader').click();
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
<script>
var inactivityTime = function () {
    console.log(`called`)
    var t;
    window.onload = resetTimer;
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onmousedown = resetTimer; // touchscreen presses
    document.ontouchstart = resetTimer;
    document.onclick = resetTimer;     // touchpad clicks
    document.onscroll = resetTimer;    // scrolling with arrow keys
    document.onkeypress = resetTimer;

    function logout() {
        // alert("You are now logged out.")
        location.href='https://offsetmytrip.com/kiosktest/';
        //location.href = 'logout.php'
    }

    function resetTimer() {
        clearTimeout(t);
        // t = setTimeout(logout,20*1000) //20 seconds
        // 1000 milisec = 1 sec
    }
};
inactivityTime();
</script>

</html>