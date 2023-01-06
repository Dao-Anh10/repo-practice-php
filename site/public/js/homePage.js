
function deleteAll() {
    let choice = confirm("Bạn thật sự muốn xóa???");
    if (choice == true) {
        window.location = baseUrl + '/task/deleteAll';
    }

}

function deleteItem(id) {
    let choice = confirm("Bạn thật sự muốn xóa???");
    if (choice == true) {
        window.location = baseUrl + '/task/delete?id=' + id;
    }
}

function toggleFormUpdate(item_id) {
    var classItem = document.getElementsByClassName('form-update-item__' + item_id)[0];
    classItem.classList.toggle("show-form-update");
}

function dropdownAccount() {
    document.querySelector(".select-action-user").classList.toggle("show-dropdown");
}

window.onclick = function (e) {
    if (!e.target.matches('.btn-show-dropdown')) {
        var noiDungDropdown = document.querySelector(".select-action-user");
        if (noiDungDropdown.classList.contains('show-dropdown')) {
            noiDungDropdown.classList.remove('show-dropdown');
        }
    }
}

