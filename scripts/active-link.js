onload = function ()
{
for (var lnk = document.getElementsByClassName('aside-link'), j = 0; j < lnk.length; j++)
if (lnk [j].href == document.URL) lnk [j].style.cssText = 'background-color:#a60064; color:white;';
}