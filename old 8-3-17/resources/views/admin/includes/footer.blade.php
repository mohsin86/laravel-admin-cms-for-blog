<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/26/2017
 * Time: 8:05 PM
 */
?>
<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy;  Admin. Brought to you by <a href="http://dragonitbd.com">dragonitbd.com</a> </div>
</div>

<!--end-Footer-part-->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/excanvas.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.peity.min.js')}}"></script>
<script src="{{asset('backend/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.js')}}"></script>
<script src="{{asset('backend/js/matrix.dashboard.js')}}"></script>
<script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.interface.js')}}"></script>
<script src="{{asset('backend/js/matrix.chat.js')}}"></script>
<script src="{{asset('backend/js/jquery.validate.js')}}"></script>
<script src="{{asset('backend/js/matrix.form_validation.js')}}"></script>
<script src="{{asset('backend/js/jquery.wizard.js')}}"></script>
<script src="{{asset('backend/js/jquery.uniform.js')}}"></script>
<script src="{{asset('backend/js/select2.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.popover.js')}}"></script>
<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.tables.js')}}"></script>




<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
    function explode(){
        document.getElementById("input-file").style.opacity = 1;
    }
    if(document.getElementById("input-file")){
//div exists

        setTimeout(explode, 200);

    }

    if(document.querySelector(".form-check-input")){
        setTimeout(form_check_input, 200);
    }
//div exists
    function form_check_input(){
        document.querySelector(".form-check-input").style.opacity = 1;
    }







</script>
