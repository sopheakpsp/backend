<link href="css/client_slide.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

<div style="text-align:center; font-size:11px;border-top:1px solid #aeaeae; border-bottom:1px solid #aeaeae; background:#e9e9e9; padding:5px 0">OUR CLIENTS</div>      
<ul id="flexiselDemo3">
    <li><a href="#"><img src="img/cimb.png" alt="" title="CIMB Bank"/></a></li>
    <li><a href="#"><img src="img/prdf.png" alt="" title="Law"/></a></li>
    <li><a href="https://www.ababank.com" target="_blank"><img src="img/aba.png" alt="ABA bank" title="ABA"/></a></li>
    <li><a href="http://www.maruhanjapanbank.com/index.php/en/" target="_blank"><img src="img/maruhan.png" alt="Maruhan bank" title="Maruhan Bank"/></a></li>
    <li><a href="http://www.ppcb.com.kh/" target="_blank"><img src="img/ppcb.png" alt="PPCB bank" title="PPCB"/></a></li>
    <li><a href="http://www.hlb.com.kh/" target="_blank"><img src="img/hongleong.png" alt="Hongleong bank" title="Hongleong"/></a></li>
    <li><a href="#"><img src="img/osle.png" alt="OW bank" title="OW Bank"/></a></li>
    <li><a href="https://www.ucb.com.kh/" target="_blank"><img src="img/ucb-logo.gif" alt="bank" title="UCB"/></a></li>
    <li><a href="http://savimexpetroleum.com/" target="_blank"><img src="img/savimex.png" alt="bank" title="savimex"/></a></li>
    <li><a href="#"><img src="img/private.png" alt="bank" title="private sector"/></a></li>                                               
</ul>    

<script type="text/javascript">
$(document).ready(function() {
    $("#flexiselDemo3").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 5000,            
        pauseOnHover: true,
        
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });
});
</script>
