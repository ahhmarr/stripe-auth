<style>
#gif-wrapper{
    padding-left:15px;
    float:left;
    height:20%;
    background-color: #fff;
    position: fixed;
    bottom: 0;
    width: 100%;
    opacity:0.5;
}
#slider-text{
    width:80%;
    background-color: blue;
    /* text-align: right; */
    /* float: right; */
}
#slider{
    transform: rotate(-90deg);
    position: fixed;
    bottom: -100px;
    right: 127px;
}
#gif-wrapper img {
    /* margin-top:190px; */
    /* position: fixed;
    bottom:50px;
    right:0; */
}
.fa-angle-right{
    font-size: 100px;
    transform: rotate(90deg);
    position: fixed;
    right: 432px;
    bottom: -20px;
    color:#00a7e8;
    
}
#swipe{
    position: fixed;
    right: -175px;
    bottom:55px;
    font-size: 20px;
    color:#00a7e8;
    
}
</style>
<div id="gif-wrapper"> 
    <img id="slider" src="/images/cardslider.gif" alt="">
    <div id="slider-text">
        <div style="width:50%" id="swipe">Swipe Your Card Here</div>
        <div><i class="fa fa-angle-right"></i></div>
    </div>
</div>
