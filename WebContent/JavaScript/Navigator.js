/**
 * This module encapsulates the navigation of the website.
 */
alert('in navigator');
function Navigator() {}

Navigator.prototype.navigate = function(origin)
{
    var nextPage = null;

    switch(origin)
    {
        case "submit_group_report":             nextPage = "submitReport.php";                  break;
        case "view_results_and_ranking":        nextPage = "resultsAndRanking.php";             break;
        case "visit_the_forum":                 nextPage = "forumPage.php";                     break;
        case "conduct_a_peerwise_assessment":   alert("Set This hyperlink in navigator.js");    break;

        default: break;
    }

    window.location.href = nextPage;
}