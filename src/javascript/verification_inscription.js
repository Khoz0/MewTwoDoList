function surligne(champ, erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#bd5463";
    else
        champ.style.backgroundColor = "";
}

function verifLogin(champ)
{
    if(champ.value.length < 2 || champ.value.length > 60)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

function verifMDP(champ)
{
    if(champ.value.length < 2 || champ.value.length > 16)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

function confMDP(mdp1, mdp2)
{
    if(mdp1.value===mdp2)
    {
        surligne(mdp1, false);
        return true;
    }
    else
    {
        surligne(mdp1, true);
        return false;
    }
}

function verifMail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{1,3}$/;
    if(!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

