function setCriteria(criteria, liste, nom, id) {

    console.log(criteria + " " + liste + " " + nom + " " + id);
    url = window.location.origin + "/mew_two_do_list/ajax/request_member.php";
    if (liste == undefined) {

        arg0 = "";

        arg1 = "";
    } else {
        if (criteria == "name" && liste.split(" ").size >= 2) {

            arg0 = liste[0];

            arg1 = liste[1];
        } else {
            arg0 = liste[0];
            arg1 = "";

        }
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: {criteria: criteria, arg0: arg0, arg1: arg1},
        timeout: 5000,
        success: function (code_html) {


            $.each($('#utilisateurs'),
                function () {
                    $(this).children().each(
                        function () {
                            $(this).remove();
                        }
                    );
                }
            );

            res = code_html.split("\\/");

            for (i = 0; i < res.length - 1; i += 4) {
                if (res[i] != nom) {
                    document.getElementById("utilisateurs").innerHTML += '<div class="jumbotron col-auto" style="border: solid; order=-1;padding: 10px; margin: 20px;" id="lia@li.com">\n' +
                        '\n' +
                        '                        <br><table>\n' +
                        '                            <tbody><tr>\n' +
                        '                                <td>\n' +
                        '                                    <img src="' + res[i + 1] + '" width="60px" height="60px" alt="' + res[i] + '"> </td>\n' +
                        '                                <td width="30px"></td>\n' +
                        '                                <td>\n' +
                        '                                    <button onclick="addMembre(\'' + res[i] + '\',\'' + id + '\')">Ajouter</button>\n' + //TODO Soucis, quel numéro de liste ?
                        '                                </td>\n' +
                        '                            </tr>\n' +
                        '                            \n' +
                        '                        </tbody></table>\n' +
                        '\n' +
                        '                        <br>\n' +
                        '                        <div class="row justify-content-center">' + res[i] + '</div>\n' +
                        '                        <div class="row justify-content-center">' + res[i + 2] + ' ' + res[i + 3] + '</div>\n' + //Prenom + nom
                        '\n' +
                        '                    </div>';
                    console.log(res[i]);
                }
            }

        },
        error: (xhr) => {
            console.log("status =" + xhr.status);
            console.log(xhr);
        }
    });
}