import * as Swal from "sweetalert2";

// Set as global
window.alertSuccess = function(message, title = "Done"){
    Swal.fire({
        title: title,
        text: message,
        icon: 'success',
        confirmButtonText: 'Ok'
    })
}

window.alertDanger = function(message, title = "Ops"){
    Swal.fire({
        title: title,
        text: message,
        icon: 'error',
        confirmButtonText: 'Ok'
    })
}


window.alertWarning = function(message, title = "Attention"){
    Swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        confirmButtonText: 'Ok'
    })
}

window.deleteContactConfirmation = function (id, name, action) {
    Swal.fire({
        title: "Confirm Action",
        html: "Are you sure you want to remove <b>"+name+"</b>?",
        icon: 'warning',
        confirmButtonText: 'Yes!',
        showCancelButton: true
    }).then((res) => {
        if(res.isConfirmed){

            var f = document.createElement('form');
            f.action=action;
            f.method='POST';

            var t = document.createElement('input');
            t.type = 'hidden';
            t.name = '_token';
            t.value = document.querySelector('meta[name="csrf"]').content;

            f.appendChild(t);

            document.body.appendChild(f);
            f.submit();

        }
    })
}
