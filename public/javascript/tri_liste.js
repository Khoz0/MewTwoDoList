function sort_by_name(val) {

    var liste = [];
    
    $.each($('#liste'),
        function () {
            $(this).children().each(
                function () {
                    if ($(this).attr("id").split("\\")[0] != null) {
                        liste.push($(this));
                    }
                }
            );
        }
    );


    switch (val) {
        case "alphabInverse":
            liste.sort(function (a, b) {
                return sort_alphabInverse(a, b);
            });
            break;
        default:
            liste.sort(function (a, b) {
                return sort_alphab(a, b);
            });
            break
    }


    var order = 0;
    liste.forEach(element => {
        element.css("order", order++);
    });

}


function sort_alphab(a, b) {
    if (a.attr("id").split("\\")[0] < b.attr("id").split("\\")[0])
        return -1;
    return 1;
}

function sort_alphabInverse(a, b) {
    if (a.attr("id").split("\\")[0] > b.attr("id").split("\\")[0])
        return -1;
    return 1;
}