/**
 * This module encapsulates the navigation of the website.
 */

function Navigator() {}

Navigator.prototype.navigate = function(origin)
{
    var nextPage = null;

    switch(origin)
    {
        case "submit_group_report": nextPage = "submitReport.php";
            break;
        default: break;
    }

    window.location.href = nextPage;
}