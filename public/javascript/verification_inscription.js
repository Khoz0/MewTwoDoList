function surligne(champ, erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#bd5463";
    else
        champ.style.backgroundColor = "";
}

function surligneOrange(champ,erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#bd6a22";
    else
        champ.style.backgroundColor = "";
}

function surligneVert(champ,erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#49bd19";
    else
        champ.style.backgroundColor = "";
}

function verifLogin(champ)
{
    if(champ.value.length < 1 || champ.value.length > 50)
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
    if(champ.value.length < 5 || champ.value.length > 16)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        if(champ.value.length < 8 && champ.value.length > 4)
        {
            surligneOrange(champ, true);
            return false;
        }else{
            if(champ.value.length < 10 && champ.value.length > 7)
            {
                surligneVert(champ, true);
                return false;
            }
        }
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
    if(!regex.test(champ.value) && champ.value.length < 80)
    {
        surligne(champ.value,false);
        return false;
    }
    else
    {
        surligne(champ.value,true);
        return true;
    }
}

