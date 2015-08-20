 $(document).ready(function() {
    /*Autoselect*/
    $(function() {
        var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
        ];
        $( "#vyber_misto" ).autocomplete({
        source: availableTags
        });
    });
    /*Multiselect*/
        $('#vyber_sport').multiselect();
        
    /*Backstretch*/
    $("#homepage #header").backstretch("www/images/background_home.png");
    $("#my_account #header").backstretch("www/images/background_my_account.png");
    $("#detail #header").backstretch("../www/images/background_my_account.png");
    
    /*More*/
    $('#showLess').hide();
    if($('#load_more_list').width() < 430){
    $('#load_more_list li:lt(3)').show();
    }else{
    $('#load_more_list li:lt(9)').show();
    } 
    var items =  150;
    var shown =  3;
    $('#loadMore').click(function () {
        $('#showLess').show();
        shown = $('#load_more_list li:visible').size()+3;
        if(shown< items) {$('#load_more_list li:lt('+shown+')').show();}
        else {$('#load_more_list li:lt('+items+')').show();
             $('#loadMore').hide();
             }
    });
    $('#showLess').click(function () {
        $('#load_more_list li').not(':lt(8)').hide();
        $('#loadMore').show();
        $('#showLess').hide();
    });
    /*Sidebar 100%*/
    $(function() {
      //if ($("#content").height > $("#sidebar").height){
         $('#content').find('#sidebar').css('height', $('#content').height());
      //}
    
    
    /*Sidebar detail accordion*/
        $(function() {
            $( "#accordion" ).accordion({
               collapsible: true
               });
            $( "#accordion_search" ).accordion({
               collapsible: true
               });
            $( "#prices" ).accordion({
               collapsible: true
               });
            $( "#opening" ).accordion({
               collapsible: true
               });
            $( "#tabs" ).tabs();
            $( "#comments_others" ).tabs();
        });
    });
    $('#top_bar a').click(function(){
        $('.background_popup').fadeIn();
        $('#registry_form').show();
    });
    $('.closer').click(function(){
        $('.background_popup').fadeOut();
        $('#registry_form').hide();
    });
});
