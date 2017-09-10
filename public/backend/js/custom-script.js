/**
 * Created by mohammed.mohasin on 31-Aug-17.
 */


$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
    if(document.querySelector(".textarea_editor")) {
        //$('.textarea_editor').wysihtml5();
        $(".textarea_editor").each(function () {
            $('.textarea_editor').froalaEditor({
                heightMin: 500,
                heightMax: 700
            });
        });


    }

    if(document.querySelector(".textarea_editor_small")) {
        //$('.textarea_editor').wysihtml5();
        $(".textarea_editor_small").each(function () {
            $('.textarea_editor_small').froalaEditor({
                height: 100
            });
        });


    }

    var flag = 1; // used for calling

    /*
    * For Deleting Row
    *
    */
    if(document.querySelector(".deleteRow")){

        $( "#content" ).on( "click", ".deleteRow", function(e) {
     //   $(".deleteRow").click(function(e) {
            var $this =   $(this);

            var id = $this.attr('data-primaryId');
            var _token = $this.attr('name');
            var route = $this.attr('href');
            var markers = [{ "id": id, "_token": _token }];
            //    console.log('id='+id+" route="+route)
            var r = confirm("Are you Sure!!!");

            if (flag == 1) {
                if (r == true) {
                    flag = 0;
                    $.ajax({
                        url: route,
                        type:'POST',
                        dataType:'json',
                        data: {_token : _token, id:id},
                        success: function(data) {
                            flag = 1;
                            if(data.error==false){
                                $this.parent().parent().remove();
                            }
                        }
                    });
                } else {

                }

            }


        });

    }



    /*
     * Add More Option Row at AddPage and Edit Page
     *
     */
    if(document.querySelector("#AddMorePage")){

        $("#AddMorePage").click(function(event) {
            event.preventDefault();
                var Option_content = $('#OptionCopy').html();
                $('.AddMore').last().append(Option_content);
        });
    }

    /*
     * Add More Option Row at AddPage and Edit Page
     *
     */
    if(document.querySelector(".removeTag2Pagent")){
        $( "#content" ).on( "click", ".removeTag2Pagent", function(e) {
        //$(".optionremove").click(function() {
            $(this).parent().parent().remove();

        });
    }






});