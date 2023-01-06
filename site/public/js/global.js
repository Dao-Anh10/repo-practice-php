
function getBaseUrl(url) {
    return baseUrl = url;
}

function resetForm(form) {
    document.getElementsByClassName("form-register")[0].reset();
}

function timeoutAlert() {
    let alertChild = document.getElementById("alert").children;
    if (alertChild.length > 0) {
        for (let i = 0; i < alertChild.length; i++) {
            setTimeout(function () {
                alertChild[i].style.display = 'none';
            }, (60 * 60));
        }
    };
}

// function removeParam($url) {
//     let url = new URL($url);
//     console.log(url);
//     if (url.search != '') {
//         url.search = '';
//         location.href = url;
//         console.log(url);
//     }
// }

