{{--  <div id="wrap">
  <input id="keyboard" type="text" />
  <img id="icon" src="https://mottie.github.io/Keyboard/docs/css/images/keyboard.png" />
</div>  --}}
<link rel="stylesheet" href="https://mottie.github.io/Keyboard/css/keyboard.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css"/>
<script src="https://mottie.github.io/Keyboard/js/jquery.keyboard.js"></script>
<script src="https://mottie.github.io/Keyboard/js/jquery.mousewheel.js"></script>
<script src="https://mottie.github.io/Keyboard/js/jquery.keyboard.extension-typing.js"></script>
<style>
    .ui-keyboard{
        margin-top: 490px;
        font-size: 18px;
        width: 80%;
        margin-left: 10%;
        border-radius: 25px;
        border: 5px solid #fff;
    }
    .error{
        color:red;
    }
</style>
<script>
    /* VIRTUAL KEYBOARD DEMO - https://github.com/Mottie/Keyboard */
$(function() {
  $('#email,#cvv,#fname,#lname,#card-no,#mm,#yy').keyboard({
      layout: 'normal',
    	customLayout: { 
            'normal': [ '1 2 3 4 5 6 7 8 9 0 {b}',
                        'q w e r t y u i o p', 
                        'a s d f g h j k l', 
                        '@ z x c v b n m . _', 
                        '{accept} {space} {cancel}'
                    ] 
        }
    })
    // $('#cvv').keyboard({
    //   layout: 'normal',
    // 	customLayout: { 
    //         // 'normal': [ '1 2 3',
    //         //             '4 5 6', 
    //         //             '7 8 9', 
    //         //             '{accept} {cancel}'
    //         //         ] 
    //     }
    // })
});
$(function(){
   let prev='';
    $('body').on('focus','.ui-keyboard-preview',function(){
        // debugger;
        let val=$(this).val();
        if(val!==prev){
            console.log(val);
            prev=val;
            let name=$(this).attr('name');
            $(`[name="${name}"]`).val(val);
        }
    })
})

</script>