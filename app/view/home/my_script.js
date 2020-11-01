//    fav list

 $(document).ready(function () {
                $("#fav_modal").hide();
                $("#fav_types").hide();
                $("#fav_news_content").hide();
                $("#fav_apps_content").hide();



                $("#hide").click(function () {
                    $("#fav_modal").hide();
                    $("#fav_types").hide();
                    $("#fav_news_content").hide();
                    $("#fav_apps_content").hide();
                });

                $("#hide1").click(function () {
                    $("#fav_modal").hide();
                    $("#fav_types").hide();
                    $("#fav_news_content").hide();
                    $("#fav_apps_content").hide();
                });



                $("#show_fav_types").click(function () {
                    $("#fav_modal").show();


                    $("#fav_news_content").hide();
                    $("#fav_apps_content").hide();

                    $("#fav_types").show();
                });



                $("#fav_types_form").submit(function (e) {
                    e.preventDefault();

                });


                $('#show_news_fav').click(function () {
                    var x = document.getElementById("show_news_fav").value;
                    if (x == "news" && x != "apps") {
                        $("#fav_types").hide();
                        $("#fav_modal").show();
                        $("#fav_apps_content").hide();
                        $("#fav_news_content").show();
//                        alert(x);
                    }


                });

                $('#show_apps_fav').click(function () {
                    var x = document.getElementById("show_apps_fav").value;

                    if (x == "apps" && x != "news") {
                        $("#fav_types").hide();
                        $("#fav_modal").show();
                        $("#fav_news_content").hide();
                        $("#fav_apps_content").show();
//                        alert(x);
                    }
                });




            });


//            loadMoreComments
            $(function () {


                var $items = $('li#single_comment_area'),
                        $loadMoreBtn = $("#loadMoreComments"),
                        $HideComBtn = $("#hide_comments"),
                        maxItems = 2,
                        hiddenClass = "visually-hidden";
//                        console.log(Object.keys($items).length);
console.log($items.length);
var num_row = ($($items).length) - 2;
console.log(num_row);
//                        console.log(num_row);
                        
                         if(num_row == 0 || $items.length == 0 || $items.length == 1 ){
                        $loadMoreBtn.hide();
                        $HideComBtn.hide();
                    }
                    
                $.each($items, function (idx, item) {
//console.log(Object.keys(item).length);
//console.log($.type(idx));
                    if (idx > maxItems - 1) {

                        $HideComBtn.hide();
                        $(this).addClass(hiddenClass);
//                        console.log(this);

                    }
                });

                $loadMoreBtn.on('click', function (e) {
                    e.preventDefault();
                    // add visually hidden class to items beyond maxItems
                    if(num_row == 2){
                         $('#olComments').css({"height":"750px"});
//                         
                        
                    }else if (num_row > 2){
                        $('#olComments').css({"overflow":"scroll" , "height":"750px"});
                    }
                    
                   
                    
                    $("." + hiddenClass).each(function (idx, item) {
//                        if (idx < maxItems + 1) {
                            $(this).removeClass(hiddenClass);
                            console.log(idx);
//                        }
                        // kill button if no more to show
                        if ($("." + hiddenClass).size() === 0) {
                            $loadMoreBtn.hide();
                            $HideComBtn.show();
                        }
                    });

                });
                
                 $HideComBtn.on('click', function (e) {
                    e.preventDefault();
                    $('#olComments').css({"height":"auto" , "overflow":"none"});
                     $.each($items, function (idx, item) {

                    if (idx > maxItems - 1) {

                        $HideComBtn.hide();
                        $loadMoreBtn.show();
                        $(this).addClass(hiddenClass);
                        
//                        console.log(this);

                    }
                });
                    
                });
                
            });