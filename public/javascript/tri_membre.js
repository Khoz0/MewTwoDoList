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



    liste.sort(function (a, b) {
        switch (val) {
            case "nom":
                return sort_nom(a, b);
                break;
            case "pseudo":
                return sort_pseudo(a, b);
                break;
            case "mail":
                return sort_mail(a, b);
                break;
            default:
                return sort_alphab(a, b);
                break;
        }
    });


    var order = 0;
    liste.forEach(element => {
        element.css("order", order++);
    });

}


function sort_nom(a, b) {
    if (a.attr("id").split("\\")[0] < b.attr("id").split("\\")[0])
        return -1;
    return 1;
}

function sort_pseudo(a, b) {
    if (a.attr("id").split("\\")[0] > b.attr("id").split("\\")[0])
        return -1;
    return 1;
}

function sort_mail(a, b) {
    if (new Date(a.attr("id").split("\\")[1]).getTime() > new Date(b.attr("id").split("\\")[1]).getTime())
        return -1;
    return 1;
}
