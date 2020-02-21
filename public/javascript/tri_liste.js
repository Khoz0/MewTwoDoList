function sort_by_name(val) {

    console.log(val);
    
    $.each($('#liste'),
        function () {
            $(this).children().each(
                function () {
                    if ($(this).attr("id") != null)
                        console.log($(this).attr("id"));
                }
            );
        }
    );
}